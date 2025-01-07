<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Số Lần Phòng Sử Dụng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-primary mb-5">
    <div class="container">
        <a class="navbar-brand text-white" href="#">Thống Kê Phòng</a>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('home') }}">Trang Chủ</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="mb-4">Thống Kê Số Lần Phòng Sử Dụng</h1>

    <!-- Form input -->
    <form method="GET" action="{{ route('phong.solan') }}" class="mb-4">
        <div class="row">
            <div class="col-md-6">
                <label for="thang">Tháng:</label>
                <input type="number" id="thang" name="thang" class="form-control" min="1" max="12" value="{{ request('thang', '') }}" placeholder="Nhập tháng">
            </div>
            <div class="col-md-6">
                <label for="nam">Năm:</label>
                <input type="number" id="nam" name="nam" class="form-control" min="2000" max="2100" value="{{ request('nam', '') }}" placeholder="Nhập năm">
            </div>
        </div>
        <button type="submit" class="btn btn-primary mt-3">Thống Kê</button>
    </form>

    <!-- Display results -->
    @if (isset($soLanSuDung) && count($soLanSuDung) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Mã Phòng</th>
                <th>Số Lần Sử Dụng</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($soLanSuDung as $phong)
                <tr>
                    <td>{{ $phong->MaPhong }}</td>
                    <td>{{ $phong->SoLanSuDung }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @elseif (isset($soLanSuDung))
        <p>Không có dữ liệu thống kê cho tháng {{ $thang }} năm {{ $nam }}.</p>
    @endif

    @if (isset($error))
        <div class="alert alert-danger">
            <p>{{ $error }}</p>
        </div>
    @endif
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
