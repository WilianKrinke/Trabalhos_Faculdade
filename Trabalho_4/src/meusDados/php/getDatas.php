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
                <p>Nome do usuário: " . $row_data['userName'] . "</p>
                <p>E-mail: " . $row_data['email'] . "</p>
                <p>Data de nascimento: " . $row_data['birthday'] . "</p>                
            ";
        }
    }
}
