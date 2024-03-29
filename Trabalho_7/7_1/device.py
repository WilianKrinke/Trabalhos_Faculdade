import paho.mqtt.client as mqtt
from hal import recepcaoMensagemAquecedor
from mqttBrokerConfig import user, password, clientId, server, port
from sendMessages import sendMessages

# conexão inicial
client = mqtt.Client(clientId)
client.username_pw_set(user, password)
client.connect(server, port)


client.on_message = recepcaoMensagemAquecedor
client.subscribe(f"v1/{user}/things/{clientId}/cmd/2")
# Se inserir curingas, atente-se para filtragem do tópico
client.loop_start()

sendMessages(client)

client.disconnect()
