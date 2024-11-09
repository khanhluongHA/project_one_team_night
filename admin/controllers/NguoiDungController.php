
<?php
class NguoiDungController 
{
    //ham ket noi den File Model 
    public $modelNguoiDung;

    public function __construct()
    {
        $this->modelNguoiDung = new NguoiDung();
    }
   // ham hie thi danh sach
    public function index(){
       //lay ra du lieu danh muc 
       $nguoiDung = $this->modelNguoiDung->getAll();
    //    var_dump($danhMucs);

       // dua du lieu ra view 
       require_once './views/nguoidung/list_nguoi_dung.php';
        
    }

    // ham hie thi form theem 
    public function create(){
        require_once './views/nguoidung/create_nguoi_dung.php';
        
    }
    // ham xu ly them vao CSDL
    public function store(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lấy ra dữ liệu 
            $email = $_POST['email'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $ngay_dang_ki = $_POST['ngay_dang_ki'];
            $dang_nhap_ngay_cuoi = $_POST['dang_nhap_ngay_cuoi'];
            $trang_thai = $_POST['trang_thai'];


            // validate 

            $errors = [];
            if(empty($email)){
                $errors['email'] = 'Tên danh mục là bắt buộc';
            }

            if(empty($ngay_sinh)){
                $errors['ngay_sinh'] = 'Trạng thái là bắt buộc';
            }
            if(empty($gioi_tinh)){
                $errors['gioi_tinh'] = 'Tên danh mục là bắt buộc';
            }

            if(empty($so_dien_thoai)){
                $errors['so_dien_thoai'] = 'Trạng thái là bắt buộc';
            }
            if(empty($ngay_dang_ki)){
                $errors['ngay_dang_ki'] = 'Tên danh mục là bắt buộc';
            }

            if(empty($dang_nhap_ngay_cuoi)){
                $errors['dang_nhap_ngay_cuoi'] = 'Trạng thái là bắt buộc';
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            }

            // thêm dữ liệu 
            if(empty($errors)){
                // thêm dữ liệu
                // thêm vào CSDL
                 $this->modelNguoiDung->postData($email,$ngay_sinh,$gioi_tinh, $so_dien_thoai, $ngay_dang_ki, $dang_nhap_ngay_cuoi, $trang_thai);
                 unset($_SESSION['erorrs']);
                 header('Location: ?act=nguoidung-category');
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-nguoi-dung');
                exit();
            }
        }
        
    }

    // ham hien thi form xua
    public function edit(){
        // lấy id 
        $id = $_GET['id_nguoi_dung'];
        // lấy thông tin chi tiết của danh mục 
        $nguoiDung = $this->modelNguoiDung->getDetailData($id);

        // đổ dữ liệu ra form 
        require_once './views/nguoidung/edit_nguoi_dung.php';

        
    }

     // ham xu ly cap nhat vao CSDL
     public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lấy ra dữ liệu 
            $id_nguoi_dung = $_POST['id_nguoi_dung'];
            $email = $_POST['email'];
            $ngay_sinh = $_POST['ngay_sinh'];
            $gioi_tinh = $_POST['gioi_tinh'];
            $so_dien_thoai = $_POST['so_dien_thoai'];
            $ngay_dang_ki = $_POST['ngay_dang_ki'];
            $dang_nhap_ngay_cuoi = $_POST['dang_nhap_ngay_cuoi'];
            $trang_thai = $_POST['trang_thai'];
            

            // validate 

            $errors = [];
            if(empty($email)){
                $errors['email'] = 'email người dùng là bắt buộc';
            }

            if(empty($ngay_sinh)){
                $errors['ngay_sinh'] = 'ngày sinh là bắt buộc';
            }
            if(empty($gioi_tinh)){
                $errors['gioi_tinh'] = 'giới tính người dùng là bắt buộc';
            }

            if(empty($so_dien_thoai)){
                $errors['so_dien_thoai'] = 'số điện thoại là bắt buộc';
            }
            if(empty($ngay_dang_ki)){
                $errors['ngay_dang_ki'] = 'ngày đăng kí là bắt buộc';
            }

            if(empty($dang_nhap_ngay_cuoi)){
                $errors['dang_nhap_ngay_cuoi'] = 'đnăg nhập ngày cuối bắt buộc';
            }
            if(empty($trang_thai)){
                $errors['trang_thai'] = 'đnăg nhập ngày cuối bắt buộc';
            }

            // thêm dữ liệu 
            if(empty($errors)){
                // thêm dữ liệu
                // thêm vào CSDL
                 $this->modelNguoiDung->updateData($id_nguoi_dung ,$email,$ngay_sinh,$gioi_tinh, $so_dien_thoai, $ngay_dang_ki, $dang_nhap_ngay_cuoi, $trang_thai);
                 unset($_SESSION['erorrs']);
                 header('Location: ?act=nguoidung-category');
                 exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-nguoi-dung');
                exit();
            }
        }
        
     }

       // ham xoa du lieu trong CSDL
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['id_nguoi_dung'];

            // xóa danh mục 

            $this->modelNguoiDung->deleteData($id);

            header('Location: ?act=nguoidung-category');
            exit();

        }
        
    }
}





