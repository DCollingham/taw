<?php

class EventContr extends Event {

    public function newEvent($location, $date){
        //Checks for empty input and displays any errors
        if($this->emptyInput($location, $date) == false) {
            header("location: ../create-event.php?error=emptyInput");
            exit();
        }
        if($this->isValidDate($date) == false) {
            header("location: ../create-event.php?error=wrongDate");
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
    //https://stackoverflow.com/questions/19271381/correctly-determine-if-date-string-is-a-valid-date-in-that-format
    function isValidDate($date) {
        return date('d-m-Y', strtotime($date)) === $date;
    }
}