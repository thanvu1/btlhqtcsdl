<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Thêm Dịch Vụ</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
        }
        .form-container {
            background: #fff;
            padding: 30px;
            border-radius: 3px;
            min-width: 500px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
            margin: 50px auto;
        }
        .form-container h2 {
            margin-bottom: 20px;
        }
        .form-container .btn {
            border-radius: 2px;
            min-width: 100px;
        }
    </style>
</head>
<body>
<div class="container-xl">
    <div class="form-container">
        <h2>Thêm Dịch Vụ Mới</h2>
        <form action="{{ route('dichvu.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="MaDV">Mã Dịch Vụ</label>
                <input type="text" name="MaDV" class="form-control" id="MaDV" required>
            </div>
            <div class="form-group">
                <label for="TenDV">Tên Dịch Vụ</label>
                <input type="text" name="TenDV" class="form-control" id="TenDV" required>
            </div>
            <div class="form-group">
                <label for="DonGia">Đơn Giá</label>
                <input type="number" name="DonGia" class="form-control" id="DonGia" required>
            </div>
            <button type="submit" class="btn btn-success">Thêm Dịch Vụ</button>
            <a href="{{ route('dichvu.index') }}" class="btn btn-secondary">Hủy</a>
        </form>
    </div>
</div>
</body>
</html>
