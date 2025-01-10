<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Hóa Đơn</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

</head>
<body>
    <div class="container mt-4">
        <h1 class="text-center">Danh Sách Hóa Đơn</h1>
        <table class="table table-bordered table-hover">
            <thead class="table-primary">
                <tr>
                    <th>Mã Hóa Đơn</th>
                    <th>Ngày Lập</th>
                    <th>Tên Khách Hàng</th>
                    <th>Tổng Tiền</th>
                    <th>Tên Nhân Viên</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($danhsachhoadon as $hoadon)
                    <tr>
                        <td>{{ $hoadon->MaHD }}</td>
                        <td>{{ $hoadon->NgayLap }}</td>
                        <td>{{ $hoadon->TenKH }}</td>
                        <td>{{ number_format($hoadon->TongTien, 0, ',', '.') }} VND</td>
                        <td>{{ $hoadon->TenNV }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">Không có hóa đơn nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <!-- Phân trang -->
        <div class="d-flex justify-content-center">
            {{ $danhsachhoadon->links('pagination::bootstrap-4') }}
        </div>
        <a href="{{ route('hoadonthanhtoan.index') }}" class="btn btn-secondary">
            <i class="bi bi-arrow-left"></i> Quay lại
        </a>

    </div>
</body>
</html>