<?php
class Product{
    public $conn;
    // ket noi CSDL
    public function __construct()
    {
       $this->conn = connectDB() ;
    }

    public function getall(){
        try {
            $sql = 'SELECT * FROM `san_phams` WHERE 1';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function all(){
        try {
            
            $sql= 'SELECT * FROM `banners` WHERE 1';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e){
            echo 'lỗi: ' . $e->getMessage();
        }
    }

    public function getDetailData($id) {
        try {
            $sql = 'SELECT * FROM san_phams WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            // var_dump($stmt);die;

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }
    
    public function search($search){
        try {  
            $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE :search OR gia_san_pham LIKE :search OR gia_khuyen_mai LIKE :search OR danh_muc_id LIKE :search";  
            $stmt = $this->conn->prepare($sql);  
            $searchParam = '%' . $search . '%';  
            $stmt->bindParam(':search', $searchParam, PDO::PARAM_STR);  
            $stmt->execute();  
            return $stmt->fetchAll();  
        } catch (PDOException $e) {  
            echo "$e";  
        }  
    }
    public function Rangskik(){
        try {
            $sql = "SELECT * FROM san_phams ORDER BY gia_khuyen_mai DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e"; 
        }
    }
    public function Rangskikhai(){
        try {
            $sql = "SELECT * FROM san_phams ORDER BY gia_khuyen_mai ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e"; 
        }
    }
    public function search2($search2){
        try {  
            $sql = "SELECT * FROM san_phams WHERE ten_san_pham LIKE :search2 OR gia_khuyen_mai LIKE :search2 OR danh_muc_id LIKE :search2";  
            $stmt = $this->conn->prepare($sql);  
            $search2Param = '%' . $search2 . '%';  
            $stmt->bindParam(':search2', $search2Param, PDO::PARAM_STR);  
            $stmt->execute();  
            return $stmt->fetchAll();  
        } catch (PDOException $e) {  
            echo "$e";  
        } 
    }
public function Rangskik2(){
        try {
            $sql = "SELECT * FROM san_phams ORDER BY gia_khuyen_mai DESC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e"; 
        }
    }
    public function Rangskikhai2(){
        try {
            $sql = "SELECT * FROM san_phams ORDER BY gia_khuyen_mai ASC";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "$e"; 
        }
    }
}
 ?>