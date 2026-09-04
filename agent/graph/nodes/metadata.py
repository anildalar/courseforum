def metadata(state):

    courses = state.get("approved_courses", [])

    for course in courses:

        course.setdefault("category", "Programming")
        course.setdefault("description", "")
        course.setdefault("source_url", course.get("url"))

    return {
        "current_step": "metadata",
        "approved_courses": courses,
    }