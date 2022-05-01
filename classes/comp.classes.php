<?php
//Class for interacting with database


class Comp extends Dbh {

    protected function setCategory($category, $date, $status){
        $stmt = $this->connect()->prepare('INSERT INTO comp_category (category, date, status)
                                           VALUES (?, ?, ?);');
       
       $newDate = date("Y-m-d", strtotime($date));  
       print_r($newDate);
        if(!$stmt->execute(array($category, $newDate, $status))){
            print_r($stmt->errorInfo());
            $stmt = null;
            //header("location: ../index.php?error=sqlfail");
            exit();
        }
        $stmt = null;

    }

}

  