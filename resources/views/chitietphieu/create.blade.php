<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Chi Tiết Phiếu Dịch Vụ</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center text-success mb-3">Tạo Chi Tiết Phiếu Dịch Vụ</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin chi tiết phiếu dịch vụ</p>
                <form action="{{ route('chitietphieu.store') }}" method="POST">
                    @csrf
                    <!-- Mã phiếu dịch vụ -->
                    <div class="mb-3">
                        <label for="MaPhieuDV" class="form-label">Mã phiếu dịch vụ</label>
                        <input type="text" class="form-control" id="MaPhieuDV" name="MaPhieuDV" placeholder="VD: N'PDV001''" required>
                    </div>
                    <!-- Mã Dịch Vụ -->
                    <div class="mb-3">
                        <label for="MaDV" class="form-label">Mã dịch vụ</label>
                        <select class="form-control" id="MaDV" name="MaDV" required>
                            <option value="">Chọn dịch vụ</option>
                            @foreach ($dichvus as $dichvu)
                                <option value="{{ $dichvu->MaDV }}" data-don-giá="{{ $dichvu->DonGia }}">{{ $dichvu->TenDV }}</option>
                            @endforeach
                        </select>
                    </div>
                    <!-- Số Lượng -->
                    <div class="mb-3">
                        <label for="SoLuong" class="form-label">Số Lượng</label>
                        <input type="number" class="form-control" id="SoLuong" name="SoLuong" placeholder="VD: 2" required>
                    </div>
                    <!-- Đơn Giá -->
                    <div class="mb-3">
                        <label for="DonGia" class="form-label">Đơn Giá</label>
                        <input type="number" class="form-control" id="DonGia" name="DonGia" placeholder="Đơn giá sẽ tự động hiển thị" readonly required>
                    </div>

                    <!-- Nút hành động -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            <i class="bi bi-save"></i> Lưu
                        </button>
                        <a href="{{ route('chitietphieu.index') }}" class="btn btn-secondary">
                            <i class="bi bi-arrow-left"></i> Hủy
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        // Khi chọn mã dịch vụ, cập nhật giá
        $('#MaDV').change(function() {
            var selectedOption = $(this).find('option:selected');
            var donGia = selectedOption.data('don-giá');
            $('#DonGia').val(donGia);
        });
    </script>
</body>
</html>