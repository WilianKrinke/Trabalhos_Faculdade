
import random

listaDeUsuarios: list = []

print()


while True:
    usuarioCadastro: dict = {}
    id: int = abs(hash(random.random()))

    usuarioCadastro["id_Usuario"]: int = id
    usuarioCadastro["dados"]: dict = {}

    usuarioCadastro["dados"]["nome"]: str = input("Insira o nome do usuario: ")
    usuarioCadastro["dados"]["sobrenome"]: str = input(
        "Insira o sobrenome do usuario: ")
    usuarioCadastro["dados"]["email"]: str = input(
        "Insira o email do usuario: ")

    listaDeUsuarios.append(usuarioCadastro)
    print()

    controle: int = int(input("Deseja novo cadastro? 0-não 1-sim"))

    if controle == 0:
        break


for item in listaDeUsuarios:
    print(item)
