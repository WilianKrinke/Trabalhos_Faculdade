package atividade_diagnostica;

public class Empregado {
	public String nome;
	public String sobrenome;
	public float salario;
	
	public Empregado(String nome, String sobrenome, float salario){	
		this.nome = nome;
		this.sobrenome = sobrenome;
		
		if(salario < 0) {
			this.salario = 0;
		} else {
			this.salario = salario;
		}
		
	}
	
	public float salarioAnual() {
		float salarioAnual = this.salario * 12;
		return salarioAnual;
	}
	
	public String ganhaBemSera() {
		if(this.salario > 10.000) {
			return "Ganha Bem";
		} else {
			return "Ganha mau";
		}
	}

	public String getNome() {
		return nome;
	}

	public void setNome(String nome) {
		this.nome = nome;
	}

	public String getSobrenome() {
		return sobrenome;
	}

	public void setSobrenome(String sobrenome) {
		this.sobrenome = sobrenome;
	}

	public float getSalario() {
		return salario;
	}

	public void setSalario(float salario) {
		this.salario = salario;
	}
	
	
}
