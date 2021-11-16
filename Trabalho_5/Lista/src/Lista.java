
public class Lista {
	private No primeiro;
	
	public Lista() {
		this.primeiro = null;
	}
	
	public boolean isVazia() {
		return this.primeiro == null;
	}
	
	public void inserirPrimeiro(int info) {
		No noAuxiliar = new No();
		noAuxiliar.setInfo(info);
		noAuxiliar.setProx(this.primeiro);
		this.primeiro = noAuxiliar;		
	}
	
	
	public void inserirDepoisDe(No no, int valor) {
		if (isVazia() == true) {
			throw new Error("Lista está vazia");
		} else {
			No noAuxiliar = this.primeiro;
			No proximoNo = new No();					
			No novoNo = new No();
			
			while (noAuxiliar.getInfo() != no.getInfo()) {
				noAuxiliar = noAuxiliar.getProx();
			}				
			proximoNo = noAuxiliar.getProx();			
			novoNo.setInfo(valor);				
			noAuxiliar.setProx(novoNo);
			
			while (noAuxiliar.getInfo() != valor) {				
				noAuxiliar = noAuxiliar.getProx();
			}			
			noAuxiliar.setProx(proximoNo);			
		}
	}
	
	public void inserirUltimo(int info) {
		if (isVazia() == true) {
			inserirPrimeiro(info);
		} else {
			No noAuxiliar = this.primeiro;
			No novoNo = new No();				
			
			while (noAuxiliar != null && noAuxiliar.getProx() != null) {
				noAuxiliar = noAuxiliar.getProx();
			}
			
			if (noAuxiliar.getProx() == null) {
				novoNo.setInfo(info);
				noAuxiliar.setProx(novoNo);
			}
		}
	}
	
	public void removerPrimeiro() {
		if (isVazia() == true) {
			throw new Error("Lista está vazia");
		} else {
			No noAuxiliar = this.primeiro;	
			this.primeiro = noAuxiliar.getProx();
		}
	}
	
	public void removerUltimo() {
		if (isVazia() == true) {
			throw new Error("Lista está vazia");
		} else {			
			No noAuxiliar = this.primeiro;
			No noAnterior = this.primeiro;
			
			while (noAuxiliar.getProx() != null) {
				noAnterior = noAuxiliar;
				noAuxiliar = noAuxiliar.getProx();
			}	
			
			noAnterior.setProx(null);			
		}
	}
	
	public void removerNo(No no) {
		if (isVazia() == true) {
			throw new Error("Lista está vazia");
		} else {
			No noAuxiliar = this.primeiro;
			No noAnterior = this.primeiro;
			No proximoNo = this.primeiro;			
			
			while (noAuxiliar.getInfo() != no.getInfo()) {
				noAnterior = noAuxiliar;
				noAuxiliar = noAuxiliar.getProx();	
			}
			
			proximoNo = noAuxiliar.getProx();
			noAnterior.setProx(proximoNo);			
		}
	}
	
	public void mostrarLista() {
		No noAuxiliar = this.primeiro;
		
		while (noAuxiliar != null) {
			System.out.print(noAuxiliar.getInfo() + ", ");
			noAuxiliar = noAuxiliar.getProx();
		}
	}
	
	public static void main(String[] args) {		
		Lista listaA = new Lista();		
		
		listaA.inserirUltimo(10);
		listaA.inserirUltimo(20);
		listaA.inserirUltimo(30);
		listaA.inserirUltimo(40);
		listaA.inserirPrimeiro(50);		
		listaA.inserirPrimeiro(60);
		
		No no1 = new No();
		
		System.out.println("Lista Antes");
		listaA.mostrarLista();	
		System.out.println("");
		System.out.println("");
		
		//Testes
		
		//inserirDepoisDe 
		//inserir o valor do nó da lista em no1, posteriomente a ele, será inserido o valor do segundo parametro do metodo inserirDepoisDe;  
		no1.setInfo(10);
		listaA.inserirDepoisDe(no1, 170);
		
		//removerPrimeiro
		listaA.removerPrimeiro();
		
		//removerUltimo
		listaA.removerUltimo();
		
		//removerNo
		//#inserir em no1 o valor do nó que deverá ser removido;
		no1.setInfo(10);
		listaA.removerNo(no1);
		
 		System.out.println("Lista Depois");
 		listaA.mostrarLista();
	}
}
