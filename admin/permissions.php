<?php
    require_once "view/view_permissions.php";
    require_once "view/view_permissions_userpanel.php";

    if (isset($_GET["control"])) $view = new ViewPermissionsUserPanel();
    else $view = new viewPermissions();

?>
