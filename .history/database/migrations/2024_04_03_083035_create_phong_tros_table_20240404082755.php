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
            $table->integer('id_khach_thue');
            $table->integer('id_thanh_vien');
            $table->string('')
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
