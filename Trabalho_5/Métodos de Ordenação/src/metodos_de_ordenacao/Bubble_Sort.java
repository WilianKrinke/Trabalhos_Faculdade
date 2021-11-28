package metodos_de_ordenacao;

public class Bubble_Sort {

	public static void main(String[] args) {
		int vetor[] = {3,6,8,1,4,9,0};
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
		
		
		System.out.println("Vetor Ordenado");
		for (int i = 0; i < vetor.length; i++) {
			System.out.print(vetor[i] + " ");
		}
	}
}
