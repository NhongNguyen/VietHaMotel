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
        Schema::create('hinh_anh_phong_tros', function (Blueprint $table) {
            $table->id();
            $table->integer('id_phong_tro');
            $table->string('srcHinhAnh');
            $table->string('srcHinhAnh');
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
        Schema::dropIfExists('hinh_anh_phong_tros');
    }
};
