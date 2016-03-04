<?php
    ob_start();
    session_start();
    require_once "view/view_database.php";
    require_once "view/view_auth.php";
    require_once "lib/class_users.php";

   // $viewData = new viewDatabase();

    $auth = new users();

    if (!isset($_COOKIE["password"]))$auth->getAuth();
    else $viewData = new viewDatabase();
  //  $viewData->data->closeBD();
