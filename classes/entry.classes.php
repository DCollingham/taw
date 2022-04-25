<?php

class Entry extends Dbh {

    function setEntry($category_id, $image_name, $image_url, $login_id, $points){

        $db = $this->connect();
        $stmt = $db->prepare('INSERT INTO image (image_name, image_url) VALUES(?, ?);');
        
        if(!$stmt->execute(array($image_name, $image_url))){

            //Used for error checking if statement failed
            print_r(array($image_name, $image_url));
            print_r($stmt->errorInfo());
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
            }

        //Gets id of last inserted record
        $image_id_fk = $db->lastInsertId();
        
        //Insert entry into comp_entry table
        if($image_id_fk){
            $stmt = null;
            $stmt = $this->connect()->prepare('INSERT INTO comp_entry (category_id_fk, image_id_fk, login_id_fk, points) VALUES(?, ?, ?, ?);');
            if(!$stmt->execute(array($category_id, $image_id_fk, $login_id, $points))){
    
                //Used for error checking if statement failed
                print_r(array($category_id, $image_id_fk, $login_id, $points));
                print_r($stmt->errorInfo());
                $stmt = null;
                header("location: ../index.php?error=sqlfail");
                exit();   
            }
        }
    }
}