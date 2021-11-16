<?php

function upDateProducts($idProductInt)
{
    include('../../utils/connection.php');

    $queryUpdateProduct = "UPDATE fundamentosweb.produtos SET disponivel = 0 WHERE idProduct = :idProduct";

    $updateCol = $connection->prepare($queryUpdateProduct);

    $updateCol->bindParam(':idProduct', $idProductInt, PDO::PARAM_STR);

    $updateCol->execute();

    if ($updateCol->rowCount()) {
        return true;
    } else {
        return false;
    }
}
