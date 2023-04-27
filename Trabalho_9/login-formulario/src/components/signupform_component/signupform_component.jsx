import React, { useState } from "react";
import "./form.css";
import { signUpFb } from "../../firebase/auth";
import { sendDatasToFb } from "../../firebase/database";

const SignUpForm = () => {
  const [email, setemail] = useState("");
  const [senha, setsenha] = useState("");
  const [nome, setnome] = useState("");
  const [sobrenome, setsobrenome] = useState("");
  const [dn, setdn] = useState("");
  const [quote, setQuote] = useState("Digite seu e-mail e senha");

  const signUpUser = async (e) => {
    e.preventDefault();
    const { hasSignUp, responseSignUp } = await signUpFb(email, senha);

    if (hasSignUp === true) {
      setQuote(responseSignUp);     

      const { hasSendDatas, responseSendDatas } = await sendDatasToFb(
        nome,
        sobrenome,
        dn
      );

      if (hasSendDatas === true) {
        setTimeout(() => {
          setQuote(responseSendDatas);
        }, 2000);        
        
        setTimeout(() => {
          setQuote("Digite seu e-mail e senha");
        }, 8000);         
      } else {
        setQuote(responseSendDatas);     
        setTimeout(() => {
          setQuote("Digite seu e-mail e senha");
        }, 3000);  
        
      }
    } else {
      setQuote(responseSignUp);

      setTimeout(() => {
        setQuote("Digite seu e-mail e senha");
      }, 3000);
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
            placeholder="Digite seu e-mail"
            onChange={(e) => setemail(e.target.value)}
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
            placeholder="Digite sua senha"
            onChange={(e) => setsenha(e.target.value)}
          />
        </div>

        <div>
          <label htmlFor="nome">Nome: </label>
          <input
            type="text"
            name="nome"
            id="nome"
            value={nome}
            placeholder="Digite seu nome"
            onChange={(e) => setnome(e.target.value)}
          />
        </div>

        <div>
          <label htmlFor="sobrenome">Sobrenome: </label>
          <input
            type="text"
            name="sobrenome"
            id="sobrenome"
            value={sobrenome}
            placeholder="Digite seu sobrenome"
            onChange={(e) => setsobrenome(e.target.value)}
          />
        </div>

        <div>
          <label htmlFor="date">DN: </label>
          <input
            type="date"
            name="date"
            id="date"
            value={dn}
            onChange={(e) => setdn(e.target.value)}
          />
        </div>

        <div>
          <button
            className="button_class"
            type="button"
            onClick={(e) => signUpUser(e)}
          >
            Cadastrar
          </button>
        </div>
      </form>

      <div>
        <h3>{quote}</h3>
      </div>
    </>
  );
};

export default SignUpForm;
