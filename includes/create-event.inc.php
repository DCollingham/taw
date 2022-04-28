<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $location = $_POST["location"];
    $date = $_POST["date"];


    require_once "../classes/dbh.classes.php";
    require_once "../classes/event.classes.php";
    require_once "../classes/event.contr.classes.php";
    $event = new EventContr($location, $date);

    $event->newEvent();

    header("location: ../create-event.php?error=noneEntryAdded");
}