<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pemesanans', function (Blueprint $table) {
            $table->id();
            $table->string('kode_pemesanan')->unique(); // kode unik pemesanan
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('penerbangan_id')->constrained('penerbangans')->onDelete('cascade');
            $table->foreignId('kelas_id')->constrained('kelas_penerbangans')->onDelete('cascade');
            $table->integer('jumlah_tiket')->default(1);
            $table->integer('total_harga')->default(0);
            $table->enum('status',['Pending','Dikonfirmasi','Dibatalkan'])->default('Pending');
            $table->date('tanggal_pesan')->nullable(); // tanggal pemesanan
            $table->text('catatan')->nullable(); // catatan tambahan
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pemesanans');
    }
};
