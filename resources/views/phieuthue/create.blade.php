<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Phiếu Thuê</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
            <div class="card-body">
                <h1 class="text-center text-success mb-3">Tạo Phiếu Thuê</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin phiếu thuê</p>
                <form action="{{ route('phieuthue.store') }}" method="POST">
                    @csrf
                    <!-- Mã Phiếu Thuê -->
                    <div class="mb-3">
                        <label for="MaPT" class="form-label">Mã Phiếu Thuê</label>
                        <input type="text" class="form-control" id="MaPT" name="MaPT" placeholder="VD: PT001" required>
                    </div>
                    <!-- Mã Phòng -->
                    <div class="mb-3">
                        <label for="MaPhong" class="form-label">Mã Phòng</label>
                        <select class="form-select" id="MaPhong" name="MaPhong" required>
                            <option value="" disabled selected>Chọn mã phòng</option>
                            @foreach ($phongs as $phong)
                                <option value="{{ $phong->MaPhong }}">{{ $phong->MaPhong }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Mã Khách Hàng -->
                    <div class="mb-3">
                        <label for="MaKH" class="form-label">Mã Khách Hàng</label>
                        <select class="form-select" id="MaKH" name="MaKH" required>
                            <option value="" disabled selected>Chọn mã khách hàng</option>
                            @foreach ($khachhangs as $khachhang)
                                <option value="{{ $khachhang->MaKH }}">{{ $khachhang->MaKH }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Ngày Thuê -->
                    <div class="mb-3">
                        <label for="NgayThue" class="form-label">Ngày Thuê</label>
                        <input type="date" class="form-control" id="NgayThue" name="NgayThue" required>
                    </div>
                    <!-- Ngày Trả -->
                    <div class="mb-3">
                        <label for="NgayTra" class="form-label">Ngày Trả</label>
                        <input type="date" class="form-control" id="NgayTra" name="NgayTra" required>
                    </div>
                    <!-- Giá Mỗi Ngày -->
                    <div class="mb-3">
                        <label for="GiaMotNgay" class="form-label">Giá Mỗi Ngày</label>
                        <input type="number" step="0.01" class="form-control" id="GiaMotNgay" name="GiaMotNgay" placeholder="VD: 500000" required>
                    </div>
                    <!-- Mã Nhân Viên -->
                    <div class="mb-3">
                        <label for="MaNV" class="form-label">Mã Nhân Viên</label>
                        <select class="form-select" id="MaNV" name="MaNV">
                            <option value="" selected>Chọn mã nhân viên (không bắt buộc)</option>
                            @foreach ($nhanviens as $nhanvien)
                                <option value="{{ $nhanvien->MaNV }}">{{ $nhanvien->MaNV }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Lưu
                        </button>
                        <a href="{{ route('phieuthue.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Về
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
