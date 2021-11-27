package metodos_de_ordenacao;

public class Merge_Sort {
	public static void mergeSort(int[] vetor) {
		
		int inputlength = vetor.length;
		
		if (inputlength < 2) {
			return;
		}
		
		int indexMeio = inputlength / 2;
		int[] vetorEsquerda = new int[indexMeio];
		int[] vetorDireita = new int[inputlength - indexMeio];
		
		for (int i = 0; i < indexMeio; i++) {
			vetorEsquerda[i] = vetor[i];
		}
		
		for (int i = indexMeio; i < inputlength; i++) {
			vetorDireita[i - indexMeio] = vetor[i];
		}
		
		mergeSort(vetorEsquerda);
		mergeSort(vetorDireita);
		
		//intercalar
		merge(vetor, vetorEsquerda, vetorDireita);	
	}
	
	public static void merge(int[] vetorOriginal, int[] vetorEsquerda, int[] vetorDireita) {
		
		int ladoEsquerdoTamanho = vetorEsquerda.length;
		int ladoDireitoTamanho = vetorDireita.length;
		
		int i = 0, j = 0, k = 0;

		while (i < ladoEsquerdoTamanho && j < ladoDireitoTamanho) {
			if (vetorEsquerda[i] <= vetorDireita[j]) {
				vetorOriginal[k] = vetorEsquerda[i];
				i++;
			} else {
				vetorOriginal[k] = vetorDireita[j];
				j++;
			}
			k++;
		}
		
		while (i < ladoEsquerdoTamanho) {
			vetorOriginal[k] = vetorEsquerda[i];
			i++;
			k++;
		}
		
		while (j < ladoDireitoTamanho) {
			vetorOriginal[k] = vetorDireita[j];
			j++;
			k++;
		}
	}

	public static void main(String[] args) {
		int [] vetor = new int[10];
		
		for (int i = 0; i < vetor.length; i++) {
			vetor[i] = (int) Math.floor(Math.random() * vetor.length);
		}
		
		System.out.println("Desordenado");
		for (int i = 0; i < vetor.length; i++) {
			System.out.print(vetor[i] + " ");
		}		
		System.out.println("\n");
		
		mergeSort(vetor);
		
		System.out.println("Ordenado");
		for (int i = 0; i < vetor.length; i++) {
			System.out.print(vetor[i] + " ");
		}
	}

}
