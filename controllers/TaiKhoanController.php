<?php
class TaiKhoanController {
    public $modelTaiKhoan;
    public function __construct() {
        $this->modelTaiKhoan = new TaiKhoan();
    }
    public function taiKhoan() {
        // Kiểm tra xem người dùng đã đăng nhập chưa
        if (!isset($_SESSION["user"]) || empty($_SESSION["user"])) {
            // Nếu chưa đăng nhập, chuyển hướng về trang đăng nhập
            header("Location: " . BASE_URL . "?act=login");
            exit();
        }
    
        // Lấy thông tin người dùng từ session
        $id = $_SESSION["user"]["id"];
    
        // In thông tin id để kiểm tra (xóa sau khi xong)
        var_dump($id); die();
    
        // Lấy thông tin tài khoản từ model
        $getTaiKhoan = $this->modelTaiKhoan->getTaiKhoan($id);
    
        // Truyền dữ liệu sang view
        require_once "./views/taiKhoan.php";
    }
    
}
?>