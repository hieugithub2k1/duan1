<?php

class UsersControllerAdmin extends Controller{
    private $data = [];

    function index(){
        echo 'day la index, sai se nhay vao day  ';
    }
    function show(){
        
       
        $UserModel = $this->model("UserModel");

        
        $users = $UserModel->getAllRecords('users');

        // print_r($users);

        $data['datacustom'] = $users;
      

        
        // $data['sub_ct'] = [];
        $this->view("admin/blocks/layout");
        
        
        $this->view("admin/qltaikhoan/taikhoanshow",$data);
    }

    function order(){
        $UserModel = $this->model("UserModel");

        
        $users = $UserModel->getAllRecords('orders');
        // print_r($users);exit;

        $data['datacustom'] = $users;
      

        
        // $data['sub_ct'] = [];
        $this->view("admin/blocks/layout");
        
        
        $this->view("admin/qldonhang/donhangshow",$data);
    }

    function lock($id){
        $UserModel = $this->model("UserModel");
        $users = $UserModel->lockRole($id);
        if($users) {
            $webRoot = WEB_ROOT;
            header("Location: $webRoot/admin/users/show");
        }
    }
    function unlock($id){
        $UserModel = $this->model("UserModel");
        $users = $UserModel->unlockRole($id);
        if($users) {
            $webRoot = WEB_ROOT;
            header("Location: $webRoot/admin/users/show");
        }
    }

    function approve($id){
        $OrderModel = $this->model("OrderModel");
        $orders = $OrderModel->approveOrder($id);
        if($orders) {
            $webRoot = WEB_ROOT;
            header("Location: $webRoot/admin/users/order");
        }
    }

    function cancel($id){
        $OrderModel = $this->model("OrderModel");
        $orders = $OrderModel->cancelOrder($id);
        if($orders) {
            $webRoot = WEB_ROOT;
            header("Location: $webRoot/admin/users/order");
        }
    }
}