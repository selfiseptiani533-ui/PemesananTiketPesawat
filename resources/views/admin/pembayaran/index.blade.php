<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - List Pembayaran</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">
<div class="max-w-7xl mx-auto">

    <h1 class="text-3xl font-bold mb-6 text-center">Daftar Pembayaran</h1>

    @if(session('success'))
        <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-2 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    <div class="overflow-x-auto">
        <table class="min-w-full bg-white rounded-lg shadow overflow-hidden">
            <thead class="bg-blue-600 text-white">
                <tr>
                    <th class="px-4 py-2">ID</th>
                    <th class="px-4 py-2">User</th>
                    <th class="px-4 py-2">Penerbangan</th>
                    <th class="px-4 py-2">Kelas</th>
                    <th class="px-4 py-2">Metode</th>
                    <th class="px-4 py-2">Bukti</th>
                    <th class="px-4 py-2">Status</th>
                    <th class="px-4 py-2">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($list as $p)
                <tr class="border-b hover:bg-gray-50 transition">
                    <td class="px-4 py-2 text-center">{{ $p->id }}</td>
                    <td class="px-4 py-2 text-center">{{ $p->pemesanan->user->name }}</td>
                    <td class="px-4 py-2 text-center">{{ $p->pemesanan->penerbangan->kode_penerbangan }}</td>
                    <td class="px-4 py-2 text-center">{{ $p->pemesanan->kelas->nama_kelas }}</td>
                    <td class="px-4 py-2 text-center">{{ $p->metode_pembayaran }}</td>
                    <td class="px-4 py-2 text-center">
                        <a href="{{ asset('storage/'.$p->bukti_pembayaran) }}" target="_blank" class="text-blue-600 hover:underline">Lihat</a>
                    </td>
                    <td class="px-4 py-2 text-center">{{ $p->status }}</td>
                    <td class="px-4 py-2 text-center">
                        <form action="{{ route('admin.pembayaran.update', $p->id) }}" method="POST" class="flex justify-center gap-2">
                            @csrf
                            <select name="status" class="border px-2 py-1 rounded">
                                <option value="Menunggu Verifikasi" @if($p->status=='Menunggu Verifikasi') selected @endif>Menunggu</option>
                                <option value="Diterima" @if($p->status=='Diterima') selected @endif>Diterima</option>
                                <option value="Ditolak" @if($p->status=='Ditolak') selected @endif>Ditolak</option>
                            </select>
                            <button type="submit" class="bg-green-600 hover:bg-green-700 text-white px-2 py-1 rounded">Update</button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="px-4 py-4 text-center text-gray-500">
                        Belum ada pembayaran.
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
</body>
</html>
