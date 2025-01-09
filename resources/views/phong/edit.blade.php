<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Phiếu Thuê</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            color: #333;
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .contact-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        .contact-form h1 {
            color: #4CAF50;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .contact-form .form-control {
            border-radius: 5px;
            min-height: 40px;
        }
        .contact-form .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }
        .contact-form .btn-primary {
            background: #4CAF50;
            border: none;
            font-size: 16px;
            padding: 10px 20px;
        }
        .contact-form .btn-primary:hover {
            background: #45A049;
        }
        .contact-form .btn-secondary {
            font-size: 16px;
            padding: 10px 20px;
        }
        .contact-form label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="contact-form">
            <h1>Chỉnh Sửa Phiếu Thuê</h1>
            <form action="{{ route('phieuthue.update', $phieuthue->MaPT) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Mã Phiếu Thuê -->
                <div class="mb-3">
                    <label for="MaPT" class="form-label">Mã Phiếu Thuê</label>
                    <input type="text" class="form-control" id="MaPT" name="MaPT" value="{{ $phieuthue->MaPT }}" readonly>
                </div>
                <!-- Ngày Thuê -->
                <div class="mb-3">
                    <label for="NgayThue" class="form-label">Ngày Thuê</label>
                    <input type="date" class="form-control" id="NgayThue" name="NgayThue" value="{{ old('NgayThue', $phieuthue->NgayThue) }}" required>
                </div>
                <!-- Ngày Trả -->
                <div class="mb-3">
                    <label for="NgayTra" class="form-label">Ngày Trả</label>
                    <input type="date" class="form-control" id="NgayTra" name="NgayTra" value="{{ old('NgayTra', $phieuthue->NgayTra) }}" required>
                </div>
                <!-- Mã Khách Hàng -->
                <div class="mb-3">
                    <label for="MaKH" class="form-label">Mã Khách Hàng</label>
                    <input type="text" class="form-control" id="MaKH" name="MaKH" value="{{ old('MaKH', $phieuthue->MaKH) }}" required>
                </div>
                <!-- Mã Phòng -->
                <div class="mb-3">
                    <label for="MaPhong" class="form-label">Mã Phòng</label>
                    <input type="text" class="form-control" id="MaPhong" name="MaPhong" value="{{ old('MaPhong', $phieuthue->MaPhong) }}" required>
                </div>
                <!-- Giá Một Ngày -->
                <div class="mb-3">
                    <label for="GiaMotNgay" class="form-label">Giá Một Ngày</label>
                    <input type="number" class="form-control" id="GiaMotNgay" name="GiaMotNgay" value="{{ old('GiaMotNgay', $phieuthue->GiaMotNgay) }}" required>
                </div>
                <!-- Mã Nhân Viên -->
                <div class="mb-3">
                    <label for="MaNV" class="form-label">Mã Nhân Viên</label>
                    <input type="text" class="form-control" id="MaNV" name="MaNV" value="{{ old('MaNV', $phieuthue->MaNV) }}">
                </div>
                <!-- Nút hành động -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    <a href="{{ route('phieuthue.index') }}" class="btn btn-secondary">Về</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
