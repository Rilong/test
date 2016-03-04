<div class="uploadBlock">

    <div class="upload">
        <form name="upload" action="index.php" method="post" enctype="multipart/form-data">
            <input name="uploadPhoto" type="file"/> <br />
            <input name="done" type="submit" value="Завантажити">
        </form>

        <div id="avatar"><center><img src="avatar/<?=upload::$user["avatar"]?>" alt="Аватар" height="130" width="auto" /></center></div>
        <div id="DelAvatar"><a href="del_avatar.php">Видалити аватар</a></div>
    </div>
</div>