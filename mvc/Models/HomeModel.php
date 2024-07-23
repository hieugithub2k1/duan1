<?php

class HomeModel extends Database
{
    
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

    // Phương thức để lấy một bản ghi theo ID
    public function getRecordById($table, $id)
    {
        $query = "SELECT * FROM $table WHERE id = ?";
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

        public function addProduct($productName, $desShort, $des, $price, $priceSale, $stockQuantity, $imgUrl, $createdAt, $productCategoryId, $brandsId) {
            $sql = "INSERT INTO products (product_name, des_short, des, price, price_sale, stock_quantity, img_url, created_at, productcategory_id, brands_id) VALUES ('$productName', '$desShort', '$des', $price, $priceSale, $stockQuantity, '$imgUrl', '$createdAt', $productCategoryId, $brandsId)";
            mysqli_query($this->conn, $sql);
        }
  




    public function deleteProduct($productId) {
        // Chuẩn bị câu lệnh SQL để xóa sản phẩm theo ID
        $sql = "DELETE FROM products WHERE id = ?";
        
        // Chuẩn bị statement
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $productId);
        
        // Thực hiện câu lệnh SQL
        if (mysqli_stmt_execute($stmt)) {
            return true;
        } else {
            echo "Error deleting record: " . mysqli_error($this->conn);
            return false;
        }
    }
    public function updateProduct($id, $productName, $desShort, $des, $price, $priceSale, $stockQuantity, $imgUrl, $createdAt, $productCategoryId, $brandsId) {
        $sql = "UPDATE products SET product_name=?, des_short=?, des=?, price=?, price_sale=?, stock_quantity=?, img_url=?, created_at=?, productcategory_id=?, brands_id=? WHERE id=?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'sssdidisiii', $productName, $desShort, $des, $price, $priceSale, $stockQuantity, $imgUrl, $createdAt, $productCategoryId, $brandsId, $id);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
    }

    public function getProductById($id) {
        $sql = "SELECT * FROM products WHERE id = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        mysqli_stmt_bind_param($stmt, 'i', $id);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        return mysqli_fetch_assoc($result);
    }


    function editrow($table,$id,$data,$rowisnum = []){
        $array_values = array_map(function($key,$value) use ($rowisnum) {
            $value_tmp = in_array($key,$rowisnum) ? $value : "'".$value."'" ;
            return $key .'='. $value_tmp ;
        },array_keys($data),$data);
        $values = implode(',',$array_values);
        $sql = "UPDATE $table SET $values WHERE id = $id";
        
        return mysqli_query($this->conn,$sql);
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
}
