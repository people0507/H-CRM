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
        Schema::create('NhanVien', function (Blueprint $table) {
            $table->bigIncrements('id_nv');
            $table->string('ten_nv',50);
            $table->string('sdt',10);
            $table->string('dia_chi');
            $table->string('tai_khoan');
            $table->string('mat_khau');
            $table->boolean('vai_tro');
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
        Schema::dropIfExists('NhanVien');
    }
};
