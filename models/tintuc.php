<?php
class Tintuc{
    public $conn;
    // ket noi CSDL
    public function __construct()
    {
       $this->conn = connectDB() ;
    }

    public function getall(){
        try {
            $sql = 'SELECT * FROM `tin_tucs`';
            $stmt = $this->conn->prepare($sql);
            $stmt->execute();
            return $stmt->fetchAll();
        } catch (PDOException $e) {
            echo "loi" . $e->getMessage();
        }
    }
    public function getDetailData($id) {
        try {
            $sql = 'SELECT * FROM tin_tucs WHERE id = :id';

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id', $id);
            // var_dump($stm);die;

            $stmt->execute();

            return $stmt->fetch();
        } catch (PDOException $e) {
           echo 'Loi' . $e->getMessage();
        }
        
    }
}