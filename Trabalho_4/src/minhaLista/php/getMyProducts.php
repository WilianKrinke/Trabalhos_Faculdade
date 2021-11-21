<?php

function getMyProducts($idUserLogged)
{
    include_once('../../utils/connection.php');
    include_once('./isItemLate.php');

    $queryMyProducts = "SELECT * FROM fundamentosweb.produtosemprestados WHERE idUser = :userId";

    $resultDatas = $connection->prepare($queryMyProducts);
    $resultDatas->bindParam(':userId', $idUserLogged, PDO::PARAM_STR);

    $resultDatas->execute();

    if (($resultDatas) && ($resultDatas->rowCount() != 0)) {

        echo "
        <table>
            <thead>
                <tr>
                    <th>Nome do Produto</th>
                    <th>Data do Empréstimo</th>
                    <th>Data de Devolução</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
        ";

        while ($row_product = $resultDatas->fetch(PDO::FETCH_ASSOC)) {

            $lendDate = explode("-", $row_product['devolutionDate']);

            echo "
                <tr>
                    <td>" . $row_product['productName'] . "</td> 
                    <td>" . date('d/m/Y', strtotime($row_product['lendDate']))  . "</td>
                    <td>" . date('d/m/Y', strtotime($row_product['devolutionDate'])) . "</td>
            ";

            $itemLate = isItemLate($lendDate);

            if ($itemLate) {
                echo "<td class='alert'>Atrasado</td>";
            } else {
                echo "<td class='done'>No prazo</td>";
            }

            echo "
                    <td><a href='../../devolverProduto/php/?operation=" . $row_product['idOperacao'] . "&product_name=" . $row_product['productName'] . "&product_id=" . $row_product['idProduct'] . "' >Devolver Produto
                    </a></td>                    
                </tr>
                ";
        }
        echo "
            </tbody>
        </table>        
        ";
    } else {
        echo "
            <h3>Não há Dados para exibir, para emprestar algum item, vá ate a aba lista de produtos.</h3>        
        ";
    }
}
