<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah User</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100 min-h-screen p-6">

    <header class="bg-gray-800 text-white p-4 mb-6 flex justify-between items-center">
        <h1 class="text-lg font-semibold">Admin Panel - Tambah User</h1>
        <a href="{{ route('admin.user.index') }}" class="bg-blue-500 px-3 py-1 rounded">Kembali</a>
    </header>

    <main>
        <div class="max-w-lg mx-auto bg-white p-6 rounded shadow">
            <h1 class="text-xl mb-4 font-semibold">Tambah User</h1>
            <form action="{{ route('admin.user.store') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label class="block mb-1 font-medium">Username</label>
                    <input type="text" name="name" class="w-full border px-2 py-1 rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block mb-1 font-medium">Nama Lengkap</label>
                    <input type="text" name="nama_lengkap" class="w-full border px-2 py-1 rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block mb-1 font-medium">Email</label>
                    <input type="email" name="email" class="w-full border px-2 py-1 rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block mb-1 font-medium">Password</label>
                    <input type="password" name="password" class="w-full border px-2 py-1 rounded" required>
                </div>
                <div class="mb-3">
                    <label class="block mb-1 font-medium">Role</label>
                    <select name="role" class="w-full border px-2 py-1 rounded">
                        <option value="user">User</option>
                        <option value="admin">Admin</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label class="block mb-1 font-medium">No HP</label>
                    <input type="text" name="no_hp" class="w-full border px-2 py-1 rounded">
                </div>
                <div class="mb-3">
                    <label class="block mb-1 font-medium">Alamat</label>
                    <textarea name="alamat" class="w-full border px-2 py-1 rounded"></textarea>
                </div>
                <div class="mb-3">
                    <label class="block mb-1 font-medium">Tanggal Lahir</label>
                    <input type="date" name="tanggal_lahir" class="w-full border px-2 py-1 rounded">
                </div>
                <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700 transition">Simpan</button>
            </form>
        </div>
    </main>

</body>
</html>
