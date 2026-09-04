def deduplicator(state):

    courses = state.get("approved_courses", [])

    seen = set()
    unique = []

    for course in courses:

        url = course.get("url")

        if not url:
            continue

        if url in seen:
            continue

        seen.add(url)
        unique.append(course)

    return {
        "current_step": "deduplicator",
        "approved_courses": unique,
    }