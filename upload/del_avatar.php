<?php
    ob_start();
    require_once "../core/class_upload.php";
    session_start();
    upload::delFile($_COOKIE["login2"]);
    upload::selectDB($_COOKIE["login2"]);

    upload::getAvatar("default_avatar.jpg", $_COOKIE["login2"]);

    header("Location: ". $_SERVER["HTTP_REFERER"]);
    ob_end_clean();