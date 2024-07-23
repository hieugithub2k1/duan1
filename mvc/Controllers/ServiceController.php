<?php
class ServiceController extends Controller{

function index(){
    echo 'day la index, sai se nhay vao day  ';
}
function show() {
    $data = [];
    $data['ct_path'] = "services/services";
    $data['sub_ct'] = [];
    
    $this->view("blocks/headfoot", $data);
}
}