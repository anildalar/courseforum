def license_checker(state):

    candidates = state.get("candidates", [])

    approved = []
    rejected = []

    allowed = {
        "CC0",
        "CC BY",
        "CC BY-SA",
        "Public Domain",
        "MIT",
    }

    for course in candidates:

        license_name = course.get("license", "")

        if license_name in allowed:
            approved.append(course)
        else:
            rejected.append(course)

    return {
        "current_step": "license_checker",
        "approved_courses": approved,
        "rejected_courses": rejected,
    }