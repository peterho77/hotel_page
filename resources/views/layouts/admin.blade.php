<!DOCTYPE html>
<html lang="vi">

    <head>
        <meta charset="UTF-8">
        <title>Admin Dashboard</title>
        <!-- Nếu bạn dùng FontAwesome hoặc Bootstrap Icons thì thêm link ở đây -->
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
        @vite(['resources/js/app.js','resources/css/admin.css'])
    </head>

    <body>
        <nav class="navbar">
            <div class="nav-menu">
                <a href="#" class="nav-item active">Tổng quan</a>
                <div class="nav-item dropdown">
                    Hàng hóa
                    <div class="nav-dropdown">
                        <div class="dropdown-col">
                            <div class="dropdown-title">Hàng hóa</div>
                            <a href="#" class="dropdown-link">Danh sách hàng hóa</a>
                            <a href="#" class="dropdown-link">Danh sách thuốc</a>
                            <a href="#" class="dropdown-link">Thiết lập giá</a>
                        </div>
                        <div class="dropdown-col">
                            <div class="dropdown-title">Kho hàng</div>
                            <a href="#" class="dropdown-link">Kiểm kho</a>
                            <a href="#" class="dropdown-link">Xuất hủy</a>
                        </div>
                        <div class="dropdown-col">
                            <div class="dropdown-title">Nhập hàng</div>
                            <a href="#" class="dropdown-link">Nhà cung cấp</a>
                            <a href="#" class="dropdown-link">Nhập hàng</a>
                        </div>
                    </div>
                </div>
                <a href="#" class="nav-item">Đơn hàng</a>
                <a href="#" class="nav-item">Sản phẩm</a>
                <a href="#" class="nav-item">Khách hàng</a>
                <a href="#" class="nav-item">Nhân viên</a>
                <a href="#" class="nav-item">Báo cáo</a>
            </div>
            <button class="sell-btn">
                <i class="fas fa-cart-shopping cart-icon"></i> Bán hàng
            </button>
        </nav>

        <div class="container">
            <h1>Chào mừng đến với trang quản trị</h1>
            <!-- Nội dung khác của trang sẽ được thêm vào đây -->
        </div>
    </body>
</html>