<?php

class HomeControllerAdmin extends Controller{
    function show(){
    //    
    // echo 'hi';
    $this->view("admin/blocks/layout");
    $this->view("admin/index");
    
    }

}