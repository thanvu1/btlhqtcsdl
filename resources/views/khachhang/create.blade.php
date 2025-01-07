<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm khách hàng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center text-success mb-3">Thêm Khách Hàng</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin khách hàng</p>
                <form action="{{ route('khachhang.store') }}" method="POST">
                    @csrf
                    
                    <div class="mb-3">
                        <label for="MaKH" class="form-label">Mã Khách Hàng</label>
                        <input type="text" class="form-control" id="MaKH" name="MaKH" placeholder="VD: KH001" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="HoTen" class="form-label">Tên Khách</label>
                        <input type="text" class="form-control" id="HoTen" name="HoTen" required>
                    </div>
                    
                    <div class="mb-3">
                        <label for="NgaySinh" class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
                    </div>

                    <div class="mb-3">
                        <label for="SDT" class="form-label">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="SDT" name="SDT" required>
                    </div>

                    <div class="mb-3">
                        <label for="QuocTich" class="form-label">Quốc Tịch</label>
                        <input type="text" class="form-control" id="QuocTich" name="QuocTich" required>
                    </div>

                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Lưu
                        </button>
                        <a href="{{ route('khachhang.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
