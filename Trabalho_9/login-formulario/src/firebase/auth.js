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
        return {
          hasSignUp : true,
          responseSignUp: "Usuario cadastrado com sucesso...\nInserindo dados no Firestore"
        };
      }
    } catch (error) {
      return {
        hasSignUp : false,
        responseSignUp: error.message
      };
    }
  }

  export async function signInFb(email, password) {
    try {
      const auth = getAuth();
      const resp = await signInWithEmailAndPassword(auth, email, password);

      if (resp.user) {
        return {
          hasSignIn: true,
          responseSignIn: "Login realizado com sucesso...Redirecionando"
        };
      }
    } catch (error) {
      return {
        hasSignIn: false,
        responseSignIn: error.message
      };
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

