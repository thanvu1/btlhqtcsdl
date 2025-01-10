<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ChiTietPhieuDichVu extends Model
{
    use HasFactory;

    protected $table = 'chitietphieudichvu';
    public $timestamps = false;
    protected $keyType = 'string';  // Định nghĩa kiểu khóa chính là chuỗi
    public $incrementing = false; // Không tự tăng
    protected $primaryKey = null;

    protected $fillable = ['MaPhieuDV', 'MaDV', 'SoLuong', 'DonGia'];

    // Quan hệ N:1 với PHIEUDICHVU
    public function phieuDichVu()
    {
        return $this->belongsTo(PhieuDichVu::class, 'MaPhieuDV', 'MaPhieuDV');
    }

    // Quan hệ N:1 với DICHVU
    public function dichVu()
    {
        return $this->belongsTo(DichVu::class, 'MaDV', 'MaDV');
    }
}
