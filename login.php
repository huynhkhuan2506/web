<?php
session_start();

// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "user_db");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Tìm người dùng trong cơ sở dữ liệu
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $user = $result->fetch_assoc();

        // Kiểm tra mật khẩu
        if (password_verify($password, $user['password'])) {
            // Lưu thông tin đăng nhập vào session
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];

            // Chuyển hướng đến trang chính sau khi đăng nhập thành công
            header("Location: index.php"); // Hoặc chuyển đến trang mà bạn muốn
            exit(); // Đảm bảo không còn mã code nào tiếp tục chạy
        } else {
            echo "Invalid password!";
        }
    } else {
        echo "User not found!";
    }
    $conn->close();
}
?>

<!-- Form Đăng Nhập -->
<form method="POST" action="login.php">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
    
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>

    <button type="submit">Login</button>
</form>
