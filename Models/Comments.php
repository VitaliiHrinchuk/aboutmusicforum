<?php
class Comments extends Model
{

    public function addComment($userId, $postId, $text){

        $sql = "INSERT INTO comments (user_id, post_id, text, creation_date) VALUES (?,?,?, NOW())";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$userId, $postId, $text]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getComments($id){
        $sql = "SELECT comments.`id`, `text`, CONCAT(users.name,\" \", users.surname) AS 'user', users.id AS userId, comments.creation_date AS 'date'
               FROM comments
               LEFT JOIN users ON user_id = users.id 
               LEFT JOIN posts ON post_id = posts.id 
               WHERE post_id = :id ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $comments = $req->fetchAll();
            return $comments;
        }
        print($req->errorInfo()[2]);
    }


}
?>