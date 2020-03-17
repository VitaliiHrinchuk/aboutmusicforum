<?php
class ContactController extends Controller{
    function index(){
        if(!empty($_POST)){
            $email = $_POST['email'];
            $message = $_POST['message'];
            $to_email = 'grinchuk2000@gmail.com';
            $subject =  $_POST['subject'];
            $headers = "From: $email";
            mail($to_email,$subject,$message,$headers);
            $this->render("contact");
        }
        $this->render("contact");
    }
}
?>