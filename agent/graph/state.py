from typing import TypedDict, Any


class AgentState(TypedDict, total=False):
    task_id: str

    query: str

    search_results: list[dict[str, Any]]

    candidates: list[dict[str, Any]]

    approved_courses: list[dict[str, Any]]

    rejected_courses: list[dict[str, Any]]

    published_courses: list[dict[str, Any]]

    errors: list[str]

    current_step: str

    finished: bool