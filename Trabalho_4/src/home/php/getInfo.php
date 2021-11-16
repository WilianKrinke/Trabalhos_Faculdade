<?php

function getInfo($userName, $senha)
{
    include '../../utils/connection.php';

    //Obs: Como é um trabalho de faculdade então não vou criar variaveis de ambinte para armazenar o secret;
    define("SECRET", "oratoroeuaroupadoreideroma12345");
    $cript_pass = crypt($senha, SECRET);

    $queryPass = "SELECT * from fundamentosweb.users WHERE userName = '$userName' AND pass = '$cript_pass'";

    $result_query = $connection->prepare($queryPass);
    $result_query->execute();

    if (($result_query) && ($result_query->rowCount() != 0)) {
        $row_usuario = $result_query->fetch(PDO::FETCH_ASSOC);

        $idUser = $row_usuario['idUser'];
        $userName = $row_usuario['userName'];
        $isAdm = $row_usuario['adm'];

        return array(true, $idUser, $userName, $isAdm);
    } else {
        return array(false, null, null, null);
    }
}
