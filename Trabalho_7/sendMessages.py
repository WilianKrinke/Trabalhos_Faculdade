import time
from hal import medirHumidade, medirTemperatura
from mqttConfig import user, clientId


def sendMessages(client):
    while True:
        client.publish(f"v1/{user}/things/{clientId}/data/0", medirTemperatura())
        client.publish(f"v1/{user}/things/{clientId}/data/1", medirHumidade())
        print(f"Enviando medidas de temperatura: {medirTemperatura()} e humidade: {medirHumidade()}")
        time.sleep(10)
