<!DOCTYPE html>
<html lang="en">

<head>
    <base href="<?= WEB_ROOT ?>">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/style.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" />
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/css/font.css">
    <link rel="stylesheet" href="<?= WEB_ROOT ?>/public/assets/css/reset.css">

</head>

<?php if (isset($_SESSION['flash_message'])) : ?>
    <div class="thongbao" role="alert">
        <?php
        echo $_SESSION['flash_message'];
        unset($_SESSION['flash_message']); // Xóa thông báo sau khi hiển thị
        ?>
    </div>
<?php endif; ?>

<body>
    <?php if (isset($error)) : ?>
        <p style="color: red;"><?php echo $error; ?></p>
    <?php endif; ?>
    <SECtion class="login-container">
        <div class="title">

            <a href="<?= WEB_ROOT ?>/home/login" class="login">ĐĂNG NHẬP</a>
            <p class="hh">|</p>
            <a href="<?= WEB_ROOT ?>/home/register" class="register">ĐĂNG KÝ</a>
        </div>


        <div class="form">
            <form action="<?= WEB_ROOT ?>/users/login" method="POST">
                <p class="email">Email:</p>
                <input type="text" id="username" name="email" placeholder="Vui lòng nhập Email của bạn" required>
                <p class="pass">Mật khẩu:</p>
                <input type="password" id="username" name="password" placeholder="Vui lòng nhập mật khẩu của bạn" required>
                <div class="boxtom">
                    <div class="left">
                        <button class="btn-dn" type="submit">Đăng nhập</button>
                    </div>
                    <div class="right">
                        <p>Bạn chưa có tài khoản? <a href="">Đăng kí ngay</a></p>
                        <p>Bạn quên mật khẩu <a href="<?= WEB_ROOT ?>/home/forgot" id="btn_quen">Khôi phục mật khẩu</a></p>
                    </div>


                </div>
            </form>
        </div>

        <div class="dnn">
            <p>Hoặc đăng nhập nhanh:</p>

            <div class="ic-dnn">
                <div class="dn-fb">


                    <i class="fa-brands fa-facebook-f" style="color: #fff;"></i>
                    Đăng nhập với facebook
                </div>
                <div class="dn-gg">
                    <i class="fa-brands fa-google-plus-g"></i>
                    Đăng nhập với google

                </div>
            </div>
        </div>
    </SECtion>





</body>

</html>