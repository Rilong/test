<?php

require_once "class_database.php";
class articles extends base {

    private $image;
    private $newName;
    private $uploadFile;
    private $dir = "images/";
    private $Articles;
    public $ArticlesArray;

    public function __construct() {
        parent::__construct();
        $this->getData();
        $this->getArticles();
    }

    private function getImage () {
        $this->image = $_FILES["image"];
        $name = $this->image["name"];
        $this->newName = microtime()."_".$name;
        $real_dir = $this->image["tmp_name"];

        $this->uploadFile = move_uploaded_file($real_dir, $this->dir.$this->newName);


   }

    public function getArticles () {
            $this->ArticlesArray = array();
            $result_set = self::$db->query("SELECT * FROM `".config::DB_TABLE_ARTICLES."`");
            while (($row = $result_set->fetch_assoc()) != false) {
                 $this->ArticlesArray[] = $row;
        }

    }

    private function getData () {


        if (isset ($_POST["send"])) {
            $this->getImage();
            self::$db->query("INSERT INTO `".config::DB_TABLE_ARTICLES."` (`header`, `description`, `text`, `image`) VALUES ('".$_POST["hArticles"]."', '".$_POST["descriptionArticles"]."', '".$_POST["textArticles"]."',  '".$this->newName."')");
        }


    }
}