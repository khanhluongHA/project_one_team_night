<?php
session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: ?act=login");
    exit;
}

if ($_SESSION['role'] !== 'admin') {
    echo "Bạn không có quyền truy cập trang này!";
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="logout.php">đăng suất</a>
</body>
</html>