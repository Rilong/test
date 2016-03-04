<?php


class view {


    public function getContent($filename)
    {

        $text = file_get_contents($filename . ".tpl");

        return $text;
    }

    public function getReplaceContent($sr, $content) {
        return $this->getReplace($sr, $this->getContent($content));
    }

    private function getReplace($sr, $content){

        $search = array();
        $replace = array();
        $i = 0;

        foreach ($sr as $key => $value) {
            $search[$i] = "%$key%";
            $replace[$i] = $value;
            $i++;
        }

        return str_replace($search, $replace, $content);
    }

}