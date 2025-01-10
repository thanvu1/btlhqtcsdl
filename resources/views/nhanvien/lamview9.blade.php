<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh sách nhân viên và bộ phận</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
            background-color: #f4f4f9;
            color: #333;
        }

        h1 {
            text-align: center;
            color: #2c3e50;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        table th, table td {
            padding: 10px;
            text-align: left;
            border: 1px solid #ddd;
        }

        table th {
            background-color: #2c3e50;
            color: white;
            text-transform: uppercase;
        }

        table tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        table tr:hover {
            background-color: #f1f1f1;
        }

        .currency {
            text-align: right;
        }
    </style>
</head>
<body>
    <h1>Danh sách nhân viên và bộ phận</h1>
    <table>
        <thead>
            <tr>
                <th>Mã nhân viên</th>
                <th>Họ tên</th>
                <th>Ngày sinh</th>
                <th>Số điện thoại</th>
                <th>Tên bộ phận</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($dsnhanvien as $nv)
                <tr>
                    <td>{{ $nv->MaNV }}</td>
                    <td>{{ $nv->TenNV }}</td>
                    <td>{{ $nv->NgaySinh }}</td>
                    <td>{{ $nv->SDT }}</td>
                    <td>{{ $nv->TenBP }}</td>
                </tr>
            @empty
                <tr>
                    <td colspan="5">Không có dữ liệu</td>
                </tr>
            @endforelse
        </tbody>
    </table>
</body>
</html>
