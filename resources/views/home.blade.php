<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang chủ</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Varela Round', sans-serif;
        }
        .navbar {
            background-color: #343a40;
        }
        .navbar-brand, .nav-link {
            color: #fff !important;
        }
        .nav-link:hover {
            color: #d4d4d4 !important;
        }
        .hero-section {
            background: url('https://img.lovepik.com/photo/50094/9419.jpg_wh860.jpg') no-repeat center center/cover;
            color: #fff;
            padding: 100px 0;
            text-align: center;
            position: relative;
        }

        .hero-section:before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5); /* Overlay màu tối */
            z-index: 0;
        }
        .hero-section h1, .hero-section p {
            position: relative;
            z-index: 1; /* Đặt chữ nổi trên ảnh */
        }
        .container {
            padding: 30px 0;
        }
        .card {
            margin: 15px 0;
            border: none;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }
        .card:hover {
            transform: scale(1.05);
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }
        .footer {
            background-color: #343a40;
            color: #fff;
            text-align: center;
            padding: 1rem 0;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark">
        <div class="container">
            <a class="navbar-brand" href="{{ route('home') }}">Trang chủ</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item"><a class="nav-link" href="{{ route('phong.index') }}">Phòng</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('loaiphong.index')}}">Loại phòng</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('khachhang.index')}}">Khách hàng</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('bophan.index')}}">Bộ phận</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{route('nhanvien.index')}}">Nhân viên</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('khachhang.index')}}">Khách hàng</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('phieuthue.index')}}">Phiếu thuê</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('chitietphieu.index')}}">Chi tiết phiếu dịch vụ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('dichvu.index')}}">Dịch vụ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('phieudichvu.index')}}">Phiếu dịch vụ</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('hoadonthanhtoan.index')}}">Hoá đơn thanh toán</a></li>
                    <li class="nav-item">
                        <form method="POST" action="{{ route('logout') }}">
                            @csrf
                            <button class="nav-link btn btn-link" type="submit" style="color: white;">Đăng xuất</button>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <div class="hero-section">
        <div class="container">
            <h1 class="display-4">BTL HQTCSDL</h1>
            <p class="lead">Trang chủ quản lý khách sạn.</p>
            <hr class="my-4">
            <p>Chọn các chức năng bên dưới để bắt đầu.</p>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <!-- Cards -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quản lý phòng</h5>
                        <p class="card-text">Xem, thêm, sửa, xóa thông tin phòng.</p>
                        <a href="{{route('phong.index')}}" class="btn btn-primary">Quản lý phòng</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quản lý loại phòng</h5>
                        <p class="card-text">Xem, thêm, sửa, xóa thông tin loại phòng.</p>
                        <a href="{{route('loaiphong.index')}}" class="btn btn-secondary">Quản lý loại phòng</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quản lý bộ phận</h5>
                        <p class="card-text">Xem, thêm, sửa, xóa thông tin bộ phận.</p>
                        <a href="{{route('bophan.index')}}" class="btn btn-info">Quản lý bộ phận</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quản lý nhân viên</h5>
                        <p class="card-text">Xem, thêm, sửa, xóa nhân viên.</p>
                        <a href="{{route('nhanvien.index')}}" class="btn btn-warning">Quản lý nhân viên</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quản lý khách hàng</h5>
                        <p class="card-text">Xem, thêm, sửa, xóa khách hàng.</p>
                        <a href="{{route('khachhang.index')}}" class="btn btn-warning">Quản lý khách hàng</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quản lý phiếu thuê</h5>
                        <p class="card-text">Xem, thêm, sửa, xóa phiếu thuê.</p>
                        <a href="{{route('phieuthue.index')}}" class="btn btn-danger">Quản lý phiếu thuê</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quản lý phiếu dịch vụ</h5>
                        <p class="card-text">Xem, thêm, sửa, xóa phiếu dịch vụ.</p>
                        <a href="" class="btn btn-dark">Quản lý phiếu dịch vụ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quản lý chi tiết phiếu dịch vụ</h5>
                        <p class="card-text">Hiển thị chi tiết các phiếu dịch vụ.</p>
                        <a href="" class="btn btn-dark">Quản lý chi tiết phiếu dịch vụ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Dịch vụ</h5>
                        <p class="card-text">Xem các loại dịch vụ.</p>
                        <a href="" class="btn btn-info">Xem dịch vụ</a>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-body text-center">
                        <h5 class="card-title">Quản lý hoá đơn</h5>
                        <p class="card-text">Xem các hoá đơn thanh toán.</p>
                        <a href="{{route('hoadonthanhtoan.index')}}" class="btn btn-info">Xem hoá đơn</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
