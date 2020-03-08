<?php
class ContactController extends Controller{
    function index(){
        if($this->checkUser()){

            $this->render("contact");
        } else {
            header('Location:'.HOST.'login');
        }


    }
}
?>