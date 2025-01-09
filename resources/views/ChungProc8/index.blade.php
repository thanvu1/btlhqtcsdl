<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thống Kê Khách Hàng Theo Quốc Tịch</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Thống Kê Khách Hàng Theo Quốc Tịch</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Quốc Tịch</th>
                    <th>Số Lượng Khách Hàng</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($thongKeQuocTich as $quocTich)
                    <tr>
                        <td>{{ $quocTich->QuocTich }}</td>
                        <td>{{ $quocTich->SoLuongKhachHang }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Không có dữ liệu.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('khachhang.index') }}" class="btn btn-secondary mt-3">Quay Lại</a>
    </div>
</body>
</html>
