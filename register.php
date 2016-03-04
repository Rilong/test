<?php
    require_once "core/class_users.php";
    require_once "core/class_config.php";
    session_start();
    $login = $_POST["login"];
    $password = $_POST["pass"];
    $password2 = $_POST["pass_2"];
    $email = $_POST["email"];


    if (isset($_POST["done"])) {

        $reg = new register(config::DB_TABLE_USERS ,$login, $password, $password2, $email, $reg);
    }


?>

<!doctype html>
<html>
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <title>Register</title>
    <link rel="stylesheet" href="css/style_reg.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
</head>
<body>
<div class="header">
    <h1>Register</h1>
</div>



<div class="forms">
    <form name="register" action=""  method="post">
        <input class="posLogin" name="login" type="text" value="" placeholder="Логін" /> <span><?=$reg->errLogin?></span> <br /><br />
        <input class="posPass" name="pass" type="password" placeholder="Пароль"> <span><?=$reg->errPass?></span> <br /><br />
        <input class="posPass_2" name="pass_2" type="password" placeholder="Повторіть пароль"> <span><?=$reg->errPass_2?></span> <br /><br />
        <input id="posEmail" name="email" type="text" value="" placeholder="Введіть email">  <span><?=$reg->errEmail?></span><br /><br /><br /><br /><br />
        <input id="done" name="done" type="submit" value="зареєструватися">
    </form>
</div>
</body>
</html>
