
public class ArvoreBinaria {
	public static No raiz;
	
	public void inserir(Integer valor) {
		inserirNo(raiz,valor);
	}
	
	public void inserirNo(No noAtual ,Integer valor) {	
		
		if (noAtual == null) {
			raiz = new No(valor);	
			
		} else if (valor >= noAtual.getValorNo()) {
			
			if (noAtual.getNoDireita() == null) {
				No novoNo = new No(valor);
				noAtual.setNoDireita(novoNo);
			} else {
				inserirNo(noAtual.getNoDireita(),valor);
			}			
			
		} else if (valor < noAtual.getValorNo()) {
			
			if (noAtual.getNoEsquerda() == null) {
				No novoNo = new No(valor);
				noAtual.setNoEsquerda(novoNo);				
			} else {				
				inserirNo(noAtual.getNoEsquerda(), valor);
			}
			
		}	
	}
	
	public void removerNo(Integer valor) {
		remover(raiz, valor, null);
	}
	
	public void remover(No no, Integer valor, No pai) {
		
		if (valor == no.getValorNo()) {//verifica se o valor do nó é igual o valor, assim ele só para quando for igual;
			
			if ((no.getNoDireita() == null) && (no.getNoEsquerda() == null)) {//folha
				
				if (pai != null) {
					
					if (no.getValorNo() > pai.getValorNo()) {
						pai.setNoDireita(null);
					} else {
						pai.setNoEsquerda(null);
					}	
					
				} else {
					ArvoreBinaria.raiz = null;
				}
				
				
			} else if((no.getNoDireita() != null) && (no.getNoEsquerda() == null)) {//só tem nó na direita
								
				No noSubstituto = no.getNoDireita();
				No noPaiSubstituto = no;
				
				while (noSubstituto.getNoEsquerda() != null) {
					noPaiSubstituto = noSubstituto;
					noSubstituto = noSubstituto.getNoEsquerda();
				}
				
				if (pai != null) {					
					//Insere o substituto no nó
					if (no.getValorNo() < pai.getValorNo()) {
						pai.setNoEsquerda(noSubstituto);
					} else {
						pai.setNoDireita(noSubstituto);
					}
					
				} else {
					ArvoreBinaria.raiz = noSubstituto;
				}				
				
				//remove No substituto da arvore
				if (noSubstituto.getValorNo() > noPaiSubstituto.getValorNo()) {
					noPaiSubstituto.setNoEsquerda(null);
				} else {
					noPaiSubstituto.setNoDireita(null);
				}
				
			} else if((no.getNoEsquerda() != null) && (no.getNoDireita() == null)) {//só tem nó na esquerda

				
				No noSubstituto = no.getNoEsquerda();
				No noPaiSubstituto = no;
				
				while (noSubstituto.getNoDireita() != null) {
					noPaiSubstituto = noSubstituto;
					noSubstituto = noSubstituto.getNoDireita();
				}
				
				if (pai != null) {
					
					//Insere o substituto no nó
					if (no.getValorNo() < pai.getValorNo()) {
						pai.setNoEsquerda(noSubstituto);
					} else {
						pai.setNoDireita(noSubstituto);
					}	
					
				} else {
					ArvoreBinaria.raiz = noSubstituto;
				}
				
				//remove No substituto da arvore
				if (noSubstituto.getValorNo() > noPaiSubstituto.getValorNo()) {
					noPaiSubstituto.setNoEsquerda(null);
				} else {
					noPaiSubstituto.setNoDireita(null);
				}
				
				
			} else if((no.getNoEsquerda() != null) && (no.getNoDireita() != null)) {//tem nó nas duas pontas
				
				No noSubstituto = no.getNoDireita();
				No noPaiSubstituto = no;
				
				if (pai != null) {						
					while (noSubstituto.getNoEsquerda() != null) {
						noPaiSubstituto = noSubstituto;
						noSubstituto = noSubstituto.getNoEsquerda();
					}
					
					noSubstituto.setNoEsquerda(no.getNoEsquerda());
					//Insere o substituto no nó					
					if (no.getValorNo() < pai.getValorNo()) {
						pai.setNoEsquerda(noSubstituto);
					} else {
						pai.setNoDireita(noSubstituto);
					}
					
					//remove No substituto da arvore
					if (noSubstituto.getValorNo() > noPaiSubstituto.getValorNo()) {
						noPaiSubstituto.setNoEsquerda(null);
					} else {
						noPaiSubstituto.setNoDireita(null);
					}
					
				} else {
					System.out.println("entrou condição raiz");					
					while (noSubstituto.getNoEsquerda() != null) {
						noPaiSubstituto = noSubstituto;
						noSubstituto = noSubstituto.getNoEsquerda();
					}
					
					raiz = noSubstituto;
					noPaiSubstituto.setNoEsquerda(null);
					raiz.setNoDireita(noPaiSubstituto);					
					raiz.setNoEsquerda(no.getNoEsquerda());
				}	
			}
			
		} else {
			//5, 7, 8, 9, 10, 13, 18, 20,
			if (valor > no.getValorNo()) {
				pai = no;
				remover(no.getNoDireita(), valor, pai);
				
			} else if (valor < no.getValorNo()) {
				pai = no;
				remover(no.getNoEsquerda(), valor, pai);	
				
			}	
		}	
	}
	
