from Utility import *
from Field import *

utility = Utility()


def move_up(p_x: int, p_y: int, field: Field, distance: str):
    for i in range(int(distance)):
        field.get_point(p_x, p_y).reset()
        p_y += 1
        place_head(field, p_x, p_y)
        field.print_field()
        print()


def move_down(p_x: int, p_y: int, field: Field, distance: str) -> int:
    for i in range(int(distance)):
        field.get_point(p_x, p_y).reset()
        p_y -= 1
        place_head(field, p_x, p_y)
        field.print_field()
        print()


def move_right(p_x: int, p_y: int, field: Field, distance: str) -> int:
    for i in range(int(distance)):
        field.get_point(p_x, p_y).reset()
        p_x += 1
        place_head(field, p_x, p_y)
        field.print_field()
        print()


def move_left(p_x: int, p_y: int, field: Field, distance: str) -> int:
    for i in range(int(distance)):
        field.get_point(p_x, p_y).reset()
        p_x -= 1
        place_head(field, p_x, p_y)
        field.print_field()
        print()


def place_head(field: Field, p_x: int, p_y: int):
    field.get_point(p_x, p_y).set_display("H")


def place_tail(field: Field, p_x: int, p_y: int):
    current_point = field.get_point(p_x, p_y)
    current_point.set_display("T")
    current_point.set_visited(True)


input_str = utility.read_file("input.txt")
lines = input_str.split("\n")
field = Field(20, 20)
point = field.get_point(1, 1)
print(str(point.get_x()) + "," + str(point.get_y()))
pos_x_h = 0
pos_y_h = 0
pos_x_t = 0
pos_y_t = 0
field_width = 0
field_height = 0

place_head(field, 0, 0)

for line in lines:
    move = line.split(" ")
    field.get_point(pos_x_h, pos_y_h).set_display(".")
    if move[0] == "U":
        pos_y_h = move_up(pos_x_h, pos_y_h, field, move[1])
        field_height += int(move[1])
    elif move[0] == "D":
        pos_y_h = move_down(pos_x_h, pos_y_h, field, move[1])
        field_height -= int(move[1])
    elif move[0] == "R":
        pos_x_h = move_right(pos_x_h, pos_y_h, field, move[1])
        field_width += int(move[1])
    elif move[0] == "L":
        pos_x_h = move_left(pos_x_h, pos_y_h, field, move[1])
        field_width -= int(move[1])
        
print("X-Position Kopf: " + str(pos_x_h))
print("Y-Position Kopf: " + str(pos_y_h))
print("X-Position Schwanz: " + str(pos_x_t))
print("Y-Position Schwanz: " + str(pos_y_t))
print("field width: " + str(field_width))
print("field hight: " + str(field_height))
