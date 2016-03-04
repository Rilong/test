<?php
    require_once "class_config.php";

   abstract class base {
       static protected $db = null;
       protected $user;

       static private function getDB () {
           if (self::$db === null) self::$db = new mysqli(config::DB_HOST, config::DB_USER, config::DB_PASSWORD, config::DB_NAME);

           return self::$db;
       }

         public function __construct() {
             self::getDB();
        }

        protected function selectTable ($table , $login) {

            $result_set = self::$db->query("SELECT * FROM `$table` WHERE `login` = '$login'");
            $this->user = $result_set->fetch_assoc();
            return $this->user;

        }

       protected function hashPassword($password) {
           $newPassword = md5(config::SECRET.$password);

           return $newPassword;
       }

        public function __destruct() {
            self::$db->close();
        }
    }

