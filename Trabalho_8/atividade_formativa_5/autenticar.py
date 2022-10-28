from compararSenhas import compararSenhas
from lerArquivo import lerArquivo


def autenticar():
    email = input('Digite o seu E-mail: ')
    senha = input('Insira sua senha: ')

    arquivo = open('shadows.txt', 'r')
    listaDePalavras = lerArquivo(arquivo)

    if email in listaDePalavras:
        indexEmailLista = listaDePalavras.index(email)
        senhaLista = listaDePalavras[indexEmailLista + 2]

        mesmaSenha: bool = compararSenhas(senha, senhaLista)

    else:
        print('E-mail não cadastrado!')


if __name__ == '__main__':
    autenticar()
