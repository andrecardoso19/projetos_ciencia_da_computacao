#Mapa.py
from Bairro import Bairro
from Adjacente import Adjacente
import numpy as np


#vetores com as ditâncias até o objetivo
vet = float(input("Digite o destino: \n1- Remédios \n2- Piratininga \n3- Presidente Altino \n4- Km18 \n5- Centro \n6- Santo Antonio \n7- Umuarama \n8- Padroeira \n"))
if vet ==1:
    #Remedios
    vetor = np.array([9,0,7,9,7.5,11,9,9,15])
if vet ==2:
    #piratininga
    vetor = np.array([0,5.5,5,5,5,7,7.5,6.5,10])
if vet ==3:
    #presAltino
    vetor = np.array([5,5.5,0,5,3.5,7,5,5,11])
if vet ==4:
    #km18
    vetor = np.array([3.5,6.5,7,0,3,4,5.5,4.5,4.5])
if vet ==5:
    #centro
    vetor = np.array([5,6,3,3,0,4.5,3.5,2.5,5.5])
if vet ==6:
    #Santo antonio
    vetor = np.array([6,14.5,8,3.5,3.5,0,3,3.5,1.5])
if vet ==7:
    #Umuarama
    vetor = np.array([7.5,8,5,5,3,3,0,1.5,5.5])
if vet ==8:
    #padroeira
    vetor = np.array([13.5,13,12.5,4,6,2,5,5,0])


class Mapa:
    
    
    #Bairro e distancia para o objetivo
    piratininga = Bairro("piratininga", vetor[0])
    remedios = Bairro("remedios", vetor[1])
    presAltino = Bairro("presAltino", vetor[2])
    km18 = Bairro("km18", vetor[3])
    centro = Bairro("centro", vetor[4])
    santoAntonio = Bairro("santoAntonio", vetor[5])
    umuarama = Bairro("umuarama", vetor[6])
    belaVista = Bairro("belaVista", vetor[7])
    padroeira = Bairro("padroeira", vetor[8])
    
    #Bairro e distância das adjacentes
    piratininga.addBairroAdjacente(Adjacente(remedios, 9))
    piratininga.addBairroAdjacente(Adjacente(km18, 4))
    
    remedios.addBairroAdjacente(Adjacente(km18, 9))
    remedios.addBairroAdjacente(Adjacente(piratininga, 9))
    remedios.addBairroAdjacente(Adjacente(presAltino, 7))
    
    presAltino.addBairroAdjacente(Adjacente(remedios, 7))
    presAltino.addBairroAdjacente(Adjacente(centro, 3.5))
    
    centro.addBairroAdjacente(Adjacente(presAltino, 3.5))
    centro.addBairroAdjacente(Adjacente(umuarama, 4))
    centro.addBairroAdjacente(Adjacente(belaVista, 2))
    centro.addBairroAdjacente(Adjacente(km18, 5))
    centro.addBairroAdjacente(Adjacente(santoAntonio, 5))
    
    km18.addBairroAdjacente(Adjacente(piratininga, 4))
    km18.addBairroAdjacente(Adjacente(remedios, 9))
    km18.addBairroAdjacente(Adjacente(centro, 5))
    km18.addBairroAdjacente(Adjacente(santoAntonio, 4))
    
    umuarama.addBairroAdjacente(Adjacente(centro, 4))
    umuarama.addBairroAdjacente(Adjacente(belaVista, 1.5))
    
    santoAntonio.addBairroAdjacente(Adjacente(belaVista, 3))
    santoAntonio.addBairroAdjacente(Adjacente(centro, 5))
    santoAntonio.addBairroAdjacente(Adjacente(km18, 4))
    santoAntonio.addBairroAdjacente(Adjacente(padroeira, 1.5))
    
    padroeira.addBairroAdjacente(Adjacente(santoAntonio, 2))
    padroeira.addBairroAdjacente(Adjacente(belaVista, 5))
    
    belaVista.addBairroAdjacente(Adjacente(padroeira, 5))
    belaVista.addBairroAdjacente(Adjacente(santoAntonio, 3))
    belaVista.addBairroAdjacente(Adjacente(umuarama, 1.5))
    belaVista.addBairroAdjacente(Adjacente(centro, 2))