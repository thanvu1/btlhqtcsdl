<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Phòng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center text-primary mb-3">Tạo Phòng</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin phòng</p>
                <form action="{{ route('phong.store') }}" method="POST">
                    @csrf
                    <!-- Mã Phòng -->
                    <div class="mb-3">
                        <label for="MaPhong" class="form-label">Mã Phòng</label>
                        <input type="text" class="form-control" id="MaPhong" name="MaPhong" placeholder="VD: 101" required>
                    </div>
                    <!-- Tên Phòng -->
                    <div class="mb-3">
                        <label for="TenPhong" class="form-label">Tên Phòng</label>
                        <input type="text" class="form-control" id="TenPhong" name="TenPhong" placeholder="VD: Phòng 101" required>
                    </div>
                    <!-- Tình Trạng -->
                    <div class="mb-3">
                        <label for="TinhTrang" class="form-label">Tình Trạng</label>
                        <select class="form-select" id="TinhTrang" name="TinhTrang" required>
                            <option value="" disabled selected>Chọn tình trạng</option>
                            <option value="Còn trống">Còn trống</option>
                            <option value="Đã thuê">Đã thuê</option>
                            <option value="Sửa chữa">Sửa chữa</option>
                        </select>
                    </div>
                    <!-- Loại Phòng -->
                    <div class="mb-3">
                        <label for="MaLP" class="form-label">Loại Phòng</label>
                        <select class="form-select" id="MaLP" name="MaLP" required>
                            <option value="" disabled selected>Chọn loại phòng</option>
                            @foreach ($loaiphongs as $loaiphong)
                                <option value="{{ $loaiphong->MaLP }}">
                                    {{ $loaiphong->TenLP }} - {{ $loaiphong->LoaiGiuong }} - {{ number_format($loaiphong->DonGia, 0, ',', '.') }} VND
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Ghi Chú -->
                    <div class="mb-3">
                        <label for="GhiChu" class="form-label">Ghi Chú</label>
                        <textarea class="form-control" id="GhiChu" name="GhiChu" rows="3" placeholder="Nhập ghi chú nếu cần"></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Lưu
                        </button>
                        <a href="{{ route('phong.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Về
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
