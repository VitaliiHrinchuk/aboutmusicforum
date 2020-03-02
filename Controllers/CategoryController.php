<?php
class CategoryController extends Controller{
    function index(){


    }
    function read($id){
        $this->checkUser();

        require (ROOT."Models/Teacher.php");
        $teacher = new Teacher();
        $viewData = $teacher->getCategory($id);
        $this->set($viewData);
        $this->render("category");
    }
}
?>