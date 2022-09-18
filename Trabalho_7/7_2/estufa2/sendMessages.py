import time
from mqttBrokerConfig import user, clientId
from hal import medirUmidade, medirTemperatura


def sendMessages(client):
    while True:
        temp1 = medirTemperatura()
        umi1 = medirUmidade()

        client.publish(f"v1/{user}/things/{clientId}/data/3", f"temp,c={temp1}")
        client.publish(f"v1/{user}/things/{clientId}/data/4", umi1)
        print(f"Enviando medidas de temperatura: {temp1}, e humidade: {umi1} para estufa 2")
        time.sleep(10)
