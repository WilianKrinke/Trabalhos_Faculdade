import React, { useState } from "react";
import "./form.css";
import firebaseAuth from "../../firebase/auth";
import { useNavigate } from "react-router-dom";

const Form = () => {
  const history = useNavigate()
  

  const [email, setemail] = useState("");
  const [senha, setsenha] = useState("");
  const [acesso, setacesso] = useState("Digite seu e-mail e senha");

  const signUpUser = async (event) => {
    event.preventDefault();
    const fbAuth = new firebaseAuth();
    const hasSignUp = await fbAuth.signUpFb(email, senha);

    if (hasSignUp === true) {
      setacesso("Usuário criado com sucesso");
      setTimeout(() => {
        setacesso("Digite seu e-mail e senha");
      }, 4000);
    }

    if (hasSignUp.message) {
      setacesso(hasSignUp.message);
      setTimeout(() => {
        setacesso("Digite seu e-mail e senha");
      }, 4000);
    }
  };

  const signIn = async (event) => {
    event.preventDefault();
    const fbAuth = new firebaseAuth();
    const hasLogin = await fbAuth.signInFb(email, senha);
    console.log(hasLogin)

    if (hasLogin === true) {
      setacesso("Acessado Com Sucesso, redirecionando...");

      setTimeout(() => {
        history("/page-two")
      }, 2000);
    }

    if (hasLogin.message) {
        setacesso(hasLogin.message);
      setTimeout(() => {
        setacesso("Digite seu e-mail e senha");
      }, 4000);
    }
  };

  return (
    <>
      <form className="form_class">
        <div>
          <label htmlFor="email" className="label_class">
            E-mail:
          </label>
          <input
            type="text"
            id="email"
            size={20}
            value={email}
            onChange={(event) => setemail(event.target.value)}
          />
        </div>

        <div>
          <label htmlFor="senha" className="label_class">
            Senha:
          </label>
          <input
            type="password"
            id="senha"
            size={20}
            value={senha}
            onChange={(event) => setsenha(event.target.value)}
          />
        </div>

        <div>
          <button
            className="button_class"
            type="button"
            onClick={(event) => signIn(event)}
          >
            Acessar
          </button>
        </div>

        <div>
          <button
            className="button_class"
            type="button"
            onClick={(event) => signUpUser(event)}
          >
            Cadastrar
          </button>
        </div>
      </form>

      <div>
        <h3>{acesso}</h3>
      </div>
    </>
  );
};

export default Form;
