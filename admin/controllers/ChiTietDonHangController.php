<?php

class ChiTietDonHangController
{
    //kết nối đến fite model
    public $modelChiTietDonHang;

    public function __construct()
    {
        $this->modelChiTietDonHang = new ChiTietDonHang();
    }
    //hàm hiển thị form thêm
    public function index_chitietdonhang(){
        
        //lấy ra dữ liệu danh mục
        $chitietdonHangs = $this->modelChiTietDonHang->getAll();
     //   var_dump($chitietdonHangs);

        //đưa dữ liệu ra view
        require_once './views/chitietdonhang/list_chitietdonhang.php';
    }

    //hàm hiển thị form thêm
    public function create_chitietdonhang(){
        require_once './views/chitietdonhang/create_chitietdonhang.php';

    }

     //hàm sử lý thêm vào CSDL
     public function store_chitietdonhang(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //lấy ra dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'];
            $so_luong = $_POST['so_luong'];
            $don_gia = $_POST['don_gia'];
            

            //validate
            $errors = [];
            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'ten_san_pham là bắt buộc';

            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'số lượng là bắt buộc';

            }

            if (empty($don_gia)) {
                $errors['don_gia'] = 'don_gia là bắt buộc';
                
            }
           

        //thêm dữ liệu
        if (empty($errors)) {
            //nếu ko có lỗi thì thêm dữ liệu
            //thêm vào csdl
            $this->modelChiTietDonHang->postData($ten_san_pham,$so_luong,$don_gia);
            unset($_SESSION['errors']);
            header('location: ?act=chitietdonhangs');
            exit();
        }else{
            $_SESSION['errors'] = $errors;
            header('location: ?act=form- them-chitietdonhang');
            exit();

        }
     }
    }

      //hàm hiển thị form chỉnh sửa
    public function edit_chitietdonhang(){
        //lấy id
        $id = $_GET['chitietdonhang_id'];
        //lấy thông tin chi tiết của danh mục
        $chitietdonHang = $this->modelChiTietDonHang->getDetailData($id);

       //đổ dữ liệu ra form
       require_once './views/chitietdonhang/edit_chitietdonhang.php';

    }

     //hàm sử lý cập nhật dữ liệu vào CSDL
     public function update_chitietdonhang(){
       
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //lấy ra dữ liệu
                $id = $_POST['id'];
                $ten_san_pham = $_POST['ten_san_pham'];
                $so_luong = $_POST['so_luong'];
                $don_gia = $_POST['don_gia'];
               
    
                //validate
                $errors = [];
                if (empty($ten_san_pham)) {
                    $errors['ten_san_pham'] = 'ten_san_pham là bắt buộc';
    
                }
                if (empty($so_luong)) {
                    $errors['so_luong'] = 'số lượng là bắt buộc';
    
                }
    
                if (empty($don_gia)) {
                    $errors['don_gia'] = 'don_gia là bắt buộc';
                    
                }
              
            
    
            //thêm dữ liệu
            if (empty($errors)) {
                //nếu ko có lỗi thì thêm dữ liệu
                //thêm vào csdl
                $this->modelChiTietDonHang->updateData($id,$ten_san_pham,$so_luong,$don_gia);
                unset($_SESSION['errors']);
                header('location: ?act=chitietdonhangs');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-chitietdonhang');
                exit();
    
            }
         }
        
    
        
     }

      //hàm xóa dữ liệu trong CSDL
    public function destroy_chitietdonhang(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['chitietdonhang_id'];
            
            //xóa danh mục
           $deleteChiTietDonHang = $this->modelChiTietDonHang->deleteData($id);

           header('location: ?act=chitietdonhangs');
           exit();
        }

    }
  
}