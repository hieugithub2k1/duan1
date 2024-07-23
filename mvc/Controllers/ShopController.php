<?php

class ShopController extends Controller {
    function index(){
        echo 'day la index, sai se nhay vao day  ';
    }
    function show() {
        $HomeModel = $this->model("HomeModel");
        $data['ct_path'] = "shop/ShopVieww";

        $data['sub_ct']['noidung'] = $HomeModel->getAllRecords('products');
        if (isset($data['sub_ct']) && is_array($data['sub_ct'])) {
        } else {
           
            echo "Không có dữ liệu để hiển thị.";
        }
        $this->view("blocks/headfoot", $data);
        
    }


    function chitietsp(){
        $data = [];
        $data['ct_path'] = "shop/chitietsp";
        $data['sub_ct'] = [];
        $this->view("blocks/headfoot",$data);
    }
}