<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Phiếu Thuê</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-black mb-5">
    <div class="container">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('home') }}">Trang Chủ</a>
            </li>
        </ul>
    </div>
</nav>
<div class="container mt-5">
    <h1 class="text-center mb-4">Danh Sách Phiếu Thuê</h1>

    <div class="mb-3">
        <a href="{{ route('phieuthue.index') }}" class="btn btn-secondary">Quay Về Trang Quản Lý Phiếu Thuê</a>
    </div>

    <table class="table table-striped table-bordered">
        <thead>
        <tr>
            <th>Mã Phiếu Thuê</th>
            <th>Tên Khách Hàng</th>
            <th>Tên Phòng</th>
            <th>Loại Phòng</th>
            <th>Loại Giường</th>
            <th>Ngày Thuê</th>
            <th>Ngày Trả</th>
            <th>Số Ngày Thuê</th>
            <th>Giá Một Ngày</th>
            <th>Tổng Tiền</th>
        </tr>
        </thead>
        <tbody>
        @foreach ($data as $row)
            <tr>
                <td>{{ $row->MaPhieuThue }}</td>
                <td>{{ $row->TenKhachHang }}</td>
                <td>{{ $row->TenPhong }}</td>
                <td>{{ $row->LoaiPhong }}</td>
                <td>{{ $row->LoaiGiuong }}</td>
                <td>{{ $row->NgayThue }}</td>
                <td>{{ $row->NgayTra }}</td>
                <td>{{ $row->SoNgayThue }}</td>
                <td>{{ number_format($row->GiaMotNgay, 0, ',', '.') }} VND</td>
                <td>{{ number_format($row->TongTien, 0, ',', '.') }} VND</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <!-- Hiển thị phân trang -->
    <div class="d-flex justify-content-center">
        {{ $data->links('pagination::bootstrap-4') }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
