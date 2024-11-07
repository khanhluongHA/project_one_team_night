<?php
class DanhMucController 
{
    
    //ham ket noi den File Model 
    public $modelDanhMuc;

    public function __construct()
    {
        $this->modelDanhMuc = new DanhMuc();
    }
   // ham hie thi danh sach
    public function index(){
       //lay ra du lieu danh muc 
       $danhMucs = $this->modelDanhMuc->getAll();
    //    var_dump($danhMucs);

       // dua du lieu ra view 
       require_once './views/danhmuc/list_danh_muc.php';
        
    }

    // ham hie thi form theem 
    public function create(){
        require_once './views/danhmuc/create_danh_muc.php';
        
    }
    // ham xu ly them vao CSDL
    public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lấy ra dữ liệu 
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            // validate 

            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }

            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            // thêm dữ liệu 
            if(empty($errors)){
                // thêm dữ liệu
                // thêm vào CSDL
                 $this->modelDanhMuc->postData($ten_danh_muc,$trang_thai);
                 unset($_SESSION['erorrs']);
                 header('Location: ?act=danhmuc-category');
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-danh-muc');
                exit();
            }
        }
        
    }

    // ham hien thi form xua
    public function edit(){
        // lấy id 
        $id = $_GET['danh_muc_id'];
        // lấy thông tin chi tiết của danh mục 
        $danhMuc = $this->modelDanhMuc->getDetailData($id);

        // đổ dữ liệu ra form 
        require_once './views/danhmuc/edit_danh_muc.php';

        
    }

     // ham xu ly cap nhat vao CSDL
     public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lấy ra dữ liệu 
            $id = $_POST['id'];
            $ten_danh_muc = $_POST['ten_danh_muc'];
            $trang_thai = $_POST['trang_thai'];

            // validate 

            $errors = [];
            if(empty($ten_danh_muc)){
                $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
            }

            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            // thêm dữ liệu 
            if(empty($errors)){
                // thêm dữ liệu
                // thêm vào CSDL
                 $this->modelDanhMuc->updateData($id,$ten_danh_muc,$trang_thai);
                 unset($_SESSION['erorrs']);
                 header('Location: ?act=danhmuc-category');
                 exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-danh-muc');
                exit();
            }
        }
        
     }

       // ham xoa du lieu trong CSDL
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['danh_muc_id'];

            // xóa danh mục 

            $this->modelDanhMuc->deleteData($id);

            header('Location: ?act=danhmuc-category');
            exit();

        }
        
    }




}





