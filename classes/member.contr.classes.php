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
    
    //Checks for field errors
    public function signupMember(){

        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if($this->invalidName($this->first_name) == false) {
            header("location: ../member.php?error=invalidName");
            exit();   
        }
        if($this->invalidName($this->last_name) == false) {
            header("location: ../member.php?error=invalidName");
            exit();
        }
        if($this->invalidAddress($this->street_address) == false) {
            header("location: ../member.php?error=invalidAddress");
            exit();
        }
        if($this->invalidAddress($this->postcode) == false) {
            header("location: ../member.php?error=invalidAddress");
            exit();
        }
        if($this->isInt($this->number) == false) {
            header("location: ../member.php?error=invalidNumber");
            exit();
        }

        //If all checks pass, this runs and user details is added
        $this->setMember($this->first_name, $this->last_name, $this->street_address, $this->postcode, $this->number);
    }

    public function setUpdate($member_id){
        $this->updateMember($this->first_name, $this->last_name, $this->street_address, $this->postcode, $this->number, intval($member_id));
    }
    
    //Checks for empty input
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

    //Checks for invalid naming characters 
    private function invalidName($field){

        return ctype_alpha($field);
    }

    //Checks for special characters in street address
    private function invalidAddress($field){
        //https://stackoverflow.com/questions/3937569/preg-match-special-characters
            return !preg_match('/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/', $field);
        }

    //Checks phone number
    private function isInt($field){
            return intval($field);
        }
}


