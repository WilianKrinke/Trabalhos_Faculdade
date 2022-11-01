from definirJogadores import definirJogadores


def iniciarZombieDice():
    while True:
        controle = int(input('Iniciar Zombie Dice? 1-Sim | 2-Não'))

        if controle == 1:
            listaJogadores: list = definirJogadores()
        else:
            print('Que Pena! HUahuahuahuahau')
            break


iniciarZombieDice()
