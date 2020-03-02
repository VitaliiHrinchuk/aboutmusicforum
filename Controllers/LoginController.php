<?php
class LoginController extends Controller{
    function index(){
        if($this->checkUser()) header('Location:'.HOST);
        if(!empty($_POST)){
            $postNeedsData = array('email', 'password');

            if($this->checkPostData($postNeedsData)){
                $this->secure_form($_POST);
                require(ROOT . 'Models/User.php');
                $auth = new user();
                $email = $_POST['email'];
                if(!$auth->checkEmailExist($email)){
                    echo json_encode(array('success' => 0, 'error' => 'Невірно введенна адреса електронної пошти'));
                    return;
                }
                $formPassword = $_POST['password'];
                $user = $auth->getUserPassword($email);
                $userPassword = $user['pass'];
                if(password_verify($formPassword, $userPassword)){
                    session_destroy();
                    session_start();
                    $_SESSION['id'] = $user['id'];
                    echo json_encode(array('success' => 1));
                } else {
                    echo json_encode(array('success' => 0, 'error' => 'Невірний пароль'));
                }
            } else {
                echo json_encode(array('success' => 0, 'error' => 'Всі поля повинні бути заповнені!'));
            }
        } else {
            $this->render('login');
        }

    }
    function register(){
        if($this->checkUser()) header('Location:'.HOST);
        if(!empty($_POST)){
            $postNeedsData = array('email', 'name',  'password');
            if($this->checkPostData($postNeedsData)){
                $this->secure_form($_POST);
                require(ROOT . 'Models/User.php');
                $auth = new User();

                $email = $_POST['email'];
                if($auth->checkEmailExist($email)) {
                    echo json_encode(array('success' => 0, 'error' => 'email'));
                    return;
                }

                $name = $_POST['name'];
                $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
                $result = $auth->createUser($email, $name, $password);
                if($result){
                    echo json_encode(array('success' => 1));
                } else {

                    echo json_encode(array('success' => 0));
                }
            } else {
                echo json_encode(array('success' => 0, 'error' => 'empty field'));
                return;
            }

        } else {
            $this->render('registration');
        }



    }
    function logout(){
        if($this->checkUser()){
            session_destroy();
            header('Location: '.HOST);
        } else {
            header('Location: '.HOST.'login');
        }
    }
}
?>