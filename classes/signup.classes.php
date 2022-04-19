<?php
//Class for interacting with database

class Signup extends Dbh {

    protected function checkUser($username, $email){
        $stmt = $this->connect()->prepare('SELECT member_id 
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

    protected function setUser($username, $pwd, $email){
        $stmt = $this->connect()->prepare('INSERT INTO member_login (username, password, email)
                                           VALUES (?, ?, ?);');
        //Hashes password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
     
        if(!$stmt->execute(array($username, $hashedPwd, $email))){
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }
        $stmt = null;

    }

}

  