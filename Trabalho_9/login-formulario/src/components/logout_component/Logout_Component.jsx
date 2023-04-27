import { useNavigate } from "react-router-dom";
import { signOutFb } from "../../firebase/auth";
import React from "react";

const LogoutComponent = () => {
  const history = useNavigate();

  const signOutUser = async (event) => {
    event.preventDefault();

    const hasLogOut = await signOutFb();

    if (hasLogOut) {
      history("/");
    }
  };

  return (
    <>
      <button type="button" onClick={(event) => signOutUser(event)}>
        Logout
      </button>
    </>
  );
};

export default LogoutComponent;
