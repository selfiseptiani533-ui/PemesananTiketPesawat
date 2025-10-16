<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('pembayarans', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pemesanan_id')
                  ->constrained('pemesanans')
                  ->onDelete('cascade');
            $table->string('metode_pembayaran')->nullable(); // contoh: Transfer, COD, E-Wallet
            $table->string('bukti_pembayaran')->nullable();  // path file di storage/public
            $table->enum('status', ['Menunggu Verifikasi','Diterima','Ditolak'])
                  ->default('Menunggu Verifikasi');
            $table->integer('jumlah')->nullable();           // tambahan: jumlah bayar
            $table->date('tanggal_bayar')->nullable();       // tambahan: tanggal bayar
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('pembayarans');
    }
};
