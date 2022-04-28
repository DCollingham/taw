<?php

class EventContr extends Event {

    //Class properties
    private $location;
    private $date;


    public function __construct($location, $date){

        //Assigns variables to class properties                             
        $this->location = $location;
        $this->date = $date;   

    }

    public function newEvent(){
        //Checks for empty input and displays any errors
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        $this->addEvent($this->location, $this->date);
    }

    private function emptyInput(){

        if(empty($this->location) ||
           empty($this->date))
        {
            $result = false;
        } 
        else{
            $result = true;
        }

        return $result;
    }
}