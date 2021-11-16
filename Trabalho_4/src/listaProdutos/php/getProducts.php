<?php

function getDataProducts($isAdm)
{
    include '../../utils/connection.php';

    $queryProductsList = "SELECT * FROM fundamentosweb.produtos";

    $resultData = $connection->prepare($queryProductsList);
    $resultData->execute();

    if (($resultData) && ($resultData->rowCount() != 0)) {
        while ($row_product = $resultData->fetch(PDO::FETCH_ASSOC)) {

            if ($row_product['disponivel'] == 1) {
                echo "
                    <tr>
                        <td>" . $row_product['productName'] . "</td>
                        <td><a href='../../emprestarProduto/php/?nome_produto=" . $row_product['productName'] . "&id_product=" . $row_product['idProduct'] . "'>Emprestar Produto<a/></td> 
                    
                ";
                if ($isAdm == 1) {
                    echo "
                    <td><a href='../../deletarProduto/php/?nome_produto=" . $row_product['productName'] . "&id_product=" . $row_product['idProduct'] . "'>Excluir Produto<a/></td>
                    </tr>
                    ";
                }
            }
        }
    }
}
