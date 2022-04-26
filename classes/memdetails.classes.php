<?php


class Details extends Dbh {

function memberDetails($member_id){
    $stmt = $this->connect()->prepare('SELECT *
                                        FROM member
                                        JOIN comp_entry ON member.login_id_fk = comp_entry.login_id_fk
                                        JOIN image on comp_entry.image_id_fk = image.image_id
                                        JOIN comp_category on comp_entry.category_id_fk = comp_category.category_id
                                        WHERE member.member_id = ?;');
     
    //Checks for sql error
     if(!$stmt->execute(array($member_id))){
        $stmt = null;
        header("location: ../index.php?error=sqlfail");
        exit();
        }
    $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $result;
    }
}