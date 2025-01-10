<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Báo cáo doanh thu</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="text-center mb-4">Báo cáo doanh thu theo ngày</h1>

    <!-- Form tìm kiếm -->
    <form method="GET" action="{{ route('baocao.index') }}" class="mb-4">
        <div class="row">
            <div class="col-md-5">
                <label for="ngay_bat_dau" class="form-label">Ngày bắt đầu:</label>
                <input type="date" id="ngay_bat_dau" name="ngay_bat_dau" class="form-control" value="{{ request('ngay_bat_dau') }}">
            </div>
            <div class="col-md-5">
                <label for="ngay_ket_thuc" class="form-label">Ngày kết thúc:</label>
                <input type="date" id="ngay_ket_thuc" name="ngay_ket_thuc" class="form-control" value="{{ request('ngay_ket_thuc') }}">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Tìm kiếm</button>
            </div>
        </div>
    </form>

    <!-- Bảng hiển thị báo cáo -->
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Ngày</th>
                <th>Doanh thu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($baoCaoDoanhThu as $item)
                <tr>
                    <td>{{ $item->Ngay }}</td>
                    <td>{{ number_format($item->TongDoanhThu ?? 0, 0, ',', '.') }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>


    <!-- Phân trang -->
    <div class="d-flex justify-content-center">
        {{ $baoCaoDoanhThu->withQueryString()->links('pagination::bootstrap-4') }}
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>
