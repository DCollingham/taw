<?php
//Class for interacting with database

class Event extends Dbh {

    //Adds event into shoot table
    protected function addEvent($location, $date){
        $stmt = $this->connect()->prepare('INSERT INTO shoot (location, date)
                                           VALUES (?, ?);');
       //Converts date format
       $newDate = date("Y-m-d", strtotime($date));  
        if(!$stmt->execute(array($location, $newDate))){
            print_r($stmt->errorInfo());
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }
        $stmt = null;

    }
    //Register a members to an event
    function joinEvent($login_id, $event_id){
        $stmt = $this->connect()->prepare('INSERT INTO member_shoot (login_id_fk, event_id_fk)
                                           VALUES (?, ?);');    
         
        if(!$stmt->execute(array($login_id, $event_id))){
            print_r($stmt->errorInfo());
            $stmt = null;
            //header("location: ../index.php?error=sqlfail");
            //exit();
        }
        $stmt = null;
    }
    //View all events
    function viewEvents(){

        $login_id =$_SESSION["login_id"];
        $today = gmdate("d-m-Y");
        //Select all events which are NOT attended already
        $stmt = $this->connect()->prepare('SELECT * FROM shoot
                                           WHERE NOT EXISTS 
                                           (SELECT * FROM member_shoot 
                                           WHERE member_shoot.event_id_fk = shoot.event_id 
                                           AND member_shoot.login_id_fk = :login_id)');

        $stmt->bindValue(':login_id', $login_id, PDO::PARAM_STR);
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    //view all events 
    function viewEventRange(){
       
        $stmt = $this->connect()->prepare("SELECT * FROM SHOOT ORDER BY date;");
         
        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }

        //header("location: ../index.php?error=added");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
    //Displays all events and any attending members
    function attending($event_id){
   
        $stmt = $this->connect()->prepare('SELECT member.first_name, member.last_name FROM member_shoot
                                           JOIN member_login ON member_shoot.login_id_fk = member_login.login_id
                                           JOIN member ON member_login.login_id = member.login_id_fk
                                           WHERE member_shoot.event_id_fk = ?;');
        
        if(!$stmt->execute(array($event_id))){
            print_r($stmt->errorInfo());
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }

        //header("location: ../index.php?error=added");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

}

  