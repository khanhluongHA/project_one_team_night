<?php

class TrangThai
{
    public $conn;

    //kết nối CSDL

    public function __construct()
    {
        $this->conn = connectDB();
    }

    //Danh sách trang thái
    public function getAll(){
        try {
            
            $sql= 'SELECT * FROM trang_thais';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return  $stmt->fetchAll();
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    //thêm dữ liệu mới vafp csdl
    public function postData($ten_trang_thai,$trang_thai_tb, $thong_tin_tai_khoan, $thong_tin_nhan_hang, $thong_tin_don_hang, $san_pham_trong_don_hang){
        try {
           
            $sql= 'INSERT INTO trang_thais (ten_trang_thai,trang_thai_tb, thong_tin_tai_khoan, thong_tin_nhan_hang, thong_tin_don_hang, san_pham_trong_don_hang)
            VALUES (:ten_trang_thai,:trang_thai_tb, :thong_tin_tai_khoan, :thong_tin_nhan_hang, :thong_tin_don_hang, :san_pham_trong_don_hang)';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':ten_trang_thai', $ten_trang_thai);
            $stmt->bindParam(':trang_thai_tb', $trang_thai_tb);
            $stmt->bindParam(':thong_tin_tai_khoan', $thong_tin_tai_khoan);
            $stmt->bindParam(':thong_tin_nhan_hang', $thong_tin_nhan_hang);
            $stmt->bindParam(':thong_tin_don_hang', $thong_tin_don_hang);
            $stmt->bindParam(':san_pham_trong_don_hang', $san_pham_trong_don_hang);
            $stmt->execute();

            return true;
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();



        }
        }
        //lấy thông tin chi tiết
        public function getDetailData($id){
            try {
                
                $sql= 'SELECT * FROM trang_thais WHERE id = :id';
    
                $stmt = $this->conn->prepare($sql);
                $stmt->bindParam(':id', $id);

                $stmt->execute();
    
                return $stmt->fetch();
            } catch (PDOException $e){
                echo 'lỗi: ' . $e->getMessage();
            }
        }

         //cập nhật dữ liệu mới vafp csdl
    public function updateData($id,$ten_trang_thai,$trang_thai_tb, $thong_tin_tai_khoan, $thong_tin_nhan_hang, $thong_tin_don_hang, $san_pham_trong_don_hang){
        try {
           
            $sql= 'UPDATE trang_thais SET ten_trang_thai=:ten_trang_thai, trang_thai_tb = :trang_thai_tb, thong_tin_tai_khoan=:thong_tin_tai_khoan,thong_tin_nhan_hang=:thong_tin_nhan_hang,thong_tin_don_hang=:thong_tin_don_hang, san_pham_trong_don_hang=:san_pham_trong_don_hang WHERE id=:id';

            $stmt = $this->conn->prepare($sql);

            //gán gtri vào các tham số
            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ten_trang_thai', $ten_trang_thai);
            $stmt->bindParam(':trang_thai_tb', $trang_thai_tb);
            $stmt->bindParam(':thong_tin_tai_khoan', $thong_tin_tai_khoan);
            $stmt->bindParam(':thong_tin_nhan_hang', $thong_tin_nhan_hang);
            $stmt->bindParam(':thong_tin_don_hang', $thong_tin_don_hang);
            $stmt->bindParam(':san_pham_trong_don_hang', $san_pham_trong_don_hang);
            $stmt->execute();

            return true;
        } catch (PDOexception $e){
            echo 'lỗi: ' . $e->getMessage();



        }
        }
//xóa dự liệu trong csdl
        public function deleteData($id){
            try {
                
                $sql= 'DELETE FROM trang_thais WHERE id = :id';
    
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