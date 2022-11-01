import hashlib


def compararSenhas(senhaInput, senhaLista):

    senhaString = 'b{}'.format(senhaInput).encode('UTF-8')
    senhaHash = hashlib.md5(senhaString).hexdigest()

    if senhaHash == senhaLista:
        return True
    else:
        return False
