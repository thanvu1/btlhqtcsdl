<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuThue extends Model
{
    use HasFactory;

    protected $table = 'phieuthue';
    protected $primaryKey = 'MaPT';
    public $timestamps = false;

    protected $fillable = ['MaPT', 'MaPhong', 'MaKH', 'NgayThue', 'NgayTra', 'GiaMotNgay', 'MaNV'];

    // Quan hệ N:1 với PHONG
    public function phong()
    {
        return $this->belongsTo(Phong::class, 'MaPhong', 'MaPhong');
    }

    // Quan hệ N:1 với KHACHHANG
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'MaKH', 'MaKH');
    }

    // Quan hệ N:1 với NHANVIEN
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV');
    }

    // Quan hệ 1:1 với HOADONTHANHTOAN
    public function hoaDonThanhToan()
    {
        return $this->hasOne(HoaDonThanhToan::class, 'MaPT', 'MaPT');
    }

    // Quan hệ N-N với DICHVU qua CHITIETPHIEUDICHVU
    public function dichVu()
    {
        return $this->belongsToMany(DichVu::class, 'chitietphieudichvu', 'MaPhieuDV', 'MaDV')
                    ->withPivot('SoLuong', 'DonGia');
    }
}
