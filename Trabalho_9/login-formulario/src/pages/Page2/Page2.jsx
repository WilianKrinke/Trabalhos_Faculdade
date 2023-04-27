import React from "react";
import "./page2.css";
import Title from "../../components/title_component/Title";
import LoginComponent from "../../components/login_component/Login_component";
import HistoryButton from "../../components/history_btn_component/HistoryButton";


const Page2 = () => {
  return (
    <>
      <header>
        <Title title={"Login"} />
      </header>
      <main>
        <section>
          <LoginComponent />

          <HistoryButton titlebtn={"To Page 1"} path={"/"}/>
        </section>
      </main>
    </>
  );
};

export default Page2;
