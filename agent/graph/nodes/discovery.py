import re
import httpx

from bs4 import BeautifulSoup
from urllib.parse import quote_plus, urljoin, urldefrag


USER_AGENT = (
    "CourseForumAgent/1.0 "
    "(educational-course-discovery)"
)


COURSE_SOURCES = [
    {
        "name": "MIT OpenCourseWare",
        "domain": "ocw.mit.edu",
        "search_url": "https://ocw.mit.edu/search/?q={query}",
    },
    {
        "name": "OpenLearn",
        "domain": "open.edu",
        "search_url": (
            "https://www.open.edu/openlearn/"
            "search-results?search_api_fulltext={query}"
        ),
    },
    {
        "name": "Saylor Academy",
        "domain": "learn.saylor.org",
        "search_url": (
            "https://learn.saylor.org/course/"
            "search.php?search={query}"
        ),
    },
]


def clean_text(text: str) -> str:
    return re.sub(r"\s+", " ", text or "").strip()


def normalize_url(url: str) -> str:
    """
    Remove URL fragments such as #maincontent.
    """
    url, _fragment = urldefrag(url)
    return url.rstrip("/")


def is_valid_title(title: str) -> bool:
    if not title:
        return False

    title = clean_text(title)

    if len(title) < 5:
        return False

    # Navigation/UI text we don't want.
    rejected_titles = {
        "home",
        "login",
        "log in",
        "logout",
        "search",
        "courses",
        "course",
        "categories",
        "all categories",
        "skip to main content",
        "skip to main content",
        "close",
        "translate",
        "policies",
        "verify certificate",
        "courses & programs",
    }

    if title.lower() in rejected_titles:
        return False

    return True


def looks_like_course_url(url: str, provider: str) -> bool:
    url_lower = url.lower()

    # Never treat these as courses.
    rejected = [
        "/login",
        "/admin/",
        "/category/",
        "/categories/",
        "/search",
        "search.php",
        "#",
        "doi.org",
        "/blog/",
        "/news/",
        "/author/",
        "/publication",
        "/journal/",
    ]

    if any(value in url_lower for value in rejected):
        return False

    if provider == "Saylor Academy":
        return "/course/" in url_lower

    if provider == "MIT OpenCourseWare":
        # MIT course pages generally live under /courses/.
        return "/courses/" in url_lower

    if provider == "OpenLearn":
        return "/openlearn/" in url_lower

    return False


def extract_links(
    html: str,
    base_url: str,
    provider: str,
):
    soup = BeautifulSoup(html, "html.parser")

    results = []
    seen = set()

    for link in soup.find_all("a", href=True):
        href = link.get("href", "").strip()

        if not href:
            continue

        url = normalize_url(
            urljoin(base_url, href)
        )

        title = clean_text(
            link.get_text(" ", strip=True)
        )

        if not is_valid_title(title):
            continue

        if not looks_like_course_url(
            url,
            provider,
        ):
            continue

        if url in seen:
            continue

        seen.add(url)

        results.append(
            {
                "title": title,
                "url": url,
            }
        )

    return results


def search_source(client, source, query):
    search_url = source["search_url"].format(
        query=quote_plus(query)
    )

    print(
        f"[DISCOVERY] {source['name']}: "
        f"{search_url}"
    )

    try:
        response = client.get(
            search_url,
            headers={
                "User-Agent": USER_AGENT,
                "Accept": "text/html,application/xhtml+xml",
            },
            timeout=20,
            follow_redirects=True,
        )

        response.raise_for_status()

    except httpx.HTTPStatusError as exc:
        print(
            f"[DISCOVERY] {source['name']} HTTP error: "
            f"{exc.response.status_code}"
        )
        return []

    except Exception as exc:
        print(
            f"[DISCOVERY] {source['name']} failed: "
            f"{exc}"
        )
        return []

    links = extract_links(
        response.text,
        str(response.url),
        source["name"],
    )

    candidates = []

    for item in links:
        candidates.append(
            {
                "title": item["title"],
                "url": item["url"],
                "source_url": item["url"],
                "provider": source["name"],
                "license": "",
                "license_url": "",
                "description": "",
                "category": "",
            }
        )

    print(
        f"[DISCOVERY] {source['name']}: "
        f"{len(candidates)} course candidates"
    )

    return candidates

def normalize_course_url(url: str) -> str:
    """
    Normalize course URLs so versioned Saylor URLs
    don't appear as separate courses.
    """
    url = normalize_url(url)

    # Saylor versioned course:
    # /course/cs105+%282020.a.01%29
    match = re.match(
        r"^(https://learn\.saylor\.org/course/[^+]+)",
        url,
        re.IGNORECASE,
    )

    if match:
        return match.group(1)

    return url
def discovery(state):
    query = state.get(
        "query",
        "Python programming",
    )

    print(
        f"[DISCOVERY] Searching real course sources "
        f"for: {query}"
    )

    candidates = []
    errors = list(
        state.get("errors", [])
    )

    with httpx.Client() as client:

        for source in COURSE_SOURCES:

            results = search_source(
                client,
                source,
                query,
            )

            candidates.extend(results)

    # Final URL-level deduplication.
    unique = []
    seen_urls = set()

    for course in candidates:

        url = normalize_course_url(
            course.get("url", "")
        )

        if not url:
            continue

        if url in seen_urls:
            continue

        seen_urls.add(url)

        course["url"] = url
        course["source_url"] = url

        unique.append(course)

    print(
        f"[DISCOVERY] Found "
        f"{len(unique)} unique course candidates"
    )

    for course in unique:
        print(
            f"[COURSE] "
            f"{course['provider']} | "
            f"{course['title']} | "
            f"{course['url']}"
        )

    return {
        "current_step": "discovery",
        "candidates": unique,
        "errors": errors,
    }
