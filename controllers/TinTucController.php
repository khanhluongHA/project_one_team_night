<?php
class TinTucController{
    public $single;
    public function __construct(){
        $this->single = new Tintuc();
    }
    
    public function new(){
        $single = $this->single->getall();
        require_once './views/single.php';
    }
    public function detail(){
        // Lấy ID của tin tức từ URL
        $id = $_GET['id'];
        // var_dump($id);die;
    
        // Lấy dữ liệu chi tiết của tin tức từ model
        $single = $this->single->getDetailData($id);
        // var_dump($single);die;
    
        // Kiểm tra nếu không tìm thấy tin tức
        if (!$single) {
            echo "Không tìm thấy bài viết";
            return;
        } else {
            // Truyền dữ liệu vào view show_tin_tuc.php
            require_once './views/chi_tiet_tin_tuc.php';
        }
    }
}