<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penerbangan - Admin</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <h1 class="text-2xl font-bold mb-4">Daftar Penerbangan</h1>
    <a href="{{ route('admin.penerbangan.create') }}" class="bg-green-600 text-white px-3 py-1 rounded mb-4 inline-block">Tambah Penerbangan</a>

   <table class="table-auto w-full border border-gray-300">
    <thead class="bg-gray-200">
        <tr>
            <th class="border px-2 py-1">Kode</th>
            <th class="border px-2 py-1">Maskapai</th>
            <th class="border px-2 py-1">Asal</th>
            <th class="border px-2 py-1">Tujuan</th>
            <th class="border px-2 py-1">Berangkat</th>
            <th class="border px-2 py-1">Tiba</th>
            <th class="border px-2 py-1">Harga</th>
            <th class="border px-2 py-1">Kursi</th>
            <th class="border px-2 py-1">Status</th>
            <th class="border px-2 py-1">Aksi</th>
        </tr>
    </thead>
    <tbody>
        @foreach($penerbangans as $p)
        <tr>
            <td class="border px-2 py-1">{{ $p->kode_penerbangan }}</td>
            <td class="border px-2 py-1">{{ $p->maskapai }}</td>
            <td class="border px-2 py-1">{{ $p->asal }}</td>
            <td class="border px-2 py-1">{{ $p->tujuan }}</td>
            <td class="border px-2 py-1">{{ $p->waktu_berangkat }}</td>
            <td class="border px-2 py-1">{{ $p->waktu_tiba }}</td>
            <td class="border px-2 py-1">{{ number_format($p->harga,0,',','.') }}</td>
            <td class="border px-2 py-1">{{ $p->kursi_tersedia }}</td>
            <td class="border px-2 py-1">
                @if($p->status === 'Aktif')
                    <span class="text-green-600 font-semibold">{{ $p->status }}</span>
                @else
                    <span class="text-red-600 font-semibold">{{ $p->status }}</span>
                @endif
            </td>
            <td class="border px-2 py-1 flex gap-1">
                <a href="{{ route('admin.penerbangan.edit',$p->id) }}" class="bg-blue-600 text-white px-2 py-1 rounded">Edit</a>
                <form action="{{ route('admin.penerbangan.destroy',$p->id) }}" method="POST" onsubmit="return confirm('Hapus data ini?')">
                    @csrf
                    @method('DELETE')
                    <button class="bg-red-600 text-white px-2 py-1 rounded">Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
