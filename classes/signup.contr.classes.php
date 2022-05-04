<?php

class SignupContr extends Signup {

    //Class properties
    private $username;
    private $email;
    private $pwd;
    private $pwd_repeat;
    private $account_type = 'basic';

    
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
            header("location: ../signup.php?error=emptyInput");
            exit();
        }
        if($this->alreadyTaken() == false) {
            header("location: ../signup.php?error=alreadyTaken");
            exit();
        }
        if($this->invalidEmail() == false) {
            header("location: ../signup.php?error=emailInvalid");
            exit();
        }
        if($this->invalidCharacters() == false) {
            header("location: ../signup.php?error=invalidCharacters");
            exit();
        }

        $this->setUser($this->username, $this->pwd, $this->email, $this->account_type);

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

    private function invalidEmail()
    {
        return filter_var($this->email, FILTER_VALIDATE_EMAIL); 
    }

    private function invalidCharacters()
    {
        return !preg_match('/[^A-Za-z0-9]/', $this->username); 
    }
    
}