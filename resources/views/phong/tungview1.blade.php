<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
   
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container mt-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="text-primary">Danh Sách Phòng Còn Trống</h1>
            <a href="{{ route('phong.index') }}" class="btn btn-secondary">Quay trở về</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>Mã Phòng</th>
                        <th>Tên Phòng</th>
                        <th>Tình Trạng</th>
                        <th>Loại Phòng</th>
                        <th>Loại Giường</th>
                        <th>Đơn Giá</th>
                    </tr>
                </thead>
                <tbody>
                    @if(empty($phongsConTrong))
                        <tr>
                            <td colspan="6" class="text-center text-muted">Không có phòng nào còn trống</td>
                        </tr>
                    @else
                        @foreach($phongsConTrong as $phong)
                            <tr>
                                <td>{{ $phong->MaPhong }}</td>
                                <td>{{ $phong->TenPhong }}</td>
                                <td>
                                    <span class="badge bg-success">{{ $phong->TinhTrang }}</span>
                                </td>
                                <td>{{ $phong->TenLoaiPhong }}</td>
                                <td>{{ $phong->LoaiGiuong }}</td>
                                <td>{{ number_format($phong->DonGia) }} VND</td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>