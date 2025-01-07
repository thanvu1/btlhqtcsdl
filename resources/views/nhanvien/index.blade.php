<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
<title>Films</title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- Liên kết Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

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
	border: none;
	outline: none !important;
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
table.table tr th:first-child {
	width: 60px;
}
table.table tr th:last-child {
	width: 100px;
}
table.table-striped tbody tr:nth-of-type(odd) {
	background-color: #fcfcfc;
}
table.table-striped.table-hover tbody tr:hover {
	background: #f5f5f5;
}
table.table th i {
	font-size: 13px;
	margin: 0 5px;
	cursor: pointer;
}
table.table td:last-child i {
	opacity: 0.9;
	font-size: 22px;
	margin: 0 5px;
}
table.table td a {
	font-weight: bold;
	color: #566787;
	display: inline-block;
	text-decoration: none;
	outline: none !important;
}
table.table td a:hover {
	color: #2196F3;
}
table.table td a.edit {
	color: #FFC107;
}
table.table td a.delete {
	color: #F44336;
}
table.table td i {
	font-size: 19px;
}
table.table .avatar {
	border-radius: 50%;
	vertical-align: middle;
	margin-right: 10px;
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
.pagination li a:hover {
	color: #666;
}
.pagination li.active a, .pagination li.active a.page-link {
	background: #03A9F4;
}
.pagination li.active a:hover {
	background: #0397d6;
}
.pagination li.disabled i {
	color: #ccc;
}
.pagination li i {
	font-size: 16px;
	padding-top: 6px
}
.hint-text {
	float: left;
	margin-top: 10px;
	font-size: 13px;
}
/* Custom checkbox */
.custom-checkbox {
	position: relative;
}
.custom-checkbox input[type="checkbox"] {
	opacity: 0;
	position: absolute;
	margin: 5px 0 0 3px;
	z-index: 9;
}
.custom-checkbox label:before{
	width: 18px;
	height: 18px;
}
.custom-checkbox label:before {
	content: '';
	margin-right: 10px;
	display: inline-block;
	vertical-align: text-top;
	background: white;
	border: 1px solid #bbb;
	border-radius: 2px;
	box-sizing: border-box;
	z-index: 2;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	content: '';
	position: absolute;
	left: 6px;
	top: 3px;
	width: 6px;
	height: 11px;
	border: solid #000;
	border-width: 0 3px 3px 0;
	transform: inherit;
	z-index: 3;
	transform: rotateZ(45deg);
}
.custom-checkbox input[type="checkbox"]:checked + label:before {
	border-color: #03A9F4;
	background: #03A9F4;
}
.custom-checkbox input[type="checkbox"]:checked + label:after {
	border-color: #fff;
}
.custom-checkbox input[type="checkbox"]:disabled + label:before {
	color: #b8b8b8;
	cursor: auto;
	box-shadow: none;
	background: #ddd;
}
/* Modal styles */
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
.modal .form-control {
	border-radius: 2px;
	box-shadow: none;
	border-color: #dddddd;
}
.modal textarea.form-control {
	resize: vertical;
}
.modal .btn {
	border-radius: 2px;
	min-width: 100px;
}
.modal form label {
	font-weight: normal;
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
						<h2>Nhân viên</br></h2>
					</div>
					<div class="col-sm-12 d-flex justify-content-end align-items-center flex-wrap">
					<a href="{{ route('home') }}" class="btn btn-secondary me-2 mb-2">
						<i class="material-icons">&#xE5C4;</i> <span>Trang chủ</span>
					</a>
					<a href="{{ route('nhanvien.create') }}" class="btn btn-success me-2 mb-2">
						<i class="material-icons">&#xE147;</i> <span>Thêm mới</span>
					</a>
					<a href="" class="btn btn-primary me-2 mb-2">
						Xem Thống Kê
					</a>
					<a href="" class="btn btn-primary me-2 mb-2">
						Xem Phim Sắp Chiếu
					</a>
					<a href="" class="btn btn-secondary mb-2">
						<i class="material-icons">&#xE5C4;</i> <span>Phim theo hãng</span>
					</a>
				</div>
				</div>
			</div>

            @if (session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert" id="success-alert">
                    {{ session('success') }}
                </div>
            @endif

            <script>
                // Tự động ẩn thông báo sau 2.5 giây
                setTimeout(() => {
                    const alertElement = document.getElementById('success-alert');
                    if (alertElement) {
                        alertElement.classList.add('fade');
                        setTimeout(() => alertElement.remove(), 500); // Xóa phần tử sau khi animation fade hoàn tất
                    }
                }, 2500); // 2500ms = 2.5 giây
            </script>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Mã Nhân Viên</th>
                <th>Tên Nhân Viên</th>
                <th>Tên Bộ Phận</th>
                <th>Ngày Sinh</th>
                <th>Giới Tính</th>
                <th>SĐT</th>
                <th>CCCD</th>
                <th>Chức Vụ</th>
                <th>Lương</th>
                <th>Thao Tác</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($nhanviens as $nhanvien)
                <tr>
                    <td>{{ $nhanvien->MaNV}}</td>
                    <td>{{ $nhanvien->TenNV}}</td>
                    <td>{{ $nhanvien->boPhan->TenBP ?? 'Chưa có' }}</td>
                    <td>{{ $nhanvien->NgaySinh}}</td>
                    <td>{{ $nhanvien->GioiTinh}}</td>
                    <td>{{ $nhanvien->SDT}}</td>
                    <td>{{ $nhanvien->CCCD}}</td>
                    <td>{{ $nhanvien->ChucVu}}</td>
                    <td>{{ $nhanvien->Luong}}</td>
                    <td>
                        <a href="{{ route('nhanvien.edit', $nhanvien->MaNV) }}" class="edit" data-bs-toggle="tooltip" title="Chỉnh sửa">
                            <i class="material-icons">&#xE254;</i>
                        </a>
                        <button class="btn btn-danger btn-sm" data-bs-toggle="modal"
                                data-bs-target="#deleteModal{{ $nhanvien->MaNV }}">Xóa
                        </button>
                        <!-- Modal -->
                        <div class="modal fade" id="deleteModal{{ $nhanvien->MaNV }}" tabindex="-1"
                             aria-labelledby="deleteModalLabel{{ $nhanvien->MaNV }}" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="deleteModalLabel{{ $nhanvien->MaNV }}">Xóa bộ phận</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Bạn có chắc chắn muốn xóa nhân viên <b>{{ $nhanvien->MaNV }}</b>?
                                    </div>
                                    <form action="{{ route('nhanvien.destroy', $nhanvien->MaNV) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-danger">Xóa</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Hủy</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </td>
                </tr>
            @endforeach
            @if ($nhanviens->isEmpty())
                <tr>
                    <td colspan="4" class="text-center">Không có nhân viên nào.</td>
                </tr>
            @endif
        </tbody>
        @if($nhanviens->hasPages())
            <div class="d-flex justify-content-center">
                {{ $nhanviens->links('pagination::bootstrap-4') }}
            </div>
        @endif
        
	<table>
	{{-- Phân trang nếu cần --}}
	<div class="d-flex justify-content-center">
		{{ $nhanviens->links('pagination::bootstrap-4') }}
	</div>
</div>

</body>
</html>