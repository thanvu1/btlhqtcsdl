<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Số Lượng Phòng Theo Tình Trạng</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<nav class="navbar navbar-expand-lg bg-black mb-5">
    <div class="container">
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="{{ route('home') }}">Trang Chủ</a>
            </li>
        </ul>
    </div>
</nav>

<div class="container">
    <h1 class="mb-4">Thống Kê Số Lượng Phòng Theo Tình Trạng</h1>

    <!-- Nút về trang phong.index -->
    <div class="mb-3">
        <a href="{{ route('phong.index') }}" class="btn btn-secondary">Quay Về Trang Quản Lý Phòng</a>
    </div>

    @if (isset($data) && count($data) > 0)
        <table class="table table-striped">
            <thead>
            <tr>
                <th>Tình Trạng</th>
                <th>Số Lượng</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($data as $row)
                <tr>
                    <td>{{ $row->TinhTrang }}</td>
                    <td>{{ $row->SoLuong }}</td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @elseif (isset($data))
        <p>Không có dữ liệu thống kê.</p>
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
