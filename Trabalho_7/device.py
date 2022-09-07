import paho.mqtt.client as mqtt
import time
from hal import medirHumidade, medirTemperatura, recepcaoMensagemAquecedor
from mqttConfig import user, password, clientId, server, port

# conexão inicial
client = mqtt.Client(clientId)
client.username_pw_set(user, password)
client.connect(server, port)

client.on_message = recepcaoMensagemAquecedor
client.subscribe("testeTopic/iot/willk/aquecedor")
# Se inserir curingas, atente-se para filtragem do tópico
client.loop_start()


while True:
    client.publish("testeTopic/iot/willk/temperatura", medirTemperatura())
    client.publish("testeTopic/iot/willk/humidade", medirHumidade())
    print(f"Enviando medidas de temperatura: {medirTemperatura()} e humidade: {medirHumidade()}")
    time.sleep(5)


client.disconnect()
