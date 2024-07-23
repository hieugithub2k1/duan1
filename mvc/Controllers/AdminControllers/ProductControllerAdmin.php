
<?php

class ProductControllerAdmin extends Controller
{

    private $data = [];

    function index()
    {
        echo 'day la index, sai se nhay vao day  ';
    }
    function show()
    {
        $homemodel = $this->model("HomeModel");


        $fullproduct = $homemodel->getAllRecords('products');
        $fullcategory = $homemodel->getAllRecords('productcategory');
        $fullbrands = $homemodel->getAllRecords('brands');
      

        foreach ($fullproduct as $index => $item) {
            foreach ($fullcategory as $itemcategory) {
                if ($item['productcategory_id'] == $itemcategory['id']) {
                    $fullproduct[$index]['productcategory_id'] = $itemcategory['name'];
                    break;
                }
            }
            foreach ($fullbrands as $itemcategory) {
                if ($item['brands_id'] == $itemcategory['id']) {
                    $fullproduct[$index]['brands_id'] = $itemcategory['name'];
                    break;
                }
            }
        }

        $data['datacustom'] = $fullproduct;
        $this->view("admin/blocks/layout");
        $this->view("admin/index/sanphamshow", $data);
    }



    function add_data()
    {
        $homemodel = $this->model("HomeModel");
        $fullcategory = $homemodel->getAllRecords('productcategory');
        $fullbrands = $homemodel->getAllRecords('brands');
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ biểu mẫu
            $today = date('Y-m-d H:i:s');
            $tenSanPham = $_POST["n2"];
            $moTaNgan = $_POST["n4"];
            $moTa = $_POST["n5"];
            $gia = $_POST["n6"];
            $giaKhuyenMai = $_POST["n7"];
            $abci = $_POST["n8"];
            $ngaytao = $today;
            $hinh = $_FILES['n9']['name'];
            if(!empty($_FILES['n9'])){
                $url = 'public/css2/images/'.$hinh;
                if(!file_exists($url)){
                     move_uploaded_file($_FILES['n9']['tmp_name'], $url);
                }
            }
            $danhmuc = $_POST["n10"];
            $hanng = $_POST["n11"];
            $a = new HomeModel();
            $a->addProduct($tenSanPham, $moTaNgan, $moTa, $gia, $giaKhuyenMai, $abci, $hinh, $ngaytao, $danhmuc, $hanng);
            $webRoot = WEB_ROOT;
            header("Location: $webRoot/admin/product/show");
        }
        // echo '<pre>';
        // print_r($fullcategory);
        // echo '</pre>';
        // exit();
        $data['datacustom'] = $fullcategory;
        $data['hang'] = $fullbrands;

        $this->view("admin/them/them", $data);
    }

    function delete_data($id)
    {
        // Lấy chỉ số ID sản phẩm từ tham số URL
        $productId = intval($id); // Chuyển đổi ID sang số nguyên để đảm bảo chính xác

        $homemodel = $this->model("HomeModel");
        $a = new HomeModel();

        $a->deleteProduct($productId);

        // Chuyển hướng sau khi xóa sản phẩm
        $webRoot = WEB_ROOT;
        header("Location: $webRoot/admin/product/show");
        exit();
    }

    function edit_data($id)
    {
        $homemodel = $this->model("HomeModel");
        $fullcategory = $homemodel->getAllRecords('productcategory');
        $fullbrands = $homemodel->getAllRecords('brands');

        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Lấy dữ liệu từ biểu mẫu
            $tenSanPham = $_POST["n2"];
            $moTaNgan = $_POST["n4"];
            $moTa = $_POST["n5"];
            $gia = $_POST["n6"];
            $giaKhuyenMai = $_POST["n7"];
            $stockQuantity = $_POST["n8"];
            $danhmuc = $_POST["n10"];
            $hanng = $_POST["n11"];
            $today = date('Y-m-d H:i:s');
            // $hinh = $_POST["current_image"]; // Sử dụng ảnh hiện tại làm giá trị mặc định
            $dataupdate = [];

            if (!empty($_FILES['n9']['name'])) {
                $hinh = $_FILES['n9']['name'];
                $target_directory = 'public/css2/images/'; // Đường dẫn thư mục đích
                $target_file = $target_directory . basename($hinh); // Đường dẫn đầy đủ đến tệp đích
                $dataupdate['img_url'] = $hinh;
                // Di chuyển tệp tải lên vào thư mục đích
                if (move_uploaded_file($_FILES['n9']['tmp_name'], $target_file)) {
                    // Xử lý thành công
                    echo "Tệp tin đã được tải lên thành công.";
                } else {
                    // Xử lý lỗi khi di chuyển tệp
                    echo "Đã xảy ra lỗi khi di chuyển tệp tin.";
                }
            }

            $dataupdate['product_name'] = $_POST["n2"];
            $dataupdate['des_short'] = $_POST["n4"];
            $dataupdate['des'] = $_POST["n5"];
            $dataupdate['price'] = $_POST["n6"];
            $dataupdate['price_sale'] = $_POST["n7"];
            $dataupdate['stock_quantity'] = $_POST["n8"];
            $dataupdate['productcategory_id'] = $_POST["n10"];
            $dataupdate['brands_id'] = $_POST["n11"];

            $isnum = ['price', 'price_sale', 'stock_quantity', 'productcategory_id', 'brands_id'];
            $homemodel->editrow("products", $id, $dataupdate, $isnum);

            // $homemodel->updateProduct($id, $tenSanPham, $moTaNgan, $moTa, $gia, $giaKhuyenMai, $stockQuantity, $namehinh, $today, $danhmuc, $hanng);

            header('Location: ' . WEB_ROOT . '/admin/product/show');
            exit();
        }
        $data['datacustom'] = $fullcategory;
        $data['hang'] = $fullbrands;

        // Lấy dữ liệu sản phẩm để hiển thị trên form chỉnh sửa
        $data['product'] = $homemodel->getProductById($id);
        $this->view("admin/index/sanphamsua", $data);
    }
}
