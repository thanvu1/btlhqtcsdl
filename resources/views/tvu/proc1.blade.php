<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Doanh Thu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="mb-3">
        <a href="{{ route('hoadonthanhtoan.index') }}" class="btn btn-secondary">Quay Về Trang Hóa Đơn Thanh Toán</a>
    </div>

    <h1 class="text-center mb-4">Thống Kê Doanh Thu</h1>

    <!-- Form lọc -->
    <form method="GET" action="{{ route('tvu.thongkedoanhthutheothangnam') }}" class="mb-4">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="thang" class="form-label">Tháng</label>
                <input type="number" id="thang" name="thang" class="form-control" min="1" max="12" value="{{ $thang }}">
            </div>
            <div class="col-md-4">
                <label for="nam" class="form-label">Năm</label>
                <input type="number" id="nam" name="nam" class="form-control" min="2000" max="2100" value="{{ $nam }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Thống Kê</button>
            </div>
        </div>
    </form>

    <!-- Hiển thị kết quả -->
    @if ($doanhThu)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Tháng</th>
                <th>Năm</th>
                <th>Tổng Doanh Thu</th>
            </tr>
            </thead>
            <tbody>
            <tr>
                <td>{{ $doanhThu['Thang'] }}</td>
                <td>{{ $doanhThu['Nam'] }}</td>
                <td>{{ number_format($doanhThu['TongDoanhThu'], 0, ',', '.') }} VND</td>
            </tr>
            </tbody>
        </table>
    @else
        <p class="text-center text-danger">Không tìm thấy dữ liệu cho tháng {{ $thang }} năm {{ $nam }}.</p>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
