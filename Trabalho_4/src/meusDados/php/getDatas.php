<?php
function getDatas($idProducts)
{
    include('../../utils/connection.php');

    $querySelectUserDatas = "SELECT * from fundamentosweb.users WHERE idUser = :idUser";
    $userDatas = $connection->prepare($querySelectUserDatas);
    $userDatas->bindParam(':idUser', $idProducts, PDO::PARAM_STR);

    $userDatas->execute();

    if ($userDatas->rowCount()) {
        while ($row_data = $userDatas->fetch(PDO::FETCH_ASSOC)) {
            echo "
                <p align='center'><strong>Nome do usuário:</strong> " . $row_data['userName'] . "</p>
                <p align='center'><strong>Data de nascimento:</strong> " . date('d/m/Y', strtotime($row_data['birthday'])) . "</p>                
                <p align='center'><strong>E-mail:</strong> " . $row_data['email'] . "</p>
            ";
        }
    }
}
