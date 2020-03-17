<?php
class IndexController extends Controller{
    function index(){
        $this->checkUser();
        require (ROOT.'Models/Categories.php');
        require(ROOT . "Models/Post.php");
        require(ROOT . "Models/Compositions.php");
        require(ROOT . "Models/Thread.php");
        require(ROOT . "Models/User.php");
        require(ROOT . "Models/Composers.php");
        $thread = new Thread();
        $user = new User();
        $composers = new Composers();

        $post = new Post();
        $categories = new Categories();
        $compositionsModel = new Compositions();
        $posts  = $post->getLastPosts();

        $postsCount = $post->countTable();
        $threadsCount = $thread->countTable();
        $usersCount = $user->countTable();
        $composersCount = $composers->countTable();
        $compositionsCount = $compositionsModel->countTable();

        $viewData['countOffset'] = $posts["count"];
        unset($posts['count']);
        foreach ($posts as &$post){
            $post['categories'] = $categories->getByPost($post['id']);
        }
        $compositions = $compositionsModel->getRabdCompositions();
        foreach ($compositions as &$composition){
            $composition['attributes'] = $compositionsModel->getAttributes($composition['id']);
        }
        $viewData["posts"] = $posts;
        $viewData['compositions'] = $compositions;
        $viewData['counts'] = [
            'posts' => $postsCount,
            'threads' => $threadsCount,
            'users' => $usersCount,
            'composers' => $composersCount,
            'compositions' => $compositionsCount
        ];
        $this->set($viewData);
        $this->render("index");

    }
}
?>