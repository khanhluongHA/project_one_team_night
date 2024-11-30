<?php
session_start();
require('db.php'); // Kết nối cơ sở dữ liệu

// Kiểm tra nếu người dùng chưa đăng nhập, chuyển hướng tới trang đăng nhập
if (!isset($_SESSION['user_id'])) {
    header('Location: ?act=login');
    exit();
}

$user_id = $_SESSION['user_id'];

// Lấy thông tin người dùng từ cơ sở dữ liệu
$stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
$stmt->execute([$user_id]);
$user = $stmt->fetch();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin từ form
    $current_password = $_POST['current_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // Kiểm tra mật khẩu cũ có đúng không
    if (!password_verify($current_password, $user['password'])) {
        echo "Mật khẩu cũ không đúng!";
    } elseif ($new_password !== $confirm_password) {
        echo "Mật khẩu mới và xác nhận mật khẩu không khớp!";
    } else {
        // Mã hóa mật khẩu mới
        $hashed_new_password = password_hash($new_password, PASSWORD_DEFAULT);

        // Cập nhật mật khẩu mới trong cơ sở dữ liệu
        $stmt = $pdo->prepare("UPDATE users SET password = ? WHERE id = ?");
        if ($stmt->execute([$hashed_new_password, $user_id])) {
            // Sau khi cập nhật thành công, chuyển hướng về trang index
            header('Location: ?act=contact');
            exit();
        } else {
            echo "Cập nhật mật khẩu thất bại!";
        }
    }
}
?>


<form method="POST" action="?act=edit_profile">
    <input type="text" name="name" value="<?php echo $user['name']; ?>" required><br>
    <input type="email" name="email" value="<?php echo $user['email']; ?>" required><br>
    <label for="current_password">Mật khẩu cũ</label> <br>
    <input type="password" name="current_password" required><br>
    
    <label for="new_password">Mật khẩu mới</label> <br>
    <input type="password" name="new_password" required><br>
    
    <label for="confirm_password">Xác nhận mật khẩu mới</label> <br>
    <input type="password" name="confirm_password" required><br>
    <button type="submit">Cập nhật</button> 
</form>
