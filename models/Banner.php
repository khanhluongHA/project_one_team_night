<?php
class Banner{
    public $conn;
    // ket noi CSDL
    public function __construct()
    {
       $this->conn = connectDB() ;
    }
    public function all(){
        try {
            $sql = 'SELECT * FROM `banners` WHERE 1';
            $stmt = $this->conn->prepare($sql);
            // var_dump($stmt);die;
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "loi" . $e->getMessage();
        }
    }
}