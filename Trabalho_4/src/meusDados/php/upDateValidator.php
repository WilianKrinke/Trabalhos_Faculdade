<?php
function upDateValidator($datas)

{
    $name = $datas['name'];
    $birthday = $datas['birthday'];
    $email = $datas['email'];


    $isValidNameArr = nameValidator($name);
    $isValidBirthdayArr = birthdayValidator($birthday);
    $isValidEmailArr = emailValidator($email);


    $datasArray = array($isValidNameArr, $isValidBirthdayArr, $isValidEmailArr);

    foreach ($datasArray as $item) {
        if ($item[0] === false) {
            return array(false, $item[1]);
        }
    }

    return array(true, "Todos os dados corretos");
}

function nameValidator($name)
{
    $messageOk = "OK";
    $messageError = "Nome não está nos padrões exigidos, apenas letras";
    $arrNames = explode(" ", $name);
    $padrao_nome = "/^[A-Za-záàâãéèêíïóôõöúçñÁÀÂÃÉÈÍÏÓÔÕÖÚÇÑ ]+$/";
    $arrMatches = array();

    foreach ($arrNames as $item) {
        $isNameValid = preg_match($padrao_nome, $item);
        array_push($arrMatches, $isNameValid);
    }

    foreach ($arrMatches as $item) {
        if ($item !== 1) {
            return array(false, $messageError);
        }
    }

    return array(true, $messageOk);
}

function birthdayValidator($birthday)
{
    $padrao_date = "/(\d{4})[-.\/](\d{2})[-.\/](\d{2})/";
    $isValidBirthday = preg_match($padrao_date, $birthday);
    $today = date("Y-m-d");

    $sentDate = explode("-", $birthday);
    $arrToday = explode("-", $today);

    $messageOk = "OK";
    $messageError = "Data de nascimento não está nos padrões exigidos, formato yyyy-mm-dd";
    $messageError2 = "Data de nascimento não está nos padrões exigidos, informado data futura";

    if ($isValidBirthday === 1) {
        if ($sentDate[0] > $arrToday[0]) {
            return array(false, $messageError2);
        } else if ($sentDate[0] === $arrToday[0] && $sentDate[1] > $arrToday[1]) {
            return array(false, $messageError2);
        } else if ($sentDate[0] === $arrToday[0] && $sentDate[1] === $arrToday[1] && $sentDate[2] > $arrToday[2]) {
            return array(false, $messageError2);
        }

        return array(true, $messageOk);
    } else {
        return array(false, $messageError);
    }
}

function emailValidator($email)
{
    $padrao_email = "/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/";
    $isValidEmail = preg_match($padrao_email, $email);

    $messageOk = "OK";
    $messageError = "E-mail não está nos padrões exigidos, email@email.com";

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return array(false, $messageError);
    }

    if ($isValidEmail === 1) {
        return array(true, $messageOk);
    } else {
        return array(false, $messageError);
    }
}
