<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('thuong_phats', function (Blueprint $table) {
            $table->id();
            $table->integer('id_nhan_vien');
            $table->integer('the_loai')->comment("1: Thưởng, 0: Phạt");
            $table->date('ngay_ghi_nhan');
            $table->double('tien_thuong');
            $table->string('ly_do');
            $table->text('ghi_chu')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('thuong_phats');
    }
};
