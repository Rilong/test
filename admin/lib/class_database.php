
<?php
    require_once "class_config.php";

   abstract class base {
       static protected $db = null;
       protected $user;
       public $arrayUsers;
       public $allUsers;
       public $arrayUser;
       public $arrayTableIp;



       static private function getDB () {
           if (self::$db === null) self::$db = new mysqli(config::DB_HOST, config::DB_USER, config::DB_PASSWORD, config::DB_NAME);

           return self::$db;
       }

         public function __construct() {
             self::getDB();
        }


       public function closeBD () {
          return self::$db->close();
       }

       public function selectTable ($table) {

           $result_set = self::$db->query("SELECT * FROM `$table`");

           while (($this->user = $result_set->fetch_assoc()) != false) {

               $this->arrayUser[] = $this->user;
           }

       }

           public function selectTableToArray ($table = config::DB_TABLE_USERS, $user) {
           $result_set = self::$db->query("SELECT * FROM `$table` WHERE `login` = '$user'");

           return $this->arrayUsers = $result_set->fetch_assoc();

       }

       public function selectTableToArrayIP ($table, $ip) {
           $result_set = self::$db->query("SELECT * FROM `$table` WHERE `ip` = '$ip'");

           return $this->arrayTableIp = $result_set->fetch_assoc();

       }

       public function deleteIp () {
          return self::$db->query("DELETE FROM `saveUsers` WHERE `deldate` > '".time()."'");
       }

       public function numRows($table) {
           $result_set = self::$db->query("SELECT * FROM `$table`");

           return $this->allUsers = $result_set->num_rows;

       }



       protected function hashPassword($password) {
           $newPassword = md5(config::SECRET.$password);

           return $newPassword;
       }


    }

