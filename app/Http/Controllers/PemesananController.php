<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pemesanan;
use App\Models\KelasPenerbangan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class PemesananController extends Controller
{
    // Tampilkan daftar pemesanan user
    public function index() {
        $data = Auth::user()->pemesanans()->with('penerbangan','kelas','pembayaran')->get();
        return view('user.pemesanan.index', compact('data'));
    }

    // Form pemesanan berdasarkan kelas
    public function create($kelas_id) {
        $kelas = KelasPenerbangan::with('penerbangan')->findOrFail($kelas_id);
        return view('user.pemesanan.create', compact('kelas'));
    }

    // Simpan pemesanan
    public function store(Request $request) {
        $request->validate([
            'kelas_id' => 'required|exists:kelas_penerbangans,id',
            'jumlah_tiket' => 'required|integer|min:1',
            'catatan' => 'nullable|string'
        ]);

        $kelas = KelasPenerbangan::findOrFail($request->kelas_id);

        if($request->jumlah_tiket > $kelas->sisa_kursi){
            return back()->withErrors(['jumlah_tiket' => 'Jumlah tiket melebihi sisa kursi.'])->withInput();
        }

        $totalHarga = $kelas->harga * $request->jumlah_tiket;

        // Buat pemesanan
        $pemesanan = Pemesanan::create([
            'kode_pemesanan' => 'PN-' . Str::upper(Str::random(6)),
            'user_id' => Auth::id(),
            'penerbangan_id' => $kelas->penerbangan_id,
            'kelas_id' => $kelas->id,
            'jumlah_tiket' => $request->jumlah_tiket,
            'total_harga' => $totalHarga,
            'status' => 'Pending',
            'tanggal_pesan' => now(),
            'catatan' => $request->catatan,
        ]);

        // Kurangi sisa kursi
        $kelas->sisa_kursi -= $request->jumlah_tiket;
        $kelas->save();

        return redirect()->route('pemesanan.index')->with('success','Pemesanan berhasil dibuat.');
    }
}
