import { db } from "./firebase";
import {
  collection,
  addDoc,
  getDocs
} from "firebase/firestore";
import {v4 as uuidv4} from 'uuid'


export default class databaseClass {
  async sendDatasToFb(nomeData, sobrenomeData) {
    try {
      const hasSendDatas = await addDoc(collection(db, "usuarios"), {
        id: uuidv4(),
        nome: nomeData,
        sobrenome: sobrenomeData,
      });

      if (hasSendDatas.id) {
        return true;
      }
    } catch (error) {
      console.log(error);
      return false;
    }
  }

  async getDatasFromFb() {
    try {      
      const arrayDatas = []
      const querySnapshot = await getDocs(collection(db, "usuarios"));
      querySnapshot.forEach((doc) => {
        arrayDatas.push(doc.data())  
      })

      return arrayDatas;     

    } catch (error) {
      console.log(error);
    }
  }
}
