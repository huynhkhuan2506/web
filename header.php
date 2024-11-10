<?php
session_start(); // Dòng này phải có ở đầu file
?>

<!-- Header -->
<header>
    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #343A40;">
        <a class="navbar-brand text-white" href="#">
            <img style="height: 40px; width: auto;" src="https://e7.pngegg.com/pngimages/779/61/png-clipart-logo-idea-cute-eagle-leaf-logo-thumbnail.png" alt="">
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="nav-link text-white" href="./">TRANG CHỦ <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">THÔNG TIN GIẢM GIÁ</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">GIỎ HÀNG</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-toggle="dropdown"
                        aria-expanded="false">
                        SẢN PHẨM
                    </a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="#">LAPTOP</a>
                        <a class="dropdown-item" href="#">PC</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">HELP CENTER</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-white" href="#">ABOUT US</a>
                </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
                <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                <button class="btn btn-outline-light my-2 mr-2 my-sm-0" type="submit">Search</button>
            </form>
            <?php
                if (isset($_SESSION['username'])) {
                    // Nếu đã đăng nhập, hiển thị tên người dùng và nút đăng xuất
                    echo '<a class="btn btn-outline-light disabled" href="#">Chào, ' . $_SESSION['username'] . '</a>';
                    echo '<a class="btn btn-outline-light" href="./logout.php">Đăng Xuất</a>';
                } else {
                    // Nếu chưa đăng nhập, hiển thị nút đăng nhập và đăng ký
                    echo '<a class="btn btn-outline-light" href="./login.php">Đăng Nhập</a>';
                    echo '<a class="btn btn-outline-light" href="./register.php">Đăng Ký</a>';
                }
            ?>
        </div>
    </nav>
</header>
