<?php
class KhuyenMaiController{

    public $modelKhuyenMai;

    public function __construct(){
        $this->modelKhuyenMai = new KhuyenMai();
    }
     public function danhsachma(){
        $khuyenMais = $this->modelKhuyenMai->getAllkhuyenmai();
        require_once './views/khuyenmai/create_khuyenmai.php';
     }

    

     public function deletekhuyenmai(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id = $_POST['khuyen_mai_id'];
                // var_dump($id);
    
                $this->modelKhuyenMai->deletekhuyenmai($id);
                header('Location: ?act=khuyen-mais');
                exit();
    
              
            }
            
        }

        public function formEditKhuyenmai(){
            $id= $_GET['khuyen_mai_id'];
     
            $khuyenmai=$this->modelKhuyenMai->getDeTailDatakhuyenmai($id);
            
            //do du lieu ra form 
            require_once './views/khuyenmai/formsuakhuyenmai.php';
     
         }


       
         public function postEditKhuyenmai(){
         
            if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                $id = $_POST['id'];
                $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
                $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
                $muc_giam = $_POST['muc_giam'];
                $so_luong = $_POST['so_luong'];
                $ngay_bat_dau = $_POST['ngay_bat_dau'];
                $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
                
                
                
    
                $errors = [];
                if (empty($ma_khuyen_mai)){
                    $errors['ma_khuyen_mai'] = 'ma_khuyen_mai la bat buoc';
                }
                if (empty($ten_khuyen_mai)){
                    $errors['ten_khuyen_mai'] = 'ten_khuyen_mai la bat buoc';
                }
                if (empty($muc_giam)){
                    $errors['muc_giam'] = 'muc_giam la bat buoc';
                }
                if (empty($so_luong)){
                    $errors['so_luong'] = 'so_luong la bat buoc';
                }
                if (empty($ngay_bat_dau)){
                    $errors['ngay_bat_dau'] = 'ngay_bat_dau la bat buoc';
                }
                if (empty($ngay_ket_thuc)){
                    $errors['ngay_ket_thuc'] = 'ngay_ket_thuc la bat buoc';
                }
    
                if (empty($errors)) {
                    
    
                    $this->modelKhuyenMai-> uppdateDatakhuyenmai($id, $ma_khuyen_mai, $ten_khuyen_mai, $muc_giam, $so_luong, $ngay_bat_dau, $ngay_ket_thuc);
                    
                    unset($_SESSION['errors']);
                    header('Location: ?act=khuyen-mais');
                    exit();
                    
                }else {
                    $_SESSION['errors'] = $errors;
                    header('Location: ?act=form-sua-khuyen-mai');
                    exit();
                 }
            }
                 
        
    }

    public function formAddkhuyenmai(){
        require_once './views/khuyenmai/formthemkhuyenmai.php';

     }



    public function Addkhuyenmai(){
        if ($_SERVER['REQUEST_METHOD'] == 'POST')
            $ma_khuyen_mai = $_POST['ma_khuyen_mai'];
            $ten_khuyen_mai = $_POST['ten_khuyen_mai'];
            $muc_giam = $_POST['muc_giam'];
            $so_luong = $_POST['so_luong'];
            $ngay_bat_dau = $_POST['ngay_bat_dau'];
            $ngay_ket_thuc = $_POST['ngay_ket_thuc'];
            
            
            

            $errors = [];
            if (empty($ma_khuyen_mai)){
                $errors['ma_khuyen_mai'] = 'ma_khuyen_mai la bat buoc';
            }
            if (empty($ten_khuyen_mai)){
                $errors['ten_khuyen_mai'] = 'ten_khuyen_mai la bat buoc';
            }
            if (empty($muc_giam)){
                $errors['muc_giam'] = 'muc_giam la bat buoc';
            }
            if (empty($so_luong)){
                $errors['so_luong'] = 'so_luong la bat buoc';
            }
            if (empty($ngay_bat_dau)){
                $errors['ngay_bat_dau'] = 'ngay_bat_dau la bat buoc';
            }
            if (empty($ngay_ket_thuc)){
                $errors['ngay_ket_thuc'] = 'ngay_ket_thuc la bat buoc';
            }

            if (empty($errors)) {
                

                $this->modelKhuyenMai->addkhuyenmai( $ma_khuyen_mai, $ten_khuyen_mai, $muc_giam, $so_luong, $ngay_bat_dau,$ngay_ket_thuc);
                
                unset($_SESSION['errors']);
                header('Location: ?act=khuyen-mais');
                exit();
                
            }else {
                $_SESSION['errors'] = $errors;
                header('Location: ?act=form-them-khuyen-mai');
                exit();
             }
        }
             
        
        
    }
     



?>