<?php
class message {

    public $data;


    public function __construct($file) {

        $this->data = parse_ini_file($file, true);
    }


    public function getData($name, $errorName) {
      return $this->data[$name][$errorName];
    }

}