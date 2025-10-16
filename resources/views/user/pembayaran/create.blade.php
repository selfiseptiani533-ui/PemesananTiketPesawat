<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Pembayaran</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-50">
<div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
  <h1 class="text-xl mb-3">Pembayaran untuk Pesanan #{{ $pemesanan->id }}</h1>
  <p>Total: Rp {{ number_format($pemesanan->total_harga,0,',','.') }}</p>

  @if ($errors->any())
    <div class="mb-3 p-3 bg-red-100 text-red-700 rounded">
      <ul class="list-disc list-inside">
        @foreach ($errors->all() as $error)
          <li>{{ $error }}</li>
        @endforeach
      </ul>
    </div>
  @endif

  <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="pemesanan_id" value="{{ $pemesanan->id }}">
    <input type="hidden" name="jumlah" value="{{ $pemesanan->total_harga }}">
    <input type="hidden" name="tanggal_bayar" value="{{ now()->format('Y-m-d') }}">

    <label class="block mb-1 font-semibold">Metode Pembayaran</label>
    <select name="metode_pembayaran" class="w-full border p-2 mb-3 rounded" required>
      <option value="">-- Pilih Metode --</option>
      <option value="Transfer">Transfer Bank</option>
      <option value="E-Wallet">E-Wallet</option>
    </select>

    <label class="block mb-1 font-semibold">Upload Bukti (jpg/png)</label>
    <input type="file" name="bukti_pembayaran" accept="image/*" class="w-full mb-3" required>

    <button class="bg-green-600 text-white px-3 py-1 rounded hover:bg-green-700 transition">
      Kirim Bukti
    </button>
  </form>
</div>
</body>
</html>
