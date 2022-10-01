

listaMaterial: list = []
dictMaterial2: dict = {}

for item in range(4):
    dictMaterial1: dict = {}

    nomeMaterial: str = input(f"Insira o nome do {item + 1}* material: ")
    valorMaterial: float = float(
        input(f"Insira o valor do {item + 1}* produto: "))

    dictMaterial1["NomeMaterial"]: str = nomeMaterial
    dictMaterial1["ValorMaterial"]: float = valorMaterial

    listaMaterial.append(dictMaterial1)


segundoDicionario: dict = listaMaterial.pop(1)

listaMaterial[0]["NomeMaterial"]: str = segundoDicionario["NomeMaterial"]
listaMaterial[0]["ValorMaterial"]: float = segundoDicionario["ValorMaterial"]

for item in listaMaterial:
    print(item)
