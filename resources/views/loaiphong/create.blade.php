<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Loại Phòng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center text-success mb-3">Tạo Loại Phòng</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin loại phòng</p>
                <form action="{{ route('loaiphong.store') }}" method="POST">
                    @csrf
                    <!-- Mã Loại Phòng -->
                    <div class="mb-3">
                        <label for="MaLP" class="form-label">Mã Loại Phòng</label>
                        <input type="text" class="form-control" id="MaLP" name="MaLP" placeholder="VD: LP001" required>
                    </div>
                    <!-- Tên Loại Phòng -->
                    <div class="mb-3">
                        <label for="TenLP" class="form-label">Tên Loại Phòng</label>
                        <input type="text" class="form-control" id="TenLP" name="TenLP" placeholder="VD: VIP" required>
                    </div>
                    <!-- Loại Giường -->
                    <div class="mb-3">
                        <label for="LoaiGiuong" class="form-label">Loại Giường</label>
                        <select class="form-select" id="LoaiGiuong" name="LoaiGiuong" required>
                            <option value="" disabled selected>Chọn loại giường</option>
                            <option value="Giường Đơn">Giường Đơn</option>
                            <option value="Giường Đôi">Giường Đôi</option>
                        </select>
                    </div>
                    <!-- Đơn Giá -->
                    <div class="mb-3">
                        <label for="DonGia" class="form-label">Đơn Giá</label>
                        <input type="number" class="form-control" id="DonGia" name="DonGia" placeholder="VD: 500000" required>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Lưu
                        </button>
                        <a href="{{ route('loaiphong.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Về
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
