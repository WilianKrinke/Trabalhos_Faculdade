import React from "react";
import Title from "../../components/title_component/Title";
import SignUpForm from "../../components/signupform_component/signupform_component"
import HistoryButton from "../../components/history_btn_component/HistoryButton";

const Page1 = () => {
  return (
    <>
      <header>
        <Title title={"Cadastro"} />
      </header>
      <main>
        <section>
          <SignUpForm />
        </section>
        <section>
          <HistoryButton titlebtn={"To Page 2"} path={"/page-two"}/>
        </section>
      </main>
    </>
  );
};

export default Page1;