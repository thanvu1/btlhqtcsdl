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
    <div class="container">
        <h1>Thống Kê Phòng Thuê Theo Tháng</h1>
    
        @if(session('error'))
            <div class="alert alert-danger">
                {{ session('error') }}
            </div>
        @endif
    
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Tháng</th>
                    <th>Số Lượng Phòng Thuê</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($thongKe as $item)
                    <tr>
                        <td>{{ $item->Thang }}</td>
                        <td>{{ $item->SoLuongPhongThue }}</td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="2" class="text-center">Không có dữ liệu thống kê.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
        <a href="{{ route('phieuthue.index') }}" class="btn btn-secondary">Quay Lại</a>
    </div>
</body>
</html>