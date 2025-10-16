<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Register Lion Air</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white p-6 rounded shadow w-96">
    <h1 class="text-2xl font-bold mb-4">Register</h1>

    <!-- Tampilkan error jika ada -->
    @if ($errors->any())
      <div class="mb-3 text-red-600">
        <ul>@foreach($errors->all() as $e)<li>{{ $e }}</li>@endforeach</ul>
      </div>
    @endif

    <form action="{{ route('register') }}" method="POST">@csrf
      <label>Username</label>
      <input type="text" name="name" required class="w-full border p-2 mb-3">

      <label>Nama Lengkap</label>
      <input type="text" name="nama_lengkap" required class="w-full border p-2 mb-3">

      <label>Email</label>
      <input type="email" name="email" required class="w-full border p-2 mb-3">

      <label>No HP</label>
      <input type="text" name="no_hp" required class="w-full border p-2 mb-3">

      <label>Alamat</label>
      <textarea name="alamat" rows="2" required class="w-full border p-2 mb-3"></textarea>

      <label>Tanggal Lahir</label>
      <input type="date" name="tanggal_lahir" required class="w-full border p-2 mb-3">

      <label>Password</label>
      <input type="password" name="password" required class="w-full border p-2 mb-3">

      <label>Konfirmasi Password</label>
      <input type="password" name="password_confirmation" required class="w-full border p-2 mb-3">

      <button class="bg-green-600 text-white px-4 py-2 rounded w-full">Register</button>
    </form>

    <p class="mt-3 text-sm">Sudah punya akun? <a href="{{ route('login') }}" class="text-blue-600">Login</a></p>
  </div>
</body>
</html>
