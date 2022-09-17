import random
from mqttBrokerConfig import user, clientId


def medirTemperatura() -> float:
    return round(random.uniform(28, 32), 1)


def medirUmidade() -> int:
    return random.randrange(10, 90)


def aquecedor(estado: bool):
    if estado:
        print("Aquecedor Ligado para a estufa anterior.\n")
    else:
        print("Aquecedor Desligado para a estufa anterior.\n")


def recepcaoMensagemAquecedor(cliente, user_name, msg):
    estadoAquecedor: list = msg.payload.decode().split(",")
    match estadoAquecedor[1]:
        case "1":
            aquecedor(True)
        case "0":
            aquecedor(False)
        case _:
            print(f'Comando não reconhecido: {estadoAquecedor[1]}')

    cliente.publish(f"v1/{user}/things/{clientId}/response", f"ok,{estadoAquecedor[0]}")
