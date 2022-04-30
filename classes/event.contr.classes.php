<?php

class EventContr extends Event {

    //Class properties
    // private $location;
    // private $date;


    // public function __construct($location, $date){

    //     //Assigns variables to class properties                             
    //     $this->location = $location;
    //     $this->date = $date;   

    // }

    public function newEvent($location, $date){
        //Checks for empty input and displays any errors
        if($this->emptyInput($location, $date) == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        $this->addEvent($location, $date);
    }

    private function emptyInput($location, $date){

        if(empty($location) ||
           empty($date))
        {
            $result = false;
        } 
        else{
            $result = true;
        }

        return $result;
    }
}