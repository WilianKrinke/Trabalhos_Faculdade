package loja_de_eletronicos;

import java.io.EOFException;
import java.io.File;
import java.io.FileInputStream;
import java.io.FileNotFoundException;
import java.io.FileOutputStream;
import java.io.IOException;
import java.io.ObjectInputStream;
import java.io.ObjectOutputStream;
import java.util.ArrayList;

import javax.swing.JOptionPane;

public class LojaMainGUI {
	private ArrayList<Equipamento> equipamentos;

	public LojaMainGUI() {
		this.equipamentos = new ArrayList<Equipamento>();
	}

	public String[] lerValores(String[] dadosIn) {
		// Lê o tipo de array de string correspondente, e exibe um input para preencher
		// conforme dadosIn[i] pede no for;
		String[] dadosOut = new String[dadosIn.length];
		for (int i = 0; i < dadosIn.length; i++) {// lê o array contido na variavel nomeVal do equipamento enviado
			dadosOut[i] = JOptionPane.showInputDialog("Entre com " + dadosIn[i] + ": ");
		}
		return dadosOut; // retorna um array com o que foi capturado no input
	}

	public Notebook lerNotebook() {
		String[] valores = new String[6];
		String[] nomeVal = { "Nome do Notebook", "Marca", "Tamanho de Tela", "Processador", "Memória RAM", "Disco" };
		valores = lerValores(nomeVal);
		int tamanhoDeTela = this.retornaInteiro(valores[2]);
		int memoriaRam = this.retornaInteiro(valores[4]);
		int disco = this.retornaInteiro(valores[5]);

		Notebook notebook = new Notebook(valores[0], valores[1], tamanhoDeTela, valores[3], memoriaRam, disco);
		return notebook;
	}

	public Smartphone lerSmartphone() {
		String[] valores = new String[4];
		String[] nomeVal = { "Nome do Smartphone", "Marca", "Tamanho de Tela", "Quantidade de Chips de Operadora" };
		valores = lerValores(nomeVal);
		int tamanhoTela = this.retornaInteiro(valores[2]);// Armazena o valor contido no index 2 do array valores
		int qtdChipsOperadora = this.retornaInteiro(valores[3]);// Armazena o valor contido no index 3 do array valores

		Smartphone smartphone = new Smartphone(valores[0], valores[1], tamanhoTela, qtdChipsOperadora);// Instancia um
																										// objeto
																										// Smartphone
																										// com os
																										// valores
																										// contidos no
																										// array valores
		return smartphone;
	}

	public Smartwatch lerSmartwatch() {
		String[] valores = new String[4];
		String[] nomeVal = { "Nome do Smartwatch", "Marca", "Tamanho de Tela", "Tipo de Pulseira" };
		valores = lerValores(nomeVal);
		int tamanhoTela = this.retornaInteiro(valores[2]);

		Smartwatch smartwatch = new Smartwatch(valores[0], valores[1], tamanhoTela, valores[3]);
		return smartwatch;
	}

	private boolean intValido(String s) {
		try {
			// Tenta transformar o parametro string s em um Int.
			Integer.parseInt(s);
			return true;
		} catch (NumberFormatException e) {
			return false;
		}
	}

	public int retornaInteiro(String entrada) {
		// Enquanto valor do parametro entrada não retornar true não sai do loop
		while (!this.intValido(entrada)) {
			entrada = JOptionPane.showInputDialog(null, "Valor incorreto!\n\nDigite um número inteiro.");
		}
		// Retorna o valor de entrada como inteiro
		return Integer.parseInt(entrada);
	}

	public void salvaEquipamentos(ArrayList<Equipamento> equipamentos) {
		ObjectOutputStream outputStream = null;
		File f = new File("C:\\temp");
		try {
			f.mkdir();// Cria pasta temp, caso não aja
			outputStream = new ObjectOutputStream(new FileOutputStream("C:\\temp\\LojaMainGUI.dados"));
			for (int i = 0; i < equipamentos.size(); i++)
				outputStream.writeObject(equipamentos.get(i));

		} catch (FileNotFoundException ex) {
			JOptionPane.showMessageDialog(null, "Impossível criar arquivo!");
			ex.printStackTrace();
		} catch (IOException ex) {
			ex.printStackTrace();
		} finally { // Fecha arquivo ObjectOutputStream
			try {
				if (outputStream != null) {
					outputStream.flush();
					outputStream.close();
				}
			} catch (IOException ex) {
				ex.printStackTrace();
			}
		}
	}

