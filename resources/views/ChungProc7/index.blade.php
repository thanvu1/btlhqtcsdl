<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kiểm Tra Phòng Đã Thuê</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1 class="mb-4">Kiểm Tra Phòng Đã Thuê</h1>

    <!-- Form nhập mã phòng -->
    <form action="{{ route('ChungProc7.index') }}" method="GET" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <label for="MaPhong" class="form-label">Mã Phòng:</label>
                <input 
                    type="text" 
                    id="MaPhong" 
                    name="MaPhong" 
                    class="form-control" 
                    value="{{ $maPhong ?? '' }}" 
                    placeholder="Nhập mã phòng"
                    required>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button type="submit" class="btn btn-primary">Kiểm Tra</button>
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <a href="{{ route('phong.index') }}" class="btn btn-secondary">Quay Lại</a>
            </div>
        </div>
    </form>

    <!-- Hiển thị kết quả -->
    @if ($ketQua)
        <div class="alert alert-info">
            <strong>Kết quả:</strong> {{ $ketQua }}
        </div>
    @elseif (isset($maPhong))
        <div class="alert alert-warning">
            Không tìm thấy thông tin cho phòng có mã <strong>{{ $maPhong }}</strong>.
        </div>
    @else
        <div class="alert alert-danger">
            Vui lòng nhập mã phòng để kiểm tra.
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
