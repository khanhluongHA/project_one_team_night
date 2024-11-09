<?php
class TinTucController 
{
    
    //ham ket noi den File Model 
    public $modelTinTuc;

    public function __construct()
    {
        $this->modelTinTuc = new TinTuc();
    }
   // ham hie thi danh sach
    public function index(){
       //lay ra du lieu danh muc 
       $tinTucs = $this->modelTinTuc->getAll();

       // dua du lieu ra view 
       require_once './views/tintuc/list_tin_tuc.php';
        
    }

    // ham hie thi form theem 
    public function create(){
        require_once './views/tintuc/create_tin_tuc.php';
        
    }
    // ham xu ly them vao CSDL
    public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lấy ra dữ liệu 
            $tieu_de = $_POST['tieu_de'];
            $noi_dung = $_POST['noi_dung'];
            $trang_thai = $_POST['trang_thai'];

            // validate 

            $errors = [];
            if(empty($tieu_de)){
                $errors['tieu_de'] = 'tiêu đề là bắt buộc';
            }

            if(empty($noi_dung)){
                $errors['noi_dung'] = 'nội dung là bắt buộc';
            }

            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            // thêm dữ liệu 
            if(empty($errors)){
                // thêm dữ liệu
                // thêm vào CSDL
                 $this->modelTinTuc->postData($tieu_de, $noi_dung, $trang_thai);
                 unset($_SESSION['erorrs']);
                 header('Location: ?act=tintuc-category');
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-tin-tuc');
                exit();
            }
        }
        
    }

    // ham hien thi form xua
    public function edit(){
        // lấy id 
        $id_tin_tuc = $_GET['id_tin_tuc'];
        // lấy thông tin chi tiết của danh mục 
        $tinTuc = $this->modelTinTuc->getDetailData($id_tin_tuc);

        // đổ dữ liệu ra form 
        require_once './views/tintuc/edit_tin_tuc.php';

        
    }

     // ham xu ly cap nhat vao CSDL
     public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lấy ra dữ liệu 
            $id_tin_tuc = $_POST['id_tin_tuc'];
            $tieu_de = $_POST['tieu_de'];
            $noi_dung = $_POST['noi_dung'];
            $trang_thai = $_POST['trang_thai'];

            // validate 

            $errors = [];
            if(empty($tieu_de)){
                $errors['tieu_de'] = 'tiêu đề';
            }

            if(empty($noi_dung)){
                $errors['noi_dung'] = 'nội dung là bắt buộc';
            }

            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            // thêm dữ liệu 
            if(empty($errors)){
                // thêm dữ liệu
                // thêm vào CSDL
                 $this->modelTinTuc->updateData($id_tin_tuc, $tieu_de, $noi_dung ,$trang_thai);
                 unset($_SESSION['erorrs']);
                 header('Location: ?act=tintuc-category');
                 exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-tin-tuc');
                exit();
            }
        }
        
     }

       // ham xoa du lieu trong CSDL
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id_tin_tuc = $_POST['id_tin_tuc'];

            // xóa danh mục 

            $this->modelTinTuc->deleteData($id_tin_tuc);

            header('Location: ?act=tintuc-category');
            exit();

        }
        
    }




}





