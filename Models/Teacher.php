<?php
class Teacher extends Model{

    public function getTeacherShortInfo(){
        $sql = "SELECT `first_name`, `second_name`, `last_name`, `short_about`, `photo` FROM `teacher` ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if($result){
            $user = $req->fetch();
            return $user;
        }
        print($req->errorInfo()[2]);
    }
    public function getTeacherAllInfo(){
        $sql = "SELECT `first_name`, `second_name`, `last_name`,  `date_of_birth`, `education`, `work`, `exp`, `short_about`, `long_about`, `photo` FROM `teacher`  ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if($result){
            $user = $req->fetch();
            return $user;
        }
        print($req->errorInfo()[2]);
    }
    public function getSurname(){
        $sql = "SELECT `last_name`  FROM `teacher`  ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if($result){
            $user = $req->fetch();
            return $user;
        }
        print($req->errorInfo()[2]);
    }
    public function getCategories(){
//        $sql = "SELECT `id`, `name`, `content`, parent_id, IF(root.parent_id = NULL, NULL , (SELECT name FROM categories sub WHERE id = root.parent_id ))
//                AS parent_name
//                FROM `categories` root";
        $sql = "SELECT `id`, `name`, `content`, `parent_id` FROM `categories` WHERE ISNULL(parent_id)";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getSubCategories($id){

        $sql = "SELECT `id`, `name`, `content`, `parent_id` FROM `categories` WHERE parent_id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getCategory($id){

        $sql = "SELECT `id`, `name`, `content`, `parent_id` FROM `categories` WHERE id  = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $data = $req->fetch();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getContacts(){
        $sql = "SELECT `phone`, `email` FROM `teacher`";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $data = $req->fetch();
            return $data;
        }
        print($req->errorInfo()[2]);
    }

}
?>