<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $category_id = $_POST["category"];
    $image_name = $_POST["image_name"];
    $target_dir = "../uploads/";
    $url = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    include "../classes/dbh.classes.php";
    include "../classes/entry.classes.php";
    include "../classes/entry.contr.classes.php";
    $entry = new entryContr($category_id, $image_name, $url);

    $result = $entry->checkEntryAmount();
    if($result < 3){
      $entry->uploadImage($url);
      $entry->Enter();
    }
    else{
      header("location: ../upload.php?error=toomanyentries");
  }

}