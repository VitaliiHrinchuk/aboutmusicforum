<?php
class Album extends Model
{

    public function getAlbums(){

        $sql = "SELECT `photo_url`, album.name FROM `album_photos` LEFT JOIN album ON album_id = album.id";
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