<?php
    session_start();
    //unset ($_SESSION["login"]);
    //unset ($_SESSION["password"]);
    setcookie("login2", "");
    setcookie("password2", "");
    unset($_COOKIE["login2"]);
    unset($_COOKIE["password2"]);
    header("Location: ".$_SERVER["HTTP_REFERER"]);
    exit;