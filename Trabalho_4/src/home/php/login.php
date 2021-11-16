<?php

function login($userName, $senha)
{
    require_once('getInfo.php');

    $isFindUserEmail = getInfo($userName, $senha);

    if ($isFindUserEmail[0] === true) {

        return $isFindUserEmail;
    } else {
        return $isFindUserEmail;
    }
}
