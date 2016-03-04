<?php
    require_once "class_config.php";
     class  upload {
        private static $dir = config::DIR_AVATARS;
        private static $errors = false;
        public static $print_errors;
        public static $print_good;
        private static $db;
        public static $user;

        private static function getDB() {
            self::$db = new mysqli(config::DB_HOST, config::DB_USER, config::DB_PASSWORD, config::DB_NAME);
            return self::$db;

        }

        public static function selectDB($login) {

            self::getDB();
            $result_set = self::$db->query("SELECT `avatar` FROM `".config::DB_TABLE_USERS."` WHERE `login` = '$login'");
            self::$user = $result_set->fetch_assoc();

            return self::$user;

        }

        public static function getAvatar($path, $login) {

            self::$db->query("UPDATE `".config::DB_TABLE_USERS."` SET `avatar` = '$path' WHERE `login` = '$login'");


        }
         private static function checkMineType ($type) {


            if ($type != "image/jpeg" && $type != "image/png" && $type != "image/gif") self::$errors = true;
        }



        public static function uploadImg($file, $login) {
            self::getDB();
            $file = $file["uploadPhoto"];
            $name = $file["name"];
            $type = $file["type"];
            $real_dir = $file["tmp_name"];

            $NewName = microtime()."_".$name;

            $uploadFile = self::$dir.$NewName;
            self::checkMineType($type);

            if (self::$errors != true) {
                move_uploaded_file($real_dir, $uploadFile);
                self::$print_good = "";
                self::getAvatar($NewName, $login);
            }
            if (self::$errors == true) {
                self::$print_errors = "";
            }


        }

        public static function delFile($login) {
            self::selectDB($login);
            if (self::$user["avatar"] != "default_avatar.jpg") unlink("avatar/".self::$user["avatar"]);


        }

        public static function closeDB() {
            self::$db->close();
        }
    }

