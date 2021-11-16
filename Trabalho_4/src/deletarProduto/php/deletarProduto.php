<?php
function deletarProduto($idProduct)
{
    include('../../utils/connection.php');
    $queryDeleteProduct = "DELETE FROM fundamentosweb.produtos WHERE idProduct = :idProduct";

    $insertion = $connection->prepare($queryDeleteProduct);
    $insertion->bindParam(":idProduct", $idProduct, PDO::PARAM_STR);
    $insertion->execute();

    if ($insertion->rowCount()) {
        return true;
    } else {
        return false;
    }
}
