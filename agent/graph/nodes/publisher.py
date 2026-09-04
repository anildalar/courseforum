def publisher(state):
    courses = state.get("approved_courses", [])

    published = []

    for course in courses:
        print(
            f"[DRY RUN] Would publish: "
            f"{course.get('title', 'Untitled')} -> "
            f"{course.get('url', '')}"
        )

        published.append(course)

    return {
        "current_step": "publisher",
        "published_courses": published,
    }
