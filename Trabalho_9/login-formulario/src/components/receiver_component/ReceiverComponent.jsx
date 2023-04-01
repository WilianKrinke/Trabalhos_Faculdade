import React, { useState } from "react";
import databaseClass from "../../firebase/database";

const ReceiverComponent = () => {
  const [datasReceived, setdatasReceived] = useState([]);

  const getDatas = async (event) => {
    event.preventDefault();
    const database = new databaseClass();
    const datas = await database.getDatasFromFb();

    setdatasReceived(datas);
  };

  return (
    <>
      <section>
        <form action="">
          <button
            type="button"
            typeof="button"
            id="getdatas"
            onClick={(event) => getDatas(event)}
          >
            Obter Dados
          </button>
        </form>
      </section>
      <br />
      {datasReceived !== undefined &&
        datasReceived.map((item) => {
          return (
            <div key={item.id}>
              <h4>
                {item.nome} {item.sobrenome}
              </h4>
            </div>
          );
        })}
      <br/>
    </>
  );
};

export default ReceiverComponent;
