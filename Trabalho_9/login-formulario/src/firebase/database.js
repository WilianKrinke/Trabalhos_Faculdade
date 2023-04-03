import { db } from "./firebase";
import { collection, addDoc, getDocs } from "firebase/firestore";
import { v4 as uuidv4 } from "uuid";

export async function sendDatasToFb(nomeData, sobrenomeData, DNData) {
  try {
    const hasSendDatas = await addDoc(collection(db, "usuarios"), {
      id: uuidv4(),
      nome: nomeData,
      sobrenome: sobrenomeData,
      DnData: DNData,
    });

    if (hasSendDatas.id) {
      return {
        hasSendDatas: true,
        responseSendDatas: "Dados inseridos com sucesso"
      };
    }
  } catch (error) {
    console.log(error);
    return {
      hasSendDatas: false,
      responseSendDatas: error.message
    };
  }
}

export async function getDatasFromFb() {
  try {
    const arrayDatas = [];
    const querySnapshot = await getDocs(collection(db, "usuarios"));
    querySnapshot.forEach((doc) => {
      arrayDatas.push(doc.data());
    });

    return arrayDatas;
  } catch (error) {
    console.log(error);
  }
}
