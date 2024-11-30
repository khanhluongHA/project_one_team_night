<?php
class TaiKhoan
{
    public $conn;

    public function __construct()
    {
        $this->conn = connectDB();
    }

    public function checkLogin($email, $mat_khau)
    {

        try {
            $sql = "SELECT * FROM tai_khoans WHERE email = :email";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([':email' => $email]);
            $user = $stmt->fetch();

            if ($user && password_verify($mat_khau, hash: $user['mat_khau'])) {
                if ($user['chuc_vu_id'] == 2) {
                    if ($user['trang_thai'] == 1) {
                        return $user['email']; // trường hợp đăng nhập thành công
                    }else {
                        return "Tài khoản bị cấm";
                    }
                } else {
                    return "Tài khoản không có quyền đăng nhập";
                }
            } else {
                return "Tài khoản hoặc mật khẩu không chính xác";
            }
        } catch (\Exception $e) {
            echo "lỗi" . $e->getMessage();
            return false;
        }
    }

    public function getTaiKhoanFormEmail($email)
    {
        try {
            $sql = 'SELECT * FROM tai_khoans WHERE email = :email';
            $stmt = $this->conn->prepare($sql);

            $stmt->execute([
                ':email' => $email,
            ]);

            return $stmt->fetch();
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

    public function InsetDangKy($ho_ten,$email,$so_dien_thoai,$gioi_tinh, $dia_chi, $mat_khau,$ngay_sinh, $trang_thai,$chuc_vu_id,) {
        try {
            $sql = "INSERT INTO tai_khoans (ho_ten, email, so_dien_thoai, gioi_tinh, dia_chi, mat_khau,ngay_sinh, chuc_vu_id, trang_thai ) 
                    VALUES (:ho_ten,:email, :so_dien_thoai, :gioi_tinh, :dia_chi, :mat_khau,:ngay_sinh, :chuc_vu_id ,:trang_thai)";    
           $stmt= $this->conn->prepare($sql);
           $stmt->execute([
            ":ho_ten"=>$ho_ten,
            ":email"=>$email,
            ":so_dien_thoai"=>$so_dien_thoai,
            ":gioi_tinh"=>$gioi_tinh,
            ":dia_chi"=>$dia_chi,
            ":mat_khau"=>$mat_khau,
            ":ngay_sinh"=>$ngay_sinh,
            ":trang_thai"=>$trang_thai,
            ":chuc_vu_id"=>$chuc_vu_id,
           ]);
           return true;
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
    }

public function getTaiKhoan() {
    
}

}