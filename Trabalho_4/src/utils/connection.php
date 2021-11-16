<?php

$host = getenv('HOST');
$user = getenv('USER');
$passSql = getenv('PASS_SQL');
$database = getenv('DATA_BASE');
$port = getenv('PORT');

$connection = new PDO("mysql:host=$host;port=$port;dbname=" . $database, $user, $passSql);
