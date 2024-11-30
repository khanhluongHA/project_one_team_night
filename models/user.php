<?php
class User{
    public $conn;
    public function __construct(){
        $this->conn = connectDB();

    }
    public function login($ten_nguoi_dung,$email,$sdt,$dia_chi,$mat_khau,$ngay_sinh,$gioi_tinh,$vai_tro){
        try {
            $sql = "INSERT INTO `nguoi_dungs`( `ten_nguoi_dung`, `email`, `sdt`, `dia_chi`, `mat_khau`, `ngay_sinh`, `gioi_tinh`, `vai_tro`) VALUES ('$ten_nguoi_dung','$email','$sdt','$dia_chi','$mat_khau','$ngay_sinh','$gioi_tinh','$vai_tro')";
            $stmt = $this->conn->prepare($sql);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "loi" .$e->getMessage();
        }
    }
    public function nhap($email,$mat_khau){
        try {
            $sql = "SELECT * FROM `nguoi_dungs` WHERE (ten_nguoi_dung = :email OR email = :email) AND mat_khau = :mat_khau";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':mat_khau', $mat_khau);
            // var_dump($stmt);die;
             $stmt->execute();
              return $stmt->fetch();
        } catch (PDOException $e) {
            echo 'loi'. $e->getMessage();
        }
    }
}