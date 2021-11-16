<?php
require __DIR__ . '/vendor/autoload.php';
include('./utils/environments.php');

$classeTeste = new Environments();
$classeTeste->load(__DIR__);


print_r(getenv('PASS_SQL'));
