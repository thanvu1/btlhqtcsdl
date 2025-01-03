<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Phong extends Model
{
    use HasFactory;

    protected $table = 'phong';
    protected $primaryKey = 'MaPhong';
    public $timestamps = false;

    protected $fillable = ['MaPhong', 'TenPhong', 'TinhTrang', 'MaLP', 'GhiChu'];

    // Quan hệ N:1 với LOAIPHONG
    public function loaiPhong()
    {
        return $this->belongsTo(LoaiPhong::class, 'MaLP', 'MaLP');
    }

    // Quan hệ 1:N với PHIEUTHUE
    public function phieuThue()
    {
        return $this->hasMany(PhieuThue::class, 'MaPhong', 'MaPhong');
    }
}