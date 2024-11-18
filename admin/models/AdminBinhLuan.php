<?php
class AdminBinhLuan {
    public $conn;

    public function __construct() 
    {
        $this->conn = connectDB();
    }

    // Lấy tất cả các bình luận
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

    // Thêm bình luận mới
    public function insertBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai) {
        try {
            // Chuẩn bị câu truy vấn SQL để chèn bình luận vào cơ sở dữ liệu
            $sql = 'INSERT INTO binh_luans (san_pham_id, tai_khoan_id, noi_dung, ngay_dang, trang_thai) 
                    VALUES (:san_pham_id, :tai_khoan_id, :noi_dung, :ngay_dang, :trang_thai)';
            
            // Chuẩn bị câu truy vấn SQL với các tham số thay thế
            $stmt = $this->conn->prepare($sql);
    
            
            // Thực thi câu truy vấn, truyền các giá trị tham số vào câu truy vấn
            $stmt->execute([
                ':san_pham_id' => $san_pham_id,
                ':tai_khoan_id' => $tai_khoan_id,             
                ':noi_dung' => $noi_dung,    
                ':ngay_dang' => $ngay_dang,       
                ':trang_thai' => $trang_thai,      
            ]);
    
            // Trả về true nếu việc chèn thành công
            return true;
        } catch (Exception $e) {
            // Nếu có lỗi, in ra thông báo lỗi
            echo "Error: " . $e->getMessage();
            return false; // Trả về false nếu có lỗi
        }
    }
    
    public function getBinhLuanById($id) {
        try {
            $sql = 'SELECT * FROM binh_luans WHERE id = :id';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id' => $id]);
            
            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function getDetailBinhLuan($id)
{
    try {
        // Câu truy vấn SQL để lấy thông tin bình luận, sản phẩm và tài khoản liên quan
        $sql = 'SELECT binh_luans.*, san_phams.ten_san_pham, tai_khoans.ten_tai_khoan, danh_mucs.ten_danh_muc
                FROM binh_luans
                INNER JOIN san_phams ON binh_luans.san_pham_id = san_phams.id
                INNER JOIN tai_khoans ON binh_luans.tai_khoan_id = tai_khoans.id
                INNER JOIN danh_mucs ON san_phams.danh_muc_id = danh_mucs.id
                WHERE binh_luans.san_pham_id = :id';

        // Chuẩn bị câu truy vấn SQL với tham số id
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu truy vấn với tham số id
        $stmt->execute([':id' => $id]);

        // Trả về kết quả (bình luận cùng với thông tin sản phẩm và tài khoản)
        return $stmt->fetchAll();
    } catch (Exception $e) {
        // Nếu có lỗi, in ra thông báo lỗi và trả về false
        echo "Error: " . $e->getMessage();
        return false;
    }
}


// Cập nhật bình luận
public function updateBinhLuan($id, $san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai) {
    try {
        // Câu truy vấn SQL để cập nhật thông tin bình luận
        $sql = 'UPDATE binh_luans SET 
                san_pham_id = :san_pham_id,
                tai_khoan_id = :tai_khoan_id,
                noi_dung = :noi_dung,
                ngay_dang = :ngay_dang,
                trang_thai = :trang_thai
                WHERE id = :id';

        // Chuẩn bị câu truy vấn SQL với các tham số thay thế
        $stmt = $this->conn->prepare($sql);

        // Thực thi câu truy vấn với các tham số
        $stmt->execute([
            ':san_pham_id' => $san_pham_id,
            ':tai_khoan_id' => $tai_khoan_id,
            ':noi_dung' => $noi_dung,
            ':ngay_dang' => $ngay_dang,
            ':trang_thai' => $trang_thai,
            ':id' => $id
        ]);

        // Trả về true nếu việc cập nhật thành công
        return true;
    } catch (Exception $e) {
        // Nếu có lỗi, in ra thông báo lỗi
        echo "Error: " . $e->getMessage();
        return false; // Trả về false nếu có lỗi
    }
}

// Lấy thông tin bình luận theo ID
public function getBinhLuanFormEdit($id) {
    try {
        $sql = 'SELECT * FROM binh_luans WHERE id = :id';
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        
        return $stmt->fetch();
    } catch (Exception $e) {
        echo "Error: " . $e->getMessage();
        return false; // Trả về false nếu có lỗi
    }
}


    public function destroyBinhLuan($id) {
        try {
            $sql = 'DELETE FROM binh_luans WHERE id = :id';
    
            $stmt = $this->conn->prepare($sql);
    
            $stmt->execute([
                ':id' => $id
            ]);
    
            return true;
        } catch (Exception $e) {
            echo "Error: ". $e->getMessage();
    }

    
    }


}
?>
