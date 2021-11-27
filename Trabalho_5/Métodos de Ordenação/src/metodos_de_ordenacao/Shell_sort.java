package metodos_de_ordenacao;

public class Shell_sort {

	public static void main(String[] args) {
		int vetor[] = {3,6,8,1,4,9,0};
		
		System.out.println("Vetor Desordenado");
		for (int i = 0; i < vetor.length; i++) {
			System.out.print(vetor[i] + " ");
		}
		System.out.println(" ");
		
		
		int h = 1;
		int n = vetor.length;
		
		while(h < n) {
			h = h * 3 + 1;
		}
		
		h = (int) Math.floor(h / 3);
		
		int elemento,j;
		
		while(h > 0) {
			for (int i = h; i < n; i++) {
				elemento = vetor[i];
				j = i;
				
				while(j >= h && vetor[j - h] > elemento) {
					vetor[j] = vetor[j - h];
					j = j - h;
				}
				vetor[j] = elemento;
			}
			
			h = h / 2;
		}
		
		
		System.out.println("Vetor Ordenado");
		for (int i = 0; i < vetor.length; i++) {
			System.out.print(vetor[i] + " ");
		}
	}
}
