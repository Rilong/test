<?php
    ob_start();
    session_start();
    require_once "../core/class_upload.php";
    upload::selectDB($_COOKIE["login2"]);

    if (isset($_POST["done"])) {
        if ($_FILES["uploadPhoto"]["error"] == 0) {

            upload::delFile($_COOKIE["login2"]);
            upload::uploadImg($_FILES, $_COOKIE["login2"]);
            upload::closeDB();
            header("Location:". $_SERVER["HTTP_REFERER"]);
            ob_end_clean();
            exit;
        } else header("Location: index.php");

    }
?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>test.com Завантаження фото</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">

</head>
<body>
    <div class="header"><h1>Test</h1></div>
    <div class="navigation">
        <ul id="TopMenu">
            <li><a href="../code404.html">Ігри</a></li>
            <li><a href="../code404.html">Інтернет</a></li>
            <li><a href="../code404.html">Історія</a></li>
            <li><a href="../code404.html">Авто і мото</a></li>
            <li><a href="../code404.html">Безпека</a></li>
            <li><a href="../code404.html">Будівництво</a></li>
            <li><a href="../code404.html">Бізнес і фінанси</a></li>
            <li><a class="borderClear" href="../code404.html">Відпочинок</a></li>
            <?php

            if (!isset($_COOKIE["login2"])) echo '<a href="../register.php" id="register">зареєструватися</a>';

            ?>
        </ul>


    </div>

    <?php
        if (isset($_COOKIE["login2"])) require_once "upload_panel.php";
        else require_once "../error_auth.html";
    ?>

</body>
</html>
