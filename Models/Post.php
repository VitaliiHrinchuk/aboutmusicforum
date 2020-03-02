<?php
class Post extends Model
{

    public function getPostsList($offset, $title){
        $sqlOffset = $offset != null ? $offset : 0 ;
        $titleSearch = $title != null ? "WHERE theme LIKE ?" : "";
        $sql = "SELECT SQL_CALC_FOUND_ROWS id,(SELECT COUNT(*) FROM comments WHERE (post_id = posts.id)) AS comment_count, `id`, `theme`, `content`, `bg_img`, `creation_date` FROM `posts` $titleSearch ORDER BY creation_date DESC LIMIT 4 OFFSET $sqlOffset ";
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
    public function getLastPosts(){
        $sql = "SELECT SQL_CALC_FOUND_ROWS id,(SELECT COUNT(*) FROM comments WHERE (post_id = posts.id)) AS comment_count, `id`, `theme`, `content`, `bg_img`, `creation_date` FROM `posts`  ORDER BY creation_date DESC LIMIT 9 ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $posts = $req->fetchAll();
            $posts["count"] = $this->countRows();
            return $posts;
        }
        print($req->errorInfo()[2]);
    }
    public function getSinglePost($id){

        $sql = "SELECT `id`, `theme`, `content`, `bg_img`, `creation_date` FROM `posts` WHERE id = :id";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute(["id" => $id]);
        if ($result) {
            $posts = $req->fetch();
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

}
?>