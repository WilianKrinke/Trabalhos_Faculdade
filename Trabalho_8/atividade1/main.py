from signInUser import SignIn
from signUpUser import SignUp


def iniciarMenu():
    while True:
        try:
            opcao: int = int(input('Digite:\t 0-SignUp | 1-SignIn | 2-Sair\n'))

            match opcao:
                case 0:
                    SignUp()
                case 1:
                    SignIn()
                case 2:
                    print("Até Logo :D")
                    break
                case _:
                    raise ValueError('Opção Inválida')

        except ValueError as error:
            print(error)


iniciarMenu()
