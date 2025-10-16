<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">
<header class="bg-gray-800 p-4 text-white flex justify-between items-center">
  <div class="text-lg font-semibold">Admin Panel</div>
  <form action="{{ route('logout') }}" method="POST">
    @csrf
    <button class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded">Logout</button>
  </form>
</header>

<main class="p-6">
  <h1 class="text-2xl mb-4 font-bold">Dashboard Admin</h1>

  <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
    <div class="bg-white p-4 rounded shadow">
      <div class="text-gray-500 text-sm">Total User</div>
      <div class="text-2xl font-semibold">{{ $totalUser }}</div>
    </div>
    <div class="bg-white p-4 rounded shadow">
      <div class="text-gray-500 text-sm">Total Penerbangan</div>
      <div class="text-2xl font-semibold">{{ $totalPenerbangan }}</div>
    </div>
    <div class="bg-white p-4 rounded shadow">
      <div class="text-gray-500 text-sm">Total Pemesanan</div>
      <div class="text-2xl font-semibold">{{ $totalPemesanan }}</div>
    </div>
    <div class="bg-white p-4 rounded shadow">
      <div class="text-gray-500 text-sm">Pembayaran Menunggu</div>
      <div class="text-2xl font-semibold">{{ $pembayaranMenunggu }}</div>
    </div>
  </div>

  <div class="mt-8 flex flex-wrap gap-3">
    <a href="{{ route('admin.user.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded shadow">
      Kelola User
    </a>
    <a href="{{ route('admin.penerbangan.index') }}" class="bg-blue-600 hover:bg-blue-700 text-white px-4 py-2 rounded shadow">
      Kelola Penerbangan
    </a>
    <a href="{{ route('admin.pembayaran.index') }}" class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded shadow">
      Kelola Pembayaran
    </a>
    <a href="{{ route('home') }}" class="text-blue-600 hover:underline px-4 py-2">
      Lihat Situs
    </a>
  </div>
</main>
</body>
</html>
