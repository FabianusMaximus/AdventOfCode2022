from Point import *


class Field:

    def __init__(self, width=0, height=0):
        self.field = list()
        for i in range(height):
            self.field.insert(0, list())
            for j in range(width):
                self.field[0].append(Point(j, i))

    def get_point(self, x: int, y: int) -> Point:
        for i in range(len(self.field)):
            for j in range(len(self.field[i])):
                if self.field[i][j].get_x() == x and self.field[i][j].get_y() == y:
                    return self.field[i][j]

    def print_field(self):
        for line in self.field:
            item: Point
            for item in line:
                print(item.get_display(), end="")
            print("")
