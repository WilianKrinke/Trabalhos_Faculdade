import random
from mqttConfig import user, clientId


def medirTemperatura() -> int:
    return random.randrange(2, 25)


def medirUmidade() -> int:
    return random.randrange(20, 90)


def aquecedor(estado: bool) -> None:
    if estado:
        print("aquecedor Ligado")
    else:
        print("Aquecedor Desligado")


def recepcaoMensagemAquecedor(client, user_name, msg):
    estadoAquecedor: list = msg.payload.decode().split(",")

    # Se quiser simplificar com if, padronizar respostas para 0 ou 1, ou n ou s.
    match estadoAquecedor[1]:
        case "on":
            aquecedor(True)
        case "true":
            aquecedor(True)
        case "True":
            aquecedor(True)
        case "1":
            aquecedor(True)
        case "off":
            aquecedor(False)
        case "false":
            aquecedor(False)
        case "False":
            aquecedor(False)
        case "0":
            aquecedor(False)
        case _:
            print('Comando não reconhecido: tente "on" ou "off"')

    client.publish(f"v1/{user}/things/{clientId}/response", f"ok,{estadoAquecedor[0]}")


