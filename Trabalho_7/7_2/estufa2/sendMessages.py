import time
from hal import medirUmidade, medirTemperatura
from mqttBrokerConfig import user, clientId


def sendMessages(client):
    while True:
        client.publish(f"v1/{user}/things/{clientId}/data/3", medirTemperatura())
        client.publish(f"v1/{user}/things/{clientId}/data/4", medirUmidade())
        print(f"Enviando medidas de temperatura: {medirTemperatura()} e humidade: {medirUmidade()}")
        time.sleep(10)
