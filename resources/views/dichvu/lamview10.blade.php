<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doanh Thu Dịch Vụ</title>
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
    <h1>Tổng Doanh Thu Từ Dịch Vụ</h1>
    <table>
        <thead>
            <tr>
                <th>Mã Dịch Vụ</th>
                <th>Tên Dịch Vụ</th>
                <th class="currency">Tổng Doanh Thu</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($doanhthu as $item)
                <tr>
                    <td>{{ $item->MaDV }}</td>
                    <td>{{ $item->TenDV }}</td>
                    <td class="currency">{{ number_format($item->TongDoanhThu, 0, ',', '.') }} VND</td>
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
