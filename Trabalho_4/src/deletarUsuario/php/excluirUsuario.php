<?php

function excluirUsuario($idUserId)
{
    include('../../utils/connection.php');
    $queryDeleteUser = "DELETE FROM fundamentosweb.users WHERE idUser = :userId";

    $exclusaoUsuario = $connection->prepare($queryDeleteUser);
    $exclusaoUsuario->bindParam(':userId', $idUserId, PDO::PARAM_STR);
    $exclusaoUsuario->execute();

    if ($exclusaoUsuario->rowCount()) {
        return true;
    } else {
        return false;
    }
}
