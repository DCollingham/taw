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

            //Gets url & name from entries
    function getAllUrls(){
        $stmt = $this->connect()->prepare("SELECT image.image_url, image.image_name, image.image_id, comp_category.category
                                           FROM image
                                           INNER JOIN comp_entry
                                           ON image.image_id = comp_entry.image_id_fk
                                           INNER JOIN comp_category ON comp_entry.category_id_fk = comp_category.category_id;");

        if(!$stmt->execute(array())){
            print_r($stmt->errorInfo());
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
        }
        

    //Diplays competitions entries into cards
    function displayImages($imageArr){
        foreach($imageArr as $imageUrl){

            echo'<div class="card comp-card">
            <img class="card-img-top img-fluid" img src="uploads/' . $imageUrl['image_url'] . '"'. 'alt="'. $imageUrl['image_url'] . '" >
            <div class="card-body">
                <p class="card-text">' . $imageUrl['image_name']. "<br>No: ". $imageUrl['image_id'] .'</p>
            </div>
            </div>';
        }

    }

        //Gets images by member Id
        function getImages($member_id){
            $stmt = $this->connect()->prepare("SELECT image_name, image_url, comp_category.category, comp_category.date FROM image
                                                JOIN comp_entry on image.image_id = comp_entry.image_id_fk
                                                join member_login on comp_entry.login_id_fk = member_login.login_id
                                                join member on member_login.login_id = member.login_id_fk
                                                join comp_category on comp_entry.category_id_fk = comp_category.category_id
                                                WHERE member.member_id = ?;");
    
            if(!$stmt->execute(array($member_id))){
                print_r($stmt->errorInfo());
            }
            $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $result;
            }

}






?>