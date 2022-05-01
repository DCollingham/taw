<?php

//Gets competitions by categories, either open or closed
class Category extends Dbh {

    function getCategory($status){
        $stmt = $this->connect()->prepare("SELECT * FROM comp_category WHERE status = ?;");

    //Checks for sql error
    if(!$stmt->execute(array($status))){
    $stmt = null;
    header("location: ../index.php?error=sqlfail");
    exit();
        }
    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $category;
    }  


    function setCatStatus($status, $category_id){
        $stmt = $this->connect()->prepare("UPDATE comp_category
                                           SET comp_category.status = :status 
                                           WHERE category_id = :category_id;");


    $stmt->bindValue(':status', $status, PDO::PARAM_STR);
    $stmt->bindValue(':category_id', $category_id, PDO::PARAM_INT);

    if(!$stmt->execute()){
        print_r($stmt->errorInfo());
    //$stmt = null;
    //header("location: ../index.php?error=sqlfail");
    //exit();
        }
    $category = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $category;
    }  

}
?>