<?php

class LienHe
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sách liên hệ
    public function getAll(){
        try {
            
            $sql= 'SELECT * FROM lien_hes';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    //thêm dữ liệu mới vafp csdl
    public function postData($trang_thai_lh){
        try {
           
            $sql= 'INSERT INTO lien_hes (trang_thai_lh)
            VALUES (:trang_thai_lh)';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
           
            $stmt->bindParam(':trang_thai_lh', $trang_thai_lh);
            $stmt->execute();

            return true;
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();



        }
        }
        //lấy thông tin chi tiết
        public function getDetailData($id){
            try {
                
                $sql= 'SELECT * FROM lien_hes WHERE id = :id';
    
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);

                $stmt->execute();
    
                return $stmt->fetch();
            } catch (PDOException $e){
                echo 'lỗi: ' . $e->getMessage();
            }
        }

         //cập nhật dữ liệu mới vafp csdl
    public function updateData($id,$trang_thai_lh){
        try {
           
            $sql= 'UPDATE lien_hes SET  trang_thai_lh = :trang_thai_lh WHERE id=:id';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':id', $id);
           
            $stmt->bindParam(':trang_thai_lh', $trang_thai_lh);
            $stmt->execute();

            return true;
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();



        }
        }
//xóa dự liệu trong csdl
        public function deleteData($id){
            try {
                
                $sql= 'DELETE FROM lien_hes WHERE id = :id';
    
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);

                $stmt->execute();
    
                return true;
            } catch (PDOException $e){
                echo 'lỗi: ' . $e->getMessage();
            }
        }

    //Hủy kết nối csdl
    
    public function __destruct()
    {
        $this->conn = null;
    }
}