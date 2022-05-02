<?php


class Details extends Dbh {

function memberDetails($member_id){
    $stmt = $this->connect()->prepare('SELECT * FROM member WHERE member_id = ?;');
     
    //Checks for sql error

     if(!$stmt->execute(array($member_id))){
        $stmt = null;
        header("location: ../index.php?error=sqlfail");
        exit();
        }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }

    function getMemberId(){
        $stmt = $this->connect()->prepare('SELECT first_name, last_name, 
                                           login_id_fk, member_id
                                           FROM member;');
         
        //Checks for sql error
         if(!$stmt->execute()){
            print_r($stmt->errorInfo());
            //$stmt = null;
            //header("location: ../index.php?error=sqlfail");
           // exit();
            }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        }

}

