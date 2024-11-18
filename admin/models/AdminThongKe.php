<?php
class AdminThongKe {
    public $conn;

    public function __construct() 
    {
        $this->conn = connectDB();
    }

    public function getTongDoanhThu() {
        $stmt = $this->conn->query("SELECT SUM(TongDoanhThu) AS TongDoanhThu FROM thong_kes");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTongDonHangChoXuLy() {
        $stmt = $this->conn->query("SELECT COUNT(*) AS TongDonHangTon FROM don_hangs WHERE trang_thai_don_hang in (1,2,3,5,10,11)");
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getDoanhThuHangNgay() {
        $stmt = $this->conn->query("
            SELECT DATE(ngay_dat) AS Ngay, SUM(tong_tien) AS TongDoanhThu
            FROM don_hangs
            WHERE trang_thai_don_hang IN (4,6,7,8,9)
            GROUP BY DATE(ngay_dat)
            ORDER BY DATE(ngay_dat) DESC
            LIMIT 5
        ");
        return $stmt ? $stmt->fetchAll(PDO::FETCH_ASSOC) : [];
        return array_reverse($result);
    }

    public function getTongDonHangDaBan() {
        $stmt = $this->conn->query("SELECT COUNT(*) AS so_luong_ban FROM don_hangs WHERE trang_thai_don_hang in (4,6,7,8,9)"); // Giả sử trạng thái 4 là đã hoàn thành
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>