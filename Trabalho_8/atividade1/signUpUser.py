import json
import requests
from firebaseconfig import auth


def SignUp():
    try:
        email: str = input("Digite o seu email: ")
        password: str = input('Digite sua senha: ')

        while len(password) < 6:
            print("A senha deve ter pelo menos 6 caracteres.")
            password: str = input('Digite sua senha: ')

        status = auth.create_user_with_email_and_password(email, password)

        for item in status.values():
            print(item)

    except requests.HTTPError as errorStack:
        error_json = errorStack.args[1]
        errorMessage = json.loads(error_json)['error']['message']
        print(errorMessage)


if __name__ == "__main__":
    SignUp()
