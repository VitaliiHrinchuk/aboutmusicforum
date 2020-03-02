<?php
class AlbumController extends Controller{
    function index(){
        $this->checkUser();
        require(ROOT. "Models/Album.php");
        $album = new Album();
        $photos = $album->getAlbums();
        $result = array();
        foreach ($photos as $photo){
            $result[$photo["name"]][] = $photo["photo_url"];
        }
        $viewData["albums"] = $result;
        $this->set($viewData);
        $this->render("album");

    }
}
?>