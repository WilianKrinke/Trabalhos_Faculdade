import React, { useEffect, useState } from "react";
import { getDatasFromFb } from "../../firebase/database";
import Title from "../title_component/Title";

const ReceiverComponent = () => {
  const [datasReceived, setdatasReceived] = useState([]);

  useEffect(() => {
    (async () => {
      const datas = await getDatasFromFb();
      setdatasReceived(datas);
    })();
  }, []);

  return (
    <>

      <Title title={"Tabela de Dados"}/>
      {datasReceived !== undefined &&
        datasReceived.map((item) => {
          return (
            <div key={item.id}>
              <table>
                <thead>
                  <tr>
                    <th>Nome Completo </th>
                    <th>Data de Nascimento </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      {item.nome} {item.sobrenome}
                    </td>
                    <td>{item.DnData}</td>
                  </tr>
                </tbody>
              </table>
            </div>
          );
        })}
      <br />
    </>
  );
};

export default ReceiverComponent;
