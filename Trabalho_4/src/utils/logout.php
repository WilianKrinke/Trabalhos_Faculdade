<?php
session_start();
unset($_SESSION['userName']);
unset($_SESSION['isAdm']);
session_destroy();
header("Location: ../../home/php/");
