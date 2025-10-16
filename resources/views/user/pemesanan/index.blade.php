<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pemesanan Saya</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="p-6 bg-gray-50">
  <h1 class="text-2xl font-bold mb-4">Pemesanan Saya</h1>

  <div class="overflow-x-auto">
    <table class="w-full bg-white rounded shadow">
      <thead class="bg-gray-100">
        <tr>
          <th class="p-2 text-left">ID</th>
          <th class="p-2 text-left">Penerbangan</th>
          <th class="p-2 text-left">Kelas</th>
          <th class="p-2 text-left">Jumlah</th>
          <th class="p-2 text-left">Total</th>
          <th class="p-2 text-left">Status</th>
          <th class="p-2 text-left">Aksi</th>
        </tr>
      </thead>
      <tbody>
        @forelse($data as $d)
        <tr class="border-t">
          <td class="p-2">{{ $d->id }}</td>
          <td class="p-2">{{ $d->penerbangan->kode_penerbangan }} ({{ $d->penerbangan->asal }}→{{ $d->penerbangan->tujuan }})</td>
          <td class="p-2">{{ $d->kelas->nama_kelas }}</td>
          <td class="p-2">{{ $d->jumlah_tiket }}</td>
          <td class="p-2">Rp {{ number_format($d->total_harga,0,',','.') }}</td>
          <td class="p-2">{{ $d->status }}</td>
          <td class="p-2">
            @if(!$d->pembayaran)
              <a href="{{ route('pembayaran.create', $d->id) }}" class="text-blue-600 font-semibold hover:underline">Bayar</a>
            @elseif($d->pembayaran->status === 'Diterima')
              <a href="{{ route('invoice.show', $d->id) }}" class="text-green-600 font-semibold hover:underline">Invoice</a>
            @else
              <span class="text-gray-600">{{ $d->pembayaran->status }}</span>
            @endif
          </td>
        </tr>
        @empty
        <tr>
          <td colspan="7" class="p-2 text-center text-gray-500">Belum ada pemesanan</td>
        </tr>
        @endforelse
      </tbody>
    </table>
  </div>
</body>
</html>
