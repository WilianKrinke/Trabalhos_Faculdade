#Etapa 4
def obter_limite():
    #ETAPA 1
    print('\nOlá está é a loja do programador Wilian Krinke, seja bem-vindo!!!\n')
    print('Senhor usuário, farei uma análise de crédito para futuras compras. Para isso preciso de alguns dados...\n')

    while True:
        cargo = str(input('Qual é o seu cargo dentro da empresa em que trabalha?\t'))
        if cargo.isdigit() or not cargo or cargo.isspace():
            print('Cargo aceita apenas palavras, tente novamente\n')
        else: 
            break
      
    while True:
        try:
            salario = float(input('Qual é o seu salário por mês?\t'))
            if salario < 0:
                print('Salário negativo não existe. Por favor, tente novamente.\n')
            else:
                break
        except:
            print('Aceita apenas salários válidos, tente novamente.\n')       
    
    while True:
        try:
            ANO_NASCIMENTO = int(input('Qual é o ano de seu nascimento?\t'))
            if ANO_NASCIMENTO > 2021:
                print('Ano futuro? Aceitamos apenas anos menores ou iguais a 2021.\n')            
            elif ANO_NASCIMENTO < 1875:
                print('Aceitamos apenas anos de nascimento acima de 1875, pois esta data é do ser humano mais velho registrado. Por favor, tente novamente.\n')
            else:
                break
        except:
            print('Ano de nascimento inválido. Por favor, tente novamente.\n') 

    print(f'\nSeu cargo é {cargo}.')
    print(f'Seu salário é R${salario:.2f} por mês.')
    print(f'Seu ano de nascimento é {ANO_NASCIMENTO}.')

    #ETAPA 2
    from datetime import datetime
    agora = datetime.now()
    ano_atual = int(agora.strftime('%Y'))
    idade_aprox = int(ano_atual - ANO_NASCIMENTO)

    print(f'Sua idade é de: {idade_aprox} anos.\n')

    credito_disp = float(salario * (idade_aprox / 1000) + 100)
    limite = credito_disp
    return limite, idade_aprox
    #Fim def

limite, idade_aprox = obter_limite()
print(f'Você tem R${limite:.2f} de créditos para comprar na loja.\n')

#Etapa 4 
def verificar_produto(limite, limite_zero):
    #ETAPA 3
    #Função que verifica se a soma dos produtos, recebe desconto, se será parcelado ou bloqueado.
    #meu nome completo: Wilian Krinke
    QTD_CARACTERES_NOMECOMPLETO = 13
    #meu primeiro nome: Wilian
    QTD_CARACTERES_PRIMEIRONOME = 6

    if limite <= limite_zero:
        return limite_zero

    while True:
        nome_produto = str(input(f'Digite o nome do {i + 1}º produto:\t'))
        if nome_produto.isdigit() or not nome_produto or nome_produto.isspace():
            print('Nome do produto aceita apenas palavras.Por favor, tente novamente.\n')
        else: 
            break
    
    while True:
        try:
            preco_do_produto = float(input(f'Digite o preço do {i + 1}º produto:\t'))
            if preco_do_produto < 0:
                print('Aceita apenas números positivos. Por favor, tente novamente.\n')
            else:
                break
        except:
            print('Preço Inválido. Por favor, tente novamente.')        

    preco_60_porcento = (limite * 60) / 100
    preco_90_porcento = (limite * 90) / 100
    preco_100_porcento = (limite * 100 + 0.01) / 100

    comprar_ou_n = int(input('Comprar este produto? 1-sim 0-não...'))
    print()
    if comprar_ou_n == 0:
        return limite_zero

    elif comprar_ou_n == 1:
        if QTD_CARACTERES_NOMECOMPLETO <= preco_do_produto <= idade_aprox:
            print(f'Você terá um desconto igual à quantidade de caracteres do meu primeiro nome que são: R${QTD_CARACTERES_PRIMEIRONOME}.')
            desconto = QTD_CARACTERES_PRIMEIRONOME / 100
            preco_produto_com_desconto = preco_do_produto * (1 - desconto)
            print(f'O valor do produto com desconto é R${preco_produto_com_desconto:.2f}.')
            return preco_produto_com_desconto
        else:
            if preco_do_produto <= preco_60_porcento:
                print('Liberado')
            elif preco_60_porcento <= preco_do_produto <= preco_90_porcento:
                print('Liberado\nO valor total deste produto pode ser parcelados em até 2 vezes.')
                preco_parcelado2x = preco_do_produto / 2
                parcelado2x = print(f'Duas parcelas de R${preco_parcelado2x:.2f}')
            elif preco_90_porcento < preco_do_produto <= preco_100_porcento:
                print('Liberado\nO valor total deste produto pode ser parcelados em 3 ou mais vezes.')
                preco_parcelado3x = preco_do_produto / 3
                parcelado3x = print(f'Se parcelado em 3 vezes, cada parcela será de R${preco_parcelado3x:.2f}.')
            else:
                print('Produto bloqueado por exceder o limite de crédito.\n')
                return limite_zero
        return preco_do_produto
    #Fim def

print('Senhor usuário, agora cite quantos produtos irão ser cadastrados, logo depois diga o nome do produto e seu preço e confirme ou não a compra. Obrigado.\n')
while True:
        n = input('Quantos produtos deseja cadastrar?\t')
        if n.isnumeric() != True:
            print('Aceita apenas números válidos.Por favor, tente novamente.\n')
        else:
            n = int(n)
            break

i = 0
limite_zero = 0.00

#Estrutura de repetição que condiciona a chamada da função verificar_produto ao número de itens que o cliente quer cadastrar
while i < n: 
    if limite <= limite_zero:
        print('Você não tem mais créditos. Obrigado por comprar em nossa loja.')
        break
    else:
        preco_produto = verificar_produto(limite, limite_zero)
        limite -= preco_produto
        limite_vdd = abs(limite)      
        print(f'Seu limite de crédito é de R${limite_vdd:.2f}.\n')
        i += 1






  
    









    