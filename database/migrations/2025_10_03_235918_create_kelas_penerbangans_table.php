<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('kelas_penerbangans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('penerbangan_id')
                  ->constrained('penerbangans')
                  ->onDelete('cascade');
            $table->string('nama_kelas'); // Lebih fleksibel daripada enum
            $table->integer('harga')->default(0);
            $table->integer('jumlah_kursi')->default(0);
            $table->integer('sisa_kursi')->default(0);
            $table->text('deskripsi')->nullable();  // tambahan
            $table->text('fasilitas')->nullable();  // tambahan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('kelas_penerbangans');
    }
};
