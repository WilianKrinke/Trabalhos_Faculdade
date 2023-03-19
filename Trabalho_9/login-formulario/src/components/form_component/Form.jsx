import React, { Component } from 'react';

class Form extends Component {

    constructor(props){
        super(props);
        this.state = {
            email: "",
            senha: ""
        }
    }

    checkLogin(event){
        event.preventDefault()
        console.log(this.state.email)
        console.log(this.state.senha)
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
            </div>
        );
    }
}

export default Form;
