
<?php

class DanhMucControllerAdmin extends Controller{

    private $data = [];

    function index(){
        echo 'day la index, sai se nhay vao day  ';
    }
    function show(){
        
       
        $danhMucModel = $this->model("DanhMucModel");

        // Lấy tất cả các danh mục từ model
        $data['datacustom'] = $danhMucModel->getAllRecords('productcategory');


      

        
        // $data['sub_ct'] = [];
        $this->view("admin/blocks/layout");
        
        
        $this->view("admin/danhmuc/index",$data);
    }



    function add_data(){
        $danhMucModel = $this->model("DanhMucModel");
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ biểu mẫu
            $today = date('Y-m-d H:i:s');
            $ngaytao = $today;
            $tenDanhMuc = $_POST["n2"];
            
            $a = new DanhMucModel();

            $a-> addProduct($tenDanhMuc,$ngaytao);
        $webRoot = WEB_ROOT;
        header("Location: $webRoot/admin/danhmuc/show");
        exit();
        }
        $this->view("admin/danhmuc/them");
    }

    function delete_data($id){
        // Lấy chỉ số ID sản phẩm từ tham số URL
        $productId = intval($id); // Chuyển đổi ID sang số nguyên để đảm bảo chính xác

        $homemodel = $this->model("DanhMucModel");
        $a = new DanhMucModel();

        $a->deleteProduct($productId);

        // Chuyển hướng sau khi xóa sản phẩm
        $webRoot = WEB_ROOT;
        header("Location: $webRoot/admin/danhmuc/show");
        exit();
    }
   
   

    function editCategoryData($id) {
        $categoryModel = $this->model("DanhMucModel");
    
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ biểu mẫu
            $data['name'] = $_POST["n2"];
            // $createdAt = date('Y-m-d H:i:s');

            // print_r($_POST);
    
            // Gọi hàm để sửa danh mục sản phẩm trong model
            $categoryModel->editrow("productcategory",$id,$data);
    
            // Chuyển hướng người dùng sau khi sửa thành công
            header('Location: ' . WEB_ROOT . '/admin/danhmuc/show');
            exit();
        }
    
        // Lấy dữ liệu danh mục cần sửa và truyền vào view
        $data['category'] = $categoryModel->getProductCategoryById($id);

        // print_r($data);
        $this->view("admin/danhmuc/sua", $data);
    }
    
}