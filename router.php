<?php
class Router
{
    static public function parse($url, $request)
    {
        $url = trim($url);
        if ($url == "/DP_AboutMusic/")
        {
            $request->controller = "index";
            $request->action = "index";
            $request->params = [];
        }
        else
        {
            $explode_url = explode('/', $url);
            $explode_url = array_slice($explode_url, 2);
            $getParams = strpos($explode_url[0], "?");
            if($getParams !== false){
                $request->controller =substr($explode_url[0], 0, $getParams);
             //   $request->controller = $explode_url[0];
            } else {
                $request->controller = $explode_url[0];

            }


            if(isset($explode_url[1])){
              $request->action = $explode_url[1];
            } else {
              $request->action = "index";
            }
            
            $request->params = array_slice($explode_url, 2);
        }
    }
}
?>