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
        Schema::create('kebersihan_ruangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('ruangan_id')->constrained('ruangans')->onDelete('cascade');
            $table->date('tanggal_check');
            $table->string('foto_bukti')->nullable();
            $table->boolean('is_completed')->default(false);
            $table->boolean('paraf_pengawas')->default(false);
            $table->enum('hasil_pekerjaan', ['baik', 'cukup', 'kurang'])->nullable();
            $table->timestamp('waktu_validasi')->nullable();
            $table->foreignId('pengawas_id')->nullable()->constrained('users')->onDelete('set null');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('kebersihan_ruangans');
    }
};
