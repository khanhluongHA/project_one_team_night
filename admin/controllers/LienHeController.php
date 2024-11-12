<?php
class LienHeController 
{
    
    //ham ket noi den File Model 
    public $modelLienHe;

    public function __construct()
    {
        $this->modelLienHe = new LienHe();
    }
   // ham hie thi danh sach
    public function index(){
       //lay ra du lieu danh muc 
       $lienHes = $this->modelLienHe->getAll();
    //    var_dump($danhMucs);

       // dua du lieu ra view 
       require_once './views/lienhe/create_lien_he.php';
        
    }


     // ham xu ly cap nhat vao CSDL

       // ham xoa du lieu trong CSDL
    public function destroy(){
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
            $id = $_POST['danh_muc_id'];

            // xóa danh mục 

            $this->modelLienHe->deleteData($id);

            header('Location: ?act=lienhe-category');
            exit();

        }
        
    }




}





