<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HoaDonThanhToan extends Model
{
    use HasFactory;

    protected $table = 'hoadonthanhtoan';
    protected $primaryKey = 'MaHD';
    public $timestamps = false;

    protected $fillable = ['NgayLap', 'TenKH', 'MaKH', 'MaNV', 'MaPT', 'TongTien'];

    // Quan hệ N:1 với PHIEUTHUE
    public function phieuThue()
    {
        return $this->belongsTo(PhieuThue::class, 'MaPT', 'MaPT');
    }
    
    public function khachHang()
    {
        return $this->belongsTo(KhachHang::class, 'MaKH');
    }
    public function nhanVien()
    {
        return $this->belongsTo(NhanVien::class, 'MaNV', 'MaNV'); // Khóa ngoại và khóa nội bộ
    }
}
