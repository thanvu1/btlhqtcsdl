<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách khách hàng đã sử dụng dịch vụ</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}"> <!-- Nếu sử dụng CSS -->
</head>
<body>
    <div class="container">
        <h1>Danh sách khách hàng đã sử dụng dịch vụ</h1>

        @if (session('error'))
            <div class="alert alert-danger">{{ session('error') }}</div>
        @elseif (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
        @elseif (count($khachHang) > 0)
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Mã KH</th>
                        <th>Họ tên</th>
                        <th>Ngày sinh</th>
                        <th>Số điện thoại</th>
                        <th>Quốc tịch</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($khachHang as $kh)
                        <tr>
                            <td>{{ $kh->MaKH }}</td>
                            <td>{{ $kh->HoTen }}</td>
                            <td>{{ $kh->NgaySinh }}</td>
                            <td>{{ $kh->SDT }}</td>
                            <td>{{ $kh->QuocTich }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p>Không có khách hàng nào đã sử dụng dịch vụ.</p>
        @endif
    </div>
</body>
</html>
