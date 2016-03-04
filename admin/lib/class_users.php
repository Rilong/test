<?php

require_once "class_config.php";
require_once "class_database.php";
require_once "class_view.php";
require_once "view/view_auth.php";
require_once "../core/class_message.php";
require_once "class_functions.php";

class users extends base {

    private $error = false;
    private $message;
    public $errors;
    public $view;
    //------------------
    private $ip;
    private $functions;

   public function __construct(){
       parent::__construct();
       $this->logout();

   }

    public function getAuth() {
       //print_r($_POST);
        $this->message = new message("../text/message.ini");
        $this->message->getData("Auth","ERROR_AUTH");
        $this->view = new view();
        $this->checkUser($_POST["login"], $_POST["password"]);
        $this->QuickEntry();
        $sr["errors"] = $this->errors;
        echo $this->view->getReplaceContent($sr, "tpl/auth");

    }

    private function QuickEntry () {



            if (isset($_POST["AutoSignIn"])) {
                $this->functions = new functions();
                $this->ip = ip2long($_SERVER["REMOTE_ADDR"]); // Get ip and ip to int
                $this->selectTableToArrayIP("saveUsers", $this->ip);

                if ($this->ip != $this->arrayTableIp["ip"]) {
                    $this->error = true;
                    $this->functions->Redirect("save.php");
                    exit;
                }

                if ($this->error != true) {



                    if (time() >= $this->arrayTableIp["deldate"]) {


                        $this->functions->Redirect("save.php");
                        $this->deleteIp();
                        exit;
                    } else {

                        setcookie("password", config::ADMIN_PASSWORD, time() + 60 * 30);
                        $this->functions->type = true;
                        $this->functions->Redirect($_SERVER["HTTP_REFERER"], $this->functions->type);
                        exit;

                    }

                }

        }

    }

    private function checkUser ($login, $password) {
      if (isset ($_POST["signIn"])){

          if ($login != config::ADMIN_LOGIN) {
              $this->errors = $this->message->getData("Auth","ERROR_AUTH");
              $this->error = true;
          }
          if ($this->hashPassword($password) != config::ADMIN_PASSWORD) {
              $this->errors = $this->message->getData("Auth","ERROR_AUTH");
              $this->error = true;
          }

          if ($this->error == true) {
              $sr["errors"] = $this->errors;

          }else {

              setcookie("password", $password, time() + 60 * 5);
              header("Location: ".$_SERVER["HTTP_REFERER"]);
              exit;
          }
      }



    }

    private function logout () {
        if(isset($_GET["logout"])) {
            setcookie("password","");
            unset($_COOKIE["password"]);
            header("Location: ".$_SERVER["HTTP_REFERER"]);
            exit;
        }

    }




}