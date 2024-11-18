<?php 
class AdminBaoCaoThongKeController {
    public $modelThongKe;
    public function __construct()
    {
        $this->modelThongKe = new AdminThongKe();
    }

    public function thongKe() {
        $tongDoanhThu = $this->modelThongKe->getTongDoanhThu();
        $tongDonHangChoXuLy = $this->modelThongKe->getTongDonHangChoXuLy();
        $doanhThuHangNgay = $this->modelThongKe->getDoanhThuHangNgay();
        $soLuongBan = $this->modelThongKe->getTongDonHangDaBan();

        require_once './views/thongkes/listThongKe.php';
    }
       public function home()
    {

        require_once './views/home.php';
    }
}