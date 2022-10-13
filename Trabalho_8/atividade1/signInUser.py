import json
import random
import requests
from firebaseconfig import auth
from sendEmailWithSMTP import sendEmailConfirmation


def SignIn():
    try:
        email: str = input('Digite seu email: ')
        password: str = input('Digite sua senha: ')
        randomNumber: int = random.randint(1, 500000)

        sendEmailConfirmation(email, randomNumber)

        control = int(input("Para completar a autenticação MFA(Multifator), forneça o token enviado para o seu e-mail: "))

        while control != randomNumber:
            print("Token não correspondente, verifique seu e-mail")
            control = int(
                input("Para completar a autenticação MFA(Multifator), forneça o token enviado para o seu e-mail: "))

        status = auth.sign_in_with_email_and_password(email, password)
        print(f"O usuário {status['email']} está autenticado.")

    except requests.HTTPError as errorStack:
        error_json = errorStack.args[1]
        errorMessage = json.loads(error_json)['error']['message']

        match errorMessage:
            case 'EMAIL_NOT_FOUND':
                print('Este e-mail não foi cadastrado.\n')

    except ValueError as error:
        print(error)


if __name__ == "__main__":
    SignIn()
