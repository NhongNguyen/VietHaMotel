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
        Schema::create('chi_tiet_hoa_dons', function (Blueprint $table) {
            $table->id();
            $table->integer('id_hoa_don');
            $table->integer('id__don');
            $table->integer('soNgaythue');
            $table->enum('DaThanhToan',["Đã thanh toán"],["Chưa thanh toán"]);
            $table->timestamp('ngayLapHoaDon');
            $table->decimal('thanhTien',10,2);
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
        Schema::dropIfExists('chi_tiet_hoa_dons');
    }
};