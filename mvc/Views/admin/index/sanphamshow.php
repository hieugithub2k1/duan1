<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
       .danhmuc{
            max-width: 1300px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0 0 10px gray;
        }
        .table{
            width:100%;
            border-collapse: collapse;
        }
        .table td{
            padding: 10px;
            border: 1px solid #ddd; /* Thêm đường viền cho ô */
        }
        .hinh{
            max-width: 150px;
            height: 100px;
            overflow: hidden;
            display: flex; /* Dùng flexbox để căn giữa hình ảnh */
            align-items: center; /* Căn giữa theo chiều dọc */
            justify-content: center; /* Căn giữa theo chiều ngang */
        }
        .hinh img{
            width: 100%;
            height: 100%;
            object-fit: cover; /* Đảm bảo hình ảnh không bị méo khi hiển thị */
        }
        .a_css{
            display: inline-block;
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            border-radius: 5px;
            background-color: black; /* Màu đen cho nút */
        }
        .hv:hover{
            background-color: gray; /* Màu khi hover */
            color: white; /* Màu chữ khi hover */
            transform: scale(1.05); /* Phóng to nhẹ khi hover */
        }
        .btn {
            margin-top: 20px; /* Khoảng cách giữa bảng và nút Thêm */
        }
    </style>
</head>
<body>
<div class="danhmuc">
    <table class="table" border="<?php  echo $hang[''] ?>" col>
        <thead class="table-dark">
        <tr>
            <th>Mã sp</th>
            <th>Tên sp</th>
            <th>Mô tả ngắn</th>
            <!-- <th>Mô tả</th> -->
            <th>Giá</th>
            <!-- <th>Giá khuyến mãi</th> -->
            <th>Số lượng</th>
            <th>Hình ảnh</th>
            <th>Ngày thêm</th>
            <th>Danh mục</th>
            <th>Hãng</th>
            <th>Người thêm</th>

            <th></th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php
        foreach($datacustom as $hang){
            ?>
            <tr>
                <td><?php  echo $hang['id'] ?></td>
                <td><?php  echo $hang['product_name'] ?></td>
                <td><?php  echo $hang['des_short'] ?></td>
                <!-- <td><?php  echo $hang['des'] ?></td> -->
                <td><?php  echo $hang['price'] ?></td>
                <!-- <td><?php  echo $hang['price_sale'] ?></td> -->
                <td><?php  echo $hang['stock_quantity'] ?></td>
                <td><div class="hinh"><img src="<?= WEB_ROOT ?>/public/css2/images/<?php  echo $hang['img_url'] ?>" alt=""></div> </td>
                <td><?php  echo $hang['created_at'] ?></td>
                <td><?php  echo $hang['productcategory_id'] ?></td>
                <td><?php  echo $hang['brands_id'] ?></td>
                <td>admin</td>
                <td><a class="a_css hv" href="http://localhost/testmvc/admin/product/edit_data/<?= $hang['id'] ?>">Sửa</a></td>
                <td><a class="a_css hv" href="http://localhost/testmvc/admin/product/delete_data/<?= $hang['id'] ?>"onclick="return xoa()" >Xóa</a></td>
            </tr>
            <?php
        }
        ?>
        <br>
        <br>
        <br>
        </tbody>
    </table>
    <div class="them">
        <a class="btn a_css hv" href="http://localhost/testmvc/admin/product/add_data">Thêm</a>
    </div>
</div>
<div class="thongbao">
    <?php
    if(isset($_SESSION['thongbao'])){
        echo $_SESSION['thongbao'];
        unset($_SESSION['thongbao']);
    }
    ?>
</div>
<script>
    function xoa(){
        return confirm("Bạn có muốn xóa sản phẩm này hay không ?");
    }
</script>
</body>
</html>
