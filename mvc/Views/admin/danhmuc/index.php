<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Mục Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
        }

        .danhmuc {
            max-width: 1300px;
            margin: 20px auto;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            background-color: #fff;
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px;
        }

        .table th, .table td {
            padding: 10px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }

        .table td {
            background-color: #fff;
        }

        .btn {
            display: inline-block;
            text-decoration: none;
            padding: 5px 10px;
            border-radius: 5px;
            color: #fff;
            background-color: #007bff;
            transition: background-color 0.3s ease;
        }

        .btn:hover {
            background-color: #0056b3;
            transform: scale(1.05);
        }

        .btn-delete {
            background-color: #dc3545;
        }

        .btn-delete:hover {
            background-color: #c82333;
            transform: scale(1.05);
        }

        .btn-add {
            display: inline-block;
            margin-bottom: 20px;
            padding: 10px 15px;
            background-color: #28a745;
        }

        .btn-add:hover {
            background-color: #218838;
            transform: scale(1.05);
        }
    </style>
</head>
<body>
<div class="danhmuc">
    <h2>Danh Mục Sản Phẩm</h2>
    <a class="btn btn-add" href="<?= WEB_ROOT ?>/admin/danhmuc/add_data">Thêm Danh Mục</a>
    <table class="table">
        <thead>
        <tr>
            <th>ID</th>
            <th>Tên Danh Mục</th>
            <th>Ngày Tạo</th>
            <th>Sửa</th>
            <th>Xóa</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($data['datacustom'])): ?>
            <?php foreach ($data['datacustom'] as $category): ?>
                <tr>
                    <td><?php echo htmlspecialchars($category['id']); ?></td>
                    <td><?php echo htmlspecialchars($category['name']); ?></td>
                    <td><?php echo htmlspecialchars($category['created_at']); ?></td>
                    <td><a class="btn" href="<?= WEB_ROOT ?>/admin/danhmuc/editCategoryData/<?= $category['id'] ?>">Sửa</a></td>
                    <td><a class="btn btn-delete" href="<?= WEB_ROOT ?>/admin/danhmuc/delete_data/<?= $category['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn xóa danh mục này?')">Xóa</a></td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="5">Không có danh mục nào</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
