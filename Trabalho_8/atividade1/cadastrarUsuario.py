import json
import requests
from firebaseconfig import auth


def cadastrarUsuario():
    # função para cadastro de usuário no firebase
    try:
        email: str = input("Digite o seu email: ")
        password: str = input('Digite sua senha: ')

        while len(password) < 6:
            print("A senha deve ter pelo menos 6 caracteres.")
            password: str = input('Digite sua senha: ')

        status = auth.create_user_with_email_and_password(email, password)
        id_token = status["idToken"]
        auth.send_email_verification(id_token)

        print(
            f"\nUsuário cadastrado com sucesso com o e-mail: {status['email']}\nEnviamos a confirmação de cadastro por e-mail.\nPor favor verifique seu e-mail e confirme o cadastro.\n")

    except requests.HTTPError as errorStack:
        error_json = errorStack.args[1]
        errorMessage = json.loads(error_json)['error']['message']
        print(errorMessage)


if __name__ == "__main__":
    cadastrarUsuario()
