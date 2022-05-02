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

    function viewEventRange($startDate, $endDate){

        
        $stmt = $this->connect()->prepare("SELECT * FROM SHOOT ORDER BY date;");
        

        // "SELECT * FROM SHOOT where date between :start and :end;"
        //converts string to date and binds parameters
        // $sDate = date('Y-m-d', $startDate);
        // $eDate = date('Y-m-d', $endDate);
        // $stmt->bindValue(':start',$sDate, PDO::PARAM_STR);
        // $stmt->bindValue(':end', $eDate, PDO::PARAM_STR);
        
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

  