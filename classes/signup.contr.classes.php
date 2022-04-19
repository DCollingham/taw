<?php

class SignupContr extends Signup {

    //Class properties
    private $username;
    private $email;
    private $pwd;
    private $pwd_repeat;

    
    public function __construct($username, $email, $pwd, $pwd_repeat){

        //Assigns variables to class properties                             
        $this->username = $username;
        $this->email = $email;   
        $this->pwd = $pwd;
        $this->pwd_repeat = $pwd_repeat;   
    }

    public function signupUser(){
        //Checks for empty input and displays any errors
        if($this->emptyInput() == false) {
            header("location: ../index.php?error=emptyInput");
            exit();
        }
        if($this->alreadyTaken() == false) {
            header("location: ../index.php?error=alreadyTaken");
            exit();
        }

        $this->setUser($this->username, $this->pwd, $this->email);
    }

    private function emptyInput(){

        if(empty($this->username) ||
           empty($this->email) ||
           empty($this->pwd) ||
           empty($this->pwd_repeat))
        {
            $result = false;
        } 
        else{
            $result = true;
        }

        return $result;
    }

    private function alreadyTaken(){
        if(!$this->checkUser($this->username,$this->email))
        {
            $result = false;
        }
        else{
            $result = true;
        }
        return $result;
    }
}