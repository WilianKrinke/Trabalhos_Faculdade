import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword } from "firebase/auth";

export default class firebaseAuthClass {

  async signUpFb(email, password) {
    try {
      const auth = getAuth()
      const resp = await createUserWithEmailAndPassword(auth,email,password)

      if (resp.user) {
        return true
      }

    } catch (error) {
      return error
    }
  }

  async signInFb(email, password) {
    try {
      const auth = getAuth()
      const resp = await signInWithEmailAndPassword(auth,email,password)

      if (resp.user) {
        return true
      }
    } catch (error) {
      return error
    }
  }

  async isLoggedIn(email) {
    try {
      //FAZER VERIFICAÇÃO DE LOGIN
    } catch (error) {}
  }
}
