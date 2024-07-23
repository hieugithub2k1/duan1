<?php
// session_start();

// Kiểm tra nếu chưa có session hoặc không có mã xác nhận trong session
if (!isset($_SESSION['forgot_password_code'])) {
    // Điều hướng về trang yêu cầu nhập email nếu chưa có mã xác nhận trong session
    $webRoot = WEB_ROOT;
    header("Location: $webRoot/home/forgot");
    exit;
}

$correct_code = $_SESSION['forgot_password_code'];
$error = '';

if (isset($_POST['submit'])) {
    $entered_code = $_POST['code'];

    if ($entered_code == $correct_code) {
        // Mã xác nhận đúng, cho phép người dùng cập nhật mật khẩu
        // Ví dụ: chuyển hướng đến trang cập nhật mật khẩu
        $webRoot = WEB_ROOT;
        header("Location:". WEB_ROOT."/home/resetpassword");
        exit;
    } else {
        $error = 'Mã xác nhận không đúng. Vui lòng thử lại.';
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css"
        integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/css/font.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/css/reset.css">
</head>

<body>
    <section class="login-container">
        <div class="title">
            <a href="<?= WEB_ROOT ?>/home/login" class="login">ĐĂNG NHẬP</a>
            <p class="hh">|</p>
            <a href="<?= WEB_ROOT ?>/home/register" class="register">ĐĂNG KÝ</a>
        </div>

        <div class="form">
            <h1>Nhập mã xác nhận</h1>
            <form action="" method="POST">
                <p class="email">Mã xác nhận:</p>
                <input type="text" id="code" name="code" required placeholder="Vui lòng nhập mã xác nhận của bạn">
                <?php if ($error): ?>
                    <span style="color: red;"><?= $error ?></span>
                <?php endif; ?>
                <div class="left">
                    <button class="btn-dn" type="submit" name="submit">Gửi</button>
                </div>
            </form>
        </div>
    </section>
</body>

</html>
