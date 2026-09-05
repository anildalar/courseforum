import re
import httpx
from bs4 import BeautifulSoup
from urllib.parse import quote_plus, urlparse


USER_AGENT = (
    "CourseForumAgent/1.0 "
    "(educational-course-discovery)"
)


SEARCH_URL = "https://html.duckduckgo.com/html/?q={query}"


COURSE_KEYWORDS = [
    "course",
    "courses",
    "learn",
    "learning",
    "academy",
    "education",
    "training",
    "tutorial",
    "programming",
    "university",
    "open course",
    "online course",
]


def clean_text(text: str) -> str:
    return re.sub(r"\s+", " ", text or "").strip()


def get_domain(url: str) -> str:
    try:
        return urlparse(url).netloc.lower()
    except Exception:
        return ""


def looks_like_course_site(title: str, description: str, url: str) -> bool:
    text = (
        f"{title} "
        f"{description} "
        f"{url}"
    ).lower()

    return any(
        keyword in text
        for keyword in COURSE_KEYWORDS
    )


def search_web(query: str):
    search_url = SEARCH_URL.format(
        query=quote_plus(query)
    )

    print(f"[WEB DISCOVERY] {query}")

    try:
        response = httpx.get(
            search_url,
            headers={
                "User-Agent": USER_AGENT,
                "Accept": "text/html",
            },
            timeout=20,
            follow_redirects=True,
        )

        response.raise_for_status()

    except Exception as exc:
        print(
            f"[WEB DISCOVERY] Search failed: {exc}"
        )
        return []

    soup = BeautifulSoup(
        response.text,
        "html.parser"
    )

    results = []
    seen_domains = set()

    for result in soup.select(".result"):

        link = result.select_one(
            ".result__a"
        )

        if not link:
            continue

        url = link.get("href", "").strip()

        title = clean_text(
            link.get_text(" ", strip=True)
        )

        snippet_element = result.select_one(
            ".result__snippet"
        )

        description = clean_text(
            snippet_element.get_text(
                " ",
                strip=True
            )
            if snippet_element
            else ""
        )

        domain = get_domain(url)

        if not domain:
            continue

        if domain in seen_domains:
            continue

        if not looks_like_course_site(
            title,
            description,
            url,
        ):
            continue

        seen_domains.add(domain)

        results.append(
            {
                "title": title,
                "description": description,
                "url": url,
                "domain": domain,
            }
        )

    return results


def website_discovery(state):

    query = state.get(
        "query",
        "free Python programming courses"
    )

    search_queries = [
        f"{query} online course",
        f"{query} free course",
        f"{query} open course",
        f"{query} learning",
        f"{query} academy",
        f"{query} university course",
    ]

    websites = []
    seen_domains = set()

    for search_query in search_queries:

        results = search_web(search_query)

        for result in results:

            domain = result["domain"]

            if domain in seen_domains:
                continue

            seen_domains.add(domain)

            websites.append(
                {
                    "domain": domain,
                    "url": result["url"],
                    "title": result["title"],
                    "description": result["description"],
                    "discovered_from": search_query,
                }
            )

    print(
        f"[WEB DISCOVERY] "
        f"Found {len(websites)} new course websites"
    )

    for site in websites:

        print(
            f"[WEBSITE] "
            f"{site['domain']} | "
            f"{site['title']} | "
            f"{site['url']}"
        )

    return {
        "current_step": "website_discovery",
        "course_websites": websites,
    }
