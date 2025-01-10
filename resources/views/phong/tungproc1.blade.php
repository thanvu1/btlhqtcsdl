<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Thống kê phòng</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
</head>
<body>
    <div class="container">
        <h1>Thống Kê Phòng Theo Loại Giường</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Loại Giường</th>
                    <th>Số Lượng Phòng</th>
                </tr>
            </thead>
            <tbody>
                @foreach($results as $item)
                    <tr>
                        <td>{{ $item->LoaiGiuong }}</td>
                        <td>{{ $item->SoLuongPhong }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <a href="{{ route('phong.index') }}" class="btn btn-secondary">Quay Lại</a>
    </div>
</body>
</html>




