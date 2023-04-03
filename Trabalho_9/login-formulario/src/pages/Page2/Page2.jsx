import React from "react";
import "./page2.css";
import Title from "../../components/title_component/Title";
import LoginComponent from "../../components/login_component/Login_component";


const Page2 = () => {
  return (
    <>
      <header>
        <Title title={"Login"} />
      </header>
      <main>
        <section>
          <LoginComponent />
        </section>
      </main>
    </>
  );
};

export default Page2;
