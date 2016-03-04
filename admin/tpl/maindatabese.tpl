    <!doctype html>
    <html>
    <head>
        <meta charset="UTF-8">
        <title>панель адміністратора|test.com</title>
        <link rel="stylesheet" href="css/style.css">
        <script src="../js/jquery/jquery-2.1.4.min.js"></script>
    </head>
    <body>

    %header%

    <p id="phpMyAdmin"><a target="_blank" href="%phpmyadmin%">Зайти в phpMyAdmin</a></p>

    <ul id="option">
        <li><a href="database.php?users">Користувачі</a></li>
        <li><a href="database.php?articles">Статті</a></li>

    </ul>
    <br />
    <br />


    <center><div id="allUsers">%allUsers%<br/></div><div id="users">%users%</div></center>



    </body>
    </html>
