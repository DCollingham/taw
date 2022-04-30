<?php
//Class for interacting with database

class Event extends Dbh {


    protected function addEvent($location, $date){
        $stmt = $this->connect()->prepare('INSERT INTO shoot (location, date)
                                           VALUES (?, ?);');
       
       $newDate = date("Y-m-d", strtotime($date));  
        if(!$stmt->execute(array($location, $newDate))){
            print_r($stmt->errorInfo());
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }
        $stmt = null;

    }

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
        //header("location: ../index.php?error=added");
    }

    function viewEvents(){

        $today = gmdate("d-m-Y");
        $stmt = $this->connect()->prepare('SELECT * FROM SHOOT WHERE date >= ?');
        
        if(!$stmt->execute(array($today))){
            print_r($stmt->errorInfo());
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }

        //header("location: ../index.php?error=added");
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function viewEventRange($startDate, $endDate){

        
        $stmt = $this->connect()->prepare('SELECT * FROM SHOOT WHERE date >= ?');
        
        if(!$stmt->execute(array($startDate))){
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

  