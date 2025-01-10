<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Chi Tiết Phiếu Dịch Vụ</title>
    <!-- CSS & Font -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <!-- JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

    <!-- Styles tùy chỉnh (nếu có) -->
    <style>
        body {
            color: #566787;
            background: #f5f5f5;
            font-family: 'Varela Round', sans-serif;
            font-size: 13px;
        }
        .table-responsive {
            margin: 30px 0;
        }
        .table-wrapper {
            background: #fff;
            padding: 20px 25px;
            border-radius: 3px;
            min-width: 1000px;
            box-shadow: 0 1px 1px rgba(0,0,0,.05);
        }
        .table-title {
            padding-bottom: 15px;
            background: #435d7d;
            color: #fff;
            padding: 16px 30px;
            min-width: 100%;
            margin: -20px -25px 10px;
            border-radius: 3px 3px 0 0;
        }
        .table-title h2 {
            margin: 5px 0 0;
            font-size: 24px;
        }
        .table-title .btn-group {
            float: right;
        }
        .table-title .btn {
            color: #fff;
            float: right;
            font-size: 13px;
            border: none;
            min-width: 50px;
            border-radius: 2px;
            margin-left: 10px;
        }
        .table-title .btn i {
            float: left;
            font-size: 21px;
            margin-right: 5px;
        }
        .table-title .btn span {
            float: left;
            margin-top: 2px;
        }
        table.table tr th, table.table tr td {
            border-color: #e9e9e9;
            padding: 12px 15px;
            vertical-align: middle;
        }
        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }
        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }
        table.table td i {
            font-size: 19px;
        }
        table.table td a.edit {
            color: #FFC107;
        }
        table.table td a.delete {
            color: #F44336;
        }
        .pagination {
            float: right;
            margin: 0 0 5px;
        }
        .pagination li a {
            border: none;
            font-size: 13px;
            min-width: 30px;
            min-height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 2px !important;
            text-align: center;
            padding: 0 6px;
        }
        .pagination li.active a, .pagination li.active a.page-link {
            background: #03A9F4;
        }
        .modal .modal-dialog {
            max-width: 400px;
        }
        .modal .modal-header, .modal .modal-body, .modal .modal-footer {
            padding: 20px 30px;
        }
        .modal .modal-content {
            border-radius: 3px;
            font-size: 14px;
        }
        .modal .modal-footer {
            background: #ecf0f1;
            border-radius: 0 0 3px 3px;
        }
        .modal .modal-title {
            display: inline-block;
        }
        .modal .btn {
            border-radius: 2px;
            min-width: 100px;
        }
    </style>
</head>
<body>
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-6">
                        <h2>Chi Tiết Phiếu Dịch Vụ</h2>
                    </div>
                    <div class="col-sm-6">
                        <!-- Bạn có thể chỉnh sửa tên route 'home' theo dự án -->
                        <a href="{{ route('home') }}" class="btn btn-secondary">
                            <i class="fa fa-home"></i> Trang Chủ
                        </a>
                        <!-- Link thêm mới -->
                        <a href="{{ route('chitietphieu.create') }}" class="btn btn-success">
                            <i class="fa fa-plus"></i> Thêm Mới
                        </a>
                    </div>
                </div>
            </div>

            <!-- Hiển thị thông báo session (nếu có) -->
            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show">
                    {{ session('success') }}
                </div>
            @endif

            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                        <th>Mã Phiếu DV</th>
                        <th>Mã DV</th>
                        <th>Tên Dịch Vụ</th>
                        <th>Số Lượng</th>
                        <th>Đơn Giá</th>
                        <th>Tổng Cộng</th>
                        <th>Thao Tác</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($chitietphieus as $chiTietPhieu)
                    <tr>
                        <td>{{ $chiTietPhieu->MaPhieuDV }}</td>
                        <td>{{ $chiTietPhieu->MaDV }}</td>
                        <td>{{ $chiTietPhieu->dichVu->TenDV ?? 'Không xác định' }}</td>
                        <td>{{ $chiTietPhieu->SoLuong }}</td>
                        <td>{{ number_format($chiTietPhieu->DonGia, 0, ',', '.') }} VND</td>
                        <td>{{ number_format($chiTietPhieu->SoLuong * $chiTietPhieu->DonGia, 0, ',', '.') }} VND</td>
                        <td>
                            <!-- Sửa (Edit) - chuyền 2 giá trị -> [MaPhieuDV, MaDV] -->
                            <a href="{{ route('chitietphieu.edit', [$chiTietPhieu->MaPhieuDV, $chiTietPhieu->MaDV]) }}" class="edit">
                                <i class="fa fa-pencil"></i>
                            </a>
                            <!-- Xóa (Delete) - dùng Modal xác nhận -->
                            <a href="#" class="delete" data-toggle="modal" data-target="#deleteModal{{ $chiTietPhieu->MaPhieuDV }}-{{ $chiTietPhieu->MaDV }}">
                                <i class="fa fa-trash"></i>
                            </a>
                            <!-- Modal Xóa -->
                            <div class="modal fade" id="deleteModal{{ $chiTietPhieu->MaPhieuDV }}-{{ $chiTietPhieu->MaDV }}" tabindex="-1" role="dialog">
                                <div class="modal-dialog" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Xóa Chi Tiết Phiếu</h5>
                                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                                        </div>
                                        <div class="modal-body">
                                            Bạn có chắc chắn muốn xóa chi tiết phiếu này?
                                        </div>
                                        <div class="modal-footer">
                                            <form action="{{ route('chitietphieu.destroy', [$chiTietPhieu->MaPhieuDV, $chiTietPhieu->MaDV]) }}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger">Xóa</button>
                                            </form>
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Hủy</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- End Modal -->
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

            <!-- Hiển thị phân trang (nếu dùng paginate) -->
            <div class="clearfix">
                {{ $chitietphieus->links('pagination::bootstrap-4') }}
            </div>
        </div>
    </div>
</div>
</body>
</html>
