#Bairro.py
class Bairro:
    def __init__(self, nome, distanciaObjetivo):
        self.nome = nome
        self.visitado = False
        self.distanciaObjetivo = distanciaObjetivo
        self.adjacentes = []
    
    def addBairroAdjacente(self, bairro):
        self.adjacentes.append(bairro)