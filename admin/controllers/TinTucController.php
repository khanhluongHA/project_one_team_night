<?php
    class TinTucController {

        //hàm kết nối đến model

        public $modelTinTuc;
        public function __construct()
        {
            
        }

        public function index (){
            include_once "./views/pages/category/tin_tuc.php";
            $tinTucs = $this->modelTinTuc->getAll();
            var_dump($tinTucs);
        }
        // form thêm 
        public function create (){

        }
        // form thêm 
        public function store (){

        }
        // form sủa 
        public function edit($id_tin_tuc) {
            $tinTuc = $this->modelTinTuc->getById($id_tin_tuc);  // Retrieve news based on id parameter.
            if ($tinTuc) {
               require("views/tin_tuc/edit.php");
            } else {
                 echo "Tin tức không tồn tại.";
                 // Or redirect...
            }
    
        }
        // form thêm 
        public function update($id_tin_tuc) { 
            //  Error handling. Check input first for validity before processing database update request.
    
    
           $tieu_de = $_POST['tieu_de'];
            $noi_dung = $_POST['noi_dung'];
            $trang_thai = $_POST['trang_thai'];
    
    
             if ($this->modelTinTuc->update($id_tin_tuc, $tieu_de, $noi_dung, $trang_thai)) {
               // Redirect to appropriate url if successful edit
                header("Location: index.php"); // Or whereever else. Consider session handling
    
             } else {
               echo "Cập nhật không thành công.";
            }
    
        }
        // form thêm 
        public function destroy($id_tin_tuc) {


            if ($this->modelTinTuc->delete($id_tin_tuc)) {
    
                 header("Location: index.php"); 
             } else {
    
               echo "Xóa không thành công.";
            }
    
        }
    }
    
?>