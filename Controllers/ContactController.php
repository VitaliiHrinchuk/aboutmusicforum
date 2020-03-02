<?php
class ContactController extends Controller{
    function index(){
        if($this->checkUser()){
            require (ROOT."Models/Teacher.php");
            $teacher = new Teacher();
            $viewData = $teacher->getContacts();
            $this->set($viewData);
            $this->render("contact");
        } else {
            header('Location:'.HOST.'login');
        }


    }
}
?>