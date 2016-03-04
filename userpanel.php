<?php
    require_once "core/class_upload.php";
    upload::selectDB($_COOKIE["login2"]);
    upload::closeDB();
?>

<div id="InSession">

           <center><img class="avatar" src="upload/avatar/<?=upload::$user["avatar"]?>" height="150px" width="auto" alt="Аватар"></center>
            <p id="your_login"><?=$_COOKIE["login2"]?></p>
            <a class="linksUser" href="office.php">Особистий кабінет</a>
            <a class="linksUser" href="code404.html">Повідомлення</a>
            <a class="linksUser" href="code404.html">Форум</a>
            <a id="logout" href="logout.php">Вийти</a>

        </div>