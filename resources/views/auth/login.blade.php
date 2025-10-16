<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <title>Login Lion Air</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 flex items-center justify-center min-h-screen">
  <div class="bg-white p-6 rounded shadow w-96">
    <h1 class="text-2xl font-bold mb-4">Login</h1>

    <!-- Tampilkan error jika login gagal -->
    @if(session('error'))
      <div class="text-red-600 mb-3">{{ session('error') }}</div>
    @endif

    <form action="{{ route('login') }}" method="POST">@csrf
      <label>Email</label>
      <input type="email" name="email" required class="w-full border p-2 mb-3">

      <label>Password</label>
      <input type="password" name="password" required class="w-full border p-2 mb-3">

      <button class="bg-blue-600 text-white px-4 py-2 rounded w-full">Login</button>
    </form>

    <p class="mt-3 text-sm">
      Belum punya akun? 
      <a href="{{ route('register') }}" class="text-blue-600">Register</a>
    </p>
  </div>
</body>
</html>
