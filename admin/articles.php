<?php
    require_once "lib/class_config.php";
    require_once "lib/class_articles.php";

    $articles = new articles();

?>

<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <title>панель адміністратора|test.com</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="../js/jquery/jquery-2.1.4.min.js"></script>
    <style>

    </style>

    <script type="text/javascript">

        $(document).ready(function(){
            $("#select").bind("click", function(){
                $("#uploadFile").click();
            });

            $("#uploadFile").bind("change", function(){
                var path = $("#uploadFile").val().replace("C:\\fakepath\\", "");
               $("#textP").text(path);
            });
        });

    </script>
</head>
<body>

<?php require_once "header.html"?>

    <p id="phpMyAdmin">
        <a href="<?=config::ADDRESS_PHPMYADMIN?>">Зайти в phpMyAdmin</a>
    </p>

    <div id="addArticles">
        <h1>Добавити статтю</h1>

        <form name="addArticles" action="" method="post" enctype="multipart/form-data">

            <center><input name="hArticles" id="hArticles" type="text" placeholder="Заголовок статті"/></center>
            <center><textarea name="descriptionArticles" id="descriptionArticles" placeholder="Опис статті"></textarea></center>
            <center><textarea name="textArticles" id="textArticles" placeholder="Текст статті"></textarea></center>

            <h2>Завантажити фото</h2>

            <input name="image" id="uploadFile" type="file"><br />

            <div id="upload">
                <div id="select">

                    <p>Вибрати</p>

                </div>
                <div id="text">
                    <p id="textP">Файл не вибрано</p>
                </div>
            </div>
            <br />
            <br />
            <center><input name="send" type="submit" value="Надiслати"></center>

        </form>
    </div>


</body>
</html>

