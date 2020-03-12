<?php
class AdminController extends Controller{
    function __construct(){
        $this->layout = "admin";
    }
    function index(){
        if($this->checkIsAdmin()){
            header('Location:'.HOST.'admin/postList');
        } else {
            header('Location:'.HOST.'admin/login');
        }

    }
    function login(){
        if(!$this->checkIsAdmin()){
            if(!empty($_POST)){
                $postNeedsData = array('login', 'password');

                if($this->checkPostData($postNeedsData)) {
                    $this->secure_form($_POST);
                    require(ROOT . 'Models/Admin.php');
                    $auth = new Admin();
                    $login = $_POST['login'];
                    if (!$auth->checkLoginExist($login)) {
                        echo json_encode(array('success' => 0, 'error' => 'Невірно введений логін'));
                        return;
                    }
                    $formPassword = $_POST['password'];
                    $user = $auth->getUserPassword($login);
                    $userPassword = $user['pass'];
                    if (password_verify($formPassword, $userPassword)) {
                        session_destroy();
                        session_start();
                        $_SESSION['isAdmin'] = true;
                        echo json_encode(array('success' => 1));
                    } else {
                        echo json_encode(array('success' => 0, 'error' => 'Невірний пароль'));
                    }
                } else {
                    echo json_encode(array('success' => 0, 'error' => 'Потрібно заповнити всі поля'));
                }
            } else {
                $this->layout = "default";
                $this->render("login");
            }
        } else {
            header('Location:'.HOST.'admin/postList');
        }
    }
    function postList(){
        if(!$this->checkIsAdmin()) header('Location:'.HOST.'admin/login');
        require (ROOT.'Models/Admin.php');
        $admin = new Admin();
        $viewData["posts"] = $admin->getPostsList();
        $this->set($viewData);
        $this->render("posts-list");
    }
    function logout(){
        if($this->checkIsAdmin()){
            session_destroy();
            header('Location: '.HOST);
        } else {
            header('Location: '.HOST.'admin/login');
        }
    }
    function comments($id){
        if($this->checkIsAdmin()){
            require(ROOT . 'Models/Comments.php');
            $admin = new Comments();
            $viewData["comments"] = $admin->getComments($id);
            $this->set($viewData);
            $this->render("comments");
        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function editComment($id){
        if($this->checkIsAdmin()){
            require(ROOT . 'Models/Admin.php');
            $admin = new Admin();
            if(empty($_POST)){

                $viewData["comment"] = $admin->getComment($id);
                $this->set($viewData);
                $this->render("comment-edit");
            } else {
                if(isset($_POST["text"])){
                    $text = $_POST["text"];
                    $result = $admin->editComment($id, $text);
                    if($result){
                        header('Location:'.HOST.'admin/postList');
                    }
                }
            }

        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function deleteComment($id){
        if($this->checkIsAdmin()){
            require(ROOT . 'Models/Admin.php');
            $admin = new Admin();
            $result = $admin->deleteComment($id);
            if($result)header('Location:'.$_SERVER['HTTP_REFERER']);

        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function users(){
        if($this->checkIsAdmin()){
            require(ROOT . 'Models/Admin.php');
            $admin = new Admin();
            $viewData["users"] = $admin->getusers();
            $this->set($viewData);
            $this->render("users");

        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function userComments($id){
        if($this->checkIsAdmin()){
            require(ROOT . 'Models/Admin.php');
            $admin = new Admin();
            $viewData["user"] = $admin->getUser($id);
            $viewData["comments"] = $admin->getUserComments($id);
            $this->set($viewData);
            $this->render("user-comments");
        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function deleteUser($id){
        if($this->checkIsAdmin()){
            require(ROOT . 'Models/Admin.php');
            $admin = new Admin();
            $result = $admin->deleteUser($id);
            if($result)header('Location:'.$_SERVER['HTTP_REFERER']);
        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function deletePost($id){
        if($this->checkIsAdmin()){
            require(ROOT . 'Models/Admin.php');
            $admin = new Admin();
            $result = $admin->deletePost($id);
            if($result)header('Location:'.$_SERVER['HTTP_REFERER']);
        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function userEdit($id){
        if($this->checkIsAdmin()){
            require(ROOT . 'Models/Admin.php');
            $admin = new Admin();
            if(empty($_POST)){

                $viewData = $admin->getUserInfo($id);
                $this->set($viewData);
                $this->render("user-edit");
            } else {
                if(isset($_POST["name"]) && isset($_POST["surname"])){

                    $result = $admin->editUser($id,$_POST["name"], $_POST["surname"]);
                    if($result){
                        header('Location:'.HOST.'admin/users');
                    }
                }


            }

        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function post($id){
        if($this->checkIsAdmin()){
            require (ROOT."Models/Admin.php");
            $admin = new Admin();
            require (ROOT.'Models/Categories.php');

            $categories = new Categories();
            if(!empty($_POST)){
                if(file_exists($_FILES['bg']['tmp_name'])){
                    print_r($_FILES);
                    $bg = $this->saveImage($id, $_FILES['bg']['tmp_name'],"posts/");

                } else {

                    $bg = $_POST["bg_old"];

                }
                if(!isset($_POST["content"]) || empty($_POST["content"]) || !isset($_POST["theme"])) header('Location:'.$_SERVER['HTTP_REFERER']);
                $result = $admin->editPost($id, $_POST["theme"], $_POST["content"], $bg);
                $catRes = $categories->addPostCategory($id, $_POST['categories']);

                if($catRes) {
                    header('Location:'.HOST.'admin/postList');
                }
            } else {
                $viewData = $admin->getPost($id);
                $viewData["categories"] = $categories->getCategories();
                $viewData['selectedCategories'] = $categories->getByPost($id);
                $this->set($viewData);
                $this->render("post-create");
            }

        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function postCreate(){
        if($this->checkIsAdmin()){
            require (ROOT.'Models/Categories.php');

            $categories = new Categories();

            if(!empty($_POST)){
                require(ROOT . 'Models/Admin.php');
                $admin = new Admin();

                if(file_exists($_FILES['bg']['tmp_name'])){
                    print_r($_FILES);
                    $bg = $this->saveImage(random_int(0, 1000), $_FILES['bg']['tmp_name'], "posts/");

                } else {
                    header('Location:'.$_SERVER['HTTP_REFERER']);
                }
                if(!isset($_POST["content"]) || empty($_POST["content"]) || !isset($_POST["theme"])|| !isset($_POST["categories"])) header('Location:'.$_SERVER['HTTP_REFERER']);
                $result = $admin->createPost($_POST["theme"], $_POST["content"], $bg);
                if($result) {
                    $catRes = $categories->addPostCategory($result, $_POST['categories']);
                    if($catRes) header('Location:'.HOST.'admin/postList');
                }
            } else {
                $viewData["categories"] = $categories->getCategories();
                $this->set($viewData);
                $this->render("post-create");
            }

        } else {
            header('Location:'.HOST.'admin/login');
        }
    }




    function about(){
        if($this->checkIsAdmin()){
            require(ROOT . 'Models/Admin.php');
            $admin = new Admin();

            if(!empty($_POST)){
                $fields = array('first_name', 'second_name', 'last_name', 'email', 'phone', 'date_of_birth', 'education', 'work', 'exp', 'short_about', 'long_about');
                $data = $this->setData($_POST, $fields);
                print_r($data);
                if(file_exists($_FILES['photo']['tmp_name'])){
                    print_r($_FILES);
                    $photo = $this->saveImage(1,$_FILES['photo']['tmp_name'], "");

                } else {
                    $photo = $_POST["photo_old"];
                }
                $data["photo"] = $photo;
                $result = $admin->updateTeacher($data);
                if($result) {
                    header('Location:'.HOST.'admin/about');
                }
            } else {
                $viewData = $admin->getTeacher();
                $this->set($viewData);
                $this->render("about");
            }

        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    function categories(){
        if(!$this->checkIsAdmin()) header('Location:'.HOST.'admin/login');
        require (ROOT.'Models/Categories.php');
        $categories = new Categories();
        if(!empty($_POST)) {
            $field = array( "name");
            $data = $this->setData($_POST, $field);

            $name = $data["name"];


            $result = $categories->addCategory($name);
            if ($result) {
                header('Location:' . HOST . 'admin/categories');

            }
        } else {


            $viewData["categories"] = $categories->getCategories();
            $this->set($viewData);
            $this->render("category-list");
        }

    }

    function deleteCategory($id){
        if($this->checkIsAdmin()){
            require (ROOT.'Models/Categories.php');
            $categories = new Categories();
            $result = $categories->deleteCategory($id);
            if($result)header('Location:'.$_SERVER['HTTP_REFERER']);

        } else {
            header('Location:'.HOST.'admin/login');
        }
    }

    function editCategory(){

        if($this->checkIsAdmin()){
            require (ROOT.'Models/Categories.php');
            $categories = new Categories();

            if(!empty($_POST)){
                $field = array("name", "id");
                $data = $this->setData($_POST, $field);
                $parent = NULL;
                $name = $data["name"];
                $id = $data["id"];
                $result = $categories->updateCategory($id,$name);
                if($result){
                    header('Location:'.HOST.'admin/categories');

                }

            } else {
                header('Location:'.$_SERVER['HTTP_REFERER']);
            }



        } else {
            header('Location:'.HOST.'admin/login');
        }
    }
    private function saveImage($id, $image, $subdir){
        $rnd = random_int(0, 10000);
        $filename = $id."-$rnd.jpg";
        $location = ROOT . "public/img/$subdir" . $filename;

        $this->compressImage($image, $location, 70);
        return $filename;
    }
    private function saveAudio($name){
        $info = pathinfo($_FILES[$name]['name']);
        $ext = $info['extension']; // get the extension of the file
        $filename = random_int(0, 10000)."-project-".random_int(0, 10000).".".$ext;

        $location = ROOT . "public/audio/" . $filename;
        move_uploaded_file( $_FILES[$name]['tmp_name'], $location);
        return $filename;
    }
    private function compressImage($source, $destination, $quality) {

        $info = getimagesize($source);

        if ($info['mime'] == 'image/jpeg')
            $image = imagecreatefromjpeg($source);

        elseif ($info['mime'] == 'image/gif')
            $image = imagecreatefromgif($source);

        elseif ($info['mime'] == 'image/png')
            $image = imagecreatefrompng($source);

        imagejpeg($image, $destination, $quality);

    }

}
?>