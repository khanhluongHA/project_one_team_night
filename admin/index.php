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
require_once 'models/DanhMuc.php';
require_once 'models/NguoiDung.php';
require_once 'models/TinTuc.php';


// Route
$act = $_GET['act'] ?? '/';

// Để bảo bảo tính chất chỉ gọi 1 hàm Controller để xử lý request thì mình sử dụng match

match ($act) {
    // Dashboards
    '/'=> (new DashboardController())->index(),
    'danhmuc-category' => (new DanhMucController())->index(),
    'form-them-danh-muc'   => (new DanhMucController())->create(),
    'them-danh-muc'       => (new DanhMucController())->store(),
    'form-sua-danh-muc'    => (new DanhMucController())->edit(),
    'sua-danh-muc'         => (new DanhMucController())->update(),
    'xoa-danh-muc'         => (new DanhMucController())->destroy(),


    'nguoidung-category' => (new NguoiDungController())->index(),
    'form-them-nguoi-dung'   => (new NguoiDungController())->create(),
    'them-nguoi-dung'       => (new NguoiDungController())->store(),
    'form-sua-nguoi-dung'    => (new NguoiDungController())->edit(),
    'sua-nguoi-dung'         => (new NguoiDungController())->update(),
    'xoa-nguoi-dung'         => (new NguoiDungController())->destroy(),


    'tintuc-category' => (new TinTucController())->index(),
    'form-them-tin-tuc'   => (new TinTucController())->create(),
    'them-tin-tuc'       => (new TinTucController())->store(),
    'form-sua-tin-tuc'    => (new TinTucController())->edit(),
    'sua-tin-tuc'         => (new TinTucController())->update(),
    'xoa-tin-tuc'         => (new TinTucController())->destroy(),

    // quản lý liên hệ
};