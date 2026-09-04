def planner(state):

    query = state.get("query", "free online courses")

    return {
        "current_step": "planner",
        "query": query,
    }