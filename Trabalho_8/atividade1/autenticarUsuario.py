import json
import random
import requests
from firebaseconfig import auth
from enviarEmailComSMTP import enviarEmailComSMTP
from logAutenticacao import logAutenticacao


def entrar():
    try:
        while True:
            email: str = input('Digite seu email: ')
            password: str = input('Digite sua senha: ')
            randomNumber: int = random.randint(1, 500000)

            status = auth.sign_in_with_email_and_password(email, password)
            id_token = status["idToken"]
            informacaoUsuario = auth.get_account_info(id_token)

            emailEstaVerificado = bool(informacaoUsuario["users"][0]['emailVerified'])

            if not emailEstaVerificado:
                print("E-mail não verificado. Por favor verifique seu e-mail e confirme o seu cadastro.")
                continue

            enviarEmailComSMTP(email, randomNumber)
            control = int(
                input("Para completar a autenticação MFA(Multifator), forneça o token enviado para o seu e-mail: "))

            while control != randomNumber:
                print("\nToken não correspondente\n")
                control = int(
                    input("Para completar a autenticação MFA(Multifator), forneça o token enviado para o seu e-mail: "))

            logAutenticacao()
            print(f"\nO usuário {status['email']} está autenticado.")
            break

    except requests.HTTPError as errorStack:
        error_json = errorStack.args[1]
        errorMessage = json.loads(error_json)['error']['message']

        match errorMessage:
            case 'EMAIL_NOT_FOUND':
                print('Este e-mail não foi cadastrado.\n')
            case 'INVALID_PASSWORD':
                print('Senha ou Usuário Incorretos\n')

    except ValueError as error:
        print(error)

    except Exception as error:
        print(error)


if __name__ == "__main__":
    entrar()
