<?php
require 'auth.php';
echo "Chào mừng Admin " . $_SESSION['username'];
?><br>
<a href="auth.php">tài khoản người dùng</a><br>
<a href="logout.php">Đăng xuất</a><br>
<a href="edit_profile.php">Chỉnh sửa thông tin tài khoản</a>