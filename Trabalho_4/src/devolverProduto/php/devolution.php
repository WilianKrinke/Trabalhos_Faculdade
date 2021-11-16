<?php
function devolution($productDevolutionDatas)
{
    include_once('./consultValidate.php');

    $idOperation = $productDevolutionDatas['idOperation'];
    $idUser = $productDevolutionDatas['idUser'];
    $idProduct = $productDevolutionDatas['idProduct'];

    $itFound = consultDevolutionValidate($idOperation, $idUser);

    if ($itFound) {
        require('../../utils/connection.php');
        $queryDevolutionItem = "DELETE FROM fundamentosweb.produtosemprestados WHERE idOperacao = :idOperation AND idUser = :idUser";

        $devolutionTask = $connection->prepare($queryDevolutionItem);

        $devolutionTask->bindParam(':idOperation', $idOperation, PDO::PARAM_STR);
        $devolutionTask->bindParam(':idUser', $idUser, PDO::PARAM_STR);

        $devolutionTask->execute();

        if ($devolutionTask->rowCount()) {
            include('./upDateProducts.php');

            $wasUpdateProduct = upDateProducts($idProduct);

            $arrayStatus = [
                "devolution" => true,
                "message" => "<p class='done'>Item Devolvido. Obrigado.</p>",
                "updated" => $wasUpdateProduct,
            ];
            return $arrayStatus;
        } else {

            $arrayStatus = [
                "devolution" => false,
                "message" => "<p class='alert'>Erro: contate o desenvolvedor.</p>",
                "updated" => false,
            ];
            return $arrayStatus;
        }
    } else {

        $arrayStatus = [
            "devolution" => false,
            "message" => "<p class='alert'>Item já foi devolvido. Obrigado.</p>",
            "updated" => false,
        ];

        return $arrayStatus;
    }
}
