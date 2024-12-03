<?php
session_start();
if (!isset($_SESSION['user_id'])) {
    header("Location: ?act=login");
    exit;
}

echo "Chào mừng User " . $_SESSION['username']; 
?><br>
<a href="?act=logout">Đăng xuất</a> <br>
<a href="?act=edit_profile">Chỉnh sửa thông tin tài khoản</a>


