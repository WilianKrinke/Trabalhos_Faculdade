package loja_de_eletronicos;
import java.io.Serializable;

public abstract class Equipamento implements Serializable{
		private static final long serialVersionUID = 1L;
		protected String nome;
		protected String marca;
		protected String modelo;
		protected int tamanhoTela;
		
		public Equipamento(String nome, String marca, int tamanhoTela) {
			this.nome = nome;
			this.marca = marca;
			this.tamanhoTela = tamanhoTela;
		}

		public String getNome() {
			return nome;
		}

		public void setNome(String nome) {
			this.nome = nome;
		}

		public String getMarca() {
			return marca;
		}

		public void setMarca(String marca) {
			this.marca = marca;
		}

		public String getModelo() {
			return modelo;
		}

		public void setModelo(String modelo) {
			this.modelo = modelo;
		}

		public int gettamanhoTela() {
			return tamanhoTela;
		}

		public void settamanhoTela(int tamanhoTela) {
			this.tamanhoTela = tamanhoTela;
		}
}
