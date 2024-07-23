<?php

class CartController extends Controller
{


    function index()
    {
        echo 'day la index, sai se nhay vao day  ';
    }

    function oder()
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['flash_message'] = "Vui lòng đăng nhập để xem đơn hàng.";
            header("Location: " . WEB_ROOT . "/home/login");
            exit();
        }

        $CartModel = $this->model("CartModel");
        $order = $CartModel->getOrdersByUserId('orders', $_SESSION['user_id']);
        print_r($order);



        $data = [];
        $data['ct_path'] = "cart/oder";
        $data['sub_ct']['oder'] = $order;

        $this->view("blocks/headfoot", $data);
    }

    public function del_oder($id)
    {

        // Kiểm tra nếu đơn hàng có status = 1 thì mới cho phép hủy
        $order = $this->model("CartModel")->getById('orders', $id);
        // print_r($order); exit;
        $result = $this->model("CartModel")->deleteOrder('orders', $id);
        if ($result) {
            $_SESSION['success_message'] = "Đơn hàng $id  đã được hủy";

            $webRoot = WEB_ROOT;
            header("Location: $webRoot/cart/oder");
        } else {
            // Nếu xóa không thành công, hiển thị thông báo lỗi
            echo "<script>alert('Failed to cancel order. Please try again later.');</script>";
            echo "<script>window.location.href='cart/oder';</script>";
        }
    }
    function cancelorder($id)
    {
        $order = $this->model("CartModel")->getById('orders', $id);
        // print_r($order); exit;
        $result = $this->model("OrderModel")->cancelOrder($id);
        if ($result) {
            $_SESSION['success_message'] = "Đơn hàng $id  đã được hủy";

            $webRoot = WEB_ROOT;
            header("Location: $webRoot/cart/oder");
        }
    }


    function show()
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['flash_message'] = "Vui lòng đăng nhập để xem giỏ hàng.";
            header("Location: " . WEB_ROOT . "/home/login");
            exit();
        }
        $CartModel = $this->model("CartModel");
        // echo $_SESSION['user_id'];
        // exit(); 
        $Cart = $CartModel->showCart($_SESSION['user_id']);
        // print_r($Cart);
        // exit(); 
        $products = [];

        foreach ($Cart as $item) {
            $totalPrice = 0;

            $productId = $item['product_id'];
            $HomeModel = $this->model("HomeModel");
            $product = $HomeModel->getById('products', $productId);
            // print_r($product);
            // exit;
            $totalPrice += $product['price'] * $item['quantity'];
            // Thêm thông tin sản phẩm vào mảng products
            $products[] = [
                'id' => $product['id'],
                'product_name' => $product['product_name'],
                'img_url' => $product['img_url'],
                'price' => $product['price'],
                'quantity' => $item['quantity'],
                'total' => $product['price'] * $item['quantity'],
                'total_price' => $totalPrice,
                'idcart' => $item['id']
            ];
        }
        // print_r($products); exit;
        //  foreach ($products as $product) : 
        //     echo '<pre>';
        //     echo $product['price'];
        //     echo '</pre>';
        //      endforeach; 
        //      exit;




        $data = [];
        $data['ct_path'] = "cart/cart";
        $data['sub_ct']['products'] = $products;
        $this->view("blocks/headfoot", $data);
    }


    function detail($id)
    {

        $productId = $id;
        $CartModel = $this->model("CartModel");

        $product = $CartModel->getById('products', $productId);

        // print_r($product);



        $data = [];
        $data['ct_path'] = "shop/detail";
        $data['sub_ct']['detail'] = $product;
        $this->view("blocks/headfoot", $data);
    }

    public function addocart($id)
    {
        if (!isset($_SESSION['user_id'])) {
            $_SESSION['flash_message'] = "Vui lòng đăng nhập để thêm sản phẩm vào giỏ hàng.";
            header("Location: /testmvc/home/login");
            exit();
        }

        // $productId = $_POST['product_id'];
        // Lấy thông tin sản phẩm từ database dựa trên productId
        $CartModel = $this->model("CartModel");
        $productId = $_POST['product_id'];

        $quantity = 1; // Mặc định số lượng sản phẩm là 1
        $userId = $_SESSION['user_id']; // Lấy user_id từ session
        $createdAt = date('Y-m-d H:i:s');
        $product = $CartModel->getById('products', $id);
        $existingProduct = $CartModel->getCartItemByProductId($userId, $id);
        // $CartModel->addToCart($userId, $id, $quantity, $createdAt);
        // $_SESSION['success_message'] = "Thêm sản phẩm vào giỏ hàng thành công";
        if ($existingProduct) {
            // Nếu sản phẩm đã tồn tại, cập nhật số lượng của nó
            $newQuantity = $existingProduct['quantity'] + $quantity;
            $CartModel->updateCartItemQuantity($userId, $id, $newQuantity);
            $_SESSION['success_message'] = "Thêm sản phẩm vào giỏ hàng thành công";
        } else {
            // Nếu sản phẩm chưa tồn tại, thêm mới sản phẩm vào giỏ hàng
            $CartModel->addToCart($userId, $id, $quantity, $createdAt);
            $_SESSION['success_message'] = "Thêm sản phẩm vào giỏ hàng thành công";
        }
        $webRoot = WEB_ROOT;
        header("Location: $webRoot/home/show");
    }
    public function delcart($id)
    {
        $CartModel = $this->model("CartModel");


        // $productId = intval($id);
        // echo  $productId; 

        // $userId=$_SESSION['user_id'];
        $CartModel->delCart($id);
        $webRoot = WEB_ROOT;
        header("Location: $webRoot/cart/show");
    }

    public function increasequantity($id)
    {
        $id = intval($id);
        // $userId = $_SESSION['user_id'];

        $cartModel = $this->model('CartModel');
        $cartModel->updateQuantity($id, 1);

        $webRoot = WEB_ROOT;
        header("Location: $webRoot/cart/show");
    }
    public function decreasequantity($id)
    {
        $id = intval($id);
        // $userId = $_SESSION['user_id'];

        $cartModel = $this->model('CartModel');
        $cartModel->updateQuantity($id, -1);

        $webRoot = WEB_ROOT;
        header("Location: $webRoot/cart/show");
    }
    function checkout()
    {
        $CartModel = $this->model("CartModel");
        // echo $_SESSION['user_id'];
        $user = $CartModel->getById('users', $_SESSION['user_id']);
        // print_r($Cart);
        // exit;
        $Cart = $CartModel->showCart($_SESSION['user_id']);

        $order = [];
        foreach ($Cart as $item) {
            $productId = $item['product_id'];
            $HomeModel = $this->model("HomeModel");
            $product = $HomeModel->getById('products', $productId);
            // print_r($product);
            // exit;
            $order[] = [

                'product_name' => $product['product_name'],
                'quantity' => $item['quantity'],
                'price' => $product['price'],
                'total' => $product['price'] * $item['quantity'],
                'product_img_url' => $product['img_url']
            ];
        }
        // echo '<pre>';
        // print_r($order);
        // echo '</pre>';


        $data['ct_path'] = "checkout/checkout";
        $data['sub_ct']['order'] = $order;
        $data['sub_ct']['users'] = $user;
        $this->view("blocks/headfoot", $data);
    }

    public function placeorder()
    {
        $CartModel = $this->model("CartModel");
        $OrderModel = $this->model("OrderModel");
        $userId = $_SESSION['user_id'];
        // echo $userId;
        $cartItems = $CartModel->showCart($userId);
        // print_r($cartItems);
        if (empty($cartItems)) {
            echo "Giỏ hàng của bạn đang trống.";
            return;
        }
        $totalPrice = 0;
        foreach ($cartItems as $item) {
            $productId = $item['product_id'];
            $HomeModel = $this->model("HomeModel");
            $product = $HomeModel->getById('products', $productId);
            // print_r($product);
            // echo '<pre>';
            // print_r($product);
            // echo '</pre>';
            $totalPrice += $product['price'] * $item['quantity'];
        }
        // echo $totalPrice;
        $orderData = [
            'users_id' => $userId,
            // 'order_date' => date('Y-m-d H:i:s'),
            'status' => 1,  // trạng thái đơn hàng, 1: mới đặt
            'total_price' => $totalPrice,
            'shipping_address' => 'Địa chỉ giao hàng mặc định',  // Bạn có thể thay đổi thành địa chỉ cụ thể
            'created_at' => date('Y-m-d H:i:s')
        ];
        $orderId = $OrderModel->createOrder($orderData);
        if ($orderId) {
            // Chuyển sản phẩm từ giỏ hàng sang bảng order_items
            foreach ($cartItems as $item) {
                $productId = $item['product_id'];

                $product = $HomeModel->getById('products', $productId);
              
                $orderItemData = [
                    'order_id' => $orderId,
                    'product_id' => $item['product_id'],
                    'quantity' => $item['quantity'],
                    'price' => $product['price'], // Giá sản phẩm từ bảng sản phẩm
                    'total' => $product['price'] * $item['quantity'],
                    'created_at' => date('Y-m-d H:i:s')
                ];
                $OrderModel->createOrderItem($orderItemData);
            }
            $CartModel->clearCart($userId);
            $webRoot = WEB_ROOT;
            header("Location: $webRoot/home/thankyou");
        } else {
            echo "Có lỗi xảy ra khi đặt hàng. Vui lòng thử lại.";
        }
    }
}
