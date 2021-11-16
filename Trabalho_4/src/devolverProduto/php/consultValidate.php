<?php

function consultDevolutionValidate($idOperation, $idUser)
{
    include_once('../../utils/connection.php');

    $queryHaveItemInDb = "SELECT * FROM fundamentosweb.produtosemprestados WHERE idOperacao = :idOperation AND idUser = :idUser";

    $consultTask = $connection->prepare($queryHaveItemInDb);

    $consultTask->bindParam(':idOperation', $idOperation, PDO::PARAM_STR);
    $consultTask->bindParam(':idUser', $idUser, PDO::PARAM_STR);

    $consultTask->execute();

    if ($consultTask->rowCount()) {
        return true;
    } else {
        return false;
    }
}
