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
<?php 

?>


<body>
    <SECtion class="login-container">
        <div class="title">

            <a href="<?= WEB_ROOT ?>/home/login" class="login">ĐĂNG NHẬP</a>
            <p class="hh">|</p>
            <a href="<?= WEB_ROOT ?>/home/register" class="register">ĐĂNG KÝ</a>
        </div>

        <div class="form">
            <h1>Phục hồi mật khẩu</h1>
            <form action="<?= WEB_ROOT ?>/home/forgot" method="POST" >
                <p class="email">Email:</p>
                <input type="text" id="email" name="email" required placeholder="Vui lòng nhập Email của bạn">
                <span style="color: red;"><?php if (isset($error)) echo $error ?></span> 

                <div class="left">
                    <button class="btn-dn" type="submit" name="submit">Gửi</button>
                </div>
               

        </div>
        </form>
        </div>

      
    </SECtion>




</body>

</html>