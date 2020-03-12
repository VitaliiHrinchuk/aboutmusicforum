<?php
class PostController extends Controller{
    function index(){
        $this->checkUser();
        require(ROOT . "Models/Post.php");
        $post = new Post();
        require (ROOT.'Models/Categories.php');
        $categories = new Categories();
        if(!empty($_GET)){
            $title = isset($_GET["title"]) && !empty($_GET["title"]) ? $_GET["title"] : null;
            if(isset($_GET["offset"])){
                $posts  = $post->getPostsList($_GET["offset"],$title);
            } else {
                $posts  = $post->getPostsList(null, $title);
            }
        } else {
            $posts  = $post->getPostsList(null, null);
        }

        $viewData['countOffset'] = $posts["count"];
        unset($posts['count']);
        foreach ($posts as &$post){
            $post['categories'] = $categories->getByPost($post['id']);
        }
        $viewData["posts"] = $posts;

        $this->set($viewData);
        $this->render("postList");

    }

    function read($id){

        require(ROOT . "Models/Post.php");
        require(ROOT . "Models/Comments.php");
        require (ROOT.'Models/Categories.php');
        $categories = new Categories();
        $comments = new Comments();
        $post = new Post();
        $singlePost = $post->getSinglePost($id);
        $viewData = $singlePost;
        $viewData['categories'] = $categories->getByPost($id);
        $viewData["isAuthorized"] = false;
        if($this->checkUser()){
            $viewData["isAuthorized"] = true;
        }
        $viewData["comments"] = $comments->getComments($id);
        $this->set($viewData);
        $this->render("single");
    }
    function comment($id){
        if($this->checkUser()){
            require(ROOT . "Models/Comments.php");
            $comment = new Comments();
            if(isset($_POST["text"])){
                $this->secure_form($_POST);
                $comment->addComment($_SESSION["id"], $id, $_POST["text"]);

            }
            header('Location: '.HOST.'post/read/'.$id);
        } else {
            header('Location: '.HOST.'login');
        }
    }
}
?>