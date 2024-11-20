<?php
class DonHangController
{
    
    //ham ket noi den File Model 
    public $modelDonHang;

    public function __construct()
    {
        $this->modelDonHang = new DonHang();
    }
   // ham hie thi danh sach
    public function index(){
       //lay ra du lieu danh muc 
       $donHangs = $this->modelDonHang->getAll();
    //    var_dump($danhMucs);

       // dua du lieu ra view 
       require_once './views/donhang/list_don_hang.php';
        
    }
    public function edit(){
        // lấy id 
        $id = $_GET['don_hang_id'];
        // lấy thông tin chi tiết của danh mục 
        $donHang = $this->modelDonHang->getDetailData($id);
       

        // đổ dữ liệu ra form 
        require_once './views/donhang/edit_don_hang.php';

        
    }
    public function update(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            // lấy ra dữ liệu 
            $id = $_POST['id'];
            $ma_don_hang = $_POST['ma_don_hang'];
            $ngay_dat = $_POST['ngay_dat'];
            $phuong_thuc_thanh_toan = $_POST['phuong_thuc_thanh_toan'];
            $trang_thai_thanh_toan = $_POST['trang_thai_thanh_toan'];
            $trang_thai_don_hang = $_POST['trang_thai_don_hang'];
            // var_dump($trang_thai_don_hang);die;

            // validate 

            // $errors = [];
            // if(empty($ma_don_hang)){
            //     $errors['ma_don_hang'] = 'Tên danh mục là bắt buộc';
            // }

            // if(empty($trang_thai)){
            //     $errors['trang_thai'] = 'Trạng thái là bắt buộc';
            // }

            // thêm dữ liệu 
            if(empty($errors)){
                // thêm dữ liệu
                // thêm vào CSDL
                 $this->modelDonHang->updateData($id,$ma_don_hang,$ngay_dat,$phuong_thuc_thanh_toan,$trang_thai_thanh_toan,$trang_thai_don_hang);
                //  var_dump($sdt_nguoi_nhan);die;
                 unset($_SESSION['erorrs']);
                 header('Location: ?act=donhang-category');
                 exit();
            }else{
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-sua-don-hang');
                exit();
            }
        }
        
     }
    

    // ham hie thi form theem 
    // public function create(){
    //     require_once './views/danhmuc/create_danh_muc.php';
        
    // }
    // // ham xu ly them vao CSDL
    // public function store(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         // lấy ra dữ liệu 
    //         $ten_danh_muc = $_POST['ten_danh_muc'];
    //         $trang_thai = $_POST['trang_thai'];

    //         // validate 

    //         $errors = [];
    //         if(empty($ten_danh_muc)){
    //             $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
    //         }

    //         if(empty($trang_thai)){
    //             $errors['trang_thai'] = 'Trạng thái là bắt buộc';
    //         }

    //         // thêm dữ liệu 
    //         if(empty($errors)){
    //             // thêm dữ liệu
    //             // thêm vào CSDL
    //              $this->modelDanhMuc->postData($ten_danh_muc,$trang_thai);
    //              unset($_SESSION['erorrs']);
    //              header('Location: ?act=danhmuc-category');
    //         }else{
    //             $_SESSION['errors'] = $errors;
    //             header('Location: ?act=form-them-danh-muc');
    //             exit();
    //         }
    //     }
        
    // }

    // // ham hien thi form xua
    // public function edit(){
    //     // lấy id 
    //     $id = $_GET['danh_muc_id'];
    //     // lấy thông tin chi tiết của danh mục 
    //     $danhMuc = $this->modelDanhMuc->getDetailData($id);

    //     // đổ dữ liệu ra form 
    //     require_once './views/danhmuc/edit_danh_muc.php';

        
    // }

    //  // ham xu ly cap nhat vao CSDL
    //  public function update(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         // lấy ra dữ liệu 
    //         $id = $_POST['id'];
    //         $ten_danh_muc = $_POST['ten_danh_muc'];
    //         $trang_thai = $_POST['trang_thai'];

    //         // validate 

    //         $errors = [];
    //         if(empty($ten_danh_muc)){
    //             $errors['ten_danh_muc'] = 'Tên danh mục là bắt buộc';
    //         }

    //         if(empty($trang_thai)){
    //             $errors['trang_thai'] = 'Trạng thái là bắt buộc';
    //         }

    //         // thêm dữ liệu 
    //         if(empty($errors)){
    //             // thêm dữ liệu
    //             // thêm vào CSDL
    //              $this->modelDanhMuc->updateData($id,$ten_danh_muc,$trang_thai);
    //              unset($_SESSION['erorrs']);
    //              header('Location: ?act=danhmuc-category');
    //              exit();
    //         }else{
    //             $_SESSION['errors'] = $errors;
    //             header('Location: ?act=form-sua-danh-muc');
    //             exit();
    //         }
    //     }
        
    //  }

    //    // ham xoa du lieu trong CSDL
    // public function destroy(){
    //     if($_SERVER['REQUEST_METHOD'] == 'POST'){
    //         $id = $_POST['danh_muc_id'];

    //         // xóa danh mục 

    //         $this->modelDanhMuc->deleteData($id);

    //         header('Location: ?act=danhmuc-category');
    //         exit();

    //     }
        
    // }

     //----------------------------------------------------------------Chi tiết đơn hàng----------------------------------------------------------
    public function detailDonHang(){
        $id_don_hang = $_GET['don_hang_id'];
        //lấy thông tin đơn hàng ở bảng đơn hàng
        $donHang = $this->modelDonHang->getDetailDonHang($id_don_hang);
        // lấy danh sachs sản phẩm đã đặt hàng của đon hàng ở bảng chi_tiet_don_hangs
        $sanPhamDonHang = $this->modelDonHang->getListSpDonHang($id_don_hang);
        $listTrangThaiDonHang = $this->modelDonHang->getAllTrangThaiDonHang();

        
        require_once './views/donhang/detailDonHang.php';
    }

}