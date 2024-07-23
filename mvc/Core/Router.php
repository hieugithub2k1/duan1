<?php

// namespace Core;

// use Config\Routers;

class Router
{

    function __construct()
    {
        $checkUrl = false;
        $arrUrl = $this->UrlProcess();
        if ($arrUrl) {
            $controller = '';
            $action = '';
            
            if ($arrUrl[0] == 'admin') {
                // nếu là admin
                $routers = Routers::getAdminRouters();
                $controller = $arrUrl[1] ?? 'home';
                $action = $arrUrl[2] ?? 'index';
            } else {
                // nếu là user
                $routers = Routers::getRouters();
                $controller = $arrUrl[0] ?? 'home';
                $action = $arrUrl[1] ?? 'index';
            }

            if (array_key_exists($controller, $routers)) {
                if(in_array($action, $routers[$controller])){
                    $checkUrl = true;
                }
            }
        }else{
            // go home
            $checkUrl = true;
        }

        // confirm url
        if($checkUrl){
            new App();
        }else{
            // require_once "./src/mvc/Views/404/404.php";
            echo "day la trang 404 vì sai đường dẫn";
        }

    }

    function UrlProcess()
    {
        if (isset($_GET['url'])) {
            $url = strtolower($_GET['url']);
            return explode("/", trim(trim($url, " "), "/"));
        }
    }
}
