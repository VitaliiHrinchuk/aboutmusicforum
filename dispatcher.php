<?php
class Dispatcher
{
    private $request;
    public function dispatch()
    {
        $this->request = new Request();
        Router::parse($this->request->url, $this->request);
        $controller = $this->loadController();
        if(get_class($controller) == "ErrorController"){
          $controller->index();
        } else {

          call_user_func_array([$controller, $this->request->action], $this->request->params);
        }
        

    }
    public function loadController()
    {

        $name = $this->request->controller . "Controller";
        $file = ROOT . 'Controllers/' . $name . '.php';
        if(!file_exists($file)){

        //  $this->redirect();
        return $this->redirectToError();
        return $controller;
        } else {
          require($file);
          $controller = new $name();
          if(!method_exists($controller,$this->request->action)){
            //  $this->redirect();
            return $this->redirectToError();
          }
          $method = new ReflectionMethod($controller,$this->request->action);
          if(count($method->getParameters()) != count($this->request->params)){
            return $this->redirectToError();
          }
          return $controller;
        }
        
    }
    private function redirect(){
        $host = 'http://'.$_SERVER['HTTP_HOST'].'/'.URL_START.'/';
        header('HTTP/1.1 404 Not Found');
        header("Status: 404 Not Found");
        header('Location:'.$host.'error/NotFound');
    }
    private function redirectToError(){
      $file = ROOT . 'Controllers/ErrorController.php';
      require($file);
      $controller = new errorController();
      return $controller;
    }
}
?>