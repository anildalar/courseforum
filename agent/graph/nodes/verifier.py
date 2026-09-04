def verifier(state):

    published = state.get("published_courses", [])

    errors = state.get("errors", [])

    for course in published:

        if not course.get("title"):
            errors.append("Course missing title")

        if not course.get("url"):
            errors.append("Course missing URL")

    return {
        "current_step": "verifier",
        "errors": errors,
        "finished": True,
    }