from Utility import *
from Folder import *

utility = Utility()
rootFolder = Folder('root')
input = utility.readfile('input.txt')
utility.buildArray(rootFolder, input)
unsetSpace = 70000000 - rootFolder.getTotalSize()
minSize = 30000000 - unsetSpace
print(str(utility.findSmallesDirectory(rootFolder, minSize)))
