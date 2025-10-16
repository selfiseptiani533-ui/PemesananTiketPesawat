<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Kelola User - Admin Panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

  <!-- Header -->
  <header class="bg-gray-800 p-4 text-white flex justify-between items-center">
    <div class="text-lg font-semibold">Admin Panel</div>
    <form action="{{ route('logout') }}" method="POST">
      @csrf
      <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Logout</button>
    </form>
  </header>

  <!-- Main Content -->
  <main class="p-6 max-w-6xl mx-auto">
    <div class="flex justify-between items-center mb-6">
      <h1 class="text-2xl font-bold text-gray-700">Kelola User</h1>
      <a href="{{ route('admin.user.create') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
        Tambah User
      </a>
    </div>

    @if(session('success'))
      <div class="bg-green-100 text-green-800 p-3 rounded mb-4 border border-green-300">
        {{ session('success') }}
      </div>
    @endif

    <div class="overflow-x-auto bg-white rounded shadow border border-gray-200">
      <table class="min-w-full border-collapse">
        <thead class="bg-gray-100 text-gray-700">
          <tr>
            <th class="py-3 px-4 text-left border-b">Nama</th>
            <th class="py-3 px-4 text-left border-b">Email</th>
            <th class="py-3 px-4 text-left border-b">Role</th>
            <th class="py-3 px-4 text-left border-b">No HP</th>
            <th class="py-3 px-4 text-left border-b">Aksi</th>
          </tr>
        </thead>
        <tbody>
          @forelse($users as $u)
          <tr class="hover:bg-gray-50">
            <td class="py-2 px-4 border-b">{{ $u->name ?? $u->nama_lengkap }}</td>
            <td class="py-2 px-4 border-b">{{ $u->email }}</td>
            <td class="py-2 px-4 border-b capitalize">{{ $u->role }}</td>
            <td class="py-2 px-4 border-b">{{ $u->no_hp ?? '-' }}</td>
            <td class="py-2 px-4 border-b">
              <a href="{{ route('admin.user.edit', $u->id) }}" class="text-blue-600 hover:underline mr-3">Edit</a>
              <form action="{{ route('admin.user.destroy', $u->id) }}" method="POST" class="inline-block" onsubmit="return confirm('Yakin ingin menghapus user ini?')">
                @csrf
                @method('DELETE')
                <button type="submit" class="text-red-600 hover:underline">Hapus</button>
              </form>
            </td>
          </tr>
          @empty
          <tr>
            <td colspan="5" class="text-center py-4 text-gray-500">Belum ada data user.</td>
          </tr>
          @endforelse
        </tbody>
      </table>
    </div>

    <div class="mt-6">
      <a href="{{ route('admin.dashboard') }}" class="text-blue-600 hover:underline">← Kembali ke Dashboard</a>
    </div>
  </main>

</body>
</html>
