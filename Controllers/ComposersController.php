<?php
class ComposersController extends Controller{
    function index(){

        $this->render("composers");

    }
    function detail($id){
        $this->render("detail");
    }
}
?>