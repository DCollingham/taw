<?php
//Class for interacting with database

class Login extends Dbh {


    protected function getUser($username, $pwd){
        $stmt = $this->connect()->prepare('SELECT * FROM member_login
                                           WHERE username = ?;');
         
        //Checks for sql error
         if(!$stmt->execute(array($username))){
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
        }
        //Checks for db username match
        if($stmt->rowCount() == 0)
        {
            $stmt = null;
            header("location: ../index.php?error=usernotfound");
            exit();
        }
        //Checks user password against database
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        $pwdMatch = password_verify($pwd, $result['password']);

        if($pwdMatch)
        {
            $_SESSION["username"] = $result['username'];
            header("location: ../index.php?error=none");
        } 
        else 
        {
            $stmt = null;
            header("location: ../login.php?error=wrongpassword");
        }

        

    }

}

  