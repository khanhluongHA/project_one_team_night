
<?php
session_start();
require('db.php'); // Kết nối cơ sở dữ liệu

// Kiểm tra nếu có yêu cầu gửi POST (khi người dùng gửi form)
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy thông tin từ form
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $role = $_POST['role']; // Lấy giá trị role từ form (user/admin)

    // Kiểm tra mật khẩu và xác nhận mật khẩu có khớp không
    if ($password !== $confirm_password) {
        echo "Mật khẩu và xác nhận mật khẩu không khớp!";
    } else {
        // Kiểm tra email đã tồn tại chưa
        $stmt = $pdo->prepare("SELECT * FROM users WHERE email = ?");
        $stmt->execute([$email]);
        if ($stmt->rowCount() > 0) {
            echo "Email đã tồn tại!";
        } else {
            // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
            $hashed_password = password_hash($password, PASSWORD_DEFAULT);

            // Thêm người dùng vào cơ sở dữ liệu (bao gồm cả role)
            $stmt = $pdo->prepare("INSERT INTO users (name, email, password, role) VALUES (?, ?, ?, ?)");
            if ($stmt->execute([$name, $email, $hashed_password, $role])) {
                echo "Đăng ký thành công!";
                // Sau khi đăng ký thành công, chuyển hướng đến trang đăng nhập
                header('Location: ?act=login');
                exit();
            } else {
                echo "Đã xảy ra lỗi khi đăng ký!";
            }
        }
    }
}
?>



<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from portotheme.com/html/porto_ecommerce/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2024 03:33:03 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->

<body>
	
									<h2 class="title">Đăng ký</h2>
									<?php if (isset($error)) echo "<p style='color:red;'>$error</p>"; ?>
								</div>
                                <form method="POST" action="?act=login">
                                    <label for="login-email">
										Tên người dùng
										<span class="required">*</span>
									</label> <br>
                                    <input class="form-input form-wide" type="text" name="name" placeholder="Tên người dùng" required><br>
                                    <label for="login-email">
										Email
										<span class="required">*</span>
									</label> <br>
									<input class="form-input form-wide" type="email" name="email" placeholder="Email" required><br>
									<label for="login-email">
										Mật khẩu
										<span class="required">*</span>
									</label> <br>
									<input class="form-input form-wide" type="password" name="password" placeholder="Mật khẩu" required><br>
                                    <label for="login-email">
										Xác nhận mật khẩu
										<span class="required">*</span>
									</label> <br>
									<input class="form-input form-wide" type="password" name="confirm_password" placeholder="Mật khẩu" required><br>
									<div class="form-footer">
										
											<label for="role">Vai trò </label> 
                                            <select name="role">
                                                <option value="user">User</option>
                                                <option value="admin">Admin</option>
                                            </select>
										

										
									</div>
									
									<button class="btn btn-dark btn-md w-100" type="submit">Đăng ký</button>
   
                                    </form>
                                    
								
							

	
</body>


<!-- Mirrored from portotheme.com/html/porto_ecommerce/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 19 Nov 2024 03:33:04 GMT -->
</html>