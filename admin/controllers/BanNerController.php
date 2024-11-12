<?php

class BanNerController
{
    //kết nối đến fite model
    public $modelBanNer;

    public function __construct()
    {
        $this->modelBanNer = new BanNer();
    }
    //hàm hiển thị form thêm
    public function index_banner(){
        
        //lấy ra dữ liệu banner
        $banNers = $this->modelBanNer->getAll();
     //   var_dump($banNers);

        //đưa dữ liệu ra view
        require_once './views/banner/list_banner.php';
    }

    //hàm hiển thị form thêm
    public function create_banner(){
        require_once './views/banner/create_banner.php';

    }

     //hàm sử lý thêm vào CSDL
     public function store_banner(){
        if ($_SERVER['REQUEST_METHOD']=='POST') {
            //lấy ra dữ liệu
            $ten_banner = $_POST['ten_banner'];
            $trang_thai = $_POST['trang_thai'];
            $anh_banner = $_POST['anh_banner'];

            //validate
            $errors = [];
            if (empty($ten_banner)) {
                $errors['ten_banner'] = 'tên danh mục là bắt buộc';

            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'trạng thái là bắt buộc';
                
        }

             if (empty($anh_banner)) {
                $errors['anh_banner'] = 'ảnh là bắt buộc';
            
        }

        //thêm dữ liệu
        if (empty($errors)) {
            //nếu ko có lỗi thì thêm dữ liệu
            //thêm vào csdl
            $this->modelBanNer->postData($ten_banner,$trang_thai,$anh_banner);
            unset($_SESSION['errors']);
            header('location: ?act=banners');
            exit();
        }else{
            $_SESSION['errors'] = $errors;
            header('location: ?act=form-them-banner');
            exit();

        }
     }
    }

      //hàm hiển thị form chỉnh sửa
    public function edit_banner(){
        //lấy id
        $id = $_GET['banner_id'];
        //lấy thông tin chi tiết của banner
        $banNer = $this->modelBanNer->getDetailData($id);

       //đổ dữ liệu ra form
       require_once './views/banner/edit_banner.php';

    }

     //hàm sử lý cập nhật dữ liệu vào CSDL
     public function update_banner(){
       
            if ($_SERVER['REQUEST_METHOD']=='POST') {
                //lấy ra dữ liệu
                $id = $_POST['id'];
                $ten_banner = $_POST['ten_banner'];
                $trang_thai = $_POST['trang_thai'];
                $anh_banner = $_POST['anh_banner'];
    
                //validate
                $errors = [];
                if (empty($ten_banner)) {
                    $errors['ten_banner'] = 'tên danh mục là bắt buộc';
    
                }
    
                if (empty($trang_thai)) {
                    $errors['trang_thai'] = 'trạng thái là bắt buộc';
                    
            } 
            
                if (empty($anh_banner)) {
                    $errors['anh_banner'] = 'ảnh là bắt buộc';
            
            }
    
            //thêm dữ liệu
            if (empty($errors)) {
                //nếu ko có lỗi thì thêm dữ liệu
                //thêm vào csdl
                $this->modelBanNer->updateData($id,$ten_banner,$trang_thai,$anh_banner);
                unset($_SESSION['errors']);
                header('location: ?act=banners');
                exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('location: ?act=form-sua-banner');
                exit();
    
            }
         }
        
    
        
     }

      //hàm xóa dữ liệu trong CSDL
    public function destroy_banner(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['banner_id'];
            
            //xóa banner
           $deleteBanNer = $this->modelBanNer->deleteData($id);

           header('location: ?act=banners');
           exit();
        }

    }
  
}