	@SuppressWarnings("finally")
	public ArrayList<Equipamento> recuperaEquipamentos() {
		ArrayList<Equipamento> equipamentosTemp = new ArrayList<Equipamento>();
		ObjectInputStream inputStream = null;

		try {
			inputStream = new ObjectInputStream(new FileInputStream("C:\\temp\\LojaMainGUI.dados"));
			Object obj = null;
			while ((obj = inputStream.readObject()) != null) {
				if (obj instanceof Equipamento) {
					equipamentosTemp.add((Equipamento) obj);
				}
			}
		} catch (EOFException ex) { // quando EOF é alcançado
			System.out.println("Fim de arquivo.");
		} catch (ClassNotFoundException ex) {
			ex.printStackTrace();
		} catch (FileNotFoundException ex) {
			JOptionPane.showMessageDialog(null, "Arquivo com equipamentos NÃO existe!");
			ex.printStackTrace();
		} catch (IOException ex) {
			ex.printStackTrace();
		} finally { // Fecha arquivo ObjectInputStream
			try {
				if (inputStream != null) {
					inputStream.close();
				}
			} catch (final IOException ex) {
				ex.printStackTrace();
			}
			return equipamentosTemp;
		}
	}

	public void menuLojaEquipamento() {
		String menu = "";
		String entrada;
		int opc1, opc2;
		do {
			menu = "Controle da Loja de Equipamentos\n" + "Opções:\n" + "1. Entrar/Cadastrar Equipamento\n"
					+ "2. Exibir Equipamentos\n" + "3. Limpar Arquivo de Equipamentos\n"
					+ "4. Gravar Arquivo de Equipamentos\n" + "5. Recuperar Arquivo de Equipamentos\n" + "6. Sair";
			entrada = JOptionPane.showInputDialog(menu + "\n\n");
			opc1 = this.retornaInteiro(entrada);// Armazena em opc1 o valor retornado de retornaInteiro

			switch (opc1) {
			case 1:// Entrar dados
				menu = "Entrada de dados dos Equipamentos\n" + "Opções:\n\n" + "1. SmartPhone\n" + "2. SmartWatch\n"
						+ "3. Notebook\n";
				entrada = JOptionPane.showInputDialog(menu + "\n\n");// Captura um numero como string
				opc2 = this.retornaInteiro(entrada);// Método que envia o que foi armazenado em entrada para fazer
													// tranformação de String para Int
				switch (opc2) {
				case 1:// Insere os valores pêgos em lerSmartphone() e adiciona no array equipamentos;
					equipamentos.add((Equipamento) lerSmartphone());
					break;
				case 2:// Insere os valores pêgos em lerSmartwatch() e adiciona no array equipamentos;
					equipamentos.add((Equipamento) lerSmartwatch());
					break;
				case 3:// Insere os valores pêgos em lerNotebook() e adiciona no array equipamentos;
					equipamentos.add((Equipamento) lerNotebook());
					break;
				default:
					JOptionPane.showMessageDialog(null, "Entrada NÃO válida!");
				}
				break;

			case 2: // Exibir dados
				if (equipamentos.size() == 0) {
					JOptionPane.showMessageDialog(null, "Entre com Equipamentos ...");
					break;
				}
				String dados = "";
				for (int i = 0; i < equipamentos.size(); i++) {
					dados += equipamentos.get(i).toString() + "---------------\n";
				}
				JOptionPane.showMessageDialog(null, dados);
				break;

			case 3: // Limpar Dados
				if (equipamentos.size() == 0) {
					JOptionPane.showMessageDialog(null, "Entre com Equipamentos ...");
					break;
				}
				equipamentos.clear();
				JOptionPane.showMessageDialog(null, "Dados LIMPOS com sucesso!");
				break;

			case 4: // Grava Dados
				if (equipamentos.size() == 0) {
					JOptionPane.showMessageDialog(null, "Entre com Equipamentos ... ");
					break;
				}
				salvaEquipamentos(equipamentos);
				;
				JOptionPane.showMessageDialog(null, "Dados SALVOS com sucesso!");
				break;

			case 5: // Recupera Dados
				equipamentos = recuperaEquipamentos();
				if (equipamentos.size() == 0) {
					JOptionPane.showMessageDialog(null, "Sem dados para apresentar.");
					break;
				}
				JOptionPane.showMessageDialog(null, "Dados RECUPERADOS com sucesso!");
				break;

			case 6:
				JOptionPane.showMessageDialog(null, "Fim do aplicativo Loja de Equipamentos");
				break;
			}
		} while (opc1 != 6);
	}

	public static void main(String[] args) {
		// Inicialização do aplicativo
		LojaMainGUI equipamento = new LojaMainGUI();
		equipamento.menuLojaEquipamento();

	}

}
