<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LoaiPhong extends Model
{
    use HasFactory;

    protected $table = 'loaiphong';
    protected $primaryKey = 'MaLP';
    public $timestamps = false;
    public $incrementing = false; // Không tự tăng
    protected $keyType = 'string';  // Định nghĩa kiểu khóa chính là chuỗi

    protected $fillable = ['MaLP', 'TenLP', 'LoaiGiuong', 'DonGia'];
    
    // Quan hệ 1:N với bảng PHONG
    public function phong()
    {
        return $this->hasMany(Phong::class, 'MaLP', 'MaLP');
    }
}
