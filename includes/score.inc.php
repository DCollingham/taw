<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $first_place = $_POST["first"];
    $second_place = $_POST["second"];
    $third_place = $_POST["third"];

    include "../classes/dbh.classes.php";
    include "../classes/score.classes.php";
    include "../classes/score.contr.classes.php";
    $score = new ScoreContr($first_place, $second_place, $third_place);

    //print_r($score);
    $score->scorePoints();

    // header("location: ../index.php?error=none");
}