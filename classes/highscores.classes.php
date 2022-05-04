<?PHP

class Highscore extends Dbh {

    function getHighscores(){
        $stmt = $this->connect()->prepare('SELECT member.first_name, member.last_name, 
                                           SUM(points) as points
                                           FROM comp_entry
                                           JOIN member_login ON comp_entry.login_id_fk = member_login.login_id
                                           JOIN member ON member_login.login_id = member.login_id_fk
                                           GROUP BY member_login.login_id
                                           ORDER BY points DESC');

        //Checks for sql error
        if(!$stmt->execute()){
        $stmt = null;
        header("location: ../index.php?error=sqlfail");
        exit();
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    function getCatScores($category_id){
        $stmt = $this->connect()->prepare('SELECT member.first_name, member.last_name, comp_category.category,
                                            SUM(points) as points
                                            FROM comp_entry
                                            JOIN member_login ON comp_entry.login_id_fk = member_login.login_id
                                            JOIN member ON member_login.login_id = member.login_id_fk
                                            JOIN comp_category ON comp_entry.category_id_fk = comp_category.category_id
                                            WHERE comp_entry.category_id_fk = ? 
                                            GROUP BY member_login.login_id');

        //Checks for sql error
        if(!$stmt->execute(array($category_id))){
       $stmt = null;
       header("location: ../index.php?error=sqlfail");
       exit();
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}





