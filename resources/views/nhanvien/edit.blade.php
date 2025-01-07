<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chỉnh Bộ Phận</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            color: #333;
            background: #f8f9fa;
            font-family: Arial, sans-serif;
        }
        .contact-form {
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            margin: auto;
        }
        .contact-form h1 {
            color: #4CAF50;
            font-size: 28px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }
        .contact-form .form-control {
            border-radius: 5px;
            min-height: 40px;
        }
        .contact-form .form-control:focus {
            border-color: #4CAF50;
            box-shadow: 0 0 5px rgba(76, 175, 80, 0.5);
        }
        .contact-form .btn-primary {
            background: #4CAF50;
            border: none;
            font-size: 16px;
            padding: 10px 20px;
        }
        .contact-form .btn-primary:hover {
            background: #45A049;
        }
        .contact-form .btn-secondary {
            font-size: 16px;
            padding: 10px 20px;
        }
        .contact-form label {
            font-weight: bold;
        }
    </style>
</head>
<body>
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="contact-form">
            <h1>Chỉnh Sửa Nhân Viên</h1>
            <form action="{{ route('nhanvien.update', $nhanvien->MaNV) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Mã Nhân Viên -->
                <div class="mb-3">
                    <label for="MaNV" class="form-label">Mã Nhân Viên</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="MaNV" 
                        name="MaNV" 
                        value="{{ $nhanvien->MaNV }}" 
                        readonly
                        required>
                </div>

                <!-- Tên Nhân Viên -->
                <div class="mb-3">
                    <label for="TenNV" class="form-label">Tên Nhân Viên</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="TenNV" 
                        name="TenNV" 
                        value="{{ $nhanvien->TenNV }}" 
                        required>
                </div>

                <!-- Ngày Sinh -->
                <div class="mb-3">
                    <label for="NgaySinh" class="form-label">Ngày Sinh</label>
                    <input 
                        type="date" 
                        class="form-control" 
                        id="NgaySinh" 
                        name="NgaySinh" 
                        value="{{ $nhanvien->NgaySinh }}" 
                        required>
                </div>

                <!-- Giới Tính -->
                <div class="mb-3">
                    <label for="GioiTinh" class="form-label">Giới Tính</label>
                    <select 
                        class="form-select" 
                        id="GioiTinh" 
                        name="GioiTinh" 
                        required>
                        <option value="Nam" {{ $nhanvien->GioiTinh == 'Nam' ? 'selected' : '' }}>Nam</option>
                        <option value="Nữ" {{ $nhanvien->GioiTinh == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                    </select>
                </div>

                <!-- SDT -->
                <div class="mb-3">
                    <label for="SDT" class="form-label">Số Điện Thoại</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="SDT" 
                        name="SDT" 
                        value="{{ $nhanvien->SDT }}" 
                        required>
                </div>

                <!-- CCCD -->
                <div class="mb-3">
                    <label for="CCCD" class="form-label">CCCD</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="CCCD" 
                        name="CCCD" 
                        value="{{ $nhanvien->CCCD }}" 
                        required>
                </div>

                <!-- Chức Vụ -->
                <div class="mb-3">
                    <label for="ChucVu" class="form-label">Chức Vụ</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="ChucVu" 
                        name="ChucVu" 
                        value="{{ $nhanvien->ChucVu }}" 
                        required>
                </div>

                <!-- Lương -->
                <div class="mb-3">
                    <label for="Luong" class="form-label">Lương</label>
                    <input 
                        type="text" 
                        class="form-control" 
                        id="Luong" 
                        name="Luong" 
                        value="{{ $nhanvien->Luong }}" 
                        required>
                </div>

                <!-- Mã Bộ Phận -->
                <div class="mb-3">
                    <label for="MaBP" class="form-label">Bộ Phận</label>
                    <select 
                        class="form-select" 
                        id="MaBP" 
                        name="MaBP" 
                        required>
                        @foreach ($bophans as $bophan)
                            <option value="{{ $bophan->MaBP }}" 
                                {{ $nhanvien->MaBP == $bophan->MaBP ? 'selected' : '' }}>
                                {{ $bophan->TenBP }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Nút hành động -->
                <div class="d-flex justify-content-between">
                    <button type="submit" class="btn btn-primary">Cập Nhật</button>
                    <a href="{{ route('nhanvien.index') }}" class="btn btn-secondary">Về</a>
                </div>
            </form>
        </div>
    </div>
</body>

</html>
