from classJogador import JogadorZombie


def definirJogadores():
    try:
        numJogadores = int(input('Digite o número de jogadores Zumbies: '))

        while numJogadores < 2:
            print('No minimo dois jogadores Zumbies: ')
            numJogadores = int(input('Digite o número de jogadores Zumbies: '))

        listaJogadores = []

        for i in range(0, numJogadores):
            jogador = JogadorZombie(input(f'Digite o nome do {i + 1}* Zombie: '))
            listaJogadores.append(jogador)

        print(listaJogadores)
        return listaJogadores
    except ValueError:
        print('Apenas Numero inteiros')
        definirJogadores()


if __name__ == '__main__':
    definirJogadores()
