<?php

class App
{

    protected $controller = 'HomeController';
    protected $action = 'index';
    protected $params = [];
    private $checkrole = 'user';
    private $strextend = 'Controller';
    function __construct()
    {
        $arr = $this->UrlProcess();

        if (isset($arr[0]) && $arr[0] == 'api' && $_SERVER['REQUEST_METHOD'] == 'POST') {
             "./mvc/Core/RequestAPI.php";
        } else {
            if (isset($arr[0])) {
                if (strtolower($arr[0]) === 'admin') {
                    $this->controller = 'HomeControllerAdmin';
                    $this->checkrole = 'admin';
                    $this->strextend .= 'Admin';
                    array_shift($arr);
                }
            }

            $urlfile = "./mvc/Controllers";
            if ($this->checkrole === "admin") {
                $urlfile .= "/AdminControllers";
            }

            if (isset($arr[0])) {
                $temp = ucfirst(strtolower($arr[0])) . $this->strextend;
                if (file_exists("{$urlfile}/{$temp}.php")) {
                    $this->controller = $temp;
                }
                unset($arr[0]);
            }

            require_once "{$urlfile}/{$this->controller}.php";
            if (isset($arr[1])) {
                $temp = strtolower($arr[1]);
                if (method_exists($this->controller, $temp)) {
                    $this->action = $temp;
                }
                unset($arr[1]);
            }
            // fix
            

            // /fix

            $this->params = $arr ? array_values($arr) : [];
            call_user_func_array([new $this->controller, $this->action], $this->params);
        }
    }

    function UrlProcess()
    {

        if (isset($_GET['url'])) {
            $url = $_GET['url'];
            return explode("/", trim(trim($url, " "), "/"));
        }
    }
}
