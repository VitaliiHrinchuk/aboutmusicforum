<?php
class Composers extends Model
{


    public function getComposers(){
        $sql = "SELECT * from composers";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $composers = $req->fetchAll();
            return $composers;
        }
        print($req->errorInfo()[2]);
    }
    public function addComposer($name, $desc, $dob, $dod, $avatar){
        $sql = "INSERT INTO composers (name, description, date_of_birth, date_of_death, avatar) VALUES (?,?,?, ?, ?)";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name, $desc, $dob, $dod, $avatar]);
        if ($result) return Database::getBdd()->lastInsertId();
        print($req->errorInfo()[2]);
    }
    public function editComposer($id,$name, $desc, $dob, $dod, $avatar){
        $sql = "UPDATE composers SET name = ?, description = ? , date_of_birth = ?, date_of_death = ?, avatar = ? WHERE id = ? ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name, $desc, $dob, $dod, $avatar,$id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getComposer($id){
        $sql = "SELECT * FROM composers WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$id]);
        if ($result) {
            $data = $req->fetch();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function delete($id){
        $sql = "DELETE FROM composers WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }



}
?>