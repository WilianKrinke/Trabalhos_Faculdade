<?php

function dataValidator($datas)
{
    $name = $datas['name'];
    $birthday = $datas['birthday'];
    $email = $datas['email'];
    $pass = $datas['pass'];
    $confirmed_pass = $datas['confirmed-pass'];

    if ($pass === $confirmed_pass) {
        $isValidNameArr = nameValidator($name);
        $isValidBirthdayArr = birthdayValidator($birthday);
        $isValidEmailArr = emailValidator($email);
        $isValidPassArr = passValidator($pass);

        $datasArray = array($isValidNameArr, $isValidBirthdayArr, $isValidEmailArr, $isValidPassArr);

        foreach ($datasArray as $item) {
            if ($item[0] === false) {
                return array(false, $item[1]);
            }
        }

        return array(true, "Todos os dados corretos");
    } else {
        $message = "Por favor, digite senha equivalentes";
        return array(false, $message);
    }
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

function passValidator($pass)
{
    $padrao_pass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,15}$/";
    $isValidPass = preg_match($padrao_pass, $pass);

    $messageOk = "OK";
    $messageError = "Senha não está nos padrões exigidos, ao menos uma letra e um número ";

    if ($isValidPass === 1) {
        return array(true, $messageOk);
    } else {
        return array(false, $messageError);
    }
}
