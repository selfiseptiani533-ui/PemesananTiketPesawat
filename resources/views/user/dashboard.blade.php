<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50 min-h-screen flex flex-col">
    <header class="bg-blue-600 p-4 text-white flex justify-between items-center">
        <div class="font-semibold text-lg">Dashboard User</div>
        <form action="{{ route('logout') }}" method="POST">
            @csrf
            <button type="submit" class="bg-red-500 hover:bg-red-600 px-3 py-1 rounded transition">
                Logout
            </button>
        </form>
    </header>

    <main class="p-6 flex-1">
        <h2 class="text-2xl font-semibold mb-4">Selamat datang, {{ auth()->user()?->name ?? 'User' }}</h2>
        <div class="space-x-2">
            <a href="{{ route('pemesanan.index') }}" class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded transition">
                Pemesanan Saya
            </a>
            <a href="{{ route('home') }}" class="text-blue-600 hover:underline px-4 py-2">
                Lihat Penerbangan
            </a>
        </div>
    </main>
</body>
</html>
