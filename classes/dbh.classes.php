<?php

class Dbh {
    //Allows extended classses to access
    protected function connect(){      
        try {
            $username = "root";
            $password = "";
            $Dbh = new PDO('mysql:host=localhost;dbname=taw',$username, $password);
            return $Dbh;
        }
        //Catch error as variable e and display error message
        catch(PDOException $e){
            print "Error: " . $e->getMessage() . "<br/>";
            die();
        }
    }
}