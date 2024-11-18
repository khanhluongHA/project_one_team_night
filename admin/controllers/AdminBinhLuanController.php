<?php
class AdminBinhLuanController
{
    public $modelBinhLuan;

    public function __construct()
    {
        $this->modelBinhLuan = new AdminBinhLuan();
    }

    // Hiển thị tất cả các bình luận
    public function danhSachBinhLuan() {
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        require_once './views/binhluans/listBinhLuan.php';
        deleteSessionError();
    }

    // Hiển thị form thêm bình luận
    public function formAddBinhLuan() {
        $listBinhLuan = $this->modelBinhLuan->getAllBinhLuan();
        require_once './views/binhluans/addBinhLuan.php';
        deleteSessionError();
    }

    // Thêm bình luận mới
    public function themBinhLuan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $tai_khoan_id = $_POST['tai_khoan_id'] ?? '';
            $noi_dung = $_POST['noi_dung'] ?? '';
            $ngay_dang = $_POST['ngay_dang'] ?? '';
            $trang_thai = ($_POST['trang_thai'] === 'hien') ? 1 : 2;
    
            // var_dump($san_pham_id);die();
            $errors = [];
    
            // Kiểm tra các trường nhập
            if (empty($san_pham_id)) {
                $errors['san_pham_id'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($tai_khoan_id)) {
                $errors['tai_khoan_id'] = 'ID tài khoản không được để trống';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung bình luận không được để trống';
            }
            if (empty($ngay_dang)) {
                $errors['ngay_dang'] = 'Ngày đăng không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }

            $_SESSION["error"] = $errors;
    
            if (empty($errors)) {
                // Thêm bình luận vào cơ sở dữ liệu
                $this->modelBinhLuan->insertBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai);
                // var_dump($this->modelBinhLuan->insertBinhLuan($san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai));die();
                header("Location: ?act=binh-luan ");
                exit();
            } else {
                require_once './views/binhluans/addBinhLuan.php';
            }
        }
    }

    // Hiển thị form sửa bình luận
    public function formEditBinhLuan() {
        $id = $_GET['id_binh_luan'];
        $binhLuan = $this->modelBinhLuan->getBinhLuanFormEdit($id);
        
        if ($binhLuan) {
            require_once './views/binhluans/editBinhLuan.php';
        } else {
            header("Location:?act=binh-luan ");
            exit();
        }
    }

    // Cập nhật bình luận
    public function editBinhLuan() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $id = $_POST['id'];
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            $tai_khoan_id = $_POST['tai_khoan_id'] ?? '';
            $noi_dung = $_POST['noi_dung'] ?? '';
            $ngay_dang = $_POST['ngay_dang'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            // var_dump($id); die;
            
            $errors = [];

            // Kiểm tra các trường nhập
            if (empty($san_pham_id)) {
                $errors['san_pham_id'] = 'Tên sản phẩm không được để trống';
            }
            if (empty($tai_khoan_id)) {
                $errors['tai_khoan_id'] = 'ID tài khoản không được để trống';
            }
            if (empty($noi_dung)) {
                $errors['noi_dung'] = 'Nội dung bình luận không được để trống';
            }
            if (empty($ngay_dang)) {
                $errors['ngay_dang'] = 'Ngày đăng không được để trống';
            }
            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái không được để trống';
            }

            if (empty($errors)) {
                $this->modelBinhLuan->updateBinhLuan($id, $san_pham_id, $tai_khoan_id, $noi_dung, $ngay_dang, $trang_thai);
                header("Location: ?act=binh-luan" );
                exit();
            } else {
                // Trả về form và hiển thị lỗi
                $binhLuan = ['id' => $id, 'san_pham_id' => $san_pham_id, 'tai_khoan_id' => $tai_khoan_id, 'noi_dung' => $noi_dung, 'ngay_dang' => $ngay_dang, 'trang_thai' => $trang_thai];
                require_once './views/binhluans/editBinhLuan.php';
            }
        }
    }

    // Xóa bình luận
    public function deleteBinhLuan() {
        $id = $_GET['id_binh_luan'];
        if ($this->modelBinhLuan->destroyBinhLuan($id)) {
            header("Location: ?act=binh-luan ");
            exit();
        } else {
            // Nếu xóa không thành công, có thể thông báo lỗi
            echo "Không thể xóa bình luận này!";
        }
    }
}
?>
