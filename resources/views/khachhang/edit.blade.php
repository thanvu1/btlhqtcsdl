<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Liên kết Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <title>Chỉnh sửa khách hàng</title>
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
<div class="container">
        <h1>Chỉnh sửa khách hàng</h1>
        <form action="{{ route('khachhang.update', $khachhang->MaKH) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="MaKh">Mã khách hàng:</label>
                <input type="text" class="form-control" id="MaKH" name="MaKH" value="{{ $khachhang->MaKH }}" readonly>
            </div>
            <div class="form-group">
                <label for="HoTen">Họ và tên:</label>
                <input type="text" class="form-control" id="HoTen" name="HoTen" value="{{ $khachhang->HoTen }}" required>
            </div>
            <div class="form-group">
                <label for="NgaySinh">Ngày sinh:</label>
                <input type="date" class="form-control" id="NgaySinh" name="NgaySinh" value="{{ $khachhang->NgaySinh }}" required>
            </div>
            <div class="form-group">
                <label for="SDT">Số điện thoại:</label>
                <input type="text" class="form-control" id="SDT" name="SDT" value="{{ $khachhang->SDT }}" required>
            </div>
            <div class="form-group">
                <label for="QuocTich">Quốc tịch:</label>
                <input type="text" class="form-control" id="QuocTich" name="QuocTich" value="{{ $khachhang->QuocTich }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('khachhang.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>