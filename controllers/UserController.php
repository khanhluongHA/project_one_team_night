<?php

class UserController{
    public $User;
    public function __construct(){
        $this->User = new User();

    }
    public function login(){
        if($_SERVER['REQUEST_METHOD'] === 'POST'){
            $ten_nguoi_dung = $_POST['ten_nguoi_dung'];
            $email = $_POST['email'];
            $sdt = $_POST['sdt'];
            $dia_chi = $_POST['dia_chi'];
            $mat_khau = $_POST['mat_khau'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $vai_tro = 1;
        }if($this->User->login($ten_nguoi_dung, $email, $sdt, $dia_chi, $mat_khau, $ngay_sinh, $gioi_tinh, $vai_tro)){
            
        }
        require_once './views/login.php';
    }
    public function viewlogin(){
        require_once './views/login.php';
    }
        
        public function nhap() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $mat_khau = $_POST['mat_khau'];
                $User = $this->User->nhap($email, $mat_khau);
    
                // Kiểm tra kết quả trả về
                // var_dump($User);
                // die();
    
                if ($User) {
                    $_SESSION['id'] = $User['id'];
                    $_SESSION['ten_nguoi_dung'] = $User['ten_nguoi_dung'];
                    $_SESSION['email'] = $User['email'];
                    $_SESSION['vai_tro'] = $User['vai_tro'];
                    header('Location: ?act=/');
                    exit();
                } else {
                    echo "sai";
                }
            }
            require_once './views/nhap.php';
    
        }
        public function logout() {  
            // Kiểm tra xem session có tồn tại không  
            if (isset($_SESSION['id'])) {  
                // Xóa tất cả dữ liệu trong session  
                session_unset(); // Xóa tất cả các biến phiên  
                session_destroy(); // Hủy phiên  
    
                // Chuyển hướng về trang đăng nhập hoặc trang chính  
                header('Location: ?act=/'); // Hoặc sử dụng đường dẫn khác  
                exit(); // Dừng thực thi các mã sau khi chuyển hướng  
            }  
        }  
    }  