<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan Tiket</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 p-6">
  <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
    <h1 class="text-xl font-bold mb-4">
      Pesan Tiket — {{ $kelas->penerbangan->asal }} → {{ $kelas->penerbangan->tujuan }}
    </h1>

    <p class="mb-2">
      Kelas: <span class="font-semibold">{{ $kelas->nama_kelas }}</span> — 
      Harga per Tiket: <span class="font-semibold">Rp {{ number_format($kelas->harga,0,',','.') }}</span> — 
      Sisa: <span class="font-semibold">{{ $kelas->sisa_kursi }}</span>
    </p>

    @if ($errors->any())
      <div class="mb-3 p-3 bg-red-100 text-red-700 rounded">
        <ul class="list-disc list-inside">
          @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
          @endforeach
        </ul>
      </div>
    @endif

    <form action="{{ route('pemesanan.store') }}" method="POST" class="mt-4">
      @csrf
      <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">

      <label class="block mb-1 font-semibold">Jumlah Tiket</label>
      <input type="number" 
             id="jumlah_tiket"
             name="jumlah_tiket" 
             min="1" 
             max="{{ $kelas->sisa_kursi }}" 
             value="{{ old('jumlah_tiket', 1) }}" 
             class="w-full border p-2 mb-3 rounded">

      <label class="block mb-1 font-semibold">Catatan (opsional)</label>
      <textarea name="catatan" class="w-full border p-2 mb-3 rounded">{{ old('catatan') }}</textarea>

      <p class="mb-3">
        Total Harga: <span id="total_harga" class="font-semibold">Rp {{ number_format($kelas->harga,0,',','.') }}</span>
      </p>

      <input type="hidden" name="total_harga" id="hidden_total_harga" value="{{ $kelas->harga }}">

      <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">
        Pesan
      </button>
    </form>
  </div>

  <script>
    const jumlahInput = document.getElementById('jumlah_tiket');
    const totalHargaEl = document.getElementById('total_harga');
    const hiddenTotalInput = document.getElementById('hidden_total_harga');
    const hargaTiket = {{ $kelas->harga }};

    jumlahInput.addEventListener('input', () => {
      let jumlah = parseInt(jumlahInput.value) || 1;
      jumlah = Math.max(1, Math.min(jumlah, {{ $kelas->sisa_kursi }}));
      let total = jumlah * hargaTiket;
      totalHargaEl.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
      hiddenTotalInput.value = total;
    });
  </script>
</body>
</html>
