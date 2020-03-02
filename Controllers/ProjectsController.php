<?php
class ProjectsController extends Controller{
    function index(){
        require (ROOT."Models/Projects.php");
        $projects = new Projects();
        $viewData["projects"] = $projects->getProjects();
        $viewData["isAuthorized"] = false;
        if ($this->checkUser()) $viewData["isAuthorized"] = true;
        $this->set($viewData);
        $this->render('projects');
    }

}
?>