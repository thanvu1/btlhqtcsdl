<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Dịch Vụ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center text-success mb-3">Tạo Dịch Vụ</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin dịch vụ</p>
                <form action="{{ route('dichvu.store') }}" method="POST">
                    @csrf
                    <!-- Mã dịch vụ -->
                    <div class="mb-3">
                        <label for="MaLP" class="form-label">Mã dịch vụ</label>
                        <input type="text" class="form-control" id="MaDV" name="MaDV" placeholder="VD: N'DV001'" required>
                    </div>
                    <!-- Tên Dịch Vụ -->
                    <div class="mb-3">
                        <label for="TenLP" class="form-label">Tên Dịch Vụ</label>
                        <input type="text" class="form-control" id="TenDV" name="TenDV" placeholder="VD: N'Giặt Ủi'" required>
                    </div>
                    <!-- Đơn Giá -->
                    <div class="mb-3">
                        <label for="DonGia" class="form-label">Đơn Giá</label>
                        <input type="number" class="form-control" id="DonGia" name="DonGia" placeholder="VD: 200000" required>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Lưu
                        </button>
                        <a href="{{ route('dichvu.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
