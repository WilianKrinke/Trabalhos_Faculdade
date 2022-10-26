from autenticarUsuario import autenticarUsuario
from cadastrarUsuario import cadastrarUsuario


def iniciarMenu():
    # menu inicial do sistema
    while True:
        try:
            opcao: int = int(input('Digite:\t 1-Cadastrar | 2-Autenticar/Logar | 3-Sair\n'))

            match opcao:
                case 1:
                    cadastrarUsuario()
                case 2:
                    autenticarUsuario()
                case 3:
                    print("Até Logo :D")
                    break
                case _:
                    raise ValueError('Opção Inválida')

        except ValueError as error:
            print(error)


iniciarMenu()
