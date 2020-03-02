<?php
class AboutController extends Controller{
    function index(){
        require(ROOT . "Models/Teacher.php");
        $teacher = new Teacher();
        $viewData = $teacher->getTeacherAllInfo();
        $this->set($viewData);
        $this->render("about");

    }
}
?>