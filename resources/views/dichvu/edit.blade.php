<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Dịch Vụ</title>
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
            <h1>Chỉnh Sửa Dịch Vụ</h1>
            <form action="{{ route('dichvu.update', $dichvu->MaDV) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Mã Dịch Vụ -->
                <div class="mb-3">
                    <label for="MaDV" class="form-label">Mã Dịch Vụ</label>
                    <input type="text" class="form-control" id="id" name="MaDV" value="{{ $dichvu->MaDV }}" readonly>
                </div>
                <!-- Tên Dịch Vụ -->
                <div class="mb-3">
                    <label for="TenDV" class="form-label">Tên dịch vụ</label>
                    <input type="text" class="form-control" id="TenDV" name="TenDV" value="{{ $dichvu->TenDV  }}" required>
                </div>
                <!-- Đơn Giá -->
                <div class="mb-3">
                    <label for="DonGia" class="form-label">Đơn Giá</label>
                    <input type="text" class="form-control" id="DonGia" name="DonGia" value="{{ $dichvu->DonGia }}" required>
                </div>
                <!-- Nút hành động -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    <a href="{{ route('dichvu.index') }}" class="btn btn-secondary">Hủy</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
