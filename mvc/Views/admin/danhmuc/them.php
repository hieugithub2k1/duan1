<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Danh Mục Sản Phẩm</title>
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
            border-radius: 5px; /* Bo góc */
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
    </style>
</head>
<body>
    <div class="them">
        <form action="<?=WEB_ROOT?>/admin/danhmuc/add_data" method="post">
            <h3>Thêm Danh Mục Sản Phẩm</h3>
            <div class="input-item">
                <label for="name">Tên danh mục</label>
                <input type="text" required name="n2">

            </div>
            <div class="input-item">
                <button name="btn">Thêm</button>
            </div>
        </form>
    </div>
</body>
</html>
