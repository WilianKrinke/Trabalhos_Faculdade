<?php
include('../../utils/connection.php');
include('./upDateValidator.php');

$newBirthday = filter_input_array(INPUT_POST, FILTER_DEFAULT);



$queryUpDateBirthday = "UPDATE fundamentosweb.users SET birthday = :newBirthday WHERE idUser = :userId";

$upDate = $connection->prepare($queryUpDateBirthday);
$upDate->bindParam(':newBirthday', $newBirthday['birthday'], PDO::PARAM_STR);
$upDate->bindParam(':userId', $newBirthday['id'], PDO::PARAM_STR);

$upDate->execute();

if ($upDate->rowCount()) {
    header("location: http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php");
} else {
    header("location: http://localhost/fundamentosweb/Trabalhos_Faculdade/Trabalho_4/src/meusDados/php");
}
