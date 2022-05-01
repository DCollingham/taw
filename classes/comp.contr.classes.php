<?php

class CompContr extends Comp {

    //Class properties
    private $category;
    private $date;
    private $status;

    public function __construct($category, $date, $status){

        //Assigns variables to class properties                             
        $this->category = $category;
        $this->date = $date;   
        $this->status = $status;

    }

    public function newCategory(){
        //Checks for empty input and displays any errors
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        $this->setCategory($this->category, $this->date, $this->status);
    }

    private function emptyInput(){

        if(empty($this->category) ||
           empty($this->date) ||
           empty($this->status))
        {
            $result = false;
        } 
        else{
            $result = true;
        }

        return $result;
    }
}