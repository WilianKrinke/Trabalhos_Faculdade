<?php
include('../../utils/connection.php');
$newEmail = filter_input_array(INPUT_POST, FILTER_DEFAULT);

$queryUpDateEmail = "UPDATE fundamentosweb.users SET email = :newEmail WHERE idUser = :userId";

$upDate = $connection->prepare($queryUpDateEmail);
$upDate->bindParam(':newEmail', $newEmail['email'], PDO::PARAM_STR);
$upDate->bindParam(':userId', $newEmail['id'], PDO::PARAM_STR);

$upDate->execute();

if ($upDate->rowCount()) {
    header("location: http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php");
} else {
    header("location: http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php");
}
