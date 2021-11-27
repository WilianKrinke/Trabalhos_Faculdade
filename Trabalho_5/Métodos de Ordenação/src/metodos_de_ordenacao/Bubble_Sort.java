package metodos_de_ordenacao;

public class Bubble_Sort {

	public static void main(String[] args) {
		int vetor[] = {3,6,8,1,4,9,0};
		int aux;
		
		for (int i = 0; i < vetor.length; i++) {			
			
			for (int j = i + 1; j < vetor.length; j++) {
				if (vetor[i] > vetor[j]) {
					aux = vetor[j];
					vetor[j] = vetor[i];
					vetor[i] = aux;					
				}				
			}			
		}
		
		for (int i = 0; i < vetor.length; i++) {
			System.out.print(vetor[i] + " ");
		}
	}
}
