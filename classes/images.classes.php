<?php

class Images extends Dbh {

    //Gets url & name from entries
    function getUrls($category_id){
        $stmt = $this->connect()->prepare("SELECT image.image_url, image.image_name, image.image_id, comp_entry.category_id_fk
                                           FROM image
                                           INNER JOIN comp_entry
                                           ON image.image_id = comp_entry.image_id_fk
                                           WHERE comp_entry.category_id_fk = ?;");

        if(!$stmt->execute(array($category_id))){
            print_r($stmt->errorInfo());
        }
        $result = $stmt->fetchAll();
        return $result;
        }

    //Diplays competitions entries into cards
    function displayImages($imageArr){
        foreach($imageArr as $imageUrl){

            echo'<div class="card comp-card">
            <img class="card-img-top img-fluid" img src="uploads/' . $imageUrl[0] . '"'. 'alt="'. $imageUrl[1] . '" >
            <div class="card-body">
                <p class="card-text">' . $imageUrl[1] .'</p>
            </div>
            </div>';
        }

    }

}






?>