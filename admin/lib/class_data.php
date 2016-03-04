<?php

require_once "class_database.php";
require_once "class_config.php";

class data extends base {



    public function __construct() {
        parent::__construct();

    }


    public function getAllUsers($table) {

       return "Користувачів: ".$this->numRows($table)."<br />";

    }

    public function getTable () {
        $text = "";
        for ($i = 0; $i < count($this->arrayUser); $i++) {

            $text .=  "<table style='border: 1px solid #000'><tr><td style='border: 1px solid #000'>ID: ".$this->arrayUser[$i]["id"]."</td><td style='border: 1px solid #000'>Login: ".$this->arrayUser[$i]["login"]."</td><td style='border: 1px solid #000'>Password: ".$this->arrayUser[$i]["password"]."</td><td style='border: 1px solid #000'>E-mail: ".$this->arrayUser[$i]["email"]."</td><td style='border: 1px solid #000'>Avatar: ".$this->arrayUser[$i]["avatar"]."</td><td style='border: 1px solid #000'>Register date: ".$this->arrayUser[$i]["regdate"]."</td><td style='border: 1px solid #000'><a style='color: #00f' href='database.php?delete=".$this->arrayUser[$i]["login"]."'>Видалити</a></td></tr></table>"."<br />";
        }

        return $text;
    }

    public function select () {



        $this->selectTableToArray("users" ,$_GET["delete"]);

        $newId = $this->arrayUsers["id"] - 1;


        if (isset ($_GET["delete"])) {

            self::$db->query("DELETE FROM `".config::DB_TABLE_USERS."` WHERE `login` = '".$_GET["delete"]."'");
            self::$db->query("ALTER TABLE `".config::DB_TABLE_USERS."` AUTO_INCREMENT = $newId");

            header("Location: ". $_SERVER["HTTP_REFERER"]);
            ob_get_clean();

            exit;
        }


    }


}