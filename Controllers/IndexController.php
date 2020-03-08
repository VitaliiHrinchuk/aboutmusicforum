<?php
class IndexController extends Controller{
    function index(){
        $this->checkUser();

        require(ROOT . "Models/Post.php");
        $post = new Post();

        $posts  = $post->getLastPosts();


        $viewData['countOffset'] = $posts["count"];
        unset($posts['count']);
        $viewData["posts"] = $posts;


        $this->set($viewData);
        $this->render("index");

    }
}
?>