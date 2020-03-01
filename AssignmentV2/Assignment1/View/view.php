<?php
//View class that handles all view outputs
class View{
    private $text; //current view

    public function __construct($text){
        $this->text=$text;
    }

    //upddate the view
    public function updateText($text){
        $this->text =$text;
    }

    //display the view
    public function output(){
        return $this->text;
    }
}
?>