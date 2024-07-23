<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Đơn Hàng</title>
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
    <h2>Quản Lý Đơn Hàng</h2>
    <table class="table">
        <thead>
        <tr>
            <th>Mã Đơn</th>
            <th>Địa Chỉ</th>
            <th>Tổng Tiền</th>
            <th>Ngày Đặt</th>
            <th>Duyệt</th>
            <th>Hủy</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($data['datacustom'])): ?>
            <?php foreach ($data['datacustom'] as $order): ?>
                <tr>
                    <td><?php echo htmlspecialchars($order['id']); ?></td>
                    <td><?php echo htmlspecialchars($order['shipping_address']); ?></td>
                    <td><?php echo htmlspecialchars($order['total_price']); ?></td>
                    <td><?php echo htmlspecialchars($order['created_at']); ?></td>
                    <td>
                        <?php if ($order['status'] == 1): ?>
                            <a class="btn" href="<?= WEB_ROOT ?>/admin/users/approve/<?= $order['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn duyệt đơn hàng này?')">Duyệt</a>
                        <?php elseif ($order['status'] == 2): ?>
                            Đã Duyệt
                        <?php endif; ?>
                    </td>
                    <td>
                        <?php if ($order['status'] == 1): ?>
                            <a class="btn btn-delete" href="<?= WEB_ROOT ?>/admin/users/cancel/<?= $order['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Hủy</a>
                        <?php elseif ($order['status'] == 3): ?>
                            Đã Hủy
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="6">Không có đơn hàng nào</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>
