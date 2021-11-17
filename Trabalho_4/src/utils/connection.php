<?php
$host = "localhost";
$user = "root";
$passSql = "88653730";
$database = "fundamentosweb";
$port = "3306";

$connection = new PDO("mysql:host=$host;port=$port;dbname=" . $database, $user, $passSql);
