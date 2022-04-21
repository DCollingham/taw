<?php
//Class for interacting with database

class Member extends Dbh {


    protected function setMember($first_name, $last_name, $street_address, $postcode, $number){
        $stmt = $this->connect()->prepare("INSERT INTO `member`(`first_name`, `last_name`, `street_address`,
                                                       `postcode`, `number`, `login_id_fk`) 
                                                        VALUES (?,?,?,?,?,?);");
        session_start();
        $login_id_fk = $_SESSION['member_id'];
        // Executes the prepared statement and checks returned value
        if(!$stmt->execute(array($first_name, $last_name, $street_address, $postcode, $number, $login_id_fk))){

            //Used for error checking if statement failed
            //print_r(array($first_name, $last_name, $street_address, $postcode, $number, $login_id_fk));
            //print_r($stmt->errorInfo());
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
            }
           
        //Upgrades account to full if member details are correct
        $stmt = null;  
        $account_type = 'full';
        $stmt = $this->connect()->prepare("UPDATE `member_login` SET `account_type`=:account_type WHERE `member_id`=:member_id"); 
        $stmt->bindParam(':member_id', $login_id_fk, PDO::PARAM_INT);
        $stmt->bindParam(':account_type', $account_type);

        if($stmt->execute()) {
            session_start();
            $_SESSION["account_type"] = $account_type;
            header("location: ../index.php?error=success");
            exit();
       } else {
        $stmt = null;
        header("location: ../index.php?error=accountUpdateFail");
        exit();
       }


    }
}