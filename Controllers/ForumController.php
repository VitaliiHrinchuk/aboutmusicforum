<?php
class ForumController extends Controller{
    function index(){
        $this->checkUser();
        require(ROOT . "Models/Thread.php");
        $thread = new Thread();
        if(!empty($_GET)){
            $title = isset($_GET["title"]) && !empty($_GET["title"]) ? $_GET["title"] : null;
            if(isset($_GET["offset"])){
                $threads  = $thread->getThreadsList($_GET["offset"],$title);
            } else {
                $threads  = $thread->getThreadsList(null, $title);
            }
        } else {
            $threads  = $thread->getThreadsList(null, null);
        }

        $viewData['countOffset'] = $threads["count"];
        unset($threads['count']);
        $viewData["threads"] = $threads;

        $this->set($viewData);

        $this->render("forumList");

    }
    function read($id){
        require(ROOT . "Models/Thread.php");

        $post = new Thread();
        $singleThread = $post->getSingleThread($id);
        $viewData = $singleThread;
        $viewData["isAuthorized"] = false;
        if($this->checkUser()){
            $viewData["isAuthorized"] = true;
        }
        $viewData["comments"] = $post->getComments($id);
        $viewData['randomThreads'] = $post->getRandomThreads();
        $this->set($viewData);
        $this->render("thread");
    }
    function create(){
        if($this->checkUser()){
            if(!empty($_POST)){
                require(ROOT . 'Models/Thread.php');
                $thread = new Thread();

                if(!isset($_POST["title"]) || empty($_POST["title"]) || !isset($_POST["description"])) header('Location:'.$_SERVER['HTTP_REFERER']);
                $result = $thread->createThread($_SESSION["id"],$_POST["title"], $_POST["description"]);
                if($result) {

                    header('Location:'.HOST.'forum/read/'.$result);
                }
            } else {
                $this->render("create");
            }

        } else {
            header('Location:'.HOST.'');
        }
    }
    function comment($id){
        if($this->checkUser()){
            require(ROOT . "Models/Thread.php");
            $comment = new Thread();
            if(isset($_POST["text"])){
                $this->secure_form($_POST);
                $comment->addComment($_SESSION["id"], $id, $_POST["text"]);

            }
            header('Location: '.HOST.'forum/read/'.$id);
        } else {
            header('Location: '.HOST.'login');
        }
    }
}
?>