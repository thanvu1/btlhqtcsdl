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
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="contact-form">
            <h1>Chỉnh Sửa Phiếu Thuê</h1>
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
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
                    <input type="date" class="form-control" id="NgayThue" name="NgayThue" value="{{ $phieuthue->NgayThue }}" required>
                </div>
                <!-- Ngày Trả -->
                <div class="mb-3">
                    <label for="NgayTra" class="form-label">Ngày Trả</label>
                    <input type="date" class="form-control" id="NgayTra" name="NgayTra" value="{{ $phieuthue->NgayTra }}" required>
                </div>
                <!-- Mã Khách Hàng -->
                <div class="mb-3">
                    <label for="MaKH" class="form-label">Khách Hàng</label>
                    <select id="MaKH" name="MaKH" class="form-select" required>
                        @foreach ($khachhangs as $khachhang)
                            <option value="{{ $khachhang->MaKH }}" {{ $phieuthue->MaKH == $khachhang->MaKH ? 'selected' : '' }}>
                                {{ $khachhang->HoTen }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Mã Phòng -->
                <div class="mb-3">
                    <label for="MaPhong" class="form-label">Phòng</label>
                    <select id="MaPhong" name="MaPhong" class="form-select" required>
                        @foreach ($phongs as $phong)
                            <option value="{{ $phong->MaPhong }}" {{ $phieuthue->MaPhong == $phong->MaPhong ? 'selected' : '' }}>
                                {{ $phong->TenPhong }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <!-- Nút hành động -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                    <a href="{{ route('phieuthue.index') }}" class="btn btn-secondary">Về</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
