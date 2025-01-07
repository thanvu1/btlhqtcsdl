<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Nhân Viên</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center text-primary mb-3">Thêm Nhân Viên</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin nhân viên</p>
                <form action="{{ route('nhanvien.store') }}" method="POST">
                    @csrf
                    <!-- Mã Nhân Viên -->
                    <div class="mb-3">
                        <label for="MaNV" class="form-label">Mã Nhân Viên</label>
                        <input type="text" class="form-control" id="MaNV" name="MaNV" placeholder="VD: 1" required>
                    </div>
                    
                    <!-- Tên Nhân Viên -->
                     <div class="mb-3">
                        <label for="TenNV" class="form-label">Tên Nhân Viên</label>
                        <input type="text" class="form-control" id="TenNV" name="TenNV" placeholder="Nhập tên nhân viên" required>
                    </div>

                    <!-- Ngày Sinh -->
                    <div class="mb-3">
                        <label for="NgaySinh" class="form-label">Ngày Sinh</label>
                        <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" required>
                    </div>

                    <!-- Giới Tính -->
                    <div class="mb-3">
                        <label for="GioiTinh" class="form-label">Giới Tính</label>
                        <select class="form-select" id="GioiTinh" name="GioiTinh" required>
                            <option value="Nam">Nam</option>
                            <option value="Nữ">Nữ</option>
                        </select>
                    </div>

                    <!-- SDT -->
                    <div class="mb-3">
                        <label for="SDT" class="form-label">Số Điện Thoại</label>
                        <input type="text" class="form-control" id="SDT" name="SDT" placeholder="Nhập số điện thoại" required>
                    </div>

                    <!-- CCCD -->
                    <div class="mb-3">
                        <label for="CCCD" class="form-label">CCCD</label>
                        <input type="text" class="form-control" id="CCCD" name="CCCD" placeholder="Nhập số CCCD" required>
                    </div>

                    <!-- Chức Vụ -->
                    <div class="mb-3">
                        <label for="ChucVu" class="form-label">Chức Vụ</label>
                        <input type="text" class="form-control" id="ChucVu" name="ChucVu" placeholder="Nhập chức vụ" required>
                    </div>

                    <!-- Lương -->
                    <div class="mb-3">
                        <label for="Luong" class="form-label">Lương</label>
                        <input type="text" class="form-control" id="Luong" name="Luong" placeholder="Nhập lương" required>
                    </div>

                    <!-- Mã Bộ Phận -->
                    <div class="mb-3">
                        <label for="MaBP" class="form-label">Mã Bộ Phận</label>
                        <input type="text" class="form-control" id="MaBP" name="MaBP" placeholder="Nhập mã bộ phận" required>
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
