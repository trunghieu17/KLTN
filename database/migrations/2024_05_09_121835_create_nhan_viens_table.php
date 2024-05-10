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
        Schema::create('nhan_viens', function (Blueprint $table) {
            $table->id();
            $table->string('ho_ten');
            $table->string('email');
            $table->string('code')->nullable();
            $table->string('so_dien_thoai');
            $table->string('so_can_cuoc');
            $table->date('ngay_sinh')->nullable();
            $table->integer('gioi_tinh');
            $table->text('que_quan');
            $table->text('thuong_tru');
            $table->integer('id_chuc_vu');
            $table->integer('id_phong_ban');
            $table->integer('id_loai_nhan_vien');
            $table->integer('is_tai_khoan')->default(0);
            $table->integer('is_master')->default(0);
            $table->integer('id_bang_cap')->nullable();
            $table->string('password')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nhan_viens');
    }
};
