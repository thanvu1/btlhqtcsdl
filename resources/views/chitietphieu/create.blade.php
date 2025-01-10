<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tạo Chi Tiết Phiếu Dịch Vụ</title>
    <!-- Bootstrap 5 CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <!-- jQuery (nếu cần) và Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body class="bg-light">
    <div class="container d-flex justify-content-center align-items-center min-vh-100">
        <div class="card shadow-lg p-4" style="width: 100%; max-width: 500px;">
            <div class="card-body">
                <h1 class="text-center text-success mb-3">Tạo Chi Tiết Phiếu Dịch Vụ</h1>
                <p class="text-center text-muted">Vui lòng điền thông tin chi tiết phiếu dịch vụ</p>

                <!-- Form bắt đầu -->
                <form action="{{ route('chitietphieu.store') }}" method="POST">
                    @csrf

                    <!-- Mã phiếu dịch vụ -->
                    <div class="mb-3">
                        <label for="MaPhieuDV" class="form-label">Mã phiếu dịch vụ</label>
                        <input 
                            type="text" 
                            class="form-control" 
                            id="MaPhieuDV" 
                            name="MaPhieuDV" 
                            placeholder="VD: PDV001" 
                            required
                            value="{{ old('MaPhieuDV') }}"
                        >
                        @error('MaPhieuDV')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Mã dịch vụ -->
                    <div class="mb-3">
                        <label for="MaDV" class="form-label">Mã dịch vụ</label>
                        <select class="form-select" id="MaDV" name="MaDV" required>
                            <option value="">-- Chọn dịch vụ --</option>
                            @foreach ($dichvus as $dichvu)
                                <option 
                                    value="{{ $dichvu->MaDV }}"
                                    data-dongia="{{ $dichvu->DonGia }}"
                                    {{ old('MaDV') == $dichvu->MaDV ? 'selected' : '' }}
                                >
                                    {{ $dichvu->TenDV }}
                                </option>
                            @endforeach
                        </select>
                        @error('MaDV')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Số Lượng -->
                    <div class="mb-3">
                        <label for="SoLuong" class="form-label">Số Lượng</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="SoLuong" 
                            name="SoLuong" 
                            placeholder="VD: 2" 
                            required
                            min="0"
                            value="{{ old('SoLuong') }}"
                        >
                        @error('SoLuong')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Đơn Giá -->
                    <div class="mb-3">
                        <label for="DonGia" class="form-label">Đơn Giá</label>
                        <input 
                            type="number" 
                            class="form-control" 
                            id="DonGia" 
                            name="DonGia" 
                            placeholder="Đơn giá sẽ tự động hiển thị" 
                            readonly
                            required
                            value="{{ old('DonGia') }}"
                        >
                        @error('DonGia')
                            <div class="text-danger mt-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <!-- Nút Lưu / Hủy -->
                    <div class="d-flex justify-content-between">
                        <button type="submit" class="btn btn-success">
                            Lưu
                        </button>
                        <a href="{{ route('chitietphieu.index') }}" class="btn btn-secondary">
                            Hủy
                        </a>
                    </div>
                </form>
                <!-- Form kết thúc -->
            </div>
        </div>
    </div>

    <script>
        // Khi chọn dịch vụ, tự động gán đơn giá vào ô DonGia
        $('#MaDV').change(function() {
            var donGia = $(this).find(':selected').data('dongia');
            $('#DonGia').val(donGia || '');
        });
    </script>
</body>
</html>
