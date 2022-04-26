<?php

class EntryContr extends Entry{

        //Class properties
        private $category_id;
        private $image_name;
        private $image_url;
        private $login_id;
        private $points;


        public function __construct($category_id, $image_name, $image_url){

            //Assigns variables to class properties    
            session_start();                         
            $this->category_id = $category_id;
            $this->image_name = $image_name;
            $this->image_url = $image_url;
            $this->login_id = $_SESSION["login_id"];
            $this->points = 5;
        }


    private function emptyInput(){

        if(empty($this->category_id) ||
           empty($this->image_name) ||
           empty($this->image_url) ||
           empty($this->login_id))
        {
            $result = false;
        } 
        else{
            $result = true;
        }

        return $result;
    }

    public function Enter(){
        //Checks for empty input and displays any errors
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        $this->setEntry($this->category_id, $this->image_name, $this->image_url, $this->login_id, $this->points);
    }
}