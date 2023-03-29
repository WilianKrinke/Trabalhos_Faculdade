import "firebase"
import { auth } from "./firebase";


export default class firebaseAuth {

  async signUpFb(email, password) {
    try {
      const resp = await auth.createUserWithEmailAndPassword(email, password);

      if (resp.additionalUserInfo) {
        return true
      }

    } catch (error) {
      return error
    }
  }

  async signInFb(email, password) {
    try {
      console.log(email,password)
      const resp = await auth.signInWithEmailAndPassword(email, password);
      
      if (resp.additionalUserInfo) {
        return true
      }
    } catch (error) {
      return error
    }
  }

  async isLoggedIn(email) {
    try {
      const resp = auth.onAuthStateChanged();

      console.log(resp);
    } catch (error) {}
  }
}
