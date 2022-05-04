<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $category = $_POST["category"];
    $date = $_POST["date"];
    $status = $_POST["status"];

    include "../classes/dbh.classes.php";
    include "../classes/comp.classes.php";
    include "../classes/comp.contr.classes.php";
    $category = new CompContr($category, $date, $status);

    //passed member object to member method
    $category->newCategory();

    header("location: ../create-comp.php?error=noneCompCreated");
}