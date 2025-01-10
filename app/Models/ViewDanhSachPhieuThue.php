<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ViewDanhSachPhieuThue extends Model
{
    protected $table = 'vw_DanhSachPhieuThue';

    // View không có primary key, thêm thuộc tính này
    protected $primaryKey = null;
    public $incrementing = false;

    // Nếu view chỉ đọc, thêm bảo vệ này
    public $timestamps = false;
}
