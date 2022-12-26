from Day8.Utility import *


def check_left(tree_arr: list, current_x: int, current_y: int) -> bool:
    left_size = current_y
    for i in range(left_size):
        if tree_arr[current_x][i] >= tree_arr[current_x][current_y]:
            return False
    return True


def check_right(tree_arr: list, current_x: int, current_y: int) -> bool:
    right_size = len(tree_arr[current_x])
    for i in range(current_y + 1, right_size):
        if tree_arr[current_x][i] >= tree_arr[current_x][current_y]:
            return False
    return True


def check_down(tree_arr: list, current_x: int, current_y: int) -> bool:
    down_size = len(tree_arr)
    for i in range(current_x + 1, down_size):
        if tree_arr[i][current_y] >= tree_arr[current_x][current_y]:
            return False
    return True


def check_up(tree_arr: list, current_x: int, current_y: int) -> bool:
    up_size = current_x
    for i in range(up_size):
        if tree_arr[i][current_y] >= tree_arr[current_x][current_y]:
            return False
    return True


utility = Utility()
input_str = utility.readfile("input.txt")
line_arr = input_str.split("\n")
count_line = len(line_arr)
tree_arr = [None] * count_line
for i in range(count_line):
    tree_arr[i] = (list(line_arr[i]))

count_visible_trees = 0
size_tree_arr = len(tree_arr)
for i in range(size_tree_arr):
    size_line = len(tree_arr[i])
    for j in range(size_line):
        if check_left(tree_arr, i, j) \
                or check_right(tree_arr, i, j) \
                or check_down(tree_arr, i, j) \
                or check_up(tree_arr, i, j):
            count_visible_trees += 1
print(count_visible_trees)
