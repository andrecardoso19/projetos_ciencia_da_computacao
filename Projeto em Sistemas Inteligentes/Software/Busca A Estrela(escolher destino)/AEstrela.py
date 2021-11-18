#AEstrela.py
from VetorOrdenadoAdjacente import VetorOrdenadoAdjacente


class AEstrela:
    def __init__(self, objetivo):
        self.objetivo = objetivo
        self.achou = False
        
    def buscar(self, atual):
        print('\nAtual: {}'.format(atual.nome))
        atual.visitado = True
        
        if atual == self.objetivo:
            self.achou = True
        else:
            self.fronteira = VetorOrdenadoAdjacente(len(atual.adjacentes))
            for a in atual.adjacentes:
                if a.bairro.visitado == False:
                    a.bairro.visitado = True
                    self.fronteira.inserir(a)
            self.fronteira.mostrar()
            if self.fronteira.getPrimeiro() != None:
                AEstrela.buscar(self, self.fronteira.getPrimeiro())
                

                
from Mapa import Mapa
from Mapa import vet
mapa = Mapa()
#objetivo
if vet ==1:
    aestrela = AEstrela(mapa.remedios)
if vet ==2:
    aestrela = AEstrela(mapa.piratininga)
if vet ==3:
    aestrela = AEstrela(mapa.presAltino)
if vet ==4:
    aestrela = AEstrela(mapa.km18)
if vet ==5:
    aestrela = AEstrela(mapa.centro)
if vet ==6:
    aestrela = AEstrela(mapa.santoAntonio)
if vet ==7:
    aestrela = AEstrela(mapa.umuarama)
if vet ==8:
    aestrela = AEstrela(mapa.padroeira)
#inicio na "Central"
aestrela.buscar(mapa.belaVista)


