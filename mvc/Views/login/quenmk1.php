<?php


// Kiểm tra nếu chưa có session hoặc không có mã xác nhận trong session
if (!isset($_SESSION['forgot_password_code'])) {
    // Điều hướng về trang yêu cầu nhập email nếu chưa có mã xác nhận trong session
    $webRoot = WEB_ROOT;
    header("Location: $webRoot/home/forgot");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đặt lại mật khẩu</title>
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/css/font.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/css/reset.css">
</head>
<?php if (isset($error)) echo $error ?>

<body>
    <section class="login-container">
        <div class="title">
            <a href="<?= WEB_ROOT ?>/home/login" class="login">ĐĂNG NHẬP</a>
            <p class="hh">|</p>
            <a href="<?= WEB_ROOT ?>/home/register" class="register">ĐĂNG KÝ</a>
        </div>

        <div class="form">
            <h1>Đặt lại mật khẩu</h1>
            <form action="<?= WEB_ROOT ?>/home/resetPassword" method="POST">
                <p class="email">Mật khẩu mới:</p>
                <input type="password" id="password" name="password" required placeholder="Nhập mật khẩu mới">
                <span style="color: red;"><?php if (isset($error['password'])) echo $error['password'] ?></span>

                <p class="email">Xác nhận mật khẩu:</p>
                <input type="password" id="confirm_password" name="confirm_password" placeholder="Xác nhận mật khẩu mới">
                <span style="color: red;"><?php if (isset($error['confirm_password'])) echo $error['confirm_password'] ?></span>

                <div class="left">
                    <button class="btn-dn" type="submit" name="submit">Đặt lại mật khẩu</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