	public void in_ordem(No no) {
		if (no != null) {
			in_ordem(no.getNoEsquerda());
			System.out.print(no.getValorNo() + ", ");
			in_ordem(no.getNoDireita());		
		}
	}
	
	public void pre_ordem(No no) {
		if (no != null) {
			System.out.print(no.getValorNo() + ", ");
			pre_ordem(no.getNoEsquerda());
			pre_ordem(no.getNoDireita());
		}
	}
	
	public void pos_ordem(No no) {
		if (no != null) {
			pos_ordem(no.getNoEsquerda());
			pos_ordem(no.getNoDireita());
			System.out.print(no.getValorNo() + ", ");
			
		}
	}
	
	public void buscarNo(No no, Integer valor) {
		
		if (no != null) {			
			if (no.getValorNo() == valor) {
				System.out.println("Nó encontrado");
				
			} else if (no.getValorNo() > valor) {
				buscarNo(no.getNoDireita(), valor);
				
			} else if (no.getValorNo() < valor) {
				buscarNo(no.getNoEsquerda(), valor);
				
			}
			
		} else {
			System.out.println("Nó não encontrado");
		}
	}
	
	
	public static void main(String[] args) {
		
		ArvoreBinaria arvore1 = new ArvoreBinaria();
		
		arvore1.inserir(10);
		arvore1.inserir(8);
		arvore1.inserir(5);
		arvore1.inserir(9);
		arvore1.inserir(7);
		arvore1.inserir(18);
		arvore1.inserir(13);
		arvore1.inserir(20);
		arvore1.inserir(22);
		
		System.out.println("In-Ordem");//visita primeiro a esquerda, passa pela raiz e visita a direita;
		arvore1.in_ordem(raiz);		
		System.out.println("");
		System.out.println("");
		
//		arvore1.removerNo(20);
//		arvore1.removerNo(5);
//		arvore1.removerNo(8);
//		arvore1.removerNo(9);
//		arvore1.removerNo(13);
//		
//		arvore1.removerNo(7);
//		arvore1.removerNo(18);
//		
		arvore1.removerNo(10);
		
		System.out.println("In-Ordem");
		arvore1.in_ordem(raiz);	
		
//		System.out.println("Pré-ordem");//visita primeiro a raiz, depois a parte esquerda e depois a parte direita;
//		arvore1.pre_ordem(raiz);
//		System.out.println("");
//		System.out.println("");
//		
//		System.out.println("Pós-ordem");//visita primeiro a parte esquerda, depois a parte direita e por ultimo a raiz;
//		arvore1.pos_ordem(raiz);
		
		
	
	}
}
