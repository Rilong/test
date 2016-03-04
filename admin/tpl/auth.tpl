<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Авторизація в админ панель</title>
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" type="text/css" href="icons/flaticon.css">
    <script type="text/javascript" src="../js/jquery/jquery-2.1.4.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $("#AutoSignIn").bind("click", function(){

                $("#AutoSignInForm").click();
            });
        });
    </script>
</head>
<body>
<div id="authAdmin">
    <h1>Авторизація</h1>
    <p id="errAuth">%errors%</p>

    <form name="QuickEntry" action="" method="post">
        <input name="AutoSignIn" type="submit" value="Уві" id="AutoSignInForm">
    </form>

    <form name="authAdmin" action="" method="post">
        <center><input name="login" type="text" placeholder="Твій логін"></center>
        <center><input name="password" type="password" placeholder="Твій пароль"></center>
        <center><p id="AutoSignIn">Швидкий вхід <i class="flaticon-locked59"></i></p></center>
        <center><input name="signIn" type="submit" value="Увійти"></center>

    </form>

</div>

</body>
</html>