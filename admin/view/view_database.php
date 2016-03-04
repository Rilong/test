<?php

require_once "lib/class_config.php";
require_once "lib/class_database.php";
require_once "lib/class_data.php";
require_once "lib/class_view.php";




class viewDatabase {

    public $data;
    private $view;
    private $sr;
    public function __construct() {
        $this->data = new data();
        $this->view = new view();
        $this->data->selectTable(config::DB_TABLE_USERS);
        echo $this->Replace();
    }

    private function Replace () {

        $this->sr["header"] = $this->view->getContent("tpl/header");
        $this->sr["allUsers"] = $this->data->allUsers."<br />";
        $this->sr["phpmyadmin"] = config::ADDRESS_PHPMYADMIN;
        $this->sr["users"] = $this->GetAllUsers();


        return $this->view->getReplaceContent($this->sr, "tpl/maindatabese");
    }

    private function GetAllUsers() {

        if (isset ($_GET["users"])) {

            $this->sr["allUsers"] = $this->data->getAllUsers(config::DB_TABLE_USERS);
            return $this->data->getTable();

        }

        if (isset ($_GET["delete"]))  $this->data->select();

        return false;
    }

}