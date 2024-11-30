<?php
class ContactModel
{
     public $conn;

     public function __construct($dbConnection)
     {
          $this->conn = $dbConnection;
     }

     public function saveContact($email, $so_dien_thoai, $dia_chi, $noi_dung,$trang_thai_lh)
     {
          $stmt = $this->conn->prepare("INSERT INTO lien_hes (email, so_dien_thoai, dia_chi, noi_dung,trang_thai_lh) VALUES (?, ?, ?, ?)");
          $stmt->bind_param('ssss', $email, $so_dien_thoai, $dia_chi, $noi_dung,$trang_thai_lh);
          return $stmt->execute();
     }
}
