<?php 

class DonHang{

    public $conn;
    // ket noi CSDL
    public function __construct()
    {
       $this->conn = connectDB() ;
    }

    // danh sach danh muc 
    public function getAll(){
        try {
            $sql = 'SELECT * FROM don_hangs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới vào CSDL
    // public function postData($ma_don_hang,$ngay_dat,$phuong_thuc_thanh_toan,$trang_thai_thanh_toan){
    //     try {
    //         $sql = 'INSERT INTO danh_mucs (ten_danh_muc, trang_thai)
    //         VALUE (:ten_danh_muc, :trang_thai)';

    //         $stmt = $this->conn->prepare($sql);
    //         // gán gtri vào các tham số 
    //         $stmt->bindParam(':ma_don_hang', $ma_don_hang);
    //         $stmt->bindParam(':ten_nguoi_nhan', $ten_nguoi_nhan);
    //         $stmt->bindParam(':sdt_nguoi_nhan', $sdt_nguoi_nhan);
    //         $stmt->bindParam(':ngay_dat', $ngay_dat);
    //         $stmt->bindParam(':tong_tien', $tong_tien);
    //         $stmt->bindParam(':trang_thai_don_hang', $trang_thai_don_hang);
            
    //         return $stmt->execute();

    //     } catch (PDOException $e) {
    //        echo 'Loi' . $e->getMessage();
    //        return false;
    //     }

    // }

    // // xóa dữ liệu người dùng 

    // public function deleteData($id) {
    //     try {
    //         $sql = 'DELETE FROM danh_mucs WHERE id = :id';

    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->bindParam(':id', $id);

    //         $stmt->execute();

    //         return true;
    //     } catch (PDOException $e) {
    //        echo 'Loi' . $e->getMessage();
    //     }
        
    // }

    // // LẤY thông tin danh mục ra form sửa

    // public function getDetailData($id) {
    //     try {
    //         $sql = 'SELECT * FROM danh_mucs WHERE id = :id';

    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->bindParam(':id', $id);

    //         $stmt->execute();

    //         return $stmt->fetch();
    //     } catch (PDOException $e) {
    //        echo 'Loi' . $e->getMessage();
    //     }
        
    // }

    //  // câp nhật dữ liệu mới vào CSDL
    //  public function updateData($id,$ten_danh_muc,$trang_thai){
    //     try {
    //         $sql = 'UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc, trang_thai = :trang_thai WHERE id = :id';

    //         $stmt = $this->conn->prepare($sql);
    //         $stmt->bindParam(':id', $id);
    //         // gán gtri vào các tham số 
    //         $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
    //         $stmt->bindParam(':trang_thai', $trang_thai);

    //         return $stmt->execute();
            
    //     } catch (PDOException $e) {
    //        echo 'Loi' . $e->getMessage();
    //        return false;
    //     }

    // }
    public function getDetailData($id) {
        try {
            $sql = 'SELECT * FROM don_hangs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

     // câp nhật dữ liệu mới vào CSDL
     public function updateData($id,$ma_don_hang,$ngay_dat,$phuong_thuc_thanh_toan,$trang_thai_thanh_toan,$trang_thai_don_hang){
        try {
            $sql = 'UPDATE don_hangs SET ma_don_hang = :ma_don_hang, ngay_dat = :ngay_dat, phuong_thuc_thanh_toan = :phuong_thuc_thanh_toan, trang_thai_thanh_toan = :trang_thai_thanh_toan, trang_thai_don_hang = :trang_thai_don_hang WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            // gán gtri vào các tham số 
            $stmt->bindParam(':ma_don_hang', $ma_don_hang);
            $stmt->bindParam(':ngay_dat', $ngay_dat);
            $stmt->bindParam(':phuong_thuc_thanh_toan', $phuong_thuc_thanh_toan);
            $stmt->bindParam(':trang_thai_thanh_toan', $trang_thai_thanh_toan);
            $stmt->bindParam(':trang_thai_don_hang', $trang_thai_don_hang);
            // var_dump($phuong_thuc_thanh_toan);die;

            return $stmt->execute();
            
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
           return false;
        }
    }
    





    // huy ket noi CSDL

    public function __destruct()
    {
        $this->conn = null ; 
    }

    //----------------------------------------chi tiết đơn hàng-------------------------------------------------------------
      public function getDetailDonHang($id) {
        try {
            $sql = 'SELECT don_hangs.*, tt_don_hangs.ten_trang_thai 
            FROM don_hangs
            INNER JOIN tt_don_hangs ON don_hangs.trang_thai_don_hang = tt_don_hangs.id
            WHERE don_hangs.id = :id';
    

            //----------------------------------------------------
           


            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute([':id' => $id]);

          

            return $stmt->fetch();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }
 

    public function getAllTrangThaiDonHang() {
        try {
            $sql = 'SELECT * FROM tt_don_hangs';
          


            $stmt = $this->conn->prepare($sql);
            
            $stmt->execute();

          

            return $stmt->fetchAll();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

    public function getListSpDonHang($id) {
        try {
            $sql = 'SELECT chi_tiet_don_hangs.*, san_phams.ten_san_pham
            FROM chi_tiet_don_hangs
            INNER JOIN san_phams ON chi_tiet_don_hangs.san_pham_id = san_phams.id
            WHERE chi_tiet_don_hangs.don_hang_id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':id'=>$id]);
          

            return $stmt->fetchAll();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }
}


