<?php

function upDateUserData($newUserDatas)
{
    include('../../utils/connection.php');

    $queryUpDate = "UPDATE fundamentosweb.users SET userName = :newUserName, birthday = :newBirthday, email = :newEmail WHERE idUser = :userId";

    $upDate = $connection->prepare($queryUpDate);

    $upDate->bindParam(':newUserName', $newUserDatas['name'], PDO::PARAM_STR);
    $upDate->bindParam(':newBirthday', $newUserDatas['birthday'], PDO::PARAM_STR);
    $upDate->bindParam(':newEmail', $newUserDatas['email'], PDO::PARAM_STR);
    $upDate->bindParam(':userId', $_SESSION['userId'], PDO::PARAM_STR);

    $upDate->execute();

    if ($upDate->rowCount()) {
        return array(true, "<p class='done'>Dados atualizado com sucesso.</p>");
    } else {
        return array(false, "<p class='alert'>Erro: contate o administrador</p>");
    }
}
