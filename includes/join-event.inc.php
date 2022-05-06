<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    session_start();
    $login_id = $_SESSION["login_id"]; 
    $event_id = $_POST['event_id'];

    require_once "../classes/dbh.classes.php";
    require_once "../classes/event.classes.php";
    
    //Joins an event
    $event = new Event();
    $event->joinEvent($login_id, $event_id);
    $eventArr = $event->viewEvents();
    header("location: ../join-event.php?error=noneEventJoined");
}