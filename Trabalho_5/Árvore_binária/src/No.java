
public class No {
	private Integer valor;
	private No esquerda;
	private No direita;
	
	public No(Integer valor) {
		this.valor = valor;
		this.esquerda = null;
		this.direita = null;
	}
	
	public int getValorNo() {
		return this.valor;
	}
	
	public No getNoEsquerda() {
		return this.esquerda;
	}
	
	public No getNoDireita() {
		return this.direita;
	}
	
	public void setNoEsquerda(No no) {
		this.esquerda = no;
	}
	
	public void setNoDireita(No no) {
		this.direita = no;
	}
}
