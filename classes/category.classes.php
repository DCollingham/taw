<?php

class Category extends Dbh {

    function getCategory($status){
        $stmt = $this->connect()->prepare("SELECT * FROM comp_category WHERE status = ?;");

    //Checks for sql error
    if(!$stmt->execute(array($status))){
    $stmt = null;
    header("location: ../index.php?error=sqlfail");
    exit();
        }
    $category = $stmt->fetchAll();
    return $category;
    }  
}

?>