<?php

class CartModel extends Database {
    
    public function addToCart($userId, $productId, $quantity, $createdAt) {
        $sql = "INSERT INTO cart (users_id, product_id, quantity, created_at) VALUES ($userId, $productId, $quantity, '$createdAt')";
        mysqli_query($this->conn, $sql);
    }

    function getById($table, $id) {
        $sql = "SELECT * FROM $table WHERE id = $id";
        $result = mysqli_query($this->conn, $sql);
    
        if (!$result) {
            echo __DIR__ . "/HomeModel.php - line " . __LINE__ . " <br>";
            die("Query failed: " . mysqli_error($this->conn));
        }
    
        return mysqli_fetch_assoc($result);
    }
    public function getCartItemByProductId($userId, $productId) {
        $query = "SELECT * FROM cart WHERE users_id = ? AND product_id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
    
        if (!$stmt) {
            // Xử lý lỗi nếu cần
        }
    
        mysqli_stmt_bind_param($stmt, 'ii', $userId, $productId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (!$result) {
            // Xử lý lỗi nếu cần
        }
    
        return mysqli_fetch_assoc($result);
    }
    public function updateCartItemQuantity($userId, $productId, $newQuantity) {
        // Kiểm tra xem giỏ hàng có tồn tại mục sản phẩm này không
        $cartItem = $this->getCartItemByProductId($userId, $productId);
    
        if ($cartItem) {
            // Nếu mục sản phẩm đã tồn tại trong giỏ hàng, cập nhật số lượng
            $query = "UPDATE cart SET quantity = ? WHERE users_id = ? AND product_id = ?";
            $stmt = mysqli_prepare($this->conn, $query);
    
            if (!$stmt) {
                // Xử lý lỗi nếu cần
            }
    
            mysqli_stmt_bind_param($stmt, 'iii', $newQuantity, $userId, $productId);
            mysqli_stmt_execute($stmt);
    
            if (mysqli_affected_rows($this->conn) > 0) {
                // Cập nhật thành công
                return true;
            } else {
                // Cập nhật không thành công
                return false;
            }
        } else {
            // Nếu mục sản phẩm không tồn tại trong giỏ hàng, không thể cập nhật
            return false;
        }
    }
    public function getAllRecords($table)
    {
        $query = "SELECT * FROM $table";
        $result = mysqli_query($this->conn, $query);

        if (!$result) {
            echo __DIR__ . "/HomeModel.php - line " . __LINE__ . " <br>";
            die("Query failed: " . mysqli_error($this->conn));
        }

        return mysqli_fetch_all($result, MYSQLI_ASSOC);
    }
    public function showCart($userId) {
        $query = "SELECT * FROM cart WHERE users_id = ? ";
        $stmt = mysqli_prepare($this->conn, $query);
    
        if (!$stmt) {
            // Xử lý lỗi nếu cần
            die('mysqli_prepare failed: ' . mysqli_error($this->conn));
        }
    
        mysqli_stmt_bind_param($stmt, 'i', $userId);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
    
        if (!$result) {
            // Xử lý lỗi nếu cần
            die('mysqli_stmt_get_result failed: ' . mysqli_error($this->conn));
        }
    
        $cartItems = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $cartItems[] = $row;
        }
    
        return $cartItems;
    }
    public function delcart($cartItemId) {
        $query = "DELETE FROM cart WHERE id = ? ";
        $stmt = mysqli_prepare($this->conn, $query);
    
        if (!$stmt) {
            // Xử lý lỗi nếu cần
            return false;
        }
    
        mysqli_stmt_bind_param($stmt, 'i', $cartItemId);
        $result = mysqli_stmt_execute($stmt);
    
        if (!$result) {
            // Xử lý lỗi nếu cần
            return false;
        }
    
        return true;
    }
    public function updateQuantity( $id, $quantityChange) {
        $query = "UPDATE cart SET quantity = quantity + ? WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $query);
        mysqli_stmt_bind_param($stmt, 'ii', $quantityChange, $id);
        mysqli_stmt_execute($stmt);
    }
    public function clearCart($userId) {
        $sql = "DELETE FROM cart WHERE users_id = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("i", $userId);
        return $stmt->execute();
    }

    public function getTableById($table, $id)
    {
        $query = "SELECT * FROM $table WHERE users_id = ?";
        $stmt = mysqli_prepare($this->conn, $query);

        if (!$stmt) {
            echo __DIR__ . "/HomeModel.php - line " . __LINE__ . " <br>";
            die("Prepare failed: " . mysqli_error($this->conn));
        }

        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);

        if (!$result) {
            echo __DIR__ . "/HomeModel.php - line " . __LINE__ . " <br>";
            die("Execute failed: " . mysqli_error($this->conn));
        }

        return mysqli_fetch_assoc($result);
    }

    // function getOrdesrById($table, $id) {
    //     $sql = "SELECT * FROM $table WHERE users_id = $id";
    //     $result = mysqli_query($this->conn, $sql);
    
    //     if (!$result) {
    //         echo __DIR__ . "/HomeModel.php - line " . __LINE__ . " <br>";
    //         die("Query failed: " . mysqli_error($this->conn));
    //     }
    
    //     return mysqli_fetch_assoc($result);
    // }
    
    function getOrdersByUserId($table, $id) {
       
        $sql = "SELECT * FROM $table WHERE users_id = ?";
        
        // Chuẩn bị câu truy vấn
        $stmt = mysqli_prepare($this->conn, $sql);
        
        // Kiểm tra lỗi trong quá trình chuẩn bị câu truy vấn
        if (!$stmt) {
            echo __DIR__ . "/HomeModel.php - line " . __LINE__ . " <br>";
            die("Prepare statement failed: " . mysqli_error($this->conn));
        }
        mysqli_stmt_bind_param($stmt, "i", $id);
        mysqli_stmt_execute($stmt);
        if (mysqli_stmt_error($stmt)) {
            echo __DIR__ . "/HomeModel.php - line " . __LINE__ . " <br>";
            die("Query execution failed: " . mysqli_stmt_error($stmt));
        }
        
        // Lấy kết quả
        $result = mysqli_stmt_get_result($stmt);
        
        // Khởi tạo mảng để lưu trữ các đơn hàng
        $orders = [];
        
        // Lặp qua từng dòng dữ liệu và đưa vào mảng $orders
        while ($row = mysqli_fetch_assoc($result)) {
            $orders[] = $row;
        }
        
        // Giải phóng bộ nhớ sau khi hoàn thành câu truy vấn
        mysqli_stmt_close($stmt);
        
        return $orders;
    }
    public function deleteOrder($table, $id) {
        // Xóa các chi tiết đơn hàng từ bảng order_detail
        $sqlDeleteDetail = "DELETE FROM order_detail WHERE order_id = ?";
        $stmtDeleteDetail = mysqli_prepare($this->conn, $sqlDeleteDetail);
        mysqli_stmt_bind_param($stmtDeleteDetail, "i", $id);
        
        if (mysqli_stmt_execute($stmtDeleteDetail)) {
            // Nếu xóa chi tiết đơn hàng thành công, tiếp tục xóa đơn hàng từ bảng orders
            $sqlDeleteOrder = "DELETE FROM $table WHERE id = ?";
            $stmtDeleteOrder = mysqli_prepare($this->conn, $sqlDeleteOrder);
            mysqli_stmt_bind_param($stmtDeleteOrder, "i", $id);
            
            if (mysqli_stmt_execute($stmtDeleteOrder)) {
                return true; // Xóa đơn hàng thành công
            } else {
                echo "Error deleting order: " . mysqli_error($this->conn);
                return false; // Lỗi khi xóa đơn hàng
            }
        } else {
            echo "Error deleting order details: " . mysqli_error($this->conn);
            return false; // Lỗi khi xóa chi tiết đơn hàng
        }
    }


    
}