<?php

class MemberContr extends Member {

    //Class properties
    private $first_name;
    private $last_name;
    private $street_address;
    private $postcode;
    private $number;

    
    public function __construct($first_name, $last_name, $street_address, $postcode, $number){

        //Assigns variables to class properties                             
        $this->first_name = $first_name;
        $this->last_name = $last_name;   
        $this->street_address = $street_address;
        $this->postcode = $postcode;   
        $this->number = $number;   
    }

    public function signupMember(){
        //Checks for empty input and displays any errors
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }

        $this->setMember($this->first_name, $this->last_name, $this->street_address, $this->postcode, $this->number);
    }

    private function emptyInput(){

        if(empty($this->first_name) ||
           empty($this->last_name) ||
           empty($this->street_address) ||
           empty($this->postcode) ||
           empty($this->number))
        {
            $result = false;
        } 
        else{
            $result = true;
        }

        return $result;
    }
}