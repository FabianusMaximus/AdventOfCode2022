class Folder:

    def __init__(self, name: str, parent=None):
        self.name = name
        self.parent = parent
        self.folders = []
        self.files = []
        self.isRoot = False if parent else True
        self.hastChildren = False

    def getTotalSize(self) -> int:
        size: int = 0
        for file in self.files:
            size += file.size
        if self.hastChildren:
            for folder in self.folders:
                size += folder.getTotalSize()
        return size

    def getName(self):
        return self.name

    def getParent(self):
        return self.parent

    def addFolder(self, folder):
        self.folders.append(folder)
        self.hastChildren = True

    def addFile(self, file):
        self.files.append(file)
        self.hastChildren = True

    def hasChildren(self) -> bool:
        return self.hastChildren

    def getChild(self, name: str):
        for folder in self.folders:
            if folder.getName() == name:
                return folder
        return False

    def getAllFolders(self) -> []:
        allFolders = []
        if self.hastChildren:
            for folder in self.folders:
                allFolders.append(folder)
                if folder.hastChildren:
                    allFolders = allFolders + folder.getAllFolders()
        return allFolders

    def folderToString(self, depth=0) -> str:
        string = ""
        string += "  " * depth + "|__" + self.name + " " + str(self.getTotalSize()) + "\n"
        if self.hastChildren:
            for file in self.files:
                string += "\t" * (depth + 1) + "|__" + file.name + " " + str(file.size) + "\n"
            for folder in self.folders:
                string += folder.folderToString(depth + 1)
        return string
