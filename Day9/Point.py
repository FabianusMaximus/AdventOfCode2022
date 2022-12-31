class Point:

    def __init__(self, x: int, y: int, visited=False, display="."):
        self.x = x
        self.y = y
        self.display = "s" if x == 0 and y == 0 else display
        self.visited = True if display == "T" else visited

    def get_x(self) -> int:
        return self.x

    def get_y(self) -> int:
        return self.y

    def get_visited(self):
        return self.visited

    def set_visited(self, visited: bool):
        self.visited = visited
        self.display = "#"

    def get_display(self) -> str:
        return self.display

    def set_display(self, display: str):
        self.display = display
