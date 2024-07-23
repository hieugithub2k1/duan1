<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
    font-family: Arial, sans-serif; /* Sử dụng font chữ phù hợp */
    background-color: #f4f4f4; /* Màu nền */
    color: #333; /* Màu chữ */
}

.them {
    max-width: 700px;
    margin: 0 auto;
    padding: 30px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Đổ bóng cho box */
    background-color: #fff; /* Màu nền của box */
}

.input-item {
    margin-top: 20px;
}

.input-item > *:last-child {
    width: calc(100% - 10px); /* Điều chỉnh chiều rộng của input */
    padding: 5px;
    outline: none;
    border: 1px solid #ccc; /* Đường viền input */
    border-radius: 4px; /* Bo góc */
}

.input-item > label {
    display: block;
    margin-bottom: 5px;
    font-weight: bold; /* Đậm */
}

.input-item > button {
    background-color: #007bff; /* Màu nút */
    color: #fff; /* Màu chữ nút */
    border: none;
    padding: 10px 20px;
    cursor: pointer;
    border-radius: 4px;
    transition: background-color 0.3s ease; /* Hiệu ứng hover */
}

.input-item > button:hover {
    background-color: #0056b3; /* Màu nút khi hover */
}

.hinh {
    max-width: 150px;
}

.hinh img {
    width: 100%;
    display: block;
    border-radius: 4px;
    margin-top: 10px; /* Khoảng cách với input */
}
.hinh1 img {
    max-width: 100px; /* Đặt chiều rộng tối đa của hình ảnh */
    height: auto; /* Chiều cao tự động tính toán để giữ tỷ lệ khung hình */
    display: block;
    border-radius: 4px;
    margin-top: 10px;
}
    </style>
</head>
<body>
    <div class="them">
        <form action="<?=WEB_ROOT?>/admin/product/edit_data/<?= $product['id'] ?>" method="post" enctype="multipart/form-data">
            <h3>Sửa sản phẩm</h3>
        
            <div class="input-item">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="n2" value="<?= $product['product_name'] ?>">
            </div>
            <div class="input-item">
                <label for="">Mô tả ngắn</label>
                <input type="text" name="n4" value="<?= $product['des_short'] ?>">
            </div>
            <div class="input-item">
                <label for="">Mô tả</label>
                <input type="text" name="n5" value="<?= $product['des'] ?>">
            </div>
            <div class="input-item">
                <label for="">Giá</label>
                <input type="text" name="n6" value="<?= $product['price'] ?>">
            </div>
            <div class="input-item">
                <label for="">Giá khuyến mãi</label>
                <input type="text" name="n7" value="<?= $product['price_sale'] ?>">
            </div>
            <div class="input-item">
                <label for="">Số lượng</label>
                <input type="text" name="n8" value="<?= $product['stock_quantity'] ?>">
            </div>
            <div class="input-item">
                <label for="">Hình</label>
                <input type="file" name="n9">
                <img src="<?= WEB_ROOT ?>/public/css2/images/<?= $product['img_url'] ?>" alt="<?= $product['product_name'] ?>" style="max-width: 400px; max-height: 400px; display: block; margin: 0 auto;">


            </div>
            <div class="input-item">
                <label for="">Danh mục</label>
                <!-- <input type="text" name="n10" value="<?= $product['productcategory_id'] ?>">
                  -->
                  <select name="n10" id="productcategory">
                    <?php foreach ($datacustom as $category) : ?>
                        <option value="<?= $category['id']; ?>" <?=$product['productcategory_id'] == $category['id'] ? "selected" : "" ?>   ><?= $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="input-item">
                <label for="">Thương hiệu</label>
                <!-- <input type="text" name="n11" value="<?= $product['brands_id'] ?>"> -->
                <select name="n11" id="brands">
                    <?php foreach ($hang as $category) : ?>
                        <label for="">Danh mục sản phẩm</label>
                        <option value="<?= $category['id']; ?>" <?=$product['brands_id'] == $category['id'] ? "selected" : "" ?>><?= $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>

<!-- <?php  echo $product['brands_id']?> -->

            </div>
            <div class="input-item">
               <button name="btn">Sửa</button>
            </div>
        </form>
    </div>
    <?= WEB_ROOT ?>/public/css2/images/<?= $product['img_url'] ?>
        
</body>
</html>