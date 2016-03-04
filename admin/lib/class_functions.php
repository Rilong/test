<?php

class functions {

    public $type;


    public function Redirect ($url, $type = false) {

        if ($type == true) header("Location: $url");
        elseif ($type == false) header("Location: ".$url);
    }
}