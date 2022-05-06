<?php

//Checks if form is submitted
if(isset($_POST["submit"]))
{
    //Gets data from form
    $first_place = $_POST["first"];
    $second_place = $_POST["second"];
    $third_place = $_POST["third"];
    $category_id = $_POST["submit"];
    
    include "../classes/dbh.classes.php";
    include "../classes/score.classes.php";
    include "../classes/score.contr.classes.php";
    include "../classes/category.classes.php";
    $score = new ScoreContr($first_place, $second_place, $third_place);
    
    //Scores photos and closes competition
    $score->scorePoints();
    $categories = new Category();
    $categories->setCatStatus('closed', $category_id);
    header("location: ../winners.php?error=none");
}