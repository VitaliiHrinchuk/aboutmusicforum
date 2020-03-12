<?php
class Admin extends Model
{


    public function checkLoginExist($login)
    {
        $sql = "SELECT * FROM admins WHERE login = :login";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(['login' => $login]);

        return $req->rowCount() != 0;
    }

    public function getUserPassword($login)
    {
        $sql = "SELECT pass 
                FROM admins   
                WHERE login = :login";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(['login' => $login]);
        if ($result) {
            $data = $req->fetch();
            return array('pass' => $data['pass']);
        }
        print($req->errorInfo()[2]);
    }
    public function getPostsList()
    {
        $sql = "SELECT `id`, `theme`, `content`, `creation_date` FROM `posts` ORDER BY creation_date DESC";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getComment($id){
        $sql = "SELECT comments.`id`, `text`, CONCAT(users.name,\" \", users.surname) AS 'user', users.id AS userId, comments.creation_date AS 'date'
               FROM comments
               LEFT JOIN users ON user_id = users.id 
               LEFT JOIN posts ON post_id = posts.id 
               WHERE comments.id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $comments = $req->fetch();
            return $comments;
        }
        print($req->errorInfo()[2]);
    }
    public function editComment($id, $text){
        $sql = "UPDATE comments SET text = :text  WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id, "text" => $text]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function deleteComment($id){
        $sql = "DELETE FROM comments WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getUsers(){
        $sql = "SELECT `id`, `name`, `surname`, `email` FROM `users` ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getUserComments($id){
        $sql = "SELECT comments.`id`, `text`, CONCAT(users.name,\" \", users.surname) AS 'user', users.id AS userId, comments.creation_date AS 'date'
               FROM comments
               LEFT JOIN users ON user_id = users.id 
               LEFT JOIN posts ON post_id = posts.id 
               WHERE users.id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $comments = $req->fetchAll();
            return $comments;
        }
        print($req->errorInfo()[2]);
    }
    public function getUser($id){
        $sql = "SELECT CONCAT(surname, ' ', name) AS user, id FROM users WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $comments = $req->fetch();
            return $comments;
        }
        print($req->errorInfo()[2]);
    }
    public function deleteUser($id){
        $sql = "DELETE FROM users WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function createPost($theme, $content, $image){
        $sql = "INSERT INTO posts (theme, content, bg_img) VALUE (?,?,?)";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$theme, $content, $image]);
        if ($result)   return Database::getBdd()->lastInsertId();
        print($req->errorInfo()[2]);
    }
    public function editPost($id, $theme, $content, $image){
        $sql = "UPDATE posts SET theme = ?, content = ?, bg_img = ? WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$theme, $content, $image, $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getUserInfo($id){
        $sql = "SELECT  `name`, `surname` FROM `users` WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $comments = $req->fetch();
            return $comments;
        }
        print($req->errorInfo()[2]);
    }
    public function editUser($id, $name, $surname){
        $sql = "UPDATE users SET name = :name, surname = :surname  WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id, "name" => $name, "surname" => $surname]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getPost($id){
        $sql = "SELECT  `theme`, `content`, `bg_img` FROM `posts`  WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $comments = $req->fetch();
            return $comments;
        }
        print($req->errorInfo()[2]);
    }



    public function deletePost($id){
        $sql = "DELETE FROM posts WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }


}
?>