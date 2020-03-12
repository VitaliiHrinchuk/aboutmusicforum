<?php
class Categories extends Model
{
    public function getCategories(){

        $sql = "SELECT `id`, `name` FROM `categories` ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $data = $req->fetchAll();
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
    public function addCategory($name){
        $sql = "INSERT INTO categories (name) VALUE (?)";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }

    public function updateCategory($id,$name ){
        $sql = "UPDATE categories SET name = ?  WHERE id = ? ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name, $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    private function deletePostCategories($id){
        $sql = "DELETE FROM posts_categories WHERE post_id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$id]);
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function addPostCategory($post_id, $categories){
        $this->deletePostCategories($post_id);
        $sql = "INSERT INTO posts_categories (post_id, category_id) VALUE (?, ?)";
        $req = Database::getBdd()->prepare($sql);
        foreach ($categories as $category){
            $category_id = $category['id'];
            $result = $req->execute([$post_id, $category_id]);
        }
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getByPost($id){
        $sql = "SELECT categories.`id`, categories.`name` 
                FROM `posts_categories` 
                LEFT JOIN categories ON categories.id = category_id
                WHERE post_id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$id]);
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }

}
?>