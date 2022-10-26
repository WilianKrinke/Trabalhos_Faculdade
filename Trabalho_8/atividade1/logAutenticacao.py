from datetime import date
import datetime
import os
import stat


def logAutenticacao(email):
    if os.path.isfile("acesso.txt"):
        # se existe arquivo, apenas habilita a escrita, execução e leitura pelo proprietário
        os.chmod("acesso.txt", stat.S_IRWXU)

    dataUni = datetime.datetime.now()
    dataHoraAtual = date.strftime(dataUni, "%d-%m-%Y às %H:%M:%S")

    fraseLog = f"A ultima autenticação do usuário: {email} | {dataHoraAtual}"
    arquivo = open("acesso.txt", "w+")
    arquivo.write(fraseLog)
    arquivo.close()

    # No final restringe o arquivo apenas à leitura do proprietário
    os.chmod("acesso.txt", stat.S_IRUSR)


if __name__ == "__main__":
    logAutenticacao()
