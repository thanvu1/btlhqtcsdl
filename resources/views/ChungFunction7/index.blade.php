<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Báo Cáo Tổng Số Phòng Đã Thuê</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-4">
        <h1 class="mb-4">Báo Cáo Tổng Số Phòng Đã Thuê</h1>

        {{-- <!-- Form chọn ngày -->
        <form action="{{ route('baocao.tongphong') }}" method="GET" class="mb-3">
            <div class="row">
                <div class="col-md-4">
                    <label for="Ngay" class="form-label">Chọn ngày:</label>
                    <input type="date" class="form-control" name="Ngay" id="Ngay" value="{{ $ngay }}">
                </div>
                <div class="col-md-2 d-flex align-items-end">
                    <button type="submit" class="btn btn-primary">Xem Báo Cáo</button>
                </div>
            </div>
        </form> --}}
        {{-- <input type="date" class="form-control" name="Ngay" id="Ngay" value="{{ $ngay }}"> --}}
        <!-- Form chọn ngày -->
<form action="{{ route('ChungFunction7.index') }}" method="GET" class="mb-3">
    <div class="row">
        <div class="col-md-4">
            <label for="Ngay" class="form-label">Chọn ngày:</label>
            <input type="date" class="form-control" name="Ngay" id="Ngay" value="{{ $ngay }}">
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <button type="submit" class="btn btn-primary">Xem Báo Cáo</button>
        </div>
        <div class="col-md-2 d-flex align-items-end">
            <!-- Nút Refresh -->
            <button type="button" class="btn btn-secondary" onclick="window.location.reload()">Làm Mới</button>
        </div>
    </div>
</form>

        <!-- Thông báo lỗi -->
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif

        <!-- Hiển thị kết quả -->
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Tổng Số Phòng Đã Thuê Trong Ngày: {{ $ngay }}</h5>
                <p class="card-text fs-4">{{ $tongSoPhong }}</p>
            </div>
        </div>

        <!-- Nút quay lại -->
        <a href="{{ route('phong.index') }}" class="btn btn-secondary mt-3">Quay Lại</a>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
