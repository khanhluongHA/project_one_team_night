<?php
    class BinhLuan{
        public $conn;

    public function __construct() 
    {
        $this->conn = connectDB();
    }
        public function getAllBinhLuan() 
    {
        try {
            $sql = 'SELECT binh_luans.*, tai_khoans.ho_ten,tai_khoans.email ,san_phams.ten_san_pham
                    FROM binh_luans
                    INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                    INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id  ';
            
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([]);

            return $stmt->fetchAll();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }
    }
?>