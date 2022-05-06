<?php

class LoginContr extends Login {

        //Class properties
        private $username;
        private $pwd;

        public function __construct($username, $pwd){

            //Assigns variables to class properties                             
            $this->username = $username;
            $this->pwd = $pwd;
        }


    private function emptyInput(){

        if(empty($this->username) ||
           empty($this->pwd))
        {
            $result = false;
        } 
        else{
            $result = true;
        }

        return $result;
    }

    public function loginUser(){
        //Checks for empty input and displays any errors
        if($this->emptyInput() == false) {
            header("location: ../login.php?error=emptyInput");
            exit();
        }
        $this->getUser($this->username, $this->pwd);
    }
}