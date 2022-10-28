from criptografar import criptografar
from gravarArquivo import gravarArquivo


def cadastrar():
    nome = input('Digite seu nome: ')
    login = input('Digite o Login: ')
    senha = input('Digite sua senha: ')

    fraseShadow = criptografar(nome, login, senha)
    gravarArquivo(fraseShadow)

    print('Usuário cadastrado com Sucesso!')


if __name__ == '__main__':
    cadastrar()
