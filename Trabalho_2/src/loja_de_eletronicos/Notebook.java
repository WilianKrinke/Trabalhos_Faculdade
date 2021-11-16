package loja_de_eletronicos;

public class Notebook extends Equipamento {
	private static final long serialVersionUID = 1L;
	protected String processador;
	protected int memoriaRAM;
	protected int disco;

	public Notebook(String nome, String marca, int tamanhoTela, String processador, int memoriaRAM, int disco) {
		super(nome, marca, tamanhoTela);
		this.modelo = "Notebook";
		this.processador = processador;
		this.memoriaRAM = memoriaRAM;
		this.disco = disco;
	}

	public String toString() {
		String retorno = "";
		retorno += "Nome do Equipamento: " + this.nome + "\n";
		retorno += "Marca: " + this.marca + "\n";
		retorno += "Modelo: " + this.modelo + "\n";
		retorno += "Tamanho de Tela: " + this.tamanhoTela + " Polegadas\n";
		retorno += "Processador: " + this.processador;
		retorno += "Memória Ram: " + this.memoriaRAM + " GB\n";
		retorno += "Disco: " + this.disco + " GB\n";

		return retorno;
	}
}
