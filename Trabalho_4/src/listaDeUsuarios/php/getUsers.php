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
                    <td align='center'>" . $row_user['userName'] . "</td>";
            if ($row_user['adm'] == 1) {
                echo "<td align='center'> Sim </td>";
            } else {
                echo "<td align='center'> Não </td>";
            }
            echo "<td align='center'><a href='../../deletarUsuario/php/?id_user=" . $row_user['idUser'] . "&user_name=" . $row_user['userName'] . "'>Excluir</a></td>
                </tr>
            ";
        }
    }
}
