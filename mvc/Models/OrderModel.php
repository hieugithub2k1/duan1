<?php
class OrderModel extends Database {
    public function createOrder($data) {
        $query = "INSERT INTO orders (users_id, status, total_price, shipping_address, created_at) VALUES (?, ?, ?, ?, ?)";
        
        $stmt = mysqli_prepare($this->conn, $query);
    
        $stmt->bind_param("iiiss", $data['users_id'], $data['status'], $data['total_price'], $data['shipping_address'], $data['created_at']);
        if ($stmt->execute()) {
            return $this->conn->insert_id;
        } else {
            return false;
        }
    }
    public function createOrderItem($data) {
        $sql = "INSERT INTO order_detail (order_id, product_id, quantity, price, total, created_at) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("iiidds", $data['order_id'], $data['product_id'], $data['quantity'], $data['price'], $data['total'], $data['created_at']);
        return $stmt->execute();
    }

    public function approveOrder($orderId) {
        $newStatus = 2; // Trạng thái '2' biểu thị đã duyệt
        $sql = "UPDATE orders SET status = ? WHERE id = ? AND status = 1"; // Chỉ duyệt đơn hàng có trạng thái hiện tại là 1
        $stmt = mysqli_prepare($this->conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ii", $newStatus, $orderId);
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
    
    public function cancelOrder($orderId) {
        $newStatus = 3; 
        $sql = "UPDATE orders SET status = ? WHERE id = ? AND status = 1"; 
        $stmt = mysqli_prepare($this->conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ii", $newStatus, $orderId);
            mysqli_stmt_execute($stmt);
            if (mysqli_stmt_affected_rows($stmt) > 0) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }
}
