from Utility import *
from File import *
from Folder import *

utility = Utility()
rootFolder = Folder('root')
input = utility.readfile('input.txt')
utility.buildArray(rootFolder, input)

print(str(utility.getSumAllFoldersLessThen100000(rootFolder)))
