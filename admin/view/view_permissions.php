<?php

    require_once "lib/class_view.php";
    require_once "lib/class_data.php";
    require_once "lib/class_config.php";

class viewPermissions {
    private $view;
    private $data;
    private $text;

    public function __construct() {
        $this->view = new view();
        $this->data = new data();
        $this->data->selectTable(config::DB_TABLE_USERS);
        $this->Replace();
    }

    private function Replace () {


        for ($i = 0; $i < count($this->data->arrayUser); $i++) {

            $this->text  .= "
            <ul class=\"usersList\">
                <li>ID: ".$this->data->arrayUser[$i]["id"]."</li>
                <li title=\"".$this->data->arrayUser[$i]["login"]."\">Login: ".$this->data->arrayUser[$i]["login"]."</li>
                <li title=\"".$this->data->arrayUser[$i]["password"]."\">Password: ".$this->data->arrayUser[$i]["password"]."</li>
                <li title=\"".$this->data->arrayUser[$i]["email"]."\">E-mail: ".$this->data->arrayUser[$i]["email"]."</li>
                <li title=\"".$this->data->arrayUser[$i]["avatar"]."\">Avatar: ".$this->data->arrayUser[$i]["avatar"]."</li>
                <li>Register: ".$this->data->arrayUser[$i]["regdate"]."</li>
                <li><img src=\"img/worker37.png\" alt=\"\" /><a href=\"permissions.php?control=".$this->data->arrayUser[$i]["login"]."\">Управління</a></li>
                    </ul>
        <br />";

        }

        $sr["header"] = $this->view->getContent("tpl/header");
        $sr["userList"] = $this->text;

        echo $this->view->getReplaceContent($sr, "tpl/permain");
    }
}