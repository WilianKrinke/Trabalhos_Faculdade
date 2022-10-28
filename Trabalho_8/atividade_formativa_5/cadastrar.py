from criptografar import criptografar
from gravarArquivo import gravarArquivo


def cadastrar():
    nome = input('Digite seu nome: ')
    email = input('Digite o E-mail: ')
    senha = input('Digite sua senha: ')

    fraseShadow = criptografar(nome, email, senha)
    gravarArquivo(fraseShadow)

    print('Usuário cadastrado com Sucesso!')


if __name__ == '__main__':
    cadastrar()
