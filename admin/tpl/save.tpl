<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Швидкий вхід</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
<div id="saveUser">
    <h1>Швидкий вхід</h1>
    <p id="errAuth">%errors%</p>
    <form name="saveUser" action="save.php" method="post">
        <center><input name="you_login" type="text" placeholder="Твій логін"/><br /></center>
        <center><input name="you_password" type="password" placeholder="Твій пароль"/><br /></center>
        <center><input name="save" type="submit" value="Зберегтися"/></center>
    </form>
</div>
</body>
</html>
