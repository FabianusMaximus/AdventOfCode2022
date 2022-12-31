from Utility import *
from Field import *

utility = Utility()


def move_up(p_y: int, distance: str) -> int:
    return p_y + int(distance)


def move_down(p_y: int, distance: str) -> int:
    return p_y - int(distance)


def move_right(p_x: int, distance: str) -> int:
    return p_x + int(distance)


def move_left(p_x: int, distance: str) -> int:
    return p_x + int(distance)


def print_field(width: int, height: int, x_h: int, y_h: int, x_t: int, y_t: int):
    field = list()
    if width >= 0:
        field.append("s" + "." * (width - 1))
        y_h = height - y_h
        y_t = height - y_t
        if height >= 0:
            for i in range(height):
                field.insert(0, "." * width)
        else:
            for i in range(height):
                field.insert(-1, "." * width)
    else:
        field.append("." * (width - 1) + "s")
        y_h = height + y_h
        y_t = height + y_t
    field[y_t] = field[y_t][:x_t] + 'T' + field[y_t][x_t + 1:]
    field[y_h] = field[y_h][:x_h] + 'H' + field[y_h][x_h + 1:]

    for line in field:
        print(line)


input_str = utility.readfile("input.txt")
lines = input_str.split("\n")
pos_x_h = 0
pos_y_h = 0
pos_x_t = 0
pos_y_t = 0
field_width = 0
field_height = 0

for line in lines:
    move = line.split(" ")
    if move[0] == "U":
        pos_y_h = move_up(pos_y_h, move[1])
        field_height += int(move[1])
    elif move[0] == "D":
        pos_y_h = move_down(pos_y_h, move[1])
        field_height -= int(move[1])
    elif move[0] == "R":
        pos_x_h = move_right(pos_x_h, move[1])
        field_width += int(move[1])
    elif move[0] == "L":
        pos_x_h = move_left(pos_x_h, move[1])
        field_width -= int(move[1])
print("X-Position Kopf: " + str(pos_x_h))
print("Y-Position Kopf: " + str(pos_y_h))
print("X-Position Schwanz: " + str(pos_x_t))
print("Y-Position Schwanz: " + str(pos_y_t))
# print_field(-10, -20, pos_x_h, pos_y_h, pos_x_t, pos_y_t)

field = Field(20, 20)

field.print_field()
