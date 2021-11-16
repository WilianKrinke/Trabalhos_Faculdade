<?php

function isItemLate($lendDateItem)
{
    $today = date("Y-m-d");
    $arrToday = explode("-", $today);

    if ($arrToday[2] > $lendDateItem[2]) {
        return true;
    } else if ($arrToday[2] == $lendDateItem[2] && $arrToday[1] > $lendDateItem[1]) {
        return true;
    } else if ($arrToday[2] == $lendDateItem[2] && $arrToday[1] == $lendDateItem[1] && $arrToday[0] > $lendDateItem[0]) {
        return true;
    } else {
        return false;
    }
}
