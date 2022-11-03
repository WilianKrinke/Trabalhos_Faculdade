from criptografiaAES import iniciarAES
from criptografiaRSA import iniciarRSA

print("Olá, esta é um sistema de criptografia RSA e AES")

while True:
    opcao = int("Digite o tipo de criptografia: 1-RSA | 2-AES | 3-Sair")
    match opcao:
        case 1:
            iniciarRSA()
        case 2:
            iniciarAES()
        case 3:
            print('Até Logo :D')
            break

