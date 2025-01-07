<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Hóa Đơn Thanh Toán</title>
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
            max-width: 600px;
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
        .contact-form .hint-text {
            font-size: 14px;
            color: #6c757d;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="contact-form">
            <h1>Chỉnh Sửa Hóa Đơn Thanh Toán</h1>
            <form action="{{ route('hoadonthanhtoan.update', $hoadon->id) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Mã Hóa Đơn -->
                <div class="mb-3">
                    <label for="id" class="form-label">Mã Hóa Đơn</label>
                    <input type="text" class="form-control" id="id" name="id" value="{{ $hoadon->id }}" readonly>
                </div>
                <!-- Mã Khách Hàng -->
                <div class="mb-3">
                    <label for="maKH" class="form-label">Mã Khách Hàng</label>
                    <input type="text" class="form-control" id="maKH" name="maKH" value="{{ $hoadon->maKH }}" required>
                </div>
                <!-- Mã Phiếu Thu -->
                <div class="mb-3">
                    <label for="maPT" class="form-label">Mã Phiếu Thu</label>
                    <input type="text" class="form-control" id="maPT" name="maPT" value="{{ $hoadon->maPT }}" required>
                </div>
                <!-- Ngày Thanh Toán -->
                <div class="mb-3">
                    <label for="ngayTT" class="form-label">Ngày Thanh Toán</label>
                    <input type="date" class="form-control" id="ngayTT" name="ngayTT" value="{{ $hoadon->ngayTT }}" required>
                </div>
                <!-- Tổng Tiền -->
                <div class="mb-3">
                    <label for="tongTien" class="form-label">Tổng Tiền</label>
                    <input type="number" class="form-control" id="tongTien" name="tongTien" value="{{ $hoadon->tongTien }}" required>
                </div>
                <!-- Nút hành động -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    <a href="{{ route('hoadonthanhtoan.index') }}" class="btn btn-secondary">Về</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
