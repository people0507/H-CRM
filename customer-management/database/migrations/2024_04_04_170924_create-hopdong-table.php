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
        Schema::create('HopDong', function (Blueprint $table) {
            $table->bigIncrements('id_hd');
            $table->string('ten_hd');
            $table->string('dich_vu_su_dung',100);
            $table->date('ngay_ky_hd');
            $table->date('ngay_hieu_luc');
            $table->date('ngay_het_han_hd');
            $table->string('tep_tin');
            $table->unsignedBigInteger('id_kh_fk');
            $table->foreign('id_kh_fk')->references('id_kh')->on('KhachHang');
            $table->unsignedBigInteger('id_nv_fk');
            $table->foreign('id_nv_fk')->references('id_nv')->on('NhanVien');
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
        Schema::dropIfExists('HopDong');

    }
};
