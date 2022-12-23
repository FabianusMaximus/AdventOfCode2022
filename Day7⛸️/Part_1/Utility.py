from File import *
from Folder import *


class Utility:

    def __init__(self):
        pass

    def readfile(self, file: str):
        return open(file, "r").read()

    def buildArray(self, rootFolder: Folder, text: str):
        currentFolder = rootFolder
        text = text.replace("$ ", "")
        text_arr = text.split("\n")
        del text_arr[0]
        for text in text_arr:
            split = text.split(" ")
            if split[0] == 'cd':
                if split[1] != '..':
                    currentFolder = currentFolder.getChild(split[1])
                else:
                    currentFolder = currentFolder.getParent()
            elif split[0] == 'dir':
                currentFolder.addFolder(Folder(split[1], currentFolder))
            elif split[0] == 'ls':
                pass
            else:
                currentFolder.addFile(File(split[1], int(split[0])))
        print(rootFolder.folderToString())

    def getSumAllFoldersLessThen100000(self, rootFolder: Folder) -> int:
        sum = 0
        allFolders = rootFolder.getAllFolders()

        for folder in allFolders:
            if folder.getTotalSize() < 100000:
                sum += folder.getTotalSize()
        return sum
