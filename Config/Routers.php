<?php


namespace Config;

class Routers{

    public static function getRouters(){
        return [
            "home"  => ["show"]
            ];
        }

    public static function getAdminRouters(){
        return [
            "home" => ["show","test"],
            "category" => ["index","add"]
            ];
        }
}

?>