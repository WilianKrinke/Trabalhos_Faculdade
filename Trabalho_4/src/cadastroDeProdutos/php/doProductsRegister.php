<?php
function doProductsRegister($productName)
{
    include('../../utils/connection.php');

    $queryProductCad = "INSERT INTO fundamentosweb.produtos (productName) VALUES (:nome)";
    $cadastroProduto = $connection->prepare($queryProductCad);
    $cadastroProduto->bindParam(':nome', $productName, PDO::PARAM_STR);
    $cadastroProduto->execute();


    if ($cadastroProduto->rowCount()) {
        header('location: http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/listaProdutos/php/');
    } else {
        $isNotRegistered = "<p class='alert'>Erro: Produto não cadastrado.</p>";
        return $isNotRegistered;
    }
}
