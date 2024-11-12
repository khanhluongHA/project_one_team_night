<?php
class KhuyenMai{
    public $conn;

    public function __construct(){
        $this->conn = connectDB();
    }

    public function getAllkhuyenmai(){
        try{
            $sql = 'SELECT * FROM khuyen_mais ' ;

            $stmt = $this->conn->prepare($sql);

            $stmt->execute();

            return $stmt->fetchAll();

        }catch (PDOException $e){
            echo 'loi: '.$e->getMessage();
        }
    }
    public function deletekhuyenmai($id){
        try{
            $sql = 'DELETE FROM `khuyen_mais`  WHERE id = :id ' ;

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);

            $stmt->execute();


            return true;
        }catch (PDOException $e){
            echo 'loi: '.$e->getMessage();
        }
    }
public function getDeTailDatakhuyenmai($id){
        try{
            $sql = 'SELECT * FROM `khuyen_mais`  WHERE id = :id ' ;

            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id',$id);

            $stmt->execute();


            return $stmt->fetch();
        }catch (PDOException $e){
            echo 'loi: '.$e->getMessage();
        }
    }


   

    //khuyen mai 

    public function uppdateDatakhuyenmai($id, $ma_khuyen_mai, $ten_khuyen_mai, $muc_giam, $so_luong, $ngay_bat_dau,$ngay_ket_thuc)
    {
        try{
            // var_dump($id, $ma_khuyen_mai, $ten_khuyen_mai, $muc_giam, $so_luong, $ngay_bat_dau, $ngay_ket_thuc);
            // die();
            $sql = 'UPDATE khuyen_mais SET ma_khuyen_mai = :ma_khuyen_mai, ten_khuyen_mai = :ten_khuyen_mai,
             muc_giam = :muc_giam, so_luong = :so_luong, ngay_bat_dau = :ngay_bat_dau, ngay_ket_thuc = :ngay_ket_thuc WHERE id = :id';

            
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':id', $id);
            $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai);
            $stmt->bindParam(':ten_khuyen_mai',$ten_khuyen_mai );
            $stmt->bindParam(':muc_giam', $muc_giam);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
           
            // $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);

            $stmt->execute();
            

            return true;
        }catch (PDOException $e){
            echo "loi" . $e->getMessage();
        }
    }
    public function addkhuyenmai( $ma_khuyen_mai, $ten_khuyen_mai, $muc_giam, $so_luong, $ngay_bat_dau, $ngay_ket_thuc){
        try{
            // var_dump( $ma_khuyen_mai, $ten_khuyen_mai, $muc_giam, $so_luong, $ngay_bat_dau);
            // die();
            $sql = 'INSERT INTO khuyen_mais  (ma_khuyen_mai,ten_khuyen_mai,muc_giam, so_luong , ngay_bat_dau, ngay_ket_thuc)
             VALUES (:ma_khuyen_mai,:ten_khuyen_mai,:muc_giam, :so_luong , :ngay_bat_dau, :ngay_ket_thuc)';

            
            $stmt = $this->conn->prepare($sql);

            $stmt->bindParam(':ma_khuyen_mai', $ma_khuyen_mai);
            $stmt->bindParam(':ten_khuyen_mai',$ten_khuyen_mai );
            $stmt->bindParam(':muc_giam', $muc_giam);
            $stmt->bindParam(':so_luong', $so_luong);
            $stmt->bindParam(':ngay_bat_dau', $ngay_bat_dau);
            $stmt->bindParam(':ngay_ket_thuc', $ngay_ket_thuc);
           
            // $stmt->bindParam(':chuc_vu_id', $chuc_vu_id);

            $stmt->execute();
            

            return true;
        }catch (PDOException $e){
            echo 'loi: '.$e->getMessage();
        }
    }
    

    public function __destruct(){
        $this->conn = null;
    }
}
?>