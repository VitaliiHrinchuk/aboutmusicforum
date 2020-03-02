<?php
class ErrorController extends Controller{
    function index(){

        $this->render('404');
    }
    function NotFound(){
        $this->render('404');
    }
}
?>