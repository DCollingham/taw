<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $username = $_POST["username"];
    $pwd = $_POST["password"];


    require_once "../classes/dbh.classes.php";
    require_once "../classes/login.classes.php";
    require_once "../classes/login.contr.classes.php";

    //Logs user in
    $login = new LoginContr($username, $pwd);
    $login->loginUser();

}