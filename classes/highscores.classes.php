<?PHP

class Highscore extends Dbh {

    function getHighscores(){
        $stmt = $this->connect()->prepare('SELECT member.first_name, member.last_name, 
                                           SUM(points) as points
                                           FROM comp_entry
                                           JOIN member_login ON comp_entry.login_id_fk = member_login.login_id
                                           JOIN member ON member_login.login_id = member.login_id_fk
                                           GROUP BY member_login.login_id');

        //Checks for sql error
        if(!$stmt->execute()){
        $stmt = null;
        header("location: ../index.php?error=sqlfail");
        exit();
        }
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}





