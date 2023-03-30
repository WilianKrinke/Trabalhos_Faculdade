import React, { useEffect, useState } from "react";
import LoadingComponent from "../../components/loading_component/Loading_component";
import InputComponent from "../../components/input_component/Input_component";
import ReceiverComponent from "../../components/receiver_component/ReceiverComponent";

const PageTwo = () => {
  const [loading, setloading] = useState(true);

  useEffect(() => {
    (async () => {
      setloading(false);
    })();
  }, [loading]);

  return (
    <>
      {loading ? (
        <LoadingComponent />
      ) : (
        <main>
          <InputComponent />

          <ReceiverComponent />
        </main>
      )}
    </>
  );
};

export default PageTwo;
