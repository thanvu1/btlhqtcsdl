<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Hóa Đơn Thanh Toán</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 600px;">
            <div class="card-body">
                <h1 class="text-center text-success mb-3">Tạo Hóa Đơn Thanh Toán</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin hóa đơn</p>
                <form action="{{ route('hoadonthanhtoan.store') }}" method="POST">
                    @csrf
                    <!-- Ngày Lập -->
                    <div class="mb-3">
                        <label for="NgayLap" class="form-label">Ngày Lập</label>
                        <input type="date" class="form-control" id="NgayLap" name="NgayLap" required>
                    </div>
                    <!-- Tên Khách Hàng -->
                    <div class="mb-3">
                        <label for="TenKH" class="form-label">Tên Khách Hàng</label>
                        <input type="text" class="form-control" id="TenKH" name="TenKH" placeholder="Nhập tên khách hàng" maxlength="50" required>
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
                    <!-- Mã Nhân Viên -->
                    <div class="mb-3">
                        <label for="MaNV" class="form-label">Mã Nhân Viên</label>
                        <select class="form-select" id="MaNV" name="MaNV" required>
                            <option value="" disabled selected>Chọn mã nhân viên</option>
                            @foreach ($nhanviens as $nhanvien)
                                <option value="{{ $nhanvien->MaNV }}">{{ $nhanvien->MaNV }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Mã Phiếu Thuê -->
                    <div class="mb-3">
                        <label for="MaPT" class="form-label">Mã Phiếu Thuê</label>
                        <select class="form-select" id="MaPT" name="MaPT" required>
                            <option value="" disabled selected>Chọn mã phiếu thuê</option>
                            @foreach ($phieuthues as $phieuthue)
                                <option value="{{ $phieuthue->MaPT }}">{{ $phieuthue->MaPT }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Tổng Tiền -->
                    <div class="mb-3">
                        <label for="TongTien" class="form-label">Tổng Tiền</label>
                        <input type="number" step="0.01" class="form-control" id="TongTien" name="TongTien" placeholder="Nhập tổng tiền" required>
                    </div>
                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Lưu
                        </button>
                        <a href="{{ route('hoadonthanhtoan.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Về
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
