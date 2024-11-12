<?php 

// Require file Common
require_once '../commons/env.php'; // Khai báo biến môi trường
require_once '../commons/function.php'; // Hàm hỗ trợ

// Require toàn bộ file Controllers
require_once 'controllers/DashboardController.php';
require_once 'controllers/DanhMucController.php';
require_once 'controllers/TinTucController.php';
require_once 'controllers/LienHeController.php';
require_once 'controllers/BanNerController.php';
require_once 'controllers/KhuyenMaiController.php';
require_once 'controllers/TrangThaiController.php';
require_once 'controllers/NguoiDungController.php';


// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/TinTuc.php';
require_once 'models/BanNer.php';
require_once 'models/KhuyenMai.php';
require_once 'models/TrangThai.php';
require_once 'models/LienHe.php';
require_once 'models/NguoiDung.php';



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
  

    'tintuc-category' => (new TinTucController())->index(),
    'form-them-tin-tuc'   => (new TinTucController())->create(),
    'them-tin-tuc'       => (new TinTucController())->store(),
    'form-sua-tin-tuc'    => (new TinTucController())->edit(),
    'sua-tin-tuc'         => (new TinTucController())->update(),
    'xoa-tin-tuc'         => (new TinTucController())->destroy(),

    // quản lý banner
    
    'banners'              => (new BanNerController())->index_banner(),
    'form-them-banner'    => (new BanNerController())->create_banner(),
    'them-banner'          => (new BanNerController())->store_banner(),
    'form-sua-banner'      => (new BanNerController())->edit_banner(),
    'sua-banner'           => (new BanNerController())->update_banner(),
    'xoa-banner'           => (new BanNerController())->destroy_banner(),
    // khuyến mãi

    'khuyen-mais' =>(new KhuyenMaiController())->danhsachma(),
    'form-them-khuyen-mai' => (new KhuyenMaiController())->formAddkhuyenmai(),
    'them-khuyen-mai' => (new KhuyenMaiController())->Addkhuyenmai(),
    'xoa-khuyen-mai' =>(new KhuyenMaiController())->deletekhuyenmai(),
    'form-sua-khuyen-mai' =>(new KhuyenMaiController())->formEditKhuyenmai(),
    'sua-khuyen-mai' =>(new KhuyenMaiController())->postEditKhuyenmai(),

    // trạng thái đơn hàng

    'trang-thais'              => (new TrangThaiController())->index_trang_thai(),
    'form- them-trang-thai'    => (new TrangThaiController())->create_trang_thai(),
    'them-trang-thai'          => (new TrangThaiController())->store_trang_thai(),
    'form-sua-trang-thai'      => (new TrangThaiController())->edit_trang_thai(),
    'sua-trang-thai'           => (new TrangThaiController())->update_trang_thai(),
    'xoa-trang-thai'           => (new TrangThaiController())->destroy_trang_thai(),

    // liên hệ

    'lienhe-category' => (new LienHeController())->index(),
    'xoa-lien-he'         => (new LienHeController())->destroy(),
    // người dùng
    'nguoidung-categoryy' => (new NguoiDungController())->index(),
    'form-them-nguoi-dung'   => (new NguoiDungController())->create(),
    'them-nguoi-dung'       => (new NguoiDungController())->store(),
    'form-sua-nguoi-dung'    => (new NguoiDungController())->edit(),
    'sua-nguoi-dung'         => (new NguoiDungController())->update(),
    'xoa-nguoi-dung'         => (new NguoiDungController())->destroy(),
    'chi-tiet-nguoi-dung'    => (new NguoiDungController())->details(),
 
};