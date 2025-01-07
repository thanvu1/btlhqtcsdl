<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Số Lần Sử Dụng Phòng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="mb-3">
        <a href="{{ route('phong.index') }}" class="btn btn-secondary">Quay Về Trang Quản Lý Phòng</a>
    </div>
    <h1 class="text-center mb-4">Thống Kê Số Lần Sử Dụng Phòng</h1>

    <!-- Form tìm kiếm -->
    <form method="GET" action="{{ route('tvu.solanphongduocsudungtrongthang') }}" class="mb-4">
        <div class="row g-3">
            <div class="col-md-4">
                <label for="thang" class="form-label">Tháng</label>
                <input type="number" id="thang" name="thang" class="form-control" min="1" max="12" value="{{ old('thang', $thang) }}">
            </div>
            <div class="col-md-4">
                <label for="nam" class="form-label">Năm</label>
                <input type="number" id="nam" name="nam" class="form-control" min="2000" max="2100" value="{{ old('nam', $nam) }}">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Lọc</button>
            </div>
        </div>
    </form>

    <!-- Bảng hiển thị kết quả -->
    @if ($data->isNotEmpty())
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Mã Phòng</th>
                <th>Số Lần Sử Dụng</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->MaPhong }}</td>
                    <td>{{ $row->SoLanSuDung }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <!-- Phân trang -->
        <div class="d-flex justify-content-center">
            {{ $data->withQueryString()->links('pagination::bootstrap-4') }}
        </div>
    @else
        <p class="text-center text-danger">Không tìm thấy dữ liệu cho tháng {{ $thang }} năm {{ $nam }}.</p>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
