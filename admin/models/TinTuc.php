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
            $sql = 'SELECT * FROM tin_tuc';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới vào CSDL
    public function postData($tieu_de, $noi_dung ,$trang_thai){
        try {
            $sql = 'INSERT INTO tin_tuc (tieu_de, noi_dung ,trang_thai)
            VALUE (:tieu_de, :noi_dung, :trang_thai)';

            $stmt = $this->conn->prepare($sql);
            // gán gtri vào các tham số 
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
            $stmt->bindParam(':trang_thai', $trang_thai);
            
            return $stmt->execute();

        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
           return false;
        }

    }

    // xóa dữ liệu người dùng 

    public function deleteData($id_tin_tuc) {
        try {
            $sql = 'DELETE FROM tin_tuc WHERE id_tin_tuc = :id_tin_tuc';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_tin_tuc', $id_tin_tuc);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

    // LẤY thông tin danh mục ra form sửa

    public function getDetailData($id_tin_tuc) {
        try {
            $sql = 'SELECT * FROM tin_tuc WHERE id_tin_tuc = :id_tin_tuc';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_tin_tuc', $id_tin_tuc);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

     // câp nhật dữ liệu mới vào CSDL
     public function updateData($id_tin_tuc,$tieu_de, $noi_dung,$trang_thai){
        try {
            $sql = 'UPDATE tin_tuc SET tieu_de = :tieu_de, noi_dung = :noi_dung, trang_thai = :trang_thai WHERE id_tin_tuc = :id_tin_tuc)';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_tin_tuc', $id_tin_tuc);
            // gán gtri vào các tham số 
            $stmt->bindParam(':tieu_de', $tieu_de);
            $stmt->bindParam(':noi_dung', $noi_dung);
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


