
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .them {
            max-width: 700px;
            margin: 0 auto;
            padding: 30px;
            box-shadow: 0 0 10px gray;
            background-color: #fff;
            border-radius: 5px;
        }

        .input-item {
            margin-top: 20px;
        }

        .input-item>*:last-child {
            width: 100%;
            padding: 10px;
            outline: none;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        button[name="btn"] {
            background-color: orange;
            color: white;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        button[name="btn"]:hover {
            background-color: yellow;
        }
    </style>
</head>

<body>
    <div class="them">
        <form action="<?= WEB_ROOT ?>/admin/product/add_data" method="post" enctype="multipart/form-data">
            <h3>Thêm sản phẩm</h3>

            <div class="input-item">
                <label for="">Tên sản phẩm</label>
                <input type="text" name="n2">
            </div>

            <div class="input-item">
                <label for="">Mô tả ngắn</label>
                <input type="text" name="n4">
            </div>
            <div class="input-item">
                <label for="">Mô tả</label>
                <input type="text" name="n5">
            </div>
            <div class="input-item">
                <label for="">Giá</label>
                <input type="number" name="n6" required>
            </div>
            <div class="input-item">
                <label for="">Giá khuyến mãi</label>
                <input type="number" name="n7" required>
            </div>
            <div class="input-item">
                <label for="">Số lượng</label>
                <input type="number" name="n8" required>
            </div>
            <div class="input-item">
                <label for="">Hình</label>
                <input type="file" name="n9">
            </div>
            <div class="input-item">
                <label for="">Danh mục sản phẩm</label>
                <select name="n10" id="productcategory">
                    <?php foreach ($datacustom as $category) : ?>
                        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <!-- <div class="input-item">
                <label for="">Danh mục sản phẩm</label>
                <input type="text" name="n10" required>
            </div> -->
            <div class="input-item">
                <label for="">Thương hiệu</label>
                <select name="n11" id="brands">
                    <?php foreach ($hang as $category) : ?>
                        <label for="">Danh mục sản phẩm</label>
                        <option value="<?= $category['id']; ?>"><?= $category['name']; ?></option>
                    <?php endforeach; ?>
                </select>
                <!-- <label for="">Thương hiệu</label>
                <input type="text" name="n11" required> -->
            </div>
            <div class="input-item">
                <button name="btn">Thêm</button>
            </div>
        </form>
        
    </div>
    
</body>
<!-- <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script> -->

</html>
