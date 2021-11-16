package loja_de_eletronicos;

public class Smartwatch extends Equipamento {
	private static final long serialVersionUID = 1L;
	protected String tipoDePulseira;
	
	public Smartwatch(String nome, String marca, int tamanhoTela, String tipoDePulseira) {
		super(nome, marca, tamanhoTela);
		this.modelo = "SmartWatch";
		this.tipoDePulseira = tipoDePulseira;
	}
	
	public String toString() {
		String retorno = "";
		retorno += "Nome do Equipamento: " + this.nome + "\n";
		retorno += "Marca: "    + this.marca    + "\n";
		retorno += "Modelo: "     + this.modelo + "\n";
		retorno += "Tamanho de Tela: " + this.tamanhoTela + " Polegadas\n";
		retorno += "Tipo de Pulseira: "  + this.tipoDePulseira + "\n";
		return retorno;
	}
}
