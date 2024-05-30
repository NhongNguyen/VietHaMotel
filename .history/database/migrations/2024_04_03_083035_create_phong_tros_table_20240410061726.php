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
        Schema::create('phong_tros', function (Blueprint $table) {
            $table->id();
            $table->integer('id_loai_phong');
            $table->integer('id_khach_thue')->default(null);
            $table->integer('id_thanh_vien')->default(null);
            $table->string('tenPhong');
            $table->enum('tinhTrang',['Hết phòng','Còn trống']);
            $table->string('moTa')->default(null);
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
        Schema::dropIfExists('phong_tros');
    }
};
