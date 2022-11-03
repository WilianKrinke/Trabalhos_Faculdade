from Crypto.PublicKey import RSA
from Crypto.Cipher import PKCS1_OAEP
import binascii
import time


def iniciarRSA():
    print('INICIO CRIPTOGRAFIA')
    frase = input('Digite uma mensagem para a criptografia, sem assentos: ')
    fraseParaEncriptar = f'{frase}'.encode("UTF-8")

    print('Gerando Chave Pública...')
    time.sleep(1)
    keyPair = RSA.generate(1024)
    pubKey = keyPair.publickey()
    # print(f"Chave Publica: {hex(pubKey.n)},  em hexadecimal: {hex(pubKey.e)}")
    print('Chave Pública: ')
    pubKeyPEM = pubKey.exportKey()
    print(pubKeyPEM.decode('ascii'))
    print()

    print('Gerando Chave Privada...')
    time.sleep(1)
    # print(f"Private key: (n={hex(pubKey.n)}, d={hex(keyPair.d)})")
    privKeyPEM = keyPair.exportKey()
    print(privKeyPEM.decode('ascii'))
    print()

    print("Criptografando...")
    time.sleep(1)
    encryptor = PKCS1_OAEP.new(pubKey)
    encrypted = encryptor.encrypt(fraseParaEncriptar)
    print('Mensagem Encriptada:', binascii.hexlify(encrypted))

    decryptor = PKCS1_OAEP.new(keyPair)
    decrypted = decryptor.decrypt(encrypted)
    print('Mensagem Decriptada:', decrypted)
    print()
    print("FIM CRIPTOGRAFIA")


if __name__ == '__main__':
    iniciarRSA()
