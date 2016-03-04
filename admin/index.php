<?php
    ob_start();
    session_start();

    require_once "lib/class_users.php";
    require_once "lib/class_view.php";


    $view = new view();
    $auth = new users();
    $sr["header"] = $view->getContent("tpl/header");

    if (!isset($_COOKIE["password"]))$auth->getAuth();
    else echo $view->getReplaceContent($sr, "tpl/homePage");

?>

