<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('KhachHang', function (Blueprint $table) {
            $table->bigIncrements('id_kh');
            $table->string('ten_kh',50);
            $table->string('sdt',10);
            $table->string('dia_chi');
            $table->date('ngay_sinh_kh');
            $table->string('email',100);
            $table->boolean('gioi_tinh');
            $table->string('cccd',12);
            $table->string('nganh_nghe',100);
            $table->boolean('trang_thai');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('KhachHang');
    }
};
