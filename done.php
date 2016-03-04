<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Test.com</title>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link rel="stylesheet" href="css/return_page.css">
</head>
<body>
    <div class="header"><h1>Test</h1></div>
    <div class="infoRegister">

        <h2>Ви успішно зареєструвалися <br />як <div id="session_style"><?=$_SESSION["login"];?></div></h2><br />
        <?php
        unset ($_SESSION["login"]);
        ?>
        <center><a href="/">На головну cторінку</a></center>

    </div>
</body>
</html>
