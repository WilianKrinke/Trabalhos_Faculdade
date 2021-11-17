<?php
function changePass($newPass)
{
    include('../../utils/connection.php');

    define("SECRET", "oratoroeuaroupadoreideroma12345");
    $cript_pass = crypt($newPass, SECRET);

    $queryChangePass = "UPDATE fundamentosweb.users SET pass = :newPass WHERE idUser = :idUser";

    $upDatePass = $connection->prepare($queryChangePass);

    $upDatePass->bindParam(":newPass", $cript_pass, PDO::PARAM_STR);
    $upDatePass->bindParam(":idUser", $_SESSION['userId'], PDO::PARAM_STR);

    $upDatePass->execute();

    if ($upDatePass->rowCount()) {
        return true;
    } else {
        return false;
    }
}
