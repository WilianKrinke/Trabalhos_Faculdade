import paho.mqtt.client as mqtt
import time

user: str = ""
password: str = ""

clientId: str = "stringqualquer"
server: str = "broker.mqttdashboard.com"
port: int = 1883

client = mqtt.Client(clientId)
client.username_pw_set(user, password)

temperatura: int = 22.3
humidade: int = 60

client.connect(server, port)

controle: int = 1
while controle <= 6:
    client.publish("testeTopic/iot/willk/temperatura", temperatura)
    client.publish("testeTopic/iot/willk/humidade", humidade)
    print(f"Enviando {controle}* temperatura: {temperatura} e humidade: {humidade}")
    time.sleep(1)
    controle += 1

client.disconnect()