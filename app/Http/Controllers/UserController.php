<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Penerbangan;

class UserController extends Controller
{
    public function dashboard() {
        return view('user.dashboard');
    }

    public function daftarPenerbangan() {
        $penerbangan = Penerbangan::with('kelas')->get();
        return view('penerbangan.list', compact('penerbangan'));
    }
}
