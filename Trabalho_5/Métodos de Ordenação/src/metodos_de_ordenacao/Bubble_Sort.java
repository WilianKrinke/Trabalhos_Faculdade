package metodos_de_ordenacao;

public class Bubble_Sort {

	public static void main(String[] args) {
		int vetor[] = {12,2,4,6,8,10};
		
		int aux;
		boolean control;
		
		for (int i = 0; i < vetor.length; i++) {			
			control = true;
			
			for (int j = 0; j < (vetor.length - 1); j++) {
				if (vetor[j] > vetor[j + 1]) {
					aux = vetor[j];
					vetor[j] = vetor[j + 1];
					vetor[j + 1] = aux;
					control = false;
				}				
			}
			
			if (control) {
				break; 
			}
			
		}
		
		
		for (int i = 0; i < vetor.length; ++i) {
			System.out.print(vetor[i] + " ");
		}
	}
}
