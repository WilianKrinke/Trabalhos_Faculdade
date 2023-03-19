import React, { Component } from 'react';
import verification from '../../utils/verification';

class Form extends Component {

    constructor(props){
        super(props);
        this.state = {
            email: "",
            senha: "",
            acesso: "Digite seu e-mail e senha",
        }
    }

    checkLogin(event){
        event.preventDefault()
        const isCheck = verification(this.state.email,this.state.senha)

        if (isCheck) {
            this.setState({...this.state,acesso:"Acessado Com Sucesso"})
        } else {
            this.setState({...this.state,acesso:"Acesso Não Autorizado"})
            setTimeout(() => {
                this.setState({...this.state,acesso:"Digite seu e-mail e senha"})
            }, 5000);
        }
    }

    render() {
        return (
            <div>
                <form>
                    <div>
                        <label htmlFor="email">E-mail:</label>
                        <input type="text" id='email' size={20} value={this.state.email} onChange={event => this.setState({email: event.target.value})}/>
                    </div>

                    <div>
                        <label htmlFor="senha">Senha:</label>
                        <input type="password" id='senha' size={20} value={this.state.senha} onChange={event => this.setState({senha: event.target.value})}/>
                    </div>

                    <div>
                        <button type="button" onClick={(event) => this.checkLogin(event)}>Acessar</button>
                    </div>
                </form>

                <div>
                    <h3>
                        {this.state.acesso}
                    </h3>
                </div>        
            </div>
        );
    }
}

export default Form;
