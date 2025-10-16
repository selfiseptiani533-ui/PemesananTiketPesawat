<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Invoice #{{ $pemesanan->id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-6">
<div class="max-w-2xl mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-2xl font-bold mb-4">Invoice Pemesanan #{{ $pemesanan->id }}</h1>

    <div class="mb-4">
        <h2 class="font-semibold">Penerbangan:</h2>
        <p>{{ $pemesanan->penerbangan->kode_penerbangan }} | {{ $pemesanan->penerbangan->asal }} → {{ $pemesanan->penerbangan->tujuan }}</p>
        <p>Berangkat: {{ \Carbon\Carbon::parse($pemesanan->penerbangan->waktu_berangkat)->format('d M Y H:i') }}</p>
        <p>Tiba: {{ \Carbon\Carbon::parse($pemesanan->penerbangan->waktu_tiba)->format('d M Y H:i') }}</p>
    </div>

    <div class="mb-4">
        <h2 class="font-semibold">Kelas & Jumlah:</h2>
        <p>{{ $pemesanan->kelas->nama_kelas }} — {{ $pemesanan->jumlah_tiket }} tiket</p>
        <p>Harga per tiket: Rp {{ number_format($pemesanan->kelas->harga,0,',','.') }}</p>
        <p class="font-semibold">Total: Rp {{ number_format($pemesanan->total_harga,0,',','.') }}</p>
    </div>

    <div class="mb-4">
        <h2 class="font-semibold">Status Pembayaran:</h2>
        <p class="text-green-600 font-semibold">{{ $pemesanan->pembayaran->status }}</p>
    </div>

    <div class="mt-6">
        <p>Terima kasih telah melakukan pembayaran. Simpan halaman ini sebagai bukti pemesanan.</p>
    </div>
</div>
</body>
</html>
