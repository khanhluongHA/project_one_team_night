<?php
class AdminThongKe {
    public $conn;

    public function __construct() 
    {
        $this->conn = connectDB();
    }

    public function getTongDoanhThu() {
        $stmt = $this->conn->query("SELECT SUM(thanh_toan) AS thanh_toan FROM don_hangs");

        $tongDonHang = $this->getTongDonHangDaBan();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getTongDonHangChoXuLy() {
        $stmt = $this->conn->query("SELECT COUNT(*) AS trang_thai_thanh_toan FROM don_hangs WHERE trang_thai_thanh_toan in (1)");
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
        $stmt = $this->conn->query("SELECT COUNT(*) AS trang_thai_thanh_toan FROM don_hangs WHERE trang_thai_thanh_toan in (2)"); // Giả sử trạng thái 4 là đã hoàn thành
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

}

?>