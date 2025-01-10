<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm Tra Tình Trạng Phòng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <div class="mb-3">
        <a href="{{ route('phong.index') }}" class="btn btn-secondary">Quay Về Trang Quản Lý Phòng</a>
    <h1 class="text-center mb-4">Kiểm Tra Tình Trạng Phòng</h1>

    <!-- Form kiểm tra tình trạng phòng -->
    <form method="GET" action="{{ route('tvu.kiem-tra-tinh-trang') }}" class="mb-4">
        <div class="row g-3">
            <div class="col-md-8">
                <label for="maPhong" class="form-label">Mã Phòng</label>
                <input type="text" id="maPhong" name="maPhong" class="form-control" value="{{ old('maPhong', $maPhong) }}" placeholder="Nhập mã phòng">
            </div>
            <div class="col-md-4 d-flex align-items-end">
                <button type="submit" class="btn btn-primary w-100">Kiểm Tra</button>
            </div>
        </div>
    </form>

    <!-- Hiển thị kết quả -->
    @if (isset($tinhTrang))
        <div class="alert alert-info text-center">
            <strong>Kết Quả:</strong> {{ $tinhTrang }}
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
