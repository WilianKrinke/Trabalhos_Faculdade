def lerArquivo(arquivo):
    arquivoString = arquivo.read()

    listaPalavrasShadow = arquivoString.split('|')
    listaPalavrasShadow.remove('')

    listaPalavrasSeparadasShadow = []

    for item in listaPalavrasShadow:
        palavraSeparada = item.split(':')
        listaPalavrasSeparadasShadow.append(palavraSeparada[0])
        listaPalavrasSeparadasShadow.append(palavraSeparada[1])

    return listaPalavrasSeparadasShadow
