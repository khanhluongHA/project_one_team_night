<?php
session_start();
require('db.php'); // Kết nối CSDL

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    
    // Kiểm tra email tồn tại
    $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
    $stmt->execute([$email]);
    $user = $stmt->fetch();
    
    if ($user) {
        // Tạo mã xác nhận và gửi qua email
        $reset_token = bin2hex(random_bytes(50));
        $stmt = $pdo->prepare("UPDATE users SET reset_token = ? WHERE email = ?");
        $stmt->execute([$reset_token, $email]);
        
        $reset_link = "http://yourdomain.com/reset_password.php?token=$reset_token";
        // Gửi email (đoạn mã gửi email này cần có thư viện mail như PHPMailer hoặc mail() của PHP)
        mail($email, "Lấy lại mật khẩu", "Nhấn vào liên kết để lấy lại mật khẩu: $reset_link");
        
        echo "Đã gửi liên kết lấy lại mật khẩu vào email của bạn!";
    } else {
        echo "Email không tồn tại!";
    }
}
?>

<form method="POST" action="?act=forgot_password">
    <input type="email" name="email" placeholder="Nhập email của bạn" required><br>
    <button type="submit">Gửi yêu cầu</button>
</form>
