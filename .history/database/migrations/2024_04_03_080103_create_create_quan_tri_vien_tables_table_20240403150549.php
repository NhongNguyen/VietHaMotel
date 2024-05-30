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
        Schema::create('quan_tri_viens', function (Blueprint $table) {
            $table->id();
            $table->string('SDT');
            $table->string('matKhau');
            $table->string('hoQTV');
            $table->string('tenQTV');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('create_quan_tri_vien_tables');
    }
};
