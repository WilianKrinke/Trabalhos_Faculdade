from connection import handleconnect
from measure import domeasure

#variaveis de conexão
user = ""
password = ""

#Função que faz conexão com a internet
station = handleconnect(user, password)

if not station.isconnected():
    print("O dispositivo não está conectado a internet")
else:    
    print("Dispositivo conectado")
    #Função que mensura os dados 
    domeasure()    
    station.disconnect()
    print("Dispositivo desconectado")
