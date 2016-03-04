<?php
    require_once "lib/class_view.php";
    require_once "lib/class_data.php";
    require_once "lib/class_config.php";

class ViewPermissionsUserPanel {
    private $view;
    private $data;

    public function __construct() {
        $this->data = new data();
        $this->view =  new view();
        $this->data->selectTableToArray(config::DB_TABLE_USERS, $_GET["control"]);
        $this->Replace();
    }

    private function Replace() {

        $sr["header"] = $this->view->getContent("tpl/header");
        $sr["avatar"] = "../upload/avatar/".$this->data->arrayUsers["avatar"];
        $sr["nickname"] = $this->data->arrayUsers["login"];
        $sr["linkMessage"] = config::DIR_MODULES."message.php?user=".$_GET["control"];
        $sr["ban"] = config::DIR_MODULES."ban.php?user=".$_GET["control"];
        $sr["prevention"] = config::DIR_MODULES."prevention.php?user=".$_GET["control"];
        $sr["userpermissions"] = config::DIR_MODULES."userpermissions.php?user=".$_GET["control"];
        echo $this->view->getReplaceContent($sr, "tpl/userpanel");
    }
}