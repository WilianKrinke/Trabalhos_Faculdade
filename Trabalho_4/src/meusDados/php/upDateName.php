<?php
include('../../utils/connection.php');
$newUserName = filter_input_array(INPUT_POST, FILTER_DEFAULT);
var_dump($newUserName);

$queryUpDateName = "UPDATE fundamentosweb.users SET userName = :newUserName WHERE idUser = :userId";

$upDate = $connection->prepare($queryUpDateName);
$upDate->bindParam(':newUserName', $newUserName['name'], PDO::PARAM_STR);
$upDate->bindParam(':userId', $newUserName['id'], PDO::PARAM_STR);

$upDate->execute();

if ($upDate->rowCount()) {
    header("location: http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php");
} else {
    header("location: http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php");
}
