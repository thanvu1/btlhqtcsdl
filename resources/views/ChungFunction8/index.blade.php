<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh Sách Dịch Vụ Đã Sử Dụng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Danh Sách Dịch Vụ Đã Sử Dụng</h1>

        <!-- Form tìm kiếm theo mã phiếu thuê -->
        <form action="{{ route('dichvu.search') }}" method="GET" class="mb-3">
            <div class="input-group">
                <input type="text" class="form-control" name="MaPT" placeholder="Nhập mã phiếu thuê" required>
                <button type="submit" class="btn btn-primary">Tìm Kiếm</button>
            </div>
        </form>

        <!-- Kiểm tra thông báo lỗi -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Bảng hiển thị danh sách dịch vụ -->
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Mã Dịch Vụ</th>
                    <th>Tên Dịch Vụ</th>
                    <th>Số Lượng</th>
                    <th>Đơn Giá</th>
                    <th>Thành Tiền</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($dichVuDaSuDung as $dichVu)
                    <tr>
                        <td>{{ $dichVu->MaDV }}</td>
                        <td>{{ $dichVu->TenDV }}</td>
                        <td>{{ $dichVu->SoLuong }}</td>
                        <td>{{ number_format($dichVu->DonGia, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($dichVu->SoLuong * $dichVu->DonGia, 0, ',', '.') }} VND</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="text-center">Không tìm thấy dịch vụ nào.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>

        <!-- Nút quay lại -->
        <a href="{{ route('home') }}" class="btn btn-secondary mt-3">Quay Lại</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
