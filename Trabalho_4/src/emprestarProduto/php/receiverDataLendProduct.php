<?php
function receiverDataLendProduct($productLendData)
{
    require_once('./sendLendProductToDb.php');
    $wasSent = sendLendProductToDb($productLendData);

    return $wasSent;
}
