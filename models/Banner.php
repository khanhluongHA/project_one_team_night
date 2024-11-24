<?php
class Banner {
    public $conn;

    public function __construct() {
        $this->conn = connectDB(); // Đảm bảo hàm connectDB() hoạt động đúng
    }

    public function getAll(){
        try {
            
            $sql= 'SELECT * FROM banners WHERE 1';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOException $e){
            echo 'lỗi: ' . $e->getMessage();
        }
    }
}
