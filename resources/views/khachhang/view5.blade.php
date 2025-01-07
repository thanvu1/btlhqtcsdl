<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Dịch Vụ Đã Sử Dụng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Danh Sách Khách Hàng và Số Lượng Dịch Vụ Đã Sử Dụng</h1>
        
        <!-- Table to display customer and service data -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã khách hàng</th>
                    <th>Họ Và Tên</th>
                    <th>Mã Dịch Vụ</th>
                    <th>Tên Dịch Vụ</th>
                    <th>Số Lượng Dịch Vụ Sử Dụng</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($danhsachdichvu as $dv)
                    <tr>
                        <td>{{ $dv->MaKhachHang }}</td>
                        <td>{{ $dv->TenKhachHang }}</td>
                        <td>{{ $dv->MaDichVu }}</td>
                        <td>{{ $dv->TenDichVu }}</td>
                        <td>{{ $dv->SoLuongDaSuDung }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('khachhang.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Quay lại
        </a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>