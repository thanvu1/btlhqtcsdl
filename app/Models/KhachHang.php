<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KhachHang extends Model
{
    use HasFactory;

    protected $table = 'khachhang';
    protected $primaryKey = 'MaKH';
    public $timestamps = false;
    // protected $keyType = 'string';
    protected $keyType = 'string';  // Định nghĩa kiểu khóa chính là chuỗi
    public $incrementing = false; // Không tự tăng

    protected $fillable = ['MaKH', 'HoTen', 'NgaySinh', 'SDT', 'QuocTich'];

    // Quan hệ 1:N với PHIEUTHUE
    public function phieuThue()
    {
        return $this->hasMany(PhieuThue::class, 'MaKH', 'MaKH');
    }
}