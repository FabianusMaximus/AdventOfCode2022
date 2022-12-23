class File:
    def __init__(self, name: str, size: int):
        self.name = name
        self.size = size

    def getName(self):
        return self.name

    def getSize(self):
        return self.size

    def toString(self) -> str:
        return "\n\tname: " + self.name + "\n" + "size: " + str(self.size)
