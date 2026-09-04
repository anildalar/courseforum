from langgraph.graph import StateGraph, START, END

from .state import AgentState

from .nodes.planner import planner
from .nodes.discovery import discovery
from .nodes.license_checker import license_checker
from .nodes.metadata import metadata
from .nodes.deduplicator import deduplicator
from .nodes.publisher import publisher
from .nodes.verifier import verifier


def build_graph():

    builder = StateGraph(AgentState)

    builder.add_node("planner", planner)
    builder.add_node("discovery", discovery)
    builder.add_node("license_checker", license_checker)
    builder.add_node("metadata", metadata)
    builder.add_node("deduplicator", deduplicator)
    builder.add_node("publisher", publisher)
    builder.add_node("verifier", verifier)

    builder.add_edge(START, "planner")

    builder.add_edge("planner", "discovery")

    builder.add_edge("discovery", "license_checker")

    builder.add_edge("license_checker", "metadata")

    builder.add_edge("metadata", "deduplicator")

    builder.add_edge("deduplicator", "publisher")

    builder.add_edge("publisher", "verifier")

    builder.add_edge("verifier", END)

    return builder.compile()