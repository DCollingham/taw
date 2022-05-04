<?php
//Class for interacting with database

class Signup extends Dbh {

    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare('SELECT login_id 
                                           FROM member_login 
                                           WHERE username = ? or email = ?;');

        //Checks if username/email is already taken
        if(!$stmt->execute(array($username, $email))){
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }

        if($stmt->rowCount() > 0){
            $result = false;
        }else {
            $result = true;
        }
        return $result;
    }

    protected function setUser($username, $pwd, $email, $account_type){
        $db = $this->connect();
        $stmt = $db->prepare('INSERT INTO member_login (username, password, email, account_type)
                                           VALUES (?, ?, ?, ?);');


        //Hashes password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
     
        if(!$stmt->execute(array($username, $hashedPwd, $email, $account_type))){
            $stmt = null;
            header("location: ../index.php?error=loginsqlfail");
            exit();
        }
        
        //Logs user in on account creation
        $member_id = $db->lastInsertId();
        if($member_id){
            session_start();
            $_SESSION["username"] = $username;
            $_SESSION["account_type"] = 'basic';
            $_SESSION["login_id"] = $member_id;
            $stmt = null;
            header("location: ../member.php?error=success");
        }



    }

}

  