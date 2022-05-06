<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $address = $_POST["address"];
    $postcode = $_POST["postcode"];
    $number = $_POST["number"];
    

    include "../classes/dbh.classes.php";
    include "../classes/member.classes.php";
    include "../classes/member.contr.classes.php";
    $member = new memberContr($first_name, $last_name, $address, $postcode, $number);

    //Signs up member
    $member->signupMember();
    header("location: ../index.php?error=none");
}
