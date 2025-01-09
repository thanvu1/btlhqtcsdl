
<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDichVuTable extends Migration
{
    public function up()
    {
        Schema::create('dichvu', function (Blueprint $table) {
            $table->string('MaDV', 10)->primary(); // Mã dịch vụ (khóa chính)
            $table->string('TenDV', 50); // Tên dịch vụ
            $table->float('DonGia'); // Đơn giá dịch vụ
            $table->timestamps(); // Thêm cột created_at và updated_at
        });
    }

    public function down()
    {
        Schema::dropIfExists('dichvu');
    }
}
