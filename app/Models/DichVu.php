<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DichVu extends Model
{
    use HasFactory;

    protected $table = 'dichvu';
    protected $primaryKey = 'MaDV';
    public $timestamps = false;
    protected $keyType = 'string';  // Định nghĩa kiểu khóa chính là chuỗi
    public $incrementing = false; // Không tự tăng

    protected $fillable = ['MaDV', 'TenDV', 'DonGia'];

    // Quan hệ N:N với PHIEUTHUE qua CHITIETPHIEUDICHVU
    public function phieuThue()
    {
        return $this->belongsToMany(PhieuThue::class, 'chitietphieudichvu', 'MaDV', 'MaPhieuDV')
                    ->withPivot('SoLuong', 'DonGia');
    }
}

