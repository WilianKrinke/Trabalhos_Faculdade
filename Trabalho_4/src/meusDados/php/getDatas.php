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
                <p><strong>Nome do usuário:</strong> " . $row_data['userName'] . "</p>
                <p><strong>E-mail:</strong> " . $row_data['email'] . "</p>
                <p><strong>Data de nascimento:</strong> " . $row_data['birthday'] . "</p>                
            ";
        }
    }
}
