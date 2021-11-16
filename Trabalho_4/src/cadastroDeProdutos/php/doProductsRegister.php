<?php
function doProductsRegister($productName)
{
    include('../../utils/connection.php');

    $queryProductCad = "INSERT INTO fundamentosweb.produtos (productName) VALUES (:nome)";
    $cadastroProduto = $connection->prepare($queryProductCad);
    $cadastroProduto->bindParam(':nome', $productName, PDO::PARAM_STR);
    $cadastroProduto->execute();


    if ($cadastroProduto->rowCount()) {
        $isRegistered = "<p class='done'>Produto cadastrado com sucesso.</p>";
        return $isRegistered;
    } else {
        $isNotRegistered = "<p class='alert'>Erro: Produto não cadastrado.</p>";
        return $isNotRegistered;
    }
}
