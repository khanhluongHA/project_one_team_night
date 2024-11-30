<?php
session_start();
require('db.php'); // Kết nối CSDL

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    
    // Kiểm tra mã reset_token
    $stmt = $pdo->prepare("SELECT * FROM users WHERE reset_token = ?");
    $stmt->execute([$token]);
    $user = $stmt->fetch();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $new_password = password_hash($_POST['password'], PASSWORD_DEFAULT);
        
        // Cập nhật mật khẩu mới và xóa mã reset_token
        $stmt = $pdo->prepare("UPDATE users SET password = ?, reset_token = NULL WHERE reset_token = ?");
        if ($stmt->execute([$new_password, $token])) {
            echo "Mật khẩu đã được thay đổi!";
        } else {
            echo "Có lỗi xảy ra!";
        }
    }
}
?>

<form method="POST" action="reset_password.php?token=<?php echo $_GET['token']; ?>">
    <input type="password" name="password" placeholder="Mật khẩu mới" required><br>
    <button type="submit">Đặt lại mật khẩu</button>
</form>
