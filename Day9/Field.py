from Point import *


class Field:

    def __init__(self, width=0, height=0):
        self.field = list()
        for i in range(height):
            self.field.append(list())
            for j in range(width):
                self.field[i].append(Point(i, j))

    def get_point(self, x: int, y: int) -> Point:
        return self.field[x][y]

    def print_field(self):
        for line in self.field:
            item: Point
            for item in line:
                print(item.get_display(), end="")
            print("")
