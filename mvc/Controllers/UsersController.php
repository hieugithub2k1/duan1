<?php
class UsersController extends Controller
{

    function index()
    {
        echo 'day la index, sai se nhay vao day  ';
    }
    function show()
    {
        $data = [];
        // $data['ct_path'] = "login/login";
        // $data['sub_ct'] = [];

        $this->view("login/login", $data);
    }


    public function register()
    {
        $UserModel = $this->model("UserModel");

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $phonename = $_POST['phonename'];
            $address = $_POST['address'];
            $roles = 0;

            // echo $password;

            if ($UserModel->register($email, $password, $firstname, $lastname, $phonename, $address, $roles)) {
            }
        } else {
            $data = [];
            $this->view("login/login", $data);
        }
        $webRoot = WEB_ROOT;
        header("Location:  $webRoot/home/login");
    }



    public function login()
    {
        $UserModel = $this->model("UserModel");
    
        $data = []; // Khởi tạo mảng dữ liệu
    
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $email = $_POST['email'];
            $password = $_POST['password'];
    
            if (isset($email) && isset($password)) {
                $user = $UserModel->login($email, $password);
    
                if ($user) {
                    $user_id = $user['id']; // Lấy ID của người dùng từ cơ sở dữ liệu
                    $username = $user['firstname']; // Lấy tên đăng nhập của người dùng từ cơ sở dữ liệu
                    $roles = $user['roles'];
    
                    // Kiểm tra xem session đã tồn tại chưa trước khi khởi động
                    if (session_status() === PHP_SESSION_NONE) {
                        session_start(); // Khởi động session nếu chưa tồn tại
                    }
    
                    // Lưu thông tin đăng nhập vào session
                    $_SESSION['user_id'] = $user_id;
                    $_SESSION['username'] = $username;
                    $_SESSION['roles'] = $roles;
    
                    $webRoot = WEB_ROOT;
    
                    if ($roles == 1) {
                        // Nếu vai trò là admin (roles = 1), chuyển hướng đến trang quản lý sản phẩm
                        header("Location: $webRoot/admin/product/show");
                    } else if ($roles == 0) {
                        // Nếu vai trò là người dùng thông thường (roles = 0), chuyển hướng đến trang người dùng
                        header("Location: $webRoot/home/show");
                    } else {
                        // Nếu vai trò không xác định, hiển thị thông báo lỗi
                        $data['error'] = "Tài khoản người dùng này đã bị khóa";
                    }
                    exit();
                } else {
                    // Đăng nhập thất bại
                    $data['error'] = 'Sai đăng nhập hoặc mật khẩu';
                    $webRoot = WEB_ROOT;
                    
                }
            } else {
                $data['error'] = 'Sai đăng nhập hoặc mật khẩu';
            }
        }
    
        // Hiển thị view login với thông báo lỗi (nếu có)
        $this->view("login/login", $data);
    }
    

    public function logout()
    {
        // Kiểm tra xem phiên session đã được bắt đầu chưa
        if (session_status() === PHP_SESSION_NONE) {
            session_start(); // Bắt đầu phiên session nếu chưa tồn tại
        }

        // Xóa tất cả các biến session
        $_SESSION = array();

        // Xóa cookie session nếu có
        if (isset($_COOKIE[session_name()])) {
            setcookie(session_name(), '', time() - 42000, '/');
        }

        // Hủy toàn bộ phiên session
        session_destroy();

        // Chuyển hướng người dùng đến trang đăng nhập hoặc trang chính
        header("Location: " . WEB_ROOT . "/home/show");
    }


    function quenmk()
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
                $code = rand(100000, 999999); // Mã xác nhận gồm 6 chữ số

                $title = "Quên mật khẩu";
                $content = "Mã xác nhận của bạn là: <span style='color:green'>" . $code . "</span>";

                // Khởi tạo đối tượng Mailer
                $mail = new Mailer();
                if ($mail->sendMail($title, $content, $email)) {
                    // Lưu mã xác nhận vào session
                    $_SESSION['forgot_password_code'] = $code;
                    // Chuyển hướng đến trang xác nhận mã
                    header("Location: /verify-code"); // Điều hướng đến trang xác nhận mã
                    exit;
                } else {
                    $data['error'] = 'Có lỗi xảy ra khi gửi email. Vui lòng thử lại.';
                }
            } else {
                $data['error'] = $error;
            }
        }

        $this->view("login/forgot", $data);
    }
}
