import "firebase"
import { auth } from "./firebase";


export default class firebaseAuth {

  async signUp(email, password) {
    console.log("entrou no metodo");
    try {
      const resp = await auth.createUserWithEmailAndPassword(email, password);

      if (resp.additionalUserInfo.isNewUser) {
        return true
      }

    } catch (error) {
      return error
    }
  }

  async signIn(email, password) {
    try {
      const resp = await auth.signInWithEmailAndPassword(email, password);
      console.log(resp);
    } catch (error) {
      console.log(error);
    }
  }

  async isLoggedIn(email) {
    try {
      const resp = auth.onAuthStateChanged();

      console.log(resp);
    } catch (error) {}
  }
}
