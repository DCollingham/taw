<?php

//Image upload from 
//https://www.w3schools.com/php/php_file_upload.asp

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $category_id = $_POST["category"];
    $image_name = $_POST["image_name"];
    $target_dir = "../uploads/";
    $url = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    include "../classes/dbh.classes.php";
    include "../classes/entry.classes.php";
    include "../classes/entry.contr.classes.php";
    $entry = new entryContr($category_id, $image_name, $url);

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
  && $imageFileType != "gif" ) {
  header("location: ../upload.php?error=wrongImageFormat");
} else {
  //Checks entry amount
  $result = $entry->checkEntryAmount($category_id);
  if($result < 3){
    $entry->uploadImage($url);
    $entry->Enter();
  }
  else{
    header("location: ../upload.php?error=toomanyentries");
      }
    }
}