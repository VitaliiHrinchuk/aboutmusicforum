<?php
    class Controller
    {
        var $vars = [];
        var $layout = "default";
        function set($viewValues)
        {
            $this->vars = array_merge($this->vars, $viewValues);
        }
        function render($filename)
        {


            extract($this->vars);
            ob_start();
            require(ROOT . "Views/" . ucfirst(str_replace('Controller', '', get_class($this))) . '/' . $filename . '.php');
            $content_for_layout = ob_get_clean();

            if ($this->layout == false)
            {
                $content_for_layout;
            }
            else
            {
                require(ROOT . "Views/Layouts/" . $this->layout . '.php');
            }
        }
        private function secure_input($data)
        {
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
        protected function secure_form($form)
        {
            foreach ($form as $key => $value)
            {
                $form[$key] = $this->secure_input($value);
            }
        }
        protected function checkPostData($data){
            foreach ($data as $key)
            {
                if(!isset($_POST[$key]) || strlen($_POST[$key]) == 0 ) return false;
            }
            return true;
        }
        protected function checkUser(){
          if(!isset($_SESSION)){
            session_start();
          }

          if(!empty($_SESSION) && isset($_SESSION['id'])){
            return true;
          } else {
            return false;
          }
        }

        protected function checkIsAdmin(){
            if(!isset($_SESSION)){
                session_start();
            }

            if(!empty($_SESSION) && isset($_SESSION['isAdmin']) && $_SESSION['isAdmin'] == true){
                return true;
            } else {
                return false;
            }
        }
        protected function setData($src, $fields){
            $result = array();
            foreach($fields as $field){
                if(isset($src[$field]) && !empty($src[$field])) $result[$field] = $src[$field];
            }
            return $result;
        }
    }
?>