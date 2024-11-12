<?php 

class TinTuc{

    public $conn;
    // ket noi CSDL
    public function __construct()
    {
       $this->conn = connectDB() ;
    }

    // danh sach danh muc 
    public function getAll(){
        try {
            $sql = 'SELECT * FROM tin_tucs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới vào CSDL
    public function postData($tieu_de, $noi_dung, $ngay_dang, $trang_thai){
        try {
            $sql = 'INSERT INTO tin_tucs (tieu_de, noi_dung, ngay_dang, trang_thai) VALUE (:tieu_de, :noi_dung, :ngay_dang, :trang_thai)';

            $stmt = $this->conn->prepare($sql);
            // gán gtri vào các tham số 
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_dang', $ngay_dang);
            $stmt->bindParam(':trang_thai', $trang_thai);
            // var_dump($tieu_de);die;
            
            return $stmt->execute();

        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
           return false;
        }

    }

    // xóa dữ liệu người dùng 

    public function deleteData($id) {
        try {
            $sql = "DELETE FROM tin_tucs WHERE id = :id";

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
            $sql = 'SELECT * FROM tin_tucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            // var_dump($id);die;

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

     // câp nhật dữ liệu mới vào CSDL
     public function updateData($id, $tieu_de, $noi_dung, $ngay_dang, $trang_thai){
        try {
            $sql = 'UPDATE tin_tucs SET tieu_de = :tieu_de, noi_dung = :noi_dung, ngay_dang = :ngay_dang, trang_thai = :trang_thai WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            // gán gtri vào các tham số 
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':ngay_dang', $ngay_dang);
            $stmt->bindParam(':trang_thai', $trang_thai);
            // var_dump($id);die;

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


