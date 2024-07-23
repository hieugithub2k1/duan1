<div class="container">
    <h2 class="text-center my-4">Order </h2>
    <div class="order-table">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã đơn</th>
                    <th>Total Price</th>
                    <th>Ngày đặt</th>
                    <th>Status</th>
                    <th>Cancel Order</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($oder as $order) : ?>
                    <tr>
                        <td><?php echo $order['id']; ?></td>
                        <td>$<?php echo $order['total_price']; ?></td>
                        <td><?php echo $order['created_at']; ?></td>
                        <td>
                            <?php
                            if ($order['status'] == 1) {
                                echo 'Being Confirmed';
                            } elseif ($order['status'] == 2) {
                                echo 'Being Shipped';
                            } elseif ($order['status'] == 3) {
                                echo 'Delivered';
                            } else {
                                echo 'Unknown';
                            }
                            ?>
                        </td>
                        <td>
                            <?php if ($order['status'] == 1) : ?>
                                <a href="<?= WEB_ROOT ?>/cart/cancelorder/<?php echo $order['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc chắn muốn hủy đơn hàng này?')">Cancel</a>
                            <?php endif; ?>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
