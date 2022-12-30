from Utility import *


def check_left(tree_arr: list, current_x: int, current_y: int) -> int:
    score = 0
    left_size = current_y
    for i in range(left_size - 1, -1, -1):
        if tree_arr[current_x][i] >= tree_arr[current_x][current_y]:
            return score + 1
        else:
            score += 1

    return score


def check_right(tree_arr: list, current_x: int, current_y: int) -> int:
    score = 0
    right_size = len(tree_arr[current_x])
    for i in range(current_y + 1, right_size):
        if tree_arr[current_x][i] >= tree_arr[current_x][current_y]:
            return score + 1
        else:
            score += 1
    return score


def check_down(tree_arr: list, current_x: int, current_y: int) -> int:
    score = 0
    down_size = len(tree_arr)
    for i in range(current_x + 1, down_size):
        if tree_arr[i][current_y] >= tree_arr[current_x][current_y]:
            return score + 1
        else:
            score += 1
    return score


def check_up(tree_arr: list, current_x: int, current_y: int) -> int:
    score = 0
    up_size = current_x
    for i in range(up_size - 1, -1, -1):
        if tree_arr[i][current_y] >= tree_arr[current_x][current_y]:
            return score + 1
        else:
            score += 1
    return score


utility = Utility()
input_str = utility.readfile("input.txt")
line_arr = input_str.split("\n")
count_line = len(line_arr)
tree_arr = [None] * len(line_arr)

for i in range(count_line):
    tree_arr[i] = (list(line_arr[i]))

score_arr = list()
count_tree_arr = len(tree_arr)
for i in range(count_tree_arr):
    for j in range(count_line):
        score_up = check_up(tree_arr, i, j)
        score_left = check_left(tree_arr, i, j)
        score_right = check_right(tree_arr, i, j)
        score_down = check_down(tree_arr, i, j)
        score_arr.append(score_up * score_left * score_down * score_right)
score_arr.sort()
print(score_arr[-1])
