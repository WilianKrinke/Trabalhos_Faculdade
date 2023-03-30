import React, { useState } from "react";
import databaseClass from "../../firebase/database";

const InputComponent = () => {
  const [nome, setnome] = useState("");
  const [sobrenome, setsobrenome] = useState("");
  const [stringSuccess, setStringSuccess] = useState("");

  const sendToFb = async (event) => {
    event.preventDefault();
    const database = new databaseClass();
    const hasSendToFb = database.sendDatasToFb(nome, sobrenome);

    if (hasSendToFb) {
      setStringSuccess("Dados inseridos com Sucesso");
      setTimeout(() => {
        setStringSuccess('')
      }, 2000);
    }
  };

  return (
    <>
      <section>
        <form action="">
          <label htmlFor="nome">Nome: </label>
          <input
            type="text"
            name="nome"
            id="nome"
            value={nome}
            onChange={(event) => setnome(event.target.value)}
          />

          <label htmlFor="sobrenome">Sobrenome: </label>
          <input
            type="text"
            name="sobrenome"
            id="sobrenome"
            value={sobrenome}
            onChange={(event) => setsobrenome(event.target.value)}
          />

          <button type="button" onClick={(event) => sendToFb(event)}>
            Enviar Dados
          </button>
        </form>
      </section>
      <section>
        <h4>{stringSuccess}</h4>
      </section>
      <br />
      <hr />
      <br />
    </>
  );
};

export default InputComponent;
