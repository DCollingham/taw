<?php

class Entry extends Dbh {

    function setEntry($category_id, $image_name, $image_url, $member_id, $points){

        $stmt = $this->connect()->prepare('INSERT INTO image (image_name, image_url) VALUES(?, ?);');

        if(!$stmt->execute(array($image_name, $image_url))){

            //Used for error checking if statement failed
            print_r(array($image_name, $image_url));
            print_r($stmt->errorInfo());
            $stmt = null;
            header("location: ../index.php?error=sqlfail");
            exit();
            }
    }
}