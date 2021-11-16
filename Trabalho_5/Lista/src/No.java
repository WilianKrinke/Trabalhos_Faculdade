
public class No {
	private Integer valor;
	private No proximo;
	
	public No() {
		this.valor = null;
		this.proximo = null;
	}
	
	public void setInfo(Integer valor) {
		this.valor = valor;
	}
	
	public void setProx(No proximo) {
		this.proximo = proximo;
	}
	
	public No getProx() {
		return this.proximo;
	}
	
	public Integer getInfo() {
		return this.valor;
	}
}
