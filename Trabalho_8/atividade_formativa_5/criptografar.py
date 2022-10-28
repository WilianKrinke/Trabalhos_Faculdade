import hashlib


def criptografar(*dados):
    senhaString = 'b{}'.format(dados[2]).encode('UTF-8')
    senhaHash = hashlib.md5(senhaString).hexdigest()

    fraseShadow = f'Nome:{dados[0]}|Login:{dados[1]}|Senha:{senhaHash}\n'
    return fraseShadow


if __name__ == '__main__':
    criptografar('nome', 'login', 'senha')
