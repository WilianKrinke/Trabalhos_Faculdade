package loja_de_eletronicos;

public class Smartphone extends Equipamento{
	private static final long serialVersionUID = 1L;
	protected int qtdChipsOperadora;

	public Smartphone(String nome, String marca, int tamanhoTela, int qtdChipsOperadora) {
		super(nome, marca, tamanhoTela);
		this.modelo = "Smartphone";
		this.qtdChipsOperadora = qtdChipsOperadora;
	}
	
	public String toString() {
		String retorno = "";
		retorno += "Nome do Equipamento: " + this.nome + "\n";
		retorno += "Marca: "    + this.marca    + "\n";
		retorno += "Modelo: "     + this.modelo + "\n";
		retorno += "Tamanho de Tela: "  + this.tamanhoTela + " Polegadas\n";
		retorno += "Quantidade de Chips: " + this.qtdChipsOperadora + " Chips\n";
		return retorno;
	}
}
