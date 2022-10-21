from datetime import date
import datetime
import os
import stat


def logAutenticacao():
    if os.path.isfile("logAutenticacao.txt"):
        # se existe arquivo, apenas habilita a escrita, execução e leitura pelo proprietário
        os.chmod("logAutenticacao.txt", stat.S_IRWXU)

    dataUni = datetime.datetime.now()
    dataHoraAtual = date.strftime(dataUni, "%d-%m-%Y às %H:%M:%S")

    fraseLog = f"A ultima autenticação do usuário foi em: {dataHoraAtual}"
    arquivo = open("logAutenticacao.txt", "w+")
    arquivo.write(fraseLog)
    arquivo.close()
    # No final restringe o arquivo apenas à leitura do proprietário
    os.chmod("logAutenticacao.txt", stat.S_IRUSR)


if __name__ == "__main__":
    logAutenticacao()
