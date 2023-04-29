package atividade_diagnostica;


public class MainTeste {

	public static void main(String[] args) {
		// TODO Auto-generated method stub
		Empregado empregado1 = new Empregado("empregadoA", "sobrenomeA", 200000);
		Empregado empregado2 = new Empregado("empregadoB", "sobrenomeB", 9999);
		
		
		float salarioEmpregado1 = empregado1.getSalario();
		float dezPorcento1 = (float) (salarioEmpregado1 * 0.10);
		empregado1.setSalario(salarioEmpregado1 + dezPorcento1);
		System.out.println(empregado1.getSalario());
		
		
		float salarioEmpregado2 = empregado2.getSalario();
		float dezPorcento2 = (float) (salarioEmpregado2 * 0.10);
		empregado2.setSalario(salarioEmpregado2 + dezPorcento2);
		System.out.println(empregado2.getSalario());
		
	}

}
