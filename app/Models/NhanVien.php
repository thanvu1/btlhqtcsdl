<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NhanVien extends Model
{
    use HasFactory;

    protected $table = 'nhanvien';
    protected $primaryKey = 'MaNV';
    public $timestamps = false;

    protected $fillable = ['TenNV', 'NgaySinh', 'GioiTinh', 'SDT', 'CCCD', 'ChucVu', 'Luong', 'MaBP'];

    // Quan hệ N:1 với BOPHAN
    public function boPhan()
    {
        return $this->belongsTo(BoPhan::class, 'MaBP', 'MaBP');
    }

    // Quan hệ 1:N với PHIEUTHUE
    public function phieuThue()
    {
        return $this->hasMany(PhieuThue::class, 'MaNV', 'MaNV');
    }
}
