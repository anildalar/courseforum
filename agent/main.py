from agent.graph.graph import build_graph


def main():

    graph = build_graph()

    result = graph.invoke(
        {
            "task_id": "test-001",
            "query": "free Python programming courses",
        }
    )

    print("\n==============================")
    print("LANGGRAPH RESULT")
    print("==============================")

    print(result)


if __name__ == "__main__":
    main()