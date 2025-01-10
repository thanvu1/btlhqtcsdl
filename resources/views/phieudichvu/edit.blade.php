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
    <title>Chỉnh sửa phiếu dịch vụ</title>
    <style>
        body {
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .edit-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 600px;
            margin: auto;
            margin-top: 50px;
        }
        .edit-form h1 {
            color: #4CAF50;
            font-size: 24px;
            font-weight: bold;
            text-align: center;
            margin-bottom: 20px;
        }
        .edit-form .form-control {
            border-radius: 5px;
        }
        .edit-form .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }
        .edit-form .btn-primary {
            background: #4CAF50;
            border: none;
        }
        .edit-form .btn-primary:hover {
            background: #45A049;
        }
        .edit-form .btn-secondary {
            background: #6c757d;
        }
    </style>
</head>
<body>
<div class="container">
        <h1>Chỉnh sửa phiếu dịch vụ</h1>
        <form action="{{ route('phieudichvu.update', $phieudichvu->MaPhieuDV) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="MaPhieuDV">Mã Phiếu Dịch Vụ:</label>
                <input type="text" class="form-control" id="MaPhieuDV" name="MaPhieuDV" value="{{ $phieudichvu->MaPhieuDV }}" readonly>
            </div>
            <div class="form-group">
                <label for="NgayLap">Ngày Lập:</label>
                <input type="date" class="form-control" id="NgayLap" name="NgayLap" value="{{ $phieudichvu->NgayLap }}" required>
            </div>
            <div class="form-group">
                <label for="TongTien">Tổng Tiền:</label>
                <input type="number" class="form-control" id="TongTien" name="TongTien" value="{{ $phieudichvu->TongTien }}" readonly>
            </div>
            <div class="form-group">
                <label for="MaPT">Mã phiếu thuê:</label>
                <input type="text" class="form-control" id="MaPT" name="MaPT" value="{{ $phieudichvu->MaPT }}" readonly>
            </div>
            <button type="submit" class="btn btn-primary">Lưu</button>
            <a href="{{ route('phieudichvu.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</body>
</html>