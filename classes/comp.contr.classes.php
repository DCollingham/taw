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
            header("location: ../create-comp.php?error=emptyInput");
            exit();
        }
        if($this->isValidDate($this->date) == false) {
            header("location: ../create-event.php?error=wrongDate");
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
        //https://stackoverflow.com/questions/19271381/correctly-determine-if-date-string-is-a-valid-date-in-that-format
        function isValidDate($date) {
            return date('d-m-Y', strtotime($date)) === $date;
        }
}