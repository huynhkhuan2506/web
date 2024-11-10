<?php
// Kết nối đến cơ sở dữ liệu
$conn = new mysqli("localhost", "root", "", "user_db");

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Kiểm tra nếu form được submit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Mã hóa mật khẩu
    $email = $_POST['email'];

    // Kiểm tra xem username đã tồn tại chưa
    $check_username = "SELECT * FROM users WHERE username = '$username'";
    $result_username = $conn->query($check_username);

    // Kiểm tra xem email đã tồn tại chưa
    $check_email = "SELECT * FROM users WHERE email = '$email'";
    $result_email = $conn->query($check_email);

    // Nếu username hoặc email đã tồn tại
    if ($result_username->num_rows > 0) {
        echo "Tên tài khoản đã tồn tại. Vui lòng chọn tên khác.";
    } elseif ($result_email->num_rows > 0) {
        echo "Email đã tồn tại. Vui lòng sử dụng email khác.";
    } else {
        // Nếu username và email đều chưa tồn tại, thực hiện đăng ký
        $sql = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";

        if ($conn->query($sql) === TRUE) {
            // Lưu thông tin người dùng vào session sau khi đăng ký thành công
            session_start();
            $_SESSION['username'] = $username;

            // Chuyển hướng đến trang chính sau khi đăng ký thành công
            header("Location: index.php"); // Hoặc trang mà bạn muốn
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    $conn->close();
}
?>

<!-- Form Đăng Ký -->
<form method="POST" action="register.php">
    <label for="username">Username</label>
    <input type="text" id="username" name="username" required>
    
    <label for="password">Password</label>
    <input type="password" id="password" name="password" required>
    
    <label for="email">Email</label>
    <input type="email" id="email" name="email" required>

    <button type="submit">Register</button>
</form>
