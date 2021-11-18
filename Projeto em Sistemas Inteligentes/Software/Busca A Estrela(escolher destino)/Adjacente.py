class Adjacente:
    def __init__(self, bairro, distancia):
        self.bairro = bairro
        self.distancia = distancia
        #Distancia objetivo + distancia adjacente
        self.distanciaAEstrela = self.bairro.distanciaObjetivo + self.distancia