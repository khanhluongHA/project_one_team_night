<?php 

class HomeController
{
    public $product;
    public $modelGioHang;
    public $modelDonHang;
    public $modelTaiKhoan;

    public function __construct(){
        $this->product = new Product();
        $this->modelGioHang = new GioHang();
        $this->modelDonHang = new DonHang();
        $this->modelTaiKhoan = new TaiKhoan();
    }


    public function login(){
       
        require_once './views/login.php';
    }
    public function edit_profile(){
       
        require_once './views/edit_profile.php';
    }
    public function db(){
       
        require_once './views/db.php';
    }
    public function forgot_password(){
       
        require_once './views/forgot_password.php';
    }
    public function register(){
       
        require_once './views/register.php';
    }
    public function logout(){
       
        require_once './views/logout.php';
    }

    public function addGioHang()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') { 
            if (isset($_SESSION['user_client'])) {
                $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
                // lấy dữ liệu giỏ hàng của người dùng  
                $gioHang = $this->modelGioHang->getGioHangFormUser($mail['id']);
                if (!$gioHang) {
                    $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
                    $gioHang = ['id'=>$gioHangId]; 
                    $chiTietGioiHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                } else {
                    $chiTietGioiHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
                }
               
                $san_pham_id = $_POST['san_pham_id'];
                $so_luong = $_POST['so_luong'];

                $checkSanPham = false;
                foreach($chiTietGioiHang as $detail)
                {
                    if ($detail['san_pham_id'] == $san_pham_id) {
                        $newSoLuong = $detail['so_luong'] + $so_luong;
                        $this->modelGioHang->updateSoLuong($gioHang['id'], $san_pham_id, $newSoLuong);
                        $checkSanPham = true;
                        break;
                    }
                }

                if (!$checkSanPham) {
                    $this->modelGioHang->addDetailGioHang($gioHang['id'], $san_pham_id, $so_luong);
                }
                header("Location:" . BASE_URL . '?act=gio-hang');

            } else {
                var_dump('Chưa đăng nhập');die;
            }
        }
    }

    public function gioHang()
{
    $mail = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
    $gioHang = $this->modelGioHang->getGioHangFormUser($mail['id']);

    if (!$gioHang) {
        $gioHangId = $this->modelGioHang->addGioHang($mail['id']);
        $gioHang = ['id' => $gioHangId];
        $chiTietGioiHang = [];
    } else {
        $chiTietGioiHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
    }

    require_once './views/gioHang.php';
}


    public function thanhToan()
    {
        if (isset($_SESSION['user_client'])) {
            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            // lấy dữ liệu giỏ hàng của người dùng  
            $gioHang = $this->modelGioHang->getGioHangFormUser($user['id']);
            if (!$gioHang) {
                $gioHangId = $this->modelGioHang->addGioHang($user['id']);
                $gioHang = ['id'=>$gioHangId];
$chiTietGioiHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            } else {
                $chiTietGioiHang = $this->modelGioHang->getDetailGioHang($gioHang['id']);
            }

            require_once './views/thanhToan.php';

           
        } else {
            var_dump('Chưa đăng nhập');die;
        }
    }

    public function postThanhToan()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $ten_nguoi_nhan = $_POST['ten_nguoi_nhan'];
            $email_nguoi_nhan = $_POST['email_nguoi_nhan'];
            $sdt_nguoi_nhan = $_POST['sdt_nguoi_nhan'];
            $dia_chi_nguoi_nhan = $_POST['dia_chi_nguoi_nhan'];
            $ghi_chu = $_POST['ghi_chu'];
            $tong_tien = $_POST['tong_tien'];
            $phuong_thuc_thanh_toan_id = $_POST['phuong_thuc_thanh_toan_id'];


            $ngay_dat = date('Y-m-d');
            $trang_thai_id = 1;

            $user = $this->modelTaiKhoan->getTaiKhoanFormEmail($_SESSION['user_client']);
            $tai_khoan_id = $user['id'];

            $ma_don_hang = 'DH_' . rand(1000, 9999);

            // thêm thông tin vào db 
            $this->modelDonHang->addDonHang($tai_khoan_id,
                                            $ten_nguoi_nhan,
                                            $email_nguoi_nhan,
                                            $sdt_nguoi_nhan,
                                            $dia_chi_nguoi_nhan,
                                            $ghi_chu, 
                                            $tong_tien,
                                            $phuong_thuc_thanh_toan_id,
                                            $ngay_dat,
                                            $ma_don_hang,
                                            $trang_thai_id
        );

        }
    }
    
    
    public function home() {
        $ban=$this->product->all();
    $product=$this->product->getall();
        require_once './views/home.php';
        
    }
    
    public function detail(){
        // Lấy ID của tin tức từ URL
        $id = $_GET['id'];
        // var_dump($id);die;
    
        // Lấy dữ liệu chi tiết của tin tức từ model
        $product=$this->product->getDetailData($id);
        // var_dump($product);die;
        // Kiểm tra nếu không tìm thấy tin tức
        if (!$product) {
            echo "Không tìm thấy bài viết";
            return;
        } else {
            // Truyền dữ liệu vào view show_tin_tuc.php
            require_once './views/chi_tiet_san_pham.php';
        }
    }
    
    
    public function about(){
        require_once './views/about.php';
    }
    public function danhmuc(){
        $product = $this -> product -> getAll();
        require_once './views/category.php';
    }
    
    public function search(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $search = trim($_POST['sreach'] ?? '') ;  
            
            if (!empty($search)) {  
                $product = $this->product->search($search);  
            } else {  
                $product = []; // Handle empty search case  
            }  
    
            require_once './views/home.php';  
        }  
    }
    public function Rangskik(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $sapxep=$_POST['sapxep'];
          if($sapxep=='asc'){
            $product = $this -> product -> Rangskik();
          }else if($sapxep=='desc'){
            $product = $this -> product -> Rangskikhai();
          }else{
        $product = $this -> product -> getAll();
          }
        }
        require_once './views/home.php';
        
    }
    public function search2(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {  
            $search2 = trim($_POST['sreach2'] ?? '') ;  
            
            if (!empty($search2)) {  
                $product = $this->product->search2($search2);  
            } else {  
                $product = []; // Handle empty search case  
            }  
    
            require_once 'views/category.php';  
            
        }  
    }
public function Rangskik2(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
          $sapxep2=$_POST['sapxep2'];
          if($sapxep2=='asc2'){
            $product = $this -> product -> Rangskik2();
          }else if($sapxep2=='desc2'){
            $product = $this -> product -> Rangskikhai2();
          }else{
        $product = $this -> product -> getAll();
          }
        }
        require_once './views/category.php';
        
    }
}