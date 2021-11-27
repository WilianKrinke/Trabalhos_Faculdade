<?php
$host = "";
$user = "";
$passSql = "";
$database = "";
$port = "";

try {
    $connection = new PDO("mysql:host=$host;port=$port;dbname=" . $database, $user, $passSql);
} catch (PDOException $error) {
    echo "Erro: " . $error->getMessage();
}
