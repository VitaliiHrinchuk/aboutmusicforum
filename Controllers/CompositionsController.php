<?php
class CompositionsController extends Controller{
    function index(){
        require (ROOT.'Models/Compositions.php');

        $compositionModel = new Compositions();
        $compositions = $compositionModel->getCompositions();
        foreach ($compositions as &$composition){
            $composition['attributes'] = $compositionModel->getAttributes($composition['id']);
        }
        $viewData['compositions'] = $compositions;

        $this->set($viewData);
        $this->render("list");

    }

}
?>