<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quản Lý Tài Khoản</title>
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
    <h2>Quản Lý Tài Khoản</h2>
    <!-- <a class="btn btn-add" href="<?= WEB_ROOT ?>/admin/user/add">Thêm Tài Khoản</a> -->
    <table class="table">
        <thead>
        <tr>
            <th>Mã Tài Khoản</th>
            <th>Họ</th>
            <th>Tên</th>
            <th>Điện Thoại</th>
            <th>Email</th>
            <th>Địa Chỉ</th>
            <th>Trạng Thái</th>
            <th>Thao Tác</th>
        </tr>
        </thead>
        <tbody>
        <?php if (!empty($data['datacustom'])): ?>
            <?php foreach ($data['datacustom'] as $user): ?>
                <tr>
                    <td><?php echo htmlspecialchars($user['id']); ?></td>
                    <td><?php echo htmlspecialchars($user['firstname']); ?></td>
                    <td><?php echo htmlspecialchars($user['lastname']); ?></td>
                    <td><?php echo htmlspecialchars($user['phonename']); ?></td>
                    <td><?php echo htmlspecialchars($user['email']); ?></td>
                    <td><?php echo htmlspecialchars($user['address']); ?></td>
                    <td>
                        <?php
                        if ($user['roles'] == 0) {
                            echo "Đang Hoạt Động";
                        } else if ($user['roles'] == 2) {
                            echo "Bị Khóa";
                        }
                        ?>
                    </td>
                    <td>
                        <?php if ($user['roles'] != 1): ?>
                            <?php if ($user['roles'] == 2): ?>
                                <a class="btn" href="<?= WEB_ROOT ?>/admin/users/unlock/<?= $user['id'] ?>">Mở khóa</a>
                            <?php elseif ($user['roles'] == 0): ?>
                                <a class="btn btn-delete" href="<?= WEB_ROOT ?>/admin/users/lock/<?= $user['id'] ?>" onclick="return confirm('Bạn có chắc chắn muốn khóa tài khoản này?')">Khóa</a>
                            <?php endif; ?>
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="9">Không có tài khoản nào</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
</div>
</body>
</html>

