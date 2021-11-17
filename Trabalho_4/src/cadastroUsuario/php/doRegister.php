<?php
function doRegister($datas)
{
    include('../../utils/connection.php');
    $senha = $datas['pass'];

    define("SECRET", "oratoroeuaroupadoreideroma12345");
    $cript_pass = crypt($senha, SECRET);

    $queryUserRegister = "INSERT INTO fundamentosweb.users (userName, birthday, email, adm, pass) VALUES (:nome,:birthday,:email,:adm,:pass)";

    $cadastroUser = $connection->prepare($queryUserRegister);

    $cadastroUser->bindParam(':nome', $datas['name'], PDO::PARAM_STR);
    $cadastroUser->bindParam(':birthday', $datas['birthday'], PDO::PARAM_STR);
    $cadastroUser->bindParam(':email', $datas['email'], PDO::PARAM_STR);
    $cadastroUser->bindParam(':adm', $datas['typeuser'], PDO::PARAM_STR);
    $cadastroUser->bindParam(':pass', $cript_pass, PDO::PARAM_STR);

    $cadastroUser->execute();

    if ($cadastroUser->rowCount()) {
        $userRegister = "<p style='color: #018a01'>Usuario cadastrado com sucesso.</p>";

        return array(true, $userRegister);
    } else {
        $userNotRegister = "<p style='color: #a83232'>Erro: Usuario não cadastrado.</p>";

        return array(false, $userNotRegister);
    }
}
