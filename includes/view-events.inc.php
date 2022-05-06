<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $startDate = $_POST["startDate"];
    $endDate = $_POST["endDate"];


    require_once "../classes/dbh.classes.php";
    require_once "../classes/event.classes.php";
    require_once "../classes/event.contr.classes.php";

    //Displays events
    $event = new EventContr();
    $event->viewEventRange();
}