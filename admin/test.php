<?php

require_once "lib/class_config.php";
require_once "lib/class_articles.php";
require_once "lib/class_view.php";
require_once "lib/class_functions.php";


    //$functions = new functions();
   // $functions->Redirect("http://www.google.com");
    //$type = true;
   //; $functions->Redirect($_SERVER["HTTP_REFERER"], $type);

header("Location: ".$_SERVER["HTTP_REFERER"]);
?>


<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Document</title>
</head>
<body>
<h1>test</h1>
</body>
</html>