<?php
class Thread extends Model
{

    public function getThreadsList($offset, $title){
        $sqlOffset = $offset != null ? $offset : 0 ;
        $titleSearch = $title != null ? "WHERE title LIKE ?" : "";
        $sql = "SELECT SQL_CALC_FOUND_ROWS id,(SELECT COUNT(*) FROM thread_messages WHERE (thread_id = threads.id)) AS comment_count, `id`, `title`, `description`,  `created_at` FROM `threads` $titleSearch ORDER BY created_at DESC LIMIT 6 OFFSET $sqlOffset ";
        $req = Database::getBdd()->prepare($sql);
        $params = array();
        if($title != null) $params[] = '%'.$title.'%';
        $result = $req->execute($params);
        if ($result) {
            $posts = $req->fetchAll();
            $posts["count"] = $this->countRows();
            return $posts;
        }
        print($req->errorInfo()[2]);
    }
    public function createThread($author, $title, $description){
        $sql = "INSERT INTO threads (author_id, title, description, created_at) VALUE (?,?,?, now())";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$author, $title, $description]);
        if ($result) return Database::getBdd()->lastInsertId();
        print($req->errorInfo()[2]);
    }
    public function getSingleThread($id){

        $sql = "SELECT users.name as author, users.id as author_id, threads.`id`, `title`, `description`,  `created_at`, `author_id` 
                FROM `threads` 
                LEFT JOIN users ON users.id = author_id  
                WHERE threads.id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) {
            $posts = $req->fetch();
            return $posts;
        }
        print($req->errorInfo()[2]);
    }
    public function getComments($id){
        $sql = "SELECT thread_messages.`id`, `text`, CONCAT(users.name,\" \", users.surname) AS 'user', users.id AS userId, thread_messages.created_at AS 'date'
               FROM thread_messages
               LEFT JOIN users ON author_id = users.id 
               LEFT JOIN threads ON thread_id = threads.id 
               WHERE thread_id = :id ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id"=>$id]);
        if ($result) {
            $comments = $req->fetchAll();
            return $comments;
        }
        print($req->errorInfo()[2]);
    }
    public function addComment($userId, $postId, $text){

        $sql = "INSERT INTO thread_messages (author_id, thread_id, text, created_at) VALUES (?,?,?, NOW())";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$userId, $postId, $text]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getRandomThreads(){
        $sql = "SELECT  `id`, `title` FROM `threads` ORDER BY RAND() LIMIT 5";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $posts = $req->fetchAll();
            return $posts;
        }
        print($req->errorInfo()[2]);
    }

    private function countRows(){
        $sql = "SELECT FOUND_ROWS() AS 'count'";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if($result){
            $count = $req->fetch();
            return $count['count'];
        }
    }
    public function countTable(){
        $sql = "SELECT COUNT(*) as 'count' FROM `threads`";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $table = $req->fetch();
            return $table['count'];;
        }
        print($req->errorInfo()[2]);
    }
}
?>