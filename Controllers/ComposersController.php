<?php
class ComposersController extends Controller{
    function index(){
        require(ROOT . 'Models/Composers.php');
        $composers = new Composers();
        $viewData['composers'] = $composers->getComposers();
        $this->set($viewData);
        $this->render("composers");

    }
    function detail($id){
        require(ROOT . 'Models/Composers.php');
        $composers = new Composers();
        $viewData = $composers->getComposer($id);
        $this->set($viewData);
        $this->render("detail");
    }
}
?>