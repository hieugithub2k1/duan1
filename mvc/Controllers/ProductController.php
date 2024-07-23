<?php

class ProductController{

    function index($vv = 'macdih'){
        echo 'product';
        echo $vv;
        if(isset($_GET['hh'])){
            echo 'day la hh:  ' . $_GET['hh'];
        }
    } 
}