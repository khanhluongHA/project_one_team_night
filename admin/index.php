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
require_once './controllers/AdminSanPhamController.php';
require_once 'controllers/DonHangController.php';
require_once 'controllers/ChiTietDonHangController.php';
require_once './controllers/AdminTaiKhoanController.php';
require_once './controllers/AdminBaoCaoThongKeController.php';
require_once './controllers/AdminBinhLuanController.php';

// Require toàn bộ file Models
require_once 'models/DanhMuc.php';
require_once 'models/TinTuc.php';
require_once 'models/BanNer.php';
require_once 'models/KhuyenMai.php';
require_once 'models/TrangThai.php';
require_once 'models/LienHe.php';
require_once 'models/NguoiDung.php';
require_once './models/AdminSanPham.php';
require_once './models/AdminDanhMuc.php';
require_once 'models/DonHang.php';
require_once 'models/ChiTietDonHang.php';
require_once './models/AdminTaiKhoan.php';
require_once './models/AdminThongKe.php';
require_once './models/AdminBinhLuan.php';






// Route
$act = $_GET['act'] ?? '/';
// if ($act !== 'login-admin' && $act !== 'check-login-admin' && $act !== 'logout-admin') {
//     checkLoginAdmin();
//   }
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

    'khuyen-mais'           =>(new KhuyenMaiController())->danhsachma(),
    'form-them-khuyen-mai'  => (new KhuyenMaiController())->formAddkhuyenmai(),
    'them-khuyen-mai'       => (new KhuyenMaiController())->Addkhuyenmai(),
    'xoa-khuyen-mai'        =>(new KhuyenMaiController())->deletekhuyenmai(),
    'form-sua-khuyen-mai'   =>(new KhuyenMaiController())->formEditKhuyenmai(),
    'sua-khuyen-mai'        =>(new KhuyenMaiController())->postEditKhuyenmai(),

    // trạng thái đơn hàng

    'trang-thais'              => (new TrangThaiController())->index_trang_thai(),
    'form- them-trang-thai'    => (new TrangThaiController())->create_trang_thai(),
    'them-trang-thai'          => (new TrangThaiController())->store_trang_thai(),
    'form-sua-trang-thai'      => (new TrangThaiController())->edit_trang_thai(),
    'sua-trang-thai'           => (new TrangThaiController())->update_trang_thai(),
    'xoa-trang-thai'           => (new TrangThaiController())->destroy_trang_thai(),

    // liên hệ

    'lien-hes'              => (new LienHeController())->index_lien_he(),
     'form- them-lien-he'    => (new LienHeController())->create_lien_he(),
     'them-lien-he'          => (new LienHeController())->store_lien_he(),
     'form-sua-lien-he'      => (new LienHeController())->edit_lien_he(),
     'sua-lien-he'           => (new LienHeController())->update_lien_he(),
     'xoa-lien-he'           => (new LienHeController())->destroy_lien_he(),
    // người dùng
    'nguoidung-categoryy'    => (new NguoiDungController())->index(),
    'form-them-nguoi-dung'   => (new NguoiDungController())->create(),
    'them-nguoi-dung'        => (new NguoiDungController())->store(),
    'form-sua-nguoi-dung'    => (new NguoiDungController())->edit(),
    'sua-nguoi-dung'         => (new NguoiDungController())->update(),
    'xoa-nguoi-dung'         => (new NguoiDungController())->destroy(),
    'chi-tiet-nguoi-dung'    => (new NguoiDungController())->details(),

    // sản phẩm
    'san-pham'              => (new AdminSanPhamController())->danhSachSanPham(),
    'form-them-san-pham'    => (new AdminSanPhamController())->formAddSanPham(),
    'them-san-pham'         => (new AdminSanPhamController())->postAddSanPham(),
    'form-sua-san-pham'     => (new AdminSanPhamController())->formEditSanPham(),
    'sua-san-pham'          => (new AdminSanPhamController())->postEditSanPham(),
    'sua-album-anh-pham'    => (new AdminSanPhamController())->postEditAnhSanPham(),
    'xoa-san-pham'          => (new AdminSanPhamController())->deleteSanPham(),
    'chi-tiet-san-pham'     => (new AdminSanPhamController())->detailSanPham(),

    // bình luận
    'update-trang-thai-binh-luan' => (new AdminSanPhamController())->updateTrangThaiBinhLuan(),
    'binh-luan' => (new AdminBinhLuanController())->danhSachBinhLuan(),
    'form-them-binh-luan' => (new AdminBinhLuanController())->formAddBinhLuan(),
    'form-sua-binh-luan' => (new AdminBinhLuanController())->formEditBinhLuan(),
    'sua-binh-luan' => (new AdminBinhLuanController())->editBinhLuan(),
    'them-binh-luan' => (new AdminBinhLuanController())->themBinhLuan(),
    'xoa-binh-luan' => (new AdminBinhLuanController())->deleteBinhLuan(),

    // Quản lí tài khoản quản trị 
   'list-tai-khoan-quan-tri' => (new AdminTaiKhoanController())->danhSachQuanTri(),
   'form-them-quan-tri' => (new AdminTaiKhoanController())->formAddQuanTri(),
   'them-quan-tri' => (new AdminTaiKhoanController())->postAddQuanTri(),
   'form-sua-quan-tri' => (new AdminTaiKhoanController())->formEditQuanTri(),
   'sua-quan-tri' => (new AdminTaiKhoanController())->postEditQuanTri(),


   //    route dùng chung 
   'reset-password' => (new AdminTaiKhoanController())->resetPassword(),


   //    route quản lí tài khoản khách hàng 
   'list-tai-khoan-khach-hang' => (new AdminTaiKhoanController())->danhSachkhachHang(),
   'form-sua-khach-hang' => (new AdminTaiKhoanController())->formEditkhachHang(),
   'sua-khach-hang' => (new AdminTaiKhoanController())->postEditkhachHang(),
   'chi-tiet-khach-hang' => (new AdminTaiKhoanController())->detailKhachhang(),

   // route quản lí tài khoản cá nhân(quản trị) 

   'form-sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->formEditCaNhanQuantri(),
   // 'sua-thong-tin-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditCaNhanQuantri(),

   'sua-mat-khau-ca-nhan-quan-tri' => (new AdminTaiKhoanController())->postEditMatKhauCaNhan(),

   // route auth 
   'login-admin' => (new AdminTaiKhoanController())->formLogin(),
   'check-login-admin' => (new AdminTaiKhoanController())->login(),
   'logout-admin' => (new AdminTaiKhoanController())->logout(),


    // đơn hàng
    'donhang-category' => (new DonHangController())->index(),
    'form-sua-don-hang'    => (new DonHangController())->edit(),
    'sua-don-hang'         => (new DonHangController())->update(),
    // 'xoa-don-hang'         => (new DonHangController())->destroy(),
    'chi-tiet-don-hang'    => (new DonHangController())->detailDonHang(),
    // chi tiết đơn hàng
    'chitietdonhangs'              => (new ChiTietDonHangController())->index_chitietdonhang(),
    'form- them-chitietdonhang'    => (new ChiTietDonHangController())->create_chitietdonhang(),
    'them-chitietdonhang'          => (new ChiTietDonHangController())->store_chitietdonhang(),
    'form-sua-chitietdonhang'      => (new ChiTietDonHangController())->edit_chitietdonhang(),
    'sua-chitietdonhang'           => (new ChiTietDonHangController())->update_chitietdonhang(),
    'xoa-chitietdonhang'           => (new ChiTietDonHangController())->destroy_chitietdonhang(),
    //login
 
    // thống kê
    'thong-ke' => (new AdminBaoCaoThongKeController())->thongKe(),
    // danh gia
    'update-trang-thai-danh-gia' => (new AdminSanPhamController())->updateTrangThaiDanhGia(),
    
    //đăng nhập
    'login'                 => (new DashboardController())->login(),
    'logout'                 => (new DashboardController())->logout(),
    'register'                 => (new DashboardController())->register(),
    'forgot_password'                 => (new DashboardController())->forgot_password(),
    'edit_profile'                 => (new DashboardController())->edit_profile(),
 
};