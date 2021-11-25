package metodos_de_ordenacao;

public class Selection_Sort {

	public static void main(String[] args) {
		int vetor[] = {18,4,2,6,8,10,16,18,14};
		
		int posicao_menor;
		int aux; 
		
		for (int i = 0; i < vetor.length; i++) {
			posicao_menor = i;
			
			for (int j = i + 1; j < vetor.length; j++) {
				if (vetor[j] < vetor[posicao_menor]) {
					posicao_menor = j;
				}
			}
			
			aux = vetor[posicao_menor];
			vetor[posicao_menor] = vetor[i];
			vetor[i] = aux;
		}
		
		
		for (int i = 0; i < vetor.length; i++) {
			System.out.print(vetor[i] + " ");
		}
	}
}
