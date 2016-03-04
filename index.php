<?php

    session_start();
    require_once "core/class_users.php";

    $login = $_POST["login"];
    $password = $_POST["password"];

    if (isset($_POST["auth_done"])){
        $auth = new authUser();

        $auth->checkUsers($login, $password);
    }

?>

<!doctype html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <title>test.com</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <script  src="js/jquery/jquery-2.1.4.min.js"></script>


</head>
<body>

    <div class="header">
        <h1 id="h1">Test</h1>
    </div>

    <div class="navigation">
        <ul id="TopMenu">
                <li><a href="code404.html">Ігри</a></li>
                <li><a href="code404.html">Інтернет</a></li>
                <li><a href="code404.html">Історія</a></li>
                <li><a href="code404.html">Авто і мото</a></li>
                <li><a href="code404.html">Безпека</a></li>
                <li><a href="code404.html">Будівництво</a></li>
                <li><a href="code404.html">Бізнес і фінанси</a></li>
                <li><a class="borderClear" href="code404.html">Відпочинок</a></li>
               <?php

               if (!isset($_COOKIE["login2"])) echo '<a href="register.php" id="register">зареєструватися</a>';

               ?>
            </ul>


    </div>

    <div id="article"></div>

    <div id="aside">

            <?php
            if (!isset($_COOKIE["login2"])) {

                echo "<div id='auth'>
                 <h1>Вхід</h1>
            <div id='errors'>$auth->errorAuth</div>
            <form name='auth' action='' method='post'>
                <input name='login' type='text' placeholder='Ваш логін'/>
                <input name='password' type='password' placeholder='Ваш пароль'/>
                <a id='Forgot_your_password' href='code404.html'>Забули Пароль?</a>
                <input name='auth_done' type='submit' value='Увійти'/>
            </form> </div>";
            }

            if (isset($_COOKIE["login2"])) {
                unset ($auth);
                require_once "userpanel.php";
            }
            ?>

    </div>
    <div id="footer">
             <p>&copy; 2015 - <?=date("Y")?></p>
         <a href="https://vk.com"><img src="img/vk%20logo.png" /></a>
     </div>
</body>
</html>