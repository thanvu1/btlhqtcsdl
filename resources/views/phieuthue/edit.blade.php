<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh sửa Phiếu Thuê</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
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
    <div class="container mt-5">
        <h1>Chỉnh sửa Phiếu Thuê</h1>
        <form action="{{ route('phieuthue.update', $phieuthue->MaPT) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="MaPT">Mã Phiếu Thuê:</label>
                <input type="text" class="form-control" id="MaPT" name="MaPT" value="{{ $phieuthue->MaPT }}" readonly>
            </div>
            <div class="form-group">
                <label for="MaKH">Mã Khách Hàng:</label>
                <input type="text" class="form-control" id="MaKH" name="MaKH" value="{{ $phieuthue->MaKH }}" required>
            </div>
            <div class="form-group">
                <label for="MaPhong">Mã Phòng:</label>
                <input type="text" class="form-control" id="MaPhong" name="MaPhong" value="{{ $phieuthue->MaPhong }}" required>
            </div>
            <div class="form-group">
                <label for="NgayThue">Ngày Thuê:</label>
                <input type="date" class="form-control" id="NgayThue" name="NgayThue" value="{{ $phieuthue->NgayThue }}" required>
            </div>
            <div class="form-group">
                <label for="NgayTra">Ngày Trả:</label>
                <input type="date" class="form-control" id="NgayTra" name="NgayTra" value="{{ $phieuthue->NgayTra }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('phieuthue.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>

    <!-- Liên kết với JS (Bootstrap và jQuery) -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
