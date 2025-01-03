<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BoPhan extends Model
{
    use HasFactory;

    protected $table = 'bophan';
    protected $primaryKey = 'MaBP';
    public $timestamps = false;

    protected $fillable = ['MaBP', 'TenBP', 'MoTa'];

    // Quan hệ 1:N với NHANVIEN
    public function nhanVien()
    {
        return $this->hasMany(NhanVien::class, 'MaBP', 'MaBP');
    }
}
