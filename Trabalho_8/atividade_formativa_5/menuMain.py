from autenticar import autenticar
from cadastrar import cadastrar


def iniciarMenu():
    while True:
        opcao = int(input('Digite uma opção: 1-Cadastrar | 2-Autenticar | 3-Sair'))
        match opcao:
            case 1:
                cadastrar()
            case 2:
                autenticar()
            case 3:
                print('Até Logo :D')
                break
            case __:
                print('Opção Inválida')


iniciarMenu()
