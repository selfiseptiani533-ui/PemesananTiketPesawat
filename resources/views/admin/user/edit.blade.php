<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User - Admin Panel</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-50">

    <!-- Header -->
    <header class="bg-gray-800 p-4 text-white flex justify-between items-center">
        <h1 class="text-lg font-semibold">Admin Panel</h1>
        <a href="{{ route('admin.user.index') }}" class="text-sm bg-gray-700 px-3 py-1 rounded hover:bg-gray-600">Kembali</a>
    </header>

    <!-- Main Content -->
    <main class="max-w-lg mx-auto mt-10 bg-white p-6 rounded shadow">
        <h2 class="text-2xl font-semibold mb-6 text-gray-800">Edit User</h2>

        <form action="{{ route('admin.user.update', $user->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Username</label>
                <input type="text" name="name" value="{{ $user->name }}" class="w-full border px-3 py-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Nama Lengkap</label>
                <input type="text" name="nama_lengkap" value="{{ $user->nama_lengkap }}" class="w-full border px-3 py-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Email</label>
                <input type="email" name="email" value="{{ $user->email }}" class="w-full border px-3 py-2 rounded focus:ring-2 focus:ring-blue-500" required>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Password <span class="text-sm text-gray-500">(kosongkan jika tidak ingin ubah)</span></label>
                <input type="password" name="password" class="w-full border px-3 py-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Role</label>
                <select name="role" class="w-full border px-3 py-2 rounded focus:ring-2 focus:ring-blue-500">
                    <option value="user" @selected($user->role == 'user')>User</option>
                    <option value="admin" @selected($user->role == 'admin')>Admin</option>
                </select>
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">No HP</label>
                <input type="text" name="no_hp" value="{{ $user->no_hp }}" class="w-full border px-3 py-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="mb-4">
                <label class="block mb-1 text-gray-700">Alamat</label>
                <textarea name="alamat" class="w-full border px-3 py-2 rounded focus:ring-2 focus:ring-blue-500" rows="3">{{ $user->alamat }}</textarea>
            </div>

            <div class="mb-6">
                <label class="block mb-1 text-gray-700">Tanggal Lahir</label>
                <input type="date" name="tanggal_lahir" value="{{ $user->tanggal_lahir }}" class="w-full border px-3 py-2 rounded focus:ring-2 focus:ring-blue-500">
            </div>

            <div class="flex justify-end space-x-2">
                <a href="{{ route('admin.user.index') }}" class="px-4 py-2 rounded border border-gray-400 text-gray-600 hover:bg-gray-100">Batal</a>
                <button type="submit" class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">Update</button>
            </div>
        </form>
    </main>

</body>
</html>
