<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhieuDichVu extends Model
{
    use HasFactory;

    protected $table = 'phieudichvu';
    protected $primaryKey = 'MaPhieuDV';
    public $timestamps = false;
    protected $keyType = 'string';  // Định nghĩa kiểu khóa chính là chuỗi
    public $incrementing = false; // Không tự tăng

    protected $fillable = ['MaPhieuDV', 'NgayLap', 'TongTien', 'MaPT'];

    // Quan hệ 1:N với CHITIETPHIEUDICHVU
    public function chiTietPhieuDichVu()
    {
        return $this->hasMany(ChiTietPhieuDichVu::class, 'MaPhieuDV', 'MaPhieuDV');
    }
}
