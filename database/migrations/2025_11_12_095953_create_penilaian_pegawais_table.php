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
        Schema::create('penilaian_pegawais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('employee_id') // Pegawai yang dinilai
                  ->constrained('employees')
                  ->onDelete('cascade');
            $table->text('isi_penilaian');
            $table->string('periode_penilaian'); // Contoh: "2025-Q1"
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penilaian_pegawais');
    }
};
