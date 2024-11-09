<?php 

class NguoiDung{

    public $conn;
    // ket noi CSDL
    public function __construct()
    {
       $this->conn = connectDB() ;
    }

    // danh sach danh muc 
    public function getAll(){
        try {
            $sql = 'SELECT * FROM nguoi_dungs';

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
    }

    // thêm dữ liệu mới vào CSDL
    public function postData($email,$ngay_sinh,$gioi_tinh, $so_dien_thoai, $ngay_dang_ki, $dang_nhap_ngay_cuoi){
        try {
            $sql = 'INSERT INTO nguoi_dungs (email, ngay_sinh, gioi_tinh, so_dien_thoai, ngay_dang_ki, dang_nhap_ngay_cuoi)
            VALUE (:email, :ngay_sinh, :gioi_tinh, :so_dien_thoai, :ngay_dang_ki, :dang_nhap_ngay_cuoi)';

            $stmt = $this->conn->prepare($sql);
            // gán gtri vào các tham số 
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':ngay_dang_ki', $ngay_dang_ki);
            $stmt->bindParam(':dang_nhap_ngay_cuoi', $dang_nhap_ngay_cuoi);
            
            return $stmt->execute();

        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
           return false;
        }

    }

    // xóa dữ liệu người dùng 

    public function deleteData($id_nguoi_dung) {
        try {
            $sql = 'DELETE FROM nguoi_dungs WHERE id_nguoi_dung = :id_nguoi_dung';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_nguoi_dung', $id_nguoi_dung);

            $stmt->execute();

            return true;
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

    // LẤY thông tin danh mục ra form sửa

    public function getDetailData($id_nguoi_dung) {
        try {
            $sql = 'SELECT * FROM nguoi_dungs WHERE id_nguoi_dung = :id_nguoi_dung';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_nguoi_dung', $id_nguoi_dung);

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }

     // câp nhật dữ liệu mới vào CSDL
     public function updateData($id_nguoi_dung,$email,$ngay_sinh,$gioi_tinh, $so_dien_thoai, $ngay_dang_ki, $dang_nhap_ngay_cuoi){
        try {
            $sql = 'UPDATE nguoi_dungs SET email = :email, ngay_sinh = :ngay_sinh, gioi_tinh = :gioi_tinh, so_dien_thoai = :so_dien_thoai, ngay_dang_ki = :ngay_dang_ki, ngay_dang_nhap_cuoi = :ngay_dang_nhap_cuoi WHERE id_nguoi_dung = :id_nguoi_dung)';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_nguoi_dung', $id_nguoi_dung);
            // gán gtri vào các tham số 
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':ngay_sinh', $ngay_sinh);
            $stmt->bindParam(':gioi_tinh', $gioi_tinh);
            $stmt->bindParam(':so_dien_thoai', $so_dien_thoai);
            $stmt->bindParam(':ngay_dang_ki', $ngay_dang_ki);
            $stmt->bindParam(':dang_nhap_ngay_cuoi', $dang_nhap_ngay_cuoi);

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


