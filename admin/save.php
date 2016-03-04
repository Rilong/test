<?php

    require_once "lib/class_view.php";
    require_once "lib/class_config.php";

    require_once "../core/class_message.php";
    $view = new view();
   // print_r($_POST);
    $message = new message("../text/message.ini");
    $ip = ip2long($_SERVER["REMOTE_ADDR"]);
    $login = $_POST["you_login"];
    $password = $_POST["you_password"];
    $newPassword = md5(config::SECRET.$password);
    $error = false;
    $sr["errors"] = $printErr = "";

    if (isset($_POST["save"])) {

        $time = time() + 60 * 60 * 24 * 30;

        if ($login != config::ADMIN_LOGIN || $newPassword != config::ADMIN_PASSWORD) {

            $sr["errors"] = $printErr = $message->getData("Auth", "ERROR_AUTH");
            $error = true;
        }

        if ($login == "" || $password == "") {

            $sr["errors"] = $printErr = $message->getData("Auth", "ERROR_AUTH");
            $error = true;
        }

        if ($error != true) {
            $mysqli = new mysqli(config::DB_HOST, config::DB_USER, config::DB_PASSWORD, config::DB_NAME);
            $mysqli->query("INSERT INTO `saveUsers` (`ip`, `login`, `password`, `deldate`) VALUES ('$ip', '$login', '$newPassword', '$time')");
            $mysqli->close();

            header("Location: index.php");
            exit;
        }


    }
    echo $view->getReplaceContent($sr, "tpl/save")
?>

