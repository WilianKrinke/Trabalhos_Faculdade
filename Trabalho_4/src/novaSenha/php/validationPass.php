<?php

function validationPass($passDatas)
{
    $pass = $passDatas['pass'];
    $confirmed_pass = $passDatas['confirmed-pass'];

    if ($pass === $confirmed_pass) {
        $isValidPassArr = passValidator($pass);

        if ($isValidPassArr[0] == true) {
            require('./changePass.php');
            $changePass = changePass($pass);

            if ($changePass) {
                $messageOK = "<p class='done'>Senha Atualizada com sucesso</p>";
                return array($changePass, $messageOK);
            } else {
                $messageFail = "<p class='alert'>Erro: contate o administrador</p>";
                return array($changePass, $messageFail);
            }
        } else {
            return $isValidPassArr;
        }
    } else {
        $message = "<p class='alert'>Senhas não são equivalentes</p>";
        return array(false, $message);
    }
}


function passValidator($pass)
{
    $padrao_pass = "/^(?=.*[A-Za-z])(?=.*\d)[A-Za-z\d]{4,9}$/";
    $isValidPass = preg_match($padrao_pass, $pass);

    $messageOk = "OK";
    $messageError = "Senha não está nos padrões exigidos, ao menos uma letra e um número ";

    if ($isValidPass === 1) {
        return array(true, $messageOk);
    } else {
        return array(false, $messageError);
    }
}
