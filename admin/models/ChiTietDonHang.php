<?php

class ChiTietDonHang
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sách danh mục
    public function getAll(){
        try {
            
            $sql= 'SELECT * FROM chi_tiet_don_hangs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    //thêm dữ liệu mới vafp csdl
    public function postData($ten_san_pham,$so_luong,$don_gia){
        try {
           
            $sql= 'INSERT INTO chi_tiet_don_hangs (ten_san_pham,so_luong,don_gia)
            VALUES (:ten_san_pham,:so_luong,:don_gia)';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':ten_san_pham', $ten_san_pham);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':don_gia', $don_gia);
           
            $stmt->execute();

            return true;
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();



        }
        }
        //lấy thông tin chi tiết
        public function getDetailData($id){
            try {
                
                $sql= 'SELECT * FROM chi_tiet_don_hangs WHERE id = :id';
    
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);

                $stmt->execute();
    
                return $stmt->fetch();
            } catch (PDOException $e){
                echo 'lỗi: ' . $e->getMessage();
            }
        }

         //cập nhật dữ liệu mới vafp csdl
    public function updateData($id,$ten_san_pham,$so_luong,$don_gia){
        try {
           
            $sql= 'UPDATE chi_tiet_don_hangs SET ten_san_pham =:ten_san_pham, so_luong =:so_luong, don_gia = :don_gia WHERE id=:id';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_san_pham', $ten_san_pham);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':don_gia', $don_gia);
    
            $stmt->execute();

            return true;
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();



        }
        }
//xóa dự liệu trong csdl
        public function deleteData($id){
            try {
                
                $sql= 'DELETE FROM chi_tiet_don_hangs WHERE id = :id';
    
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