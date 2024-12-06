<?php
require_once APP_ROOT."/app/services/UserService.php";
require_once 'config/database.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user = new UserService();
    $user->getUser($username,$password);

    if ($user && password_verify($password, $user['password'])) {
        // Nếu đăng nhập thành công, kiểm tra quyền hạn
        session_start();  // Bắt đầu session

        // Lưu thông tin người dùng vào session
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['username'] = $user['username'];
        $_SESSION['role'] = $user['role']; // Lưu vai trò (admin hoặc user)

        // Chuyển hướng tới trang phù hợp dựa trên vai trò
        if ($user['role'] === 1) {
            header('Location: ../views/admin/dashboard.php'); // Trang quản trị cho admin
        } else {
            header('Location: user_dashboard.php'); // Trang cho người dùng
        }
        exit();
    } else {
        echo "Tên đăng nhập hoặc mật khẩu không đúng.";
    }
}

class AdminController {
}
?>