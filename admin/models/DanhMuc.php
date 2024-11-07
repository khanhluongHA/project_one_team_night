<?php 

class DanhMuc{

    public $conn;
    // ket noi CSDL
    public function __construct()
    {
       $this->conn = connectDB() ;
    }

    // danh sach danh muc 
    public function getAll(){
        try {
            $sql = 'SELECT * FROM danh_mucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới vào CSDL
    public function postData($ten_danh_muc,$trang_thai){
        try {
            $sql = 'INSERT INTO danh_mucs (ten_danh_muc, trang_thai)
            VALUE (:ten_danh_muc, :trang_thai)';

            $stmt = $this->conn->prepare($sql);
            // gán gtri vào các tham số 
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);
            
            return $stmt->execute();

        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
           return false;
        }

    }

    // xóa dữ liệu người dùng 

    public function deleteData($id) {
        try {
            $sql = 'DELETE FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

    // LẤY thông tin danh mục ra form sửa

    public function getDetailData($id) {
        try {
            $sql = 'SELECT * FROM danh_mucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

     // câp nhật dữ liệu mới vào CSDL
     public function updateData($id,$ten_danh_muc,$trang_thai){
        try {
            $sql = 'UPDATE danh_mucs SET ten_danh_muc = :ten_danh_muc, trang_thai = :trang_thai WHERE id = :id)';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            // gán gtri vào các tham số 
            $stmt->bindParam(':ten_danh_muc', $ten_danh_muc);
            $stmt->bindParam(':trang_thai', $trang_thai);

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
}


