import React, { useState } from "react";
import {signInFb} from "../../firebase/auth";
import {useNavigate} from 'react-router-dom'

const LoginComponent = () => {
  const history = useNavigate()

  const [email, setemail] = useState("");
  const [pass, setpass] = useState("");
  const [quote, setQuote] = useState("");

  const login = async (e) => {
    e.preventDefault()
    const {hasSignIn,responseSignIn} = await signInFb(email, pass)

    if (hasSignIn) {
      setQuote(responseSignIn)
      setTimeout(() => {
        history("/page-three")
      }, 3000);
    } else {
      setQuote(responseSignIn)
    }
  }

  return (
    <>
      <form>
        <div>
          <label htmlFor="email" className="label_class">
            E-mail:
          </label>
          <input
            type="text"
            id="email"
            size={20}
            value={email}
            onChange={(e) => setemail(e.target.value)}
          />
        </div>

        <div>
          <label htmlFor="senha" className="label_class">
            Senha:
          </label>
          <input
            type="password"
            id="senha"
            size={20}
            value={pass}
            onChange={(e) => setpass(e.target.value)}
          />
        </div>

        <button onClick={e => login(e)}>Login</button>
      </form>

      <div>
        <h3>{quote}</h3>
      </div>
    </>
  )
}

export default LoginComponent;
