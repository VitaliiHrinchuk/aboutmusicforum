<?php
class Compositions extends Model
{


    public function getCompositions(){
        $sql = "SELECT * from compositions";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $comments = $req->fetchAll();
            return $comments;
        }
        print($req->errorInfo()[2]);
    }
    public function addComposition($name, $desc, $link){
        $sql = "INSERT INTO compositions (name, description, link, created_at) VALUES (?,?,?, NOW())";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name, $desc, $link]);
        if ($result) return Database::getBdd()->lastInsertId();
        print($req->errorInfo()[2]);
    }
    public function setAttributes($id, $keys, $values){
        $this->deleteCompositionAttributes($id);
        $sql = "INSERT INTO compositions_attributes (id,composition_id, attr_key, attr_value) VALUES (?,?,?,?)";
        $req = Database::getBdd()->prepare($sql);
        foreach ($keys as $key => $attr_key){

            print_r($key);
            $result = $req->execute([$key, $id,$attr_key, $values[$key]]);
        }
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function updateComposition($id,$name, $desc, $link){
        $sql = "UPDATE compositions SET name = ?, description = ?, link = ?   WHERE id = ? ";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$name, $desc, $link, $id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function getAttributes($id){
        $sql = "SELECT * FROM compositions_attributes WHERE composition_id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$id]);
        if ($result) {
            $data = $req->fetchAll();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getComposition($id){
        $sql = "SELECT * FROM compositions WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$id]);
        if ($result) {
            $data = $req->fetch();
            return $data;
        }
        print($req->errorInfo()[2]);
    }
    public function getRabdCompositions(){
        $sql = "SELECT * from compositions ORDER BY rand() LIMIT 3";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute();
        if ($result) {
            $comments = $req->fetchAll();
            return $comments;
        }
        print($req->errorInfo()[2]);
    }
    private function deleteCompositionAttributes($id){
        $sql = "DELETE FROM compositions_attributes WHERE composition_id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function delete($id){
        $this->deleteCompositionAttributes($id);
        $sql = "DELETE FROM compositions WHERE id = ?";
        $req = Database::getBdd()->prepare($sql);
        $result = $req->execute([$id]);
        if ($result) return $result;
        print($req->errorInfo()[2]);
    }
    public function countTable(){
        $sql = "SELECT COUNT(*) as 'count' FROM `compositions`";
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