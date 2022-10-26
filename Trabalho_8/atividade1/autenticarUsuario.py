import json
import random
import requests
from firebaseconfig import auth
from enviarEmailComSMTP import enviarEmailComSMTP
from logAutenticacao import logAutenticacao


def autenticarUsuario():
    # Função para autenticação do usuário com e-mail, senha e token simples, caracterizando MFA.
    try:
        while True:
            email: str = input('Digite seu email: ')
            password: str = input('Digite sua senha: ')
            randomNumber: int = random.randint(1, 500000)

            status = auth.sign_in_with_email_and_password(email, password)
            id_token = status["idToken"]

            # Obtendo informações do usuário através do token de identificação
            informacaoUsuario = auth.get_account_info(id_token)

            emailEstaVerificado = bool(informacaoUsuario["users"][0]['emailVerified'])

            # se e-mail não está confirmado/verificado não é possivel efetuar a autenticação
            if not emailEstaVerificado:
                print("E-mail não verificado. Por favor verifique seu e-mail e confirme o seu cadastro.")
                continue

            enviarEmailComSMTP(email, randomNumber)
            control = int(
                input("Para completar a autenticação MFA(Multifator), forneça o token enviado para o seu e-mail: "))

            # loop para verificação do token enviado por e-mail
            while control != randomNumber:
                print("\nToken não correspondente\n")
                control = int(
                    input("Para completar a autenticação MFA(Multifator), forneça o token enviado para o seu e-mail: "))

            logAutenticacao(email)
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
    autenticarUsuario()
