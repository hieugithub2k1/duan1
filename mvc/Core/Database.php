



 <?php

class Database
{
    protected $conn;
    private $host = 'localhost';
    private $user = 'root';
    private $password = '19052k1ds';
    private $db_name = 'asm_php2';

    // Hàm khởi tạo của lớp
    function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->password, $this->db_name);

        if (!$this->conn) {
            echo __DIR__ . "/database.php - line 18 <br>";
            die("Connection failed: " . mysqli_connect_error());
        }
    }

    // function getbyid($table,$id){
    //     $sql = "select * from $table where id = $id";
    //     $result = mysqli_query($this->conn,$sql);

    //     return mysqli_fetch_assoc($result);
    // }

    function editrow($table,$id,$data,$rowisnum = []){
        $array_values = array_map(function($key,$value) use ($rowisnum) {
            $value_tmp = in_array($key,$rowisnum) ? $value : "'".$value."'" ;
            return $key .'='. $value_tmp ;
        },array_keys($data),$data);
        $values = implode(',',$array_values);
        $sql = "UPDATE $table SET $values WHERE id = $id";
        
        return mysqli_query($this->conn,$sql);
    }
  

    // Hàm đóng kết nối
    function __destruct()
    {
        if ($this->conn) {
            mysqli_close($this->conn);
        }
    }

    public function getConnection() {
        $this->conn = null;

        try {
            $this->conn = new mysqli($this->host, $this->user, $this->password, $this->db_name);
        } catch (Exception $e) {
            echo "Connection error: " . $e->getMessage();
        }

        return $this->conn;
    }
}

