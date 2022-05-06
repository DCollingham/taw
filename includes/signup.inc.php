<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $username = $_POST["username"];
    $email = $_POST["email"];
    $pwd = $_POST["pwd"];
    $pwd_repeat = $_POST["pwd_repeat"];

    include "../classes/dbh.classes.php";
    include "../classes/signup.classes.php";
    include "../classes/signup.contr.classes.php";
    $signup = new SignupContr($username, $email, $pwd, $pwd_repeat);

    //Signs up user
    $signup->signupUser();

}
