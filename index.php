<?php 
session_start();

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/TinTucController.php';
require_once './controllers/UserController.php';
require_once './controllers/BanNerController.php';
require_once './controllers/TaiKhoanController.php';
require_once './controllers/ContactController.php';

// Require toàn bộ file Models
require_once './models/product.php';
require_once './models/tintuc.php';
require_once './models/user.php';
require_once './models/banner.php';
require_once './models/TaiKhoan.php';
require_once './models/GioHang.php';
require_once './models/DonHang.php';
require_once './models/ContactModel.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->home(),
    'about'=> (new HomeController())->about(),
    'danhmuc' => (new HomeController())->danhmuc(),
    'sreach'                       =>(new HomeController())->search(),
    'loc' =>(new HomeController())->Rangskik(),
    'tintuc' =>(new TinTucController())->new(),
    'chi-tiet-tin-tuc'  =>(new TinTucController())->detail(),
    'sreach2'                       =>(new HomeController())->search2(),
    'loc2' =>(new HomeController())->Rangskik2(), 
    'sanpham' =>(new HomeController())->detail(),

    
    'nhap' =>(new UserController())->nhap(),
    'nhap1' =>(new UserController())->nhap(),
  

    // giohang
    'them-gio-hang' => (new HomeController())->addGioHang(),
    'gio-hang' => (new HomeController())->gioHang(),
    'thanh-toan' => (new HomeController())->thanhToan(),
    'xu-ly-thanh-toan' => (new HomeController())->postThanhToan(),

    //đăng nhập
    
    'login'                 => (new HomeController())->login(),
    'logout'                 => (new HomeController())->logout(),
    'register'                 => (new HomeController())->register(),
    'forgot_password'                 => (new HomeController())->forgot_password(),
    'edit_profile'                 => (new HomeController())->edit_profile(),

    

      //Liên hệ
      'contact_page'    => (new ContactController())->contact(),
      'contact_submit'    => (new ContactController())->submit(),
  
};