<!-- admin/includes/header.php -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel</title>
    <link rel="stylesheet" href="style.css">
    <style>
        /* admin/style.css */
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

header {
    background-color: #333;
    color: #fff;
    padding: 15px 20px;
    text-align: center;
}

nav ul {
    list-style: none;
    padding: 0;
    margin: 0;
}

nav ul li {
    display: inline;
    margin-right: 20px;
}

nav ul li a {
    color: #fff;
    text-decoration: none;
}

main {
    padding: 20px;
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
}

    </style>
</head>
<body>
    <header>
        <h1>Quản trị hệ thống</h1>
        <nav>
            <ul>
                <li><a href="http://localhost/testmvc/admin/home/show">Trang chủ</a></li>
                <li><a href="http://localhost/testmvc/admin/users/show">Quản lý tài khoản</a></li>
                <li><a href="http://localhost/testmvc/admin/danhmuc/show">Quản lý danh mục</a></li>
                <li><a href="http://localhost/testmvc/admin/product/show">Quản lý sản phẩm</a></li>
                <li><a href="http://localhost/testmvc/admin/users/order">Quản lý đơn hàng</a></li>

            </ul>

        </nav>

    </header>
    <!-- <h1>Đây là trang chủ admin</h1> -->

    <main>
