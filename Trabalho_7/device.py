import paho.mqtt.client as mqtt
import time
from hal import medirHumidade, medirTemperatura, aquecedor

user: str = ""
password: str = ""

clientId: str = "stringqualquer"
server: str = "broker.mqttdashboard.com"
port: int = 1883

client = mqtt.Client(clientId)
client.username_pw_set(user, password)

client.connect(server, port)

controle: int = 1
while controle <= 6:
    client.publish("testeTopic/iot/willk/temperatura", medirTemperatura())
    client.publish("testeTopic/iot/willk/humidade", medirHumidade())
    print(f"Enviando {controle}* temperatura: {medirTemperatura()} e humidade: {medirHumidade()}")
    time.sleep(1)
    controle += 1

client.disconnect()
