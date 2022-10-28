import os


def gravarArquivo(fraseShadow):
    if not os.path.isfile("shadows.txt"):
        open('shadows.txt', 'w')

    arquivo = open('shadows.txt', 'r')
    conteudo = arquivo.readlines()
    conteudo.append(fraseShadow)

    arquivo = open('shadows.txt', 'w')
    arquivo.writelines(conteudo)
    arquivo.close()
