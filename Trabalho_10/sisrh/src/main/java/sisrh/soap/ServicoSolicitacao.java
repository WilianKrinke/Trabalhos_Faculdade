package sisrh.soap;

import javax.annotation.Resource;
import javax.jws.WebMethod;
import javax.jws.WebService;
import javax.jws.soap.SOAPBinding;
import javax.jws.soap.SOAPBinding.Style;
import javax.xml.ws.WebServiceContext;

import java.util.List;

import sisrh.banco.Banco;
import sisrh.dto.Solicitacao;
import sisrh.dto.Solicitacoes;
import sisrh.seguranca.Autenticador;

@WebService
@SOAPBinding(style = Style.RPC)
public class ServicoSolicitacao {
	
	@Resource
	WebServiceContext context;
	
	@WebMethod(action = "listar-solicitacoes-usuario")
	public Solicitacoes lista_solicitacoes_usuario() throws Exception{
		
		Autenticador.autenticarUsuarioSenha(context);		
		String usuario = Autenticador.getUsuario(context);		
		
		Solicitacoes solicitacoes = new Solicitacoes();
		List<Solicitacao> lista_solicitacoes = Banco.listarSolicitacoesUsuario(usuario);
		
		for (Solicitacao sol : lista_solicitacoes) {
			solicitacoes.getSolicitacoes().add(sol);
			System.out.print(sol.getDescricao());
		}
		
		return solicitacoes;
	}

}
