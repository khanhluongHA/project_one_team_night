<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/NguoiDungController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/LienHeController.php';

// Require toàn bộ file Models

// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'=> (new DashboardController())->index(),
    'danhmuc-category' => (new DanhMucController())->index(),
    'nguoidung-category' => (new NguoiDungController())->index(),
    'tintuc-category' => (new TinTucController())->index(),
    'lienhe-category' => (new LienHeController())->index(),
};