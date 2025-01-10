<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Sửa Bộ Phận</title>
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
            <h1>Chỉnh Bộ Phận</h1>
            <form action="{{ route('bophan.update', $bophan->MaBP) }}" method="POST">
                @csrf
                @method('PUT')
                <!-- Mã Phòng -->
                <div class="mb-3">
                    <label for="MaBP" class="form-label">Mã Bộ Phận</label>
                    <input type="text" class="form-control" id="MaBP" name="MaBP" value="{{ $bophan->MaBP }}" readonly>
                </div>
                <!-- Tên Phòng -->
                <div class="mb-3">
                    <label for="TenBP" class="form-label">Tên Bộ Phận</label>
                    <input type="text" class="form-control" id="TenBP" name="TenBP" value="{{ $bophan->TenBP }}" required>
                </div>
                
                <!-- Mô tả -->
                <div class="mb-3">
                    <label for="MoTa" class="form-label">Mô tả</label>
                    <textarea class="form-control" id="MoTa" name="MoTa" rows="3">{{ $bophan->MoTa }}</textarea>
                </div>
                <!-- Nút hành động -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    <a href="{{ route('bophan.index') }}" class="btn btn-secondary">Về</a>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
