<?php 

class ProductDetail
{
    public function detail() {
        require_once './views/productdetail/detailproduct.php';
    }
    public $modelSanPham;
    public function __construct()
    {
        $this->modelSanPham = new AdminSanPham();
    }
    public function danhSachSanPham()
    {

        $listSanPham = $this->modelSanPham->getAllSanPham();

        require_once './views/productdetail/productdetail.php';
    }

    public function formAddSanPham()
    {
        // hàm dùng hiển thị form nhập 

        require_once './views/sanpham/addSanPham.php';

        // Xóa sesion sau khi load trang 
        deleteSessionError();
    }

    public function postAddSanPham()
    {
        // hàm dùng thêm xử lý dữ liệu

        // kiểm tra xem dữ liệu dc sumbit nên k 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // lưu hình ảnh vào 
            $file_thumb = uploadFile($hinh_anh, './uploads/');

            // mảng hình ảnh 
            $img_array = $_FILES['img_array'];



            // tạo 1 mảng trống để chứa dữ liệu 
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }

            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }

            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến không được để trống';
            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }

            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
            }

            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục phải chọn';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }

            if ($hinh_anh['error'] !== 0) {
                $errors['hinh_anh'] = 'Phải chọn ảnh';
            }

            $_SESSION['error'] = $errors;


            // Nếu không có lỗi tiến hành thêm sản phẩm
            if (empty($errors)) {
                // Nếu không có lỗi tiến hành thêm sản phẩm
                // var_dump('oke'); 

                $san_pham_id = $this->modelSanPham->insertSanPham(
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $file_thumb
                );

                // var_dump($san_pham_id);die();

                // Xử lý thêm album ảnh sản phẩm img_array

                if (!empty($img_array['name'])) {
                    foreach ($img_array['name'] as $key => $value) {
                        $file = [
                            'name' => $img_array['name'][$key],
                            'type' => $img_array['type'][$key],
                            'tmp_name' => $img_array['tmp_name'][$key],
                            'error' => $img_array['error'][$key],
                            'size' => $img_array['size'][$key],
                        ];

                        $link_hinh_anh = uploadFile($file, './uploads/');
                        $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $link_hinh_anh);
                    }
                }

                header("Location: ?act=san-pham");
                exit();
            } else {
                // trả về form và lỗi 
                //    Đặt chỉ thị xóa session sau khi hiển thị form 
                $_SESSION['flash'] = true;

                header("Location: ?act=form-them-san-pham");
                exit();
            }
        }
    }
    

    public function formEditSanPham()
    {
        // hàm dùng hiển thị form nhập 

        // lấy ra thông tin sản phẩm cần sửa 
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);
        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        if ($sanPham) {
            require_once './views/sanpham/editSanPham.php';
            deleteSessionError();
        } else {
            header("Location: ?act=san-pham");
            exit();
        }

    }


    public function postEditSanPham()
    {
        // hàm dùng thêm xử lý dữ liệu

        // kiểm tra xem dữ liệu dc sumbit nên k 
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            // lấy ra dữ liệu
            // lấy ra dữ liệu cũ của sản phẩm 
            $san_pham_id = $_POST['san_pham_id'] ?? '';
            // var_dump($_POST);die;
            // truy vấn 
            $sanPhamOld = $this->modelSanPham->getDetailSanPham($san_pham_id);
            $old_file = $sanPhamOld['hinh_anh']; // lấy ảnh cũ để phục vụ cho sửa ảnh
            $ten_san_pham = $_POST['ten_san_pham'] ?? '';
            $gia_san_pham = $_POST['gia_san_pham'] ?? '';
            $gia_khuyen_mai = $_POST['gia_khuyen_mai'] ?? '';
            $so_luong = $_POST['so_luong'] ?? '';
            $ngay_nhap = $_POST['ngay_nhap'] ?? '';
            $danh_muc_id = $_POST['danh_muc_id'] ?? '';
            $trang_thai = $_POST['trang_thai'] ?? '';
            $mo_ta = $_POST['mo_ta'] ?? '';

            $hinh_anh = $_FILES['hinh_anh'] ?? null;

            // var_dump($_POST);die;



            // tạo 1 mảng trống để chứa dữ liệu 
            $errors = [];

            if (empty($ten_san_pham)) {
                $errors['ten_san_pham'] = 'Tên sản phẩm không được để trống';
            }

            if (empty($gia_san_pham)) {
                $errors['gia_san_pham'] = 'Giá sản phẩm không được để trống';
            }

            if (empty($gia_khuyen_mai)) {
                $errors['gia_khuyen_mai'] = 'Giá khuyến không được để trống';
            }

            if (empty($so_luong)) {
                $errors['so_luong'] = 'Số lượng không được để trống';
            }

            if (empty($ngay_nhap)) {
                $errors['ngay_nhap'] = 'Ngày nhập không được để trống';
            }

            if (empty($danh_muc_id)) {
                $errors['danh_muc_id'] = 'Danh mục phải chọn';
            }

            if (empty($trang_thai)) {
                $errors['trang_thai'] = 'Trạng thái phải chọn';
            }



            $_SESSION['error'] = $errors;
            // var_dump($errors);die;

            // logic sửa ảnh 
            if (isset($hinh_anh) && $hinh_anh['error'] == UPLOAD_ERR_OK) {
                // upload ảnh mới lên
                $new_file = uploadFile($hinh_anh, './uploads/');
                if (!empty($old_file)) { // Nếu có ảnh cũ thì xóa đi
                    deleteFile($old_file);
                }
            } else {
                $new_file = $old_file;
            }


            // Nếu không có lỗi tiến hành thêm sản phẩm
            if (empty($errors)) {

                // Nếu không có lỗi tiến hành thêm sản phẩm
                // var_dump('oke'); 

                $san_pham_id = $this->modelSanPham->updateSanPham(
                    $san_pham_id,
                    $ten_san_pham,
                    $gia_san_pham,
                    $gia_khuyen_mai,
                    $so_luong,
                    $ngay_nhap,
                    $danh_muc_id,
                    $trang_thai,
                    $mo_ta,
                    $new_file
                );

                // var_dump($san_pham_id);die();

                // Xử lý thêm album ảnh sản phẩm img_array

                header("Location: ?act=san-pham");
                exit();
            } else {
                // trả về form và lỗi 
                //    Đặt chỉ thị xóa session sau khi hiển thị form 
                $_SESSION['flash'] = true;

                header("Location: ?act=form-sua-san-pham&id_san_pham=" . $san_pham_id);
                exit();
            }
        }
    }

    // sửa album ảnh 
    // -sửa ảnh cũ 
    //   + thêm ảnh mới 
    //   +Không thêm ảnh mới
    // -Không sửa ảnh cũ 
    //   + Thêm ảnh mới
    //   + không thêm ảnh mới
    // -Xóa ảnh cũ
    //   + Thêm ảnh mới
    //   + Không thêm ảnh mới

    public function postEditAnhSanPham()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $san_pham_id = $_POST['san_pham_id'] ?? '';

            // lấy danh sách ảnh hiện tại của sản phẩm 
            $listAnhSanPhamCurrent = $this->modelSanPham->getListAnhSanPham($san_pham_id);

            // xử lý ảnh được gửi đén form 
            $img_array = $_FILES['img_array'];
            $img_delete = isset($_POST['img_delete']) ? explode(',', $_POST['img_delete']) : [];
            $current_img_ids = $_POST['current_img_ids'] ?? [];

            // khai báo mảng để lưu thêm ảnh mới hoặc thay thế ảnh cũ 
            $upload_file = [];

            // Upload ảnh mới hoặc thay thế ảnh cũ 
            foreach ($img_array['name'] as $key => $value) {
                if ($img_array['error'][$key] == UPLOAD_ERR_OK) {
                    $new_file = uploadFileAlbum($img_array, './uploads/', $key);
                    if ($new_file) {
                        $upload_file[] = [
                            'id' => $current_img_ids[$key] ?? null,
                            'file' => $new_file
                        ];
                    }
                }
            }

            // lưu ảnh mới vào db và xóa ảnh cũ nếu có 
            foreach ($upload_file as $file_info) {
                if ($file_info['id']) {
                    $old_file = $this->modelSanPham->getDetailAnhSanPham($file_info['id'])['link_hinh_anh'];


                    // cập nhật ảnh cũ 
                    $this->modelSanPham->updateAnhSanPham($file_info['id'], $file_info['file']);

                    // xóa ảnh cũ 
                    deleteFile($old_file);
                } else {
                    //Thêm mới ảnh
                    $this->modelSanPham->insertAlbumAnhSanPham($san_pham_id, $file_info['file']);
                }

            }

            // xứ lý xóa ảnh 
            foreach ($listAnhSanPhamCurrent as $anhSP) {
                $anh_id = $anhSP['id'];
                if (in_array($anh_id, $img_delete)) {
                    // xóa ảnh trong db
                    $this->modelSanPham->destroyAnhSanPham($anh_id);

                    // xóa file 
                    deleteFile($anhSP['link_hinh_anh']);
                }
            }
            header("Location: ?act=form-sua-san-pham&id_san_pham=" . $san_pham_id);
            exit();
        }
    }



    public function deleteSanPham()
    {
        $id = $_GET['id_san_pham'];
        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);

        if ($sanPham) {
            deleteFile($sanPham['hinh_anh']);
            $this->modelSanPham->destroySanPham($id);

        }
        if ($listAnhSanPham) {
            foreach ($listAnhSanPham as $key => $anhSP) {
                deleteFile($anhSP['link_hinh_anh']);
                $this->modelSanPham->destroyAnhSanPham($anhSP['id']);
            }
        }
        header("Location: ?act=san-pham");
        exit();
    }

    public function detailSanPham()
    {

        $id = $_GET['id_san_pham'];

        $sanPham = $this->modelSanPham->getDetailSanPham($id);

        $listAnhSanPham = $this->modelSanPham->getListAnhSanPham($id);
        $listBinhLuan = $this->modelSanPham->getBinhLuanFromSanPham($id);
        $listDanhGia = $this->modelSanPham->getFromDanhGia($id);

        if ($sanPham) {
            require_once './views/sanpham/detailSanPham.php';

        } else {
            header("Location: ?act=san-pham");
            exit();
        }

    }

    

    public function updateTrangThaiBinhLuan()
    {
        $id_binh_luan = $_POST['id_binh_luan'];
        $name_view = $_POST['name_view'];
        $id_khach_hang = $_POST['id_khach_hang'];
        $binhLuan = $this->modelSanPham->getDetailBinhLuan($id_binh_luan);

        if ($binhLuan) {
            $trang_thai_update = '';
            if ($binhLuan['trang_thai'] == 1) {
                $trang_thai_update = 2;
            } else {
                $trang_thai_update = 1;
            }
            $status = $this->modelSanPham->updateTrangThaiBinhLuan($id_binh_luan, $trang_thai_update);
            if ($status) {
                if ($name_view == 'detail_khach') {
                    header("Location: ?act=chi-tiet-khach-hang&id_khach_hang=" . $binhLuan['tai_khoan_id']);

                } else {
                    header("Location: ?act=chi-tiet-san-pham&id_san_pham=" . $binhLuan['san_pham_id']);
                }
            }

        }
    }
    public function updateTrangThaiDanhGia()
    {
        $id_danh_gia = $_POST['id_danh_gia'];
        $name_view = $_POST['name_view'];
        $id_khach_hang = $_POST['id_khach_hang'];
        $id_danh_gia = $this->modelSanPham->getDetailDanhGia($id_danh_gia);

        if ($id_danh_gia) {
            $trang_thai_update = '';
            if ($id_danh_gia['trang_thai'] == 1) {
                $trang_thai_update = 2;
            } else {
                $trang_thai_update = 1;
            }
            $status = $this->modelSanPham->updateTrangThaiDanhGia($id_danh_gia, $trang_thai_update);
            if ($status) {
                if ($name_view == 'detail_khach') {
                    header("Location:  " . BASE_URL_ADMIN . '?act=chi-tiet-khach-hang&id_khach_hang=' . $id_danh_gia['tai_khoan_id']);

                } else {
                    header("Location: " . BASE_URL_ADMIN . '?act=chi-tiet-san-pham&id_san_pham=' . $id_danh_gia['san_pham_id']);
                }
            }

        }
    }
}