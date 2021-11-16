<?php
function sendLendProductToDb($productLendData)
{
    include('../../utils/connection.php');

    $idUserInt = (int)$productLendData['idUser'];
    $idProductInt = (int)$productLendData['idProduct'];
    $productName = $productLendData['productName'];

    $querySendLendProducts = "INSERT INTO fundamentosweb.produtosemprestados (idUser, idProduct, lendDate, devolutionDate,productName) VALUES (:idUser,:idProduct,:lendDate,:devolutionDate,:productName)";

    $lendProductsDb = $connection->prepare($querySendLendProducts);

    $lendProductsDb->bindParam(':idUser', $idUserInt, PDO::PARAM_STR);
    $lendProductsDb->bindParam(':idProduct', $idProductInt, PDO::PARAM_STR);
    $lendProductsDb->bindParam(':lendDate', $productLendData['lendDate'], PDO::PARAM_STR);
    $lendProductsDb->bindParam(':devolutionDate', $productLendData['devolutionDate'], PDO::PARAM_STR);
    $lendProductsDb->bindParam(':productName', $productName, PDO::PARAM_STR);

    $lendProductsDb->execute();

    if ($lendProductsDb->rowCount()) {
        include('./upDateProducts.php');

        $upDated = upDateProducts($idProductInt);

        $arrayConfirm = [
            "lendProduct" => true,
            "updateProductToZero" => $upDated
        ];

        return $arrayConfirm;
    } else {

        $arrayConfirm = [
            "lendProduct" => false,
            "updateProductToZero" => false
        ];

        return $arrayConfirm;
    }
}
