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
        if ($result) return $result;
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
    public function getAlbumList()
    {
        $sql = "SELECT `id`, `name`, `creation_date` FROM `album` ORDER BY creation_date DESC";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getTeacher(){
        $sql = "SELECT * FROM `teacher`";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $data = $req->fetch();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function updateTeacher($data){
        $sql = "UPDATE `teacher` SET `first_name`=:first_name,`second_name`=:second_name,
                `last_name`=:last_name,`email`=:email,`phone`=:phone,`date_of_birth`=:date_of_birth,
                `education`=:education,`work`=:work,`exp`=:exp,`short_about`=:short_about,
                `long_about`=:long_about,`photo`=:photo WHERE id = 1";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute($data);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getAlbum($id){
        $sql = "SELECT name FROM `album` WHERE id  = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $data = $req->fetch();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getAlbumPhotos($id){
        $sql = "SELECT `id`, `photo_url` FROM `album_photos` WHERE album_id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function uploadPhoto($id, $photo){
        $sql = "INSERT INTO album_photos (album_id, photo_url) VALUES(?,?)";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$id, $photo]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function updateAlbum($id, $name){
        $sql = "UPDATE album SET name = :name  WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id, "name" => $name]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function deletePhoto($id){
        $sql = "DELETE FROM album_photos WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function deleteAlbum($id){
        $sql = "DELETE FROM album WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function createAlbum(){
        $sql = "INSERT INTO album (name) VALUES ('Без назви')";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) return Database::getBdd()->lastInsertId();
        print($req->errorInfo()[2]);
    }
    public function getProjectsList(){
        $sql = "SELECT * FROM `projects`";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getProject($id){
        $sql = "SELECT * FROM `projects` WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $data = $req->fetch();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function deleteProject($id){
        $sql = "DELETE FROM projects WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function deletePost($id){
        $sql = "DELETE FROM posts WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function addProject($name, $file){
        $sql = "INSERT INTO projects (project_name, filename) VALUE (?,?)";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name, $file]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function editProject($id, $name){
        $sql = "UPDATE projects SET project_name = ? WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name, $id]);
        if ($result) return $result;
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
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getCatName($id){

        $sql = "SELECT `id`, `name` FROM `categories` WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $data = $req->fetch();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function deleteCategory($id){
        $sql = "DELETE FROM categories WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function addCategory($name, $content, $parent){
        $sql = "INSERT INTO categories (name, content, parent_id) VALUE (?,?, ?)";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name, $content, $parent]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getCategory($id){

        $sql = "SELECT `id`, `name`, content, parent_id FROM `categories` WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $data = $req->fetch();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function updateCategory($id,$name, $content, $parent){
        $sql = "UPDATE categories SET name = ?, content = ?, parent_id = ?  WHERE id = ? ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name, $content, $parent,$id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
}
?>