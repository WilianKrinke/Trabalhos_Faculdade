import random


def medirTemperatura() -> float:
    return random.randrange(2, 25)


def medirHumidade() -> float:
    return random.randrange(20, 90)


def aquecedor(estado: bool) -> None:
    if estado:
        print("aquecedor Ligado")
    else:
        print("Aquecedor Desligado")
