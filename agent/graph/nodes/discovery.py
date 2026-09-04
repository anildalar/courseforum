def discovery(state):

    # Temporary test data.
    # We will replace this with the real web-search tool.

    courses = [
        {
            "title": "Python Programming",
            "url": "https://example.org/course/python",
            "provider": "Example University",
            "license": "CC BY",
        }
    ]

    return {
        "current_step": "discovery",
        "candidates": courses,
    }