<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',             // username atau nickname
        'nama_lengkap',     // nama lengkap
        'email',
        'password',
        'role',             // admin/user
        'no_hp',            // nomor handphone
        'alamat',           // alamat user
        'tanggal_lahir',    // tanggal lahir
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'tanggal_lahir' => 'date',
    ];

    public function pemesanans()
    {
        return $this->hasMany(Pemesanan::class, 'user_id');
    }
}
