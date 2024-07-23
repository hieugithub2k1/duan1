<?php
require_once './mvc/PHPMailer/src/Exception.php';
require_once './mvc/PHPMailer/src/SMTP.php';
require_once './mvc/PHPMailer/src/PHPMailer.php';
// require_once './mvc/Controllers/Mailer.php'; // Đảm bảo rằng bạn đã bao gồm tệp chứa lớp Mailer
require_once './mvc/Controllers/MailerController.php';
$mail = new Mailer();
$user = new App();

class HomeController extends Controller
{

    function index()
    {
        echo 'day la index, sai se nhay vao day';
    }

    function show()
    {
        $HomeModel = $this->model("HomeModel");
        $data['ct_path'] = "home/Home1";
        $data['sub_ct']['noidung'] = $HomeModel->getAllRecords('products');
        if (isset($data['sub_ct']) && is_array($data['sub_ct'])) {
        } else {
            echo "Không có dữ liệu để hiển thị.";
        }

        $this->view("blocks/headfoot", $data);
    }

    function about()
    {
        $data = [];
        $data['ct_path'] = "about/about";
        $data['sub_ct'] = [];
        $HomeModel = $this->model("HomeModel");
        $data['sub_ct']['noidung'] = $HomeModel->getAllRecords('products');
        $this->view("blocks/headfoot", $data);
    }

    function blog()
    {
        $data = [];
        $data['ct_path'] = "blog/blog";
        $data['sub_ct'] = [];
        $this->view("blocks/headfoot", $data);
    }

    function contact()
    {
        $data = [];
        $data['ct_path'] = "contact/contact";
        $data['sub_ct'] = [];
        $this->view("blocks/headfoot", $data);
    }

    function checkout()
    {
        $data = [];
        $data['ct_path'] = "checkout/checkout";
        $data['sub_ct'] = [];
        $this->view("blocks/headfoot", $data);
    }

    function thankyou()
    {
        $data = [];
        $data['ct_path'] = "thankyou/thankyou";
        $data['sub_ct'] = [];
        $this->view("blocks/headfoot", $data);
    }

    function login()
    {
        $data = [];
        $this->view("login/login", $data);
    }

    function register()
    {
        $data = [];
        $this->view("register/register", $data);
    }

  
    public function forgot()
    {
        $data = [];

        if (isset($_POST['submit'])) {
            $error = array();
            $email = $_POST['email'];

            if ($email == '') {
                $error['email'] = 'Không được để trống!';
            }

            if (empty($error)) {
                $result = $this->model("UserModel")->findUserByEmail($email);
                if ($result) {
                    $code = rand(100000, 999999); // Mã xác nhận gồm 6 chữ số

                    $title = "Quên mật khẩu";
                    $content = "Mã xác nhận của bạn là: <span style='color:green'>" . $code . "</span>";

                    // Khởi tạo đối tượng Mailer
                    $mail = new Mailer();
                    if ($mail->sendMail($title, $content, $email)) {
                        //
                        if (session_status() == PHP_SESSION_NONE) {
                            session_start();
                        }
                        // Lưu mã xác nhận vào session
                        $_SESSION['forgot_password_code'] = $code;
                        $_SESSION['email'] = $email;
                        // Chuyển hướng đến trang nhập mã xác nhận

                        $webRoot = WEB_ROOT;
                        header("Location: $webRoot/home/confirm");
                        exit;
                    } else {
                        $data['error'] = 'Có lỗi xảy ra khi gửi email. Vui lòng thử lại.';
                    }
                } else {
                    // echo 'sai email';
                    $data['error'] = 'Email không tồn tại trong hệ thống.';
                }
            } else {
                $data['error'] = $error;
            }
        }
        // $webRoot = WEB_ROOT;
        // header("Location: $webRoot/home/confirm");

        $this->view("login/forgot", $data);
    }

    public function confirm()
    {
        $data = [];

        
        $this->view("login/xacnhan", $data);
    }

    public function resetpassword()
    {
        $data = [];
        if (isset($_POST['submit'])) {
            $password = $_POST['password'];
            $confirm_password = $_POST['confirm_password'];
    
            if ($password != $confirm_password) {
                $data['error'] = 'Mật khẩu xác nhận không khớp.';
            } else {
                // Cập nhật mật khẩu mới cho người dùng
                $email = $_SESSION['email'];
                $result = $this->model("UserModel")->updatePasswordByEmail($email, $password);
                if ($result) { // Xóa mã xác nhận và email khỏi session

                    unset($_SESSION['forgot_password_code']);
                    unset($_SESSION['email']);
                    $_SESSION['success_message'] = 'Đã đổi mật khẩu thành công, vui lòng đăng nhập để mua hàng.';
        
                    // Chuyển hướng đến trang đăng nhập
                    $webRoot = WEB_ROOT;
                    header("Location: $webRoot/home/login");
                    exit;
                }
               
            }
        }
        
      

        $this->view("login/quenmk1", $data);
        
    }

    function chitietsp()
    {
        $data = [];
        $data['ct_path'] = "shop/chitietsp";
        $data['sub_ct'] = [];
        $this->view("blocks/headfoot", $data);
    }

    function shop()
    {
        $data = [];
        $data['ct_path'] = "cart/cart";
        $data['sub_ct'] = [];
        $this->view("blocks/headfoot", $data);
    }
}
