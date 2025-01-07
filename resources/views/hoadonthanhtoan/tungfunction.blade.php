<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Danh Sách Hóa Đơn Thanh Toán</title>
    <style>
        /* Reset some default styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f7fa;
            margin: 0;
            padding: 0;
        }

        table {
            width: 80%;
            margin: 50px auto;
            border-collapse: collapse;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
        }

        thead {
            background-color: #007bff;
            color: white;
            text-align: center;
        }

        th, td {
            padding: 12px 15px;
            text-align: center;
            border: 1px solid #ddd;
        }

        tbody tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tbody tr:hover {
            background-color: #e9f7fc;
            cursor: pointer;
        }

        th {
            font-size: 16px;
        }

        td {
            font-size: 14px;
        }

        .container {
            width: 90%;
            margin: 0 auto;
            padding: 30px 0;
        }

        h1 {
            text-align: center;
            color: #333;
        }

        /* Responsive design */
        @media screen and (max-width: 768px) {
            table {
                width: 100%;
                margin: 20px 0;
            }

            th, td {
                padding: 8px;
            }

            h1 {
                font-size: 20px;
            }
        }

        /* Style for button */
        .btn-back {
            background-color: #007bff;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border-radius: 5px;
            margin: 20px 0;
            display: inline-block;
        }

        .btn-back:hover {
            background-color: #0056b3;
        }

        /* Style for pagination */
        .pagination {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }

        .pagination a {
            padding: 8px 16px;
            margin: 0 5px;
            text-decoration: none;
            border: 1px solid #ddd;
            color: #007bff;
            border-radius: 5px;
        }

        .pagination a:hover {
            background-color: #007bff;
            color: white;
        }

        .pagination .active {
            background-color: #007bff;
            color: white;
            pointer-events: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Danh Sách Hóa Đơn Thanh Toán</h1>

        <!-- Nút Quay Lại -->
        <a href="{{ route('hoadonthanhtoan.index') }}" class="btn-back">Quay lại</a>

        <table>
            <thead>
                <tr>
                    <th>Mã Phiếu Thuê</th>
                    <th>Mã Phòng</th>
                    <th>Số Ngày Thuê</th>
                    <th>Tổng Tiền Thuê</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hoadon as $item)
                    <tr>
                        <td>{{ $item->MaPT }}</td>
                        <td>{{ $item->MaPhong }}</td>
                        <td>{{ $item->SoNgayThue }}</td>
                        <td>{{ number_format($item->TongTienThue, 2) }} VND</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Phân Trang -->
        
    </div>
</body>
</html>
