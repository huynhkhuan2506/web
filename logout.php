<?php
session_start();

// Hủy session khi đăng xuất
session_unset();
session_destroy();

// Chuyển hướng về trang chủ hoặc trang đăng nhập
header("Location: index.html"); // Hoặc trang bạn muốn
exit();
?>