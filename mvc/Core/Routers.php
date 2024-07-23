<?php


// namespace Config;

class Routers{

    public static function getRouters(){
        return [
            "cart"  => ["index","show","cancelorder","detail","oder","addocart","delcart","increasequantity","decreasequantity","checkout","placeorder","del_oder"],
            "home"  => ["show","about","blog","contact","login","register","checkout","thankyou","forgot","confirm","resetpassword"],
            "shop"  => ["show"],
            "service"  => ["show"],
            "users" => ["register","login","logout","quenmk","forgot"]
            
            
            ];
        }

    public static function getAdminRouters(){
        return [
            "home" => ["show","signout","signinpost"],
            "product" => ["show","add_data","delete_data","edit_data"],
            "danhmuc" => ["show","add_data","delete_data","editcategorydata","edit_data"],
            "users" => ["show","lock","unlock","order","approve","cancel"]
            ];
        }
}

?>