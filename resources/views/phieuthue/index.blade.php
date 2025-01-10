<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Danh Sách Phiếu Thuê</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    
    <style>
        body { color: #566787; background: #f5f5f5; font-family: 'Varela Round', sans-serif; font-size: 13px; }
        .table-responsive { margin: 30px 0; }
        .table-wrapper { background: #fff; padding: 20px 25px; border-radius: 3px; min-width: 1000px; box-shadow: 0 1px 1px rgba(0,0,0,.05); }
        .table-title { padding-bottom: 15px; background: #435d7d; color: #fff; padding: 16px 30px; min-width: 100%; margin: -20px -25px 10px; border-radius: 3px 3px 0 0; }
        .table-title h2 { margin: 5px 0 0; font-size: 24px; }
        .table-title .btn-group { float: right; }
        .table-title .btn { color: #fff; float: right; font-size: 13px; border: none; min-width: 50px; border-radius: 2px; }
        .table-title .btn i { float: left; font-size: 21px; margin-right: 5px; }
        table.table tr th, table.table tr td { border-color: #e9e9e9; padding: 12px 15px; vertical-align: middle; }
        table.table tr th:first-child { width: 60px; }
        table.table tr th:last-child { width: 100px; }
        table.table-striped tbody tr:nth-of-type(odd) { background-color: #fcfcfc; }
        table.table-striped.table-hover tbody tr:hover { background: #f5f5f5; }
        table.table td a { font-weight: bold; color: #566787; display: inline-block; text-decoration: none; }
        table.table td a:hover { color: #2196F3; }
        table.table td a.edit { color: #FFC107; }
        table.table td a.delete { color: #F44336; }
        .pagination { float: right; margin: 0 0 5px; }
    </style>
</head>
<body>
    <div class="container-xl">
        <div class="table-responsive">
            <div class="table-wrapper">
                <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6">
                            <h2>Danh Sách Phiếu Thuê</h2>
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end align-items-center flex-wrap">
                        <a href="{{ route('home') }}" class="btn btn-secondary me-2 mb-2">
                            <i class="material-icons">&#xE5C4;</i> <span>Trang chủ</span>
                        </a>
                        <a href="{{ route('phieuthue.create') }}" class="btn btn-success me-2 mb-2">
                            <i class="material-icons">&#xE147;</i> <span>Thêm mới</span>
                        </a>
                        <a href="{{ route('phieuthue.vw_dspt') }}" class="btn btn-primary me-2 mb-2">
                            Xem danh sách phiếu thuê
                        </a>
                            <a href="{{ route('phieuthue.tungview2') }}" class="btn btn-secondary"> <span>Thống kê số phòng cho thuê</span></a>
                        </div>
                    </div>
                </div>
                @if(session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif  

                @if(session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

               

                <script>
                    setTimeout(() => {
                        const alertElement = document.getElementById('success-alert');
                        if (alertElement) {
                            alertElement.classList.add('fade');
                            setTimeout(() => alertElement.remove(), 500);
                        }
                    }, 2500);
                </script>

                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Mã Phiếu Thuê</th>
                            <th>Mã Phòng</th>
                            <th>Mã Khách Hàng</th>
                            <th>Ngày Thuê</th>
                            <th>Ngày Trả</th>
                            <th>Giá 1 Ngày</th>
                            <th>Mã Nhân Viên</th>
                            <th>Thao Tác</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($phieuthues as $phieuthue)
                            <tr>
                                <td>{{ $phieuthue->MaPT }}</td>
                                <td>{{ $phieuthue->MaPhong }}</td>
                                <td>{{ $phieuthue->MaKH }}</td>
                                <td>{{ $phieuthue->NgayThue }}</td>
                                <td>{{ $phieuthue->NgayTra }}</td>
                                <td>{{ number_format($phieuthue->GiaMotNgay, 0, ',', '.') }} VND</td>
                                <td>{{ $phieuthue->MaNV }}</td>
                                <td>
                                    <a href="{{ route('phieuthue.edit', $phieuthue->MaPT) }}" class="edit"><i class="material-icons" title="Chỉnh sửa">&#xE254;</i></a>
                                    <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $phieuthue->MaPT }}">
                                        Xóa
                                    </button>

                                    <div class="modal fade" id="deleteModal{{ $phieuthue->MaPT }}" tabindex="-1" aria-labelledby="deleteModalLabel{{ $phieuthue->MaPT }}" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="deleteModalLabel{{ $phieuthue->MaPT }}">Xác nhận xóa</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    Bạn có chắc chắn muốn xóa phiếu thuê này không?
                                                </div>
                                                <div class="modal-footer">
                                                    <form action="{{ route('phieuthue.destroy', $phieuthue->MaPT) }}" method="POST">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger">Xóa</button>
                                                    </form>
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

                <div class="d-flex justify-content-center">
                    {{ $phieuthues->links('pagination::bootstrap-4') }}
                </div>
            </div>
        </div>
    </div>
</body>
</html>
