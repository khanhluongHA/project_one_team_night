<?php 

class LienHe{

    public $conn;
    // ket noi CSDL
    public function __construct()
    {
       $this->conn = connectDB() ;
    }

    // danh sach danh muc 
    public function getAll(){
        try {
            $sql = 'SELECT * FROM lien_he';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới vào CSDL

    // xóa dữ liệu người dùng 

    public function deleteData($id) {
        try {
            $sql = 'DELETE FROM lien_he WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

    // LẤY thông tin danh mục ra form sửa

   





    // huy ket noi CSDL

    public function __destruct()
    {
        $this->conn = null ; 
    }
}


