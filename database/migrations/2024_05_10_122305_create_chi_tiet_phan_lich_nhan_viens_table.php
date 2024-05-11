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
        Schema::create('chi_tiet_phan_lich_nhan_viens', function (Blueprint $table) {
            $table->id();
            $table->integer('id_ca');
            $table->integer('id_phong_ban');
            $table->integer('id_nhan_vien');
            $table->integer('thu');
            $table->date('ngay_lam');
            $table->integer('is_check')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('chi_tiet_phan_lich_nhan_viens');
    }
};
