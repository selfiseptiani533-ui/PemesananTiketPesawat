<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;

    // Nama tabel jika tidak standar plural model
    protected $table = 'pembayarans';

    // Kolom yang bisa diisi massal
    protected $fillable = [
        'pemesanan_id',
        'metode_pembayaran',
        'bukti_pembayaran',
        'status',
        'jumlah',        // opsional, jika ditambahkan di migrasi
        'tanggal_bayar'  // opsional, jika ditambahkan di migrasi
    ];

    // Cast tipe data otomatis
    protected $casts = [
        'tanggal_bayar' => 'date',
        'jumlah' => 'integer',
    ];

    // Relasi ke pemesanan
    public function pemesanan()
    {
        return $this->belongsTo(Pemesanan::class, 'pemesanan_id');
    }
}
