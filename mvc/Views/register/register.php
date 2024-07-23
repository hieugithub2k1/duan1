<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login and Registration Form</title>
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/register.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/css/font.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/css/reset.css">
</head>
<body>
    
    

<?php 
// foreach ($data['sub_ct'] as $record) { 
//                 // Xử lý dữ liệu ở đây
//                 foreach ($data['sub_ct'] as $record) {
//                     echo "Tên sản phẩm: " . $record['product_name'] . ", Giá: $" . $record['price'] . "<br>";
//                 }

//             }
?>
    <section class="login-container">
        <div class="title">
            <a href=""></a>
            <a href="<?= WEB_ROOT ?>/home/login" class="login">ĐĂNG NHẬP</a>
            <p class="hh">|</p>
            <a href="<?= WEB_ROOT ?>/home/register" class="register">ĐĂNG KÝ</a>
        </div>

        <div class="form">
            <form action="<?= WEB_ROOT ?>/users/register" method="post">
                <p class="name">Họ:</p>
                <input type="text" id="lastname" name="lastname" placeholder="Họ" required>
                <p class="name">Tên:</p>
                <input type="text" id="firstname" name="firstname" placeholder="Tên" required>
                <!-- <p class="gender">Giới tính:</p> -->
                <!-- <select id="gender" name="gender">
                    <option value="male">Nam</option>
                    <option value="female">Nữ</option>
                </select> -->

                <!-- <p class="dob">Ngày sinh:</p>
                <input type="text" id="dob" name="dob" placeholder="mm/dd/yyyy"> -->

                <p class="email">Email:</p>
                <input type="email" id="email" name="email" placeholder="Vui lòng nhập Email của bạn" required>

                <p class="pass">Mật khẩu:</p>
                <input type="password" id="password" name="password" placeholder="Vui lòng nhập mật khẩu của bạn" required>

                <p class="email">Số điện thoại:</p>
                <input type="text" id="phonename" name="phonename" placeholder="Vui lòng nhập Số điện thoại của bạn" required>

                <p class="email">Địa chỉ:</p>
                <input type="text" id="address" name="address" placeholder="Vui lòng nhập Địa chỉ của bạn" required></input>

                <div class="boxtom">
                    <button class="btn-dk" type="submit" name="register">Đăng ký</button>
                    <p>Bạn đã có tài khoản? <a href="http://localhost/testmvc/home/login">Đăng nhập ngay</a></p>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
