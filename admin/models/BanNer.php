<?php

class BanNer
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sách banner
    public function getAll(){
        try {
            
            $sql= 'SELECT * FROM banners';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOException $e){
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    //thêm dữ liệu mới vafp csdl
    public function postData($ten_banner,$trang_thai,$anh_banner){
        try {
           
            $sql= 'INSERT INTO banners (ten_banner,trang_thai,anh_banner)
            VALUES (:ten_banner,:trang_thai,:anh_banner)';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':ten_banner', $ten_banner);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':anh_banner', $anh_banner);
            $stmt->execute();

            return true;
        } catch (PDOException $e){
            echo 'lỗi: ' . $e->getMessage();



        }
        }
        //lấy thông tin chi tiết
        public function getDetailData($id){
            try {
                
                $sql= 'SELECT * FROM banners WHERE id = :id';
    
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);

                $stmt->execute();
    
                return $stmt->fetch();
            } catch (PDOException $e){
                echo 'lỗi: ' . $e->getMessage();
            }
        }

         //cập nhật dữ liệu mới vafp csdl
    public function updateData($id,$ten_banner,$trang_thai,$anh_banner){
        try {
           
            $sql= 'UPDATE banners SET ten_banner = :ten_banner, trang_thai = :trang_thai, anh_banner = :anh_banner WHERE id=:id';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_banner', $ten_banner);
            $stmt->bindParam(':trang_thai', $trang_thai);
            $stmt->bindParam(':anh_banner', $anh_banner);
            $stmt->execute();

            return true;
        } catch (PDOException $e){
            echo 'lỗi: ' . $e->getMessage();



        }
        }
//xóa dự liệu trong csdl
        public function deleteData($id){
            try {
                
                $sql= 'DELETE FROM banners WHERE id = :id';
    
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