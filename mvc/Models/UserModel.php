<?php

class UserModel extends Database{
   

    public function register($email, $password, $firstname, $lastname, $phonename, $address, $roles) {
        // $passwordHash = password_hash($password, PASSWORD_DEFAULT);
        $created_at = date('Y-m-d H:i:s');
        // echo $password;
        $sql = "INSERT INTO users (email, password, firstname, lastname, phonename, address, roles, created_at) VALUES ('$email', '$password', '$firstname', '$lastname', '$phonename', '$address', $roles, '$created_at')";
    //    echo $sql . "dòng 11 usermodel"; exit();
        mysqli_query($this->conn, $sql);
    }

    // public function login($email, $password) {
    //     $sql = "SELECT * FROM users WHERE email = ?";
    //     $stmt = $this->conn->prepare($sql);
    //     $stmt->bind_param('s', $email);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     $user = $result->fetch_assoc();
        
    //     if ($user && $password === $user['password']) {
    //         return $user;
    //     } else {
    //         return false;
    //     }
    // }
    

    public function login($email, $password) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        // echo $sql; exit();
        $result = mysqli_query($this->conn, $sql);
        $user = mysqli_fetch_assoc($result);
        
        if ($user && $password === $user['password']) {
            return $user;
        } else {
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
    

    public function findUserByEmail($email) {
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_assoc($result);
    }

    public function updatePassword($email, $newPassword) {
        $newPasswordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET password = '$newPasswordHash' WHERE email = '$email'";
        mysqli_query($this->conn, $sql);
    }

    function getuserbyemail($email){
        $sql = "SELECT * FROM users WHERE email = '$email'";
        $result = mysqli_query($this->conn, $sql);
        return mysqli_fetch_all($result,MYSQLI_ASSOC);
    }

    public function lockRole($userId) {
        $sql = "UPDATE users SET roles = 2 WHERE id = ? AND roles = 0";
        $stmt = mysqli_prepare($this->conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $userId);
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

    public function unlockRole($userId) {
        $sql = "UPDATE users SET roles = 0 WHERE id = ? AND roles = 2";
        $stmt = mysqli_prepare($this->conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "i", $userId);
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

    public function updatePasswordByEmail($email, $password) {
        $sql = "UPDATE users SET password = ? WHERE email = ?";
        $stmt = mysqli_prepare($this->conn, $sql);
        if ($stmt) {
            mysqli_stmt_bind_param($stmt, "ss", $password, $email);
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

?>
