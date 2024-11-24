<?php
function connectDB() {
    try {
        $dsn = 'mysql:host=' . DB_HOST . ';port=' . DB_PORT . ';dbname=' . DB_NAME . ';charset=utf8';
        $options = [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];
        return new PDO($dsn, DB_USERNAME, DB_PASSWORD, $options);
    } catch (PDOException $e) {
        die("Database connection failed: " . $e->getMessage());
    }
}

// thêm file 
function uploadFile($file, $folderUpload) {
    $patheStorage = $folderUpload . time() . $file['name'];

    $from = $file['tmp_name'];
    $to = PATH_ROOT . $patheStorage;

    if (move_uploaded_file($from, $to)) {
        return $patheStorage;
    
} 
return null;

}

// xóa file 
function deleteFile($file) {
    $pathDelete = PATH_ROOT . $file;
    if (file_exists($pathDelete)) {
        unlink($pathDelete);
    }
}

// Xóa session sau khi load trang 

function deleteSessionError(){
    if (isset($_SESSION['flash'])) {
        // Hủy session sau khi đã tải trang 
        unset($_SESSION['flash']);
        unset($_SESSION['error']);
        // session_unset();
    }
}

// upload - update album ảnh 

function uploadFileAlbum($file, $folderUpload, $key) {
    $patheStorage = $folderUpload . time() . $file['name'][$key];

    $from = $file['tmp_name'][$key];
    $to = PATH_ROOT . $patheStorage;

    if (move_uploaded_file($from, $to)) {
        return $patheStorage;
    
} 
return null;

}


// form date 
function formDate($date) {
    return date("d-m-Y", strtotime($date));
}

function checkLoginAdmin(){
    if (!isset($_SESSION['user_admin'])) {
        header("?act=login-admin");
        exit();
    }
}

function formatPrice($price) 
{
    return number_format($price, 0, ',', '.');
}