import {
  getAuth,
  createUserWithEmailAndPassword,
  signInWithEmailAndPassword,
  signOut,
} from "firebase/auth";


  export async function signUpFb(email, password) {
    try {
      const auth = getAuth();
      const resp = await createUserWithEmailAndPassword(auth, email, password);

      if (resp.user) {
        return true;
      }
    } catch (error) {
      return error;
    }
  }

  export async function signInFb(email, password) {
    try {
      const auth = getAuth();
      const resp = await signInWithEmailAndPassword(auth, email, password);

      if (resp.user) {
        return true;
      }
    } catch (error) {
      return error;
    }
  }

  export async function signOutFb() {
    try {
      const auth = getAuth();
      await signOut(auth);

      return true;
    } catch (error) {
      console.log(error);
      return false;
    }
  }

