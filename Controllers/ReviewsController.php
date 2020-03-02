<?php
class ReviewsController extends Controller{
    function index(){
        $this->checkUser();
        $this->render("reviews");

    }
}
?>