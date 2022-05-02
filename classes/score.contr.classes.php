<?php


class ScoreContr extends Score {

    //Class properties
    private $first_place;
    private $second_place;
    private $third_place;
    private $first_place_points = 20;
    private $second_place_points = 15;
    private $third_place_points = 10;

    public function __construct($first_place, $second_place, $third_place){

        //Assigns variables to class properties                             
        $this->first_place = $first_place;
        $this->second_place = $second_place;   
        $this->third_place = $third_place;  
    }

    public function scorePoints(){
        //Checks for empty input and displays any errors
        if($this->emptyInput() == false) {
            header("location: ../select-category.php?error=emptyInput");
            exit();
        }
        if($this->placeTaken() == false) {
            header("location: ../select-category.php?error=placeTaken");
            exit();
        }
        $this->setPoints($this->first_place_points, $this->first_place);
        $this->setPoints($this->second_place_points, $this->second_place);
        $this->setPoints($this->third_place_points, $this->third_place);
    }

    private function emptyInput(){

        if(empty($this->first_place) ||
           empty($this->second_place) ||
           empty($this->third_place))
        {
            $result = false;
        } 
        else{
            $result = true;
        }

        return $result;
    }

    private function placeTaken(){

        if($this->first_place == $this->second_place ||
           $this->second_place == $this->third_place ||
           $this->first_place == $this->third_place) {
            $result = false;
           }
           else{
            $result = true;
           }
           return $result;
        }
    }