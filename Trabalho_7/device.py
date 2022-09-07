import paho.mqtt.client as mqtt

user = ""
password = ""

clientId = "stringqualquer"
server = "broker.mqttdashboard.com"
port = "1883"

client = mqtt.Client(clientId)
client.username_pw_set(user, password)

client.connect(server, port)

#Inserir função para envio de mensagem mqtt para o broker

client.disconnect()