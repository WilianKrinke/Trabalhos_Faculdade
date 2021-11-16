<?php
function getUsers()
{
    include '../../utils/connection.php';

    $queryUserList = "SELECT * FROM fundamentosweb.users";

    $resultData = $connection->prepare($queryUserList);
    $resultData->execute();

    if ($resultData->rowCount()) {
        while ($row_user = $resultData->fetch(PDO::FETCH_ASSOC)) {
            echo "
                <tr>
                    <td>" . $row_user['userName'] . "</td>
                    <td><a href='../../deletarUsuario/php/?id_user=" . $row_user['idUser'] . "&user_name=" . $row_user['userName'] . "'>Excluir</a></td>
                </tr>
            ";
        }
    }
}
