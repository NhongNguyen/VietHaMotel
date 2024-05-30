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
        Schema::create('khach_thues', function (Blueprint $table) {
            $table->id();
            $table->string('hoKhach');
            $table->string('tenKhach');
            $table->string('ngaySinh');
            $table->string('queQuan');
            $table->string('noiThuongTru');
            $table->string('gioiTinh');
            $table->string('hoKhach');
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
        Schema::dropIfExists('khach_thues');
    }
};
