import React, { useEffect, useState } from "react";
import LoadingComponent from "../../components/loading_component/Loading_component";
import ReceiverComponent from "../../components/receiver_component/ReceiverComponent";
import LogoutComponent from "../../components/logout_component/Logout_Component";
import { useNavigate } from "react-router-dom";
import { getAuth, onAuthStateChanged } from "firebase/auth";

const Page3 = () => {
  const history = useNavigate();
  const [loading, setloading] = useState(true);

  useEffect(() => {
    (async () => {
      const auth = getAuth();
      onAuthStateChanged(auth, (user) => {
        if (user) {
          setloading(false);
        } else {
          history("/");
        }
      });
    })();
  }, [loading, history]);

  return (
    <>
      {loading ? (
        <LoadingComponent />
      ) : (
        <main>
          <ReceiverComponent />

          <LogoutComponent />
        </main>
      )}
    </>
  );
};

export default Page3;
