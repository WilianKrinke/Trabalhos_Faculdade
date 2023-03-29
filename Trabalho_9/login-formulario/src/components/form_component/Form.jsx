import React, { Component } from 'react';
import "./form.css"
import firebaseAuth from '../../firebase/auth';
import {Navigate} from 'react-router-dom'

class Form extends Component {

    constructor(props){
        super(props);
        this.state = {
            email: "",
            senha: "",
            acesso: "Digite seu e-mail e senha",
            redirect: false
        }

        this.checkLogin = this.signIn.bind(this)
        this.signUpUser = this.signUpUser.bind(this)
    }

    async signUpUser(event){
        
        event.preventDefault()
        const fbAuth = new firebaseAuth()
        const hasSignUp = await fbAuth.signUpFb(this.state.email, this.state.senha)
      
        if (hasSignUp === true) {
            this.setState({...this.state, acesso:"Usuário criado com sucesso"})
            setTimeout(() => {
                this.setState({...this.state,acesso:"Digite seu e-mail e senha"})
            }, 4000);
        }
        
        if(hasSignUp.message){
            this.setState({...this.state, acesso:hasSignUp.message})
            setTimeout(() => {
                this.setState({...this.state,acesso:"Digite seu e-mail e senha"})
            }, 4000);
        }
           
    }

    async signIn(event){
        event.preventDefault()
        const fbAuth = new firebaseAuth()
        const hasLogin = await fbAuth.signInFb(this.state.email, this.state.senha)

        if (hasLogin === true) {
            this.setState({...this.state, acesso:"Acessado Com Sucesso, redirecionando..."})
            this.setState({...this.state, redirect:true})
            setTimeout(() => {
                this.setState({...this.state,acesso:"Digite seu e-mail e senha"})
            }, 4000);
        }

        if(hasLogin.message){
            this.setState({...this.state, acesso:hasLogin.message})
            setTimeout(() => {
                this.setState({...this.state,acesso:"Digite seu e-mail e senha"})
            }, 4000);
        }  
    }

    render() {
        return (
            <>  
                {
                    this.state.redirect && <Navigate to='/page-two' replace={true}/>
                }
                <form className='form_class'>
                    <div>
                        <label htmlFor="email" className='label_class'>E-mail:</label>
                        <input type="text" id='email' size={20} value={this.state.email} onChange={event => this.setState({email: event.target.value})}/>
                    </div>

                    <div>
                        <label htmlFor="senha" className='label_class'>Senha:</label>
                        <input type="password" id='senha' size={20} value={this.state.senha} onChange={event => this.setState({senha: event.target.value})}/>
                    </div>

                    <div>
                        <button className='button_class' type="button" onClick={(event) => this.signIn(event)}>Acessar</button>
                    </div>

                    <div>
                        <button className='button_class' type="button" onClick={(event) => this.signUpUser(event)}>Cadastrar</button>
                    </div>
                </form>

                <div>
                    <h3>
                        {this.state.acesso}
                    </h3>
                </div>        
            </>
        );
    }
}

export default Form;
