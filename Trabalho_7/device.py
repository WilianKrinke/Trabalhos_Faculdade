import paho.mqtt.client as mqtt
import time

user = ""
password = ""

clientId = "stringqualquer"
server = "broker.mqttdashboard.com"
port = 1883

client = mqtt.Client(clientId)
client.username_pw_set(user, password)

client.connect(server, port)

client.publish("testeTopic/iot/willk/temperatura", 22.3)
time.sleep(1)

client.disconnect()