<?php

require_once "class_database.php";
require_once "class_message.php";





class register extends base {

    public $error = false;
    public $errLogin;
    public $errPass;
    public $errPass_2;
    public $errEmail;


    public function __construct($table, $login, $password, $password_2, $email, $reg) {
        parent::__construct();

        $this->checkUser($table, $login, $password, $password_2, $email, $reg);
    }

    private function RegUser($table, $login, $password, $email) {
        self::$db->query("INSERT INTO `$table` (`login`, `password`, `email`, `regdate`) VALUES ('$login', '".$this->hashPassword($password)."', '$email',  '".date("d.m.Y")."')");
    }


    public function checkUser($table, $login, $password, $password_2, $email , $reg) {
        $err = new message("text/message.ini");
        if ($login == "") {

            $this->errLogin = $err->getData("Register", "ERROR_LOGIN");
            $this->error = true;
        }

        if ($password != $password_2 ) {
            $this->errPass = $err->getData("Register", "ERROR_PASSWORD_TWO");
            $this->error = true;

        }

        if ($password_2 != $password) {
            $this->errPass_2 = $err->getData("Register", "ERROR_PASSWORD_TWO");
            $this->error = true;
        }



        if (strlen($password) < 5) {

            $this->errPass = $err->getData("Register", "ERROR_PASSWORD_SHORT");
            $this->error = true;

        }

        if (strlen($password_2) < 5) {

            $this->errPass_2 = $err->getData("Register", "ERROR_PASSWORD_SHORT");
            $this->error = true;

        }

        if (strlen($password_2) == 0) {

            $this->errPass_2 = $err->getData("Register", "ERROR_PASSWORD");
            $this->error = true;

        }

        if (strlen($password) == 0) {

            $this->errPass = $err->getData("Register", "ERROR_PASSWORD");
            $this->error = true;

        }


        if ($email == "" || !preg_match("/@/", $email) ) {

            $this->errEmail = $err->getData("Register", "ERROR_EMAIL");
            $this->error = true;

        }




        if($this->error != true) {
            unset ($err);
            $this->RegUser($table, $login, $password, $email);
            $_SESSION["login"] = $login;
            header("Location: done.php");
            unset ($reg);
            exit;
        }
    }




   public function __destruct() {
       parent::__destruct();
   }
}


class authUser extends base {

    public $errorAuth;
    private $error = false;


    public function checkUsers ($login, $password) {
        $err = new message("text/message.ini");
        $this->selectTable(config::DB_TABLE_USERS, $login);
        $password = $this->hashPassword($password);

        if ($password != $this->user["password"]) {

           $this->errorAuth = $err->getData("Auth", "ERROR_AUTH");
           $this->error = true;

        }

        if (strlen($password) == 0 || strlen($login) == 0) {

            $this->errorAuth = $err->getData("Auth", "ERROR_AUTH_EMPTY");
            $this->error = true;

        }

        if ($this->error != true) {
           // $_SESSION["login"] = $login;
            //$_SESSION["password"] = $password;
            setcookie("password2", $password, time() + 60 + 60 + 24 * 360);
            setcookie("login2", $login, time() + 60 * 60 * 24 * 360);
            header("Location: index.php");

        }


    }



    public function __destruct() {
        parent::__destruct();
    }
}