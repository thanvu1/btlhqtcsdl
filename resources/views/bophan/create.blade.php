<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Bộ Phận</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center text-primary mb-3">Tạo Bộ Phận</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin bộ phận</p>
                <form action="{{ route('bophan.store') }}" method="POST">
                    @csrf
                    <!-- Mã Bộ Phận -->
                    <div class="mb-3">
                        <label for="MaBP" class="form-label">Mã Bộ Phận</label>
                        <input type="text" class="form-control" id="MaBP" name="MaBP" placeholder="VD: BP001" required>
                    </div>
                    
                    <!-- Tên Bộ Phận -->
                    <div class="mb-3">
                        <label for="TenBP" class="form-label">Tên Bộ Phận</label>
                        <input type="text" class="form-control" id="TenBP" name="TenBP" placeholder="Nhập tên bộ phận" required>
                    <!-- Mô tả -->
                    <div class="mb-3">
                        <label for="MoTa" class="form-label">Mô Tả</label>
                        <textarea class="form-control" id="MoTa" name="MoTa" rows="3" placeholder="Nhập mô tả nếu cần"></textarea>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-primary">
                            <i class="bi bi-save"></i> Lưu
                        </button>
                        <a href="{{ route('bophan.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Về
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
