<?php 

// Require file Common
require_once './commons/env.php'; // Khai báo biến môi trường
require_once './commons/function.php'; // Hàm hỗ trợ


// Require toàn bộ file Controllers
require_once './controllers/HomeController.php';
require_once './controllers/LoginController.php';
require_once './controllers/producdetail.php';
require_once './controllers/BanerController.php';
require_once './controllers/DetailProductController.php';


// Require toàn bộ file Models
require_once './models/TaiKhoan.php';
require_once './models/Banner.php';
require_once './models/DetailProduct.php';
// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Trang chủ
    '/'                 => (new HomeController())->home(),
    'login'                 => (new AuthController($userModel))->login(),
    'check-login' => (new AuthController($username, $password))->register(),
    'detail'                 => (new ProductDetail())->detail(),
    'banner'        => (new BanNerController())->banner(),
    

    
};