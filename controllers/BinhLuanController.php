<?php
class BinhLuanController{
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    // Hiển thị tất cả các bình luận
    public function danhSachBinhLuan() {
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        require_once './views/chi_tiet_san_pham.php';
        deleteSessionError();
    }
}

?>