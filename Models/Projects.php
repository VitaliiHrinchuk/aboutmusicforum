<?php
class Projects extends Model
{

    public function getProjects(){

        $sql = "SELECT * FROM `projects`";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $posts = $req->fetchAll();
            return $posts;
        }
        print($req->errorInfo()[2]);
    }


}
?>