<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Kelola User - Admin Panel</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
    
    :root {
      --primary-pink: #f8c8dc;
      --secondary-pink: #f5a6c6;
      --accent-pink: #e75480;
      --dark-pink: #d63384;
      --light-pink: #fdf2f8;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, var(--light-pink) 0%, var(--primary-pink) 100%);
      min-height: 100vh;
    }
    
    .admin-container {
      background: rgba(255, 255, 255, 0.9);
      backdrop-filter: blur(10px);
      border-radius: 20px;
      box-shadow: 0 15px 35px rgba(214, 51, 132, 0.2);
      border: 1px solid rgba(255, 255, 255, 0.5);
    }
    
    .table-header {
      background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
      color: white;
    }
    
    .table-row {
      transition: all 0.3s ease;
      border-bottom: 1px solid #f8c8dc;
    }
    
    .table-row:hover {
      background: rgba(248, 200, 220, 0.2);
      transform: translateY(-2px);
      box-shadow: 0 5px 15px rgba(214, 51, 132, 0.1);
    }
    
    .btn-primary {
      background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
      color: white;
      border-radius: 12px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(214, 51, 132, 0.4);
    }
    
    .btn-edit {
      background: linear-gradient(to right, #3b82f6, #1d4ed8);
      color: white;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-edit:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 10px rgba(59, 130, 246, 0.3);
    }
    
    .btn-delete {
      background: linear-gradient(to right, #ef4444, #dc2626);
      color: white;
      border-radius: 8px;
      font-weight: 500;
      transition: all 0.3s ease;
    }
    
    .btn-delete:hover {
      transform: translateY(-1px);
      box-shadow: 0 4px 10px rgba(239, 68, 68, 0.3);
    }
    
    .btn-back {
      background: linear-gradient(to right, #6b7280, #4b5563);
      color: white;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(107, 114, 128, 0.3);
    }
    
    .btn-back:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(107, 114, 128, 0.4);
    }
    
    .role-admin {
      background: linear-gradient(135deg, #8b5cf6, #7c3aed);
      color: white;
      padding: 4px 12px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 0.75rem;
    }
    
    .role-user {
      background: linear-gradient(135deg, #10b981, #059669);
      color: white;
      padding: 4px 12px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 0.75rem;
    }
    
    .fade-in {
      animation: fadeIn 0.8s ease-in-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .pulse-animation {
      animation: pulse 2s infinite;
    }
    
    @keyframes pulse {
      0% {
        box-shadow: 0 0 0 0 rgba(230, 84, 128, 0.7);
      }
      70% {
        box-shadow: 0 0 0 10px rgba(230, 84, 128, 0);
      }
      100% {
        box-shadow: 0 0 0 0 rgba(230, 84, 128, 0);
      }
    }
    
    .scroll-container {
      max-height: 70vh;
      overflow-y: auto;
    }
    
    .scroll-container::-webkit-scrollbar {
      width: 8px;
    }
    
    .scroll-container::-webkit-scrollbar-track {
      background: var(--light-pink);
      border-radius: 10px;
    }
    
    .scroll-container::-webkit-scrollbar-thumb {
      background: var(--accent-pink);
      border-radius: 10px;
    }
    
    .scroll-container::-webkit-scrollbar-thumb:hover {
      background: var(--dark-pink);
    }
    
    .stats-card {
      background: rgba(255, 255, 255, 0.8);
      border-radius: 16px;
      border: 1px solid rgba(255, 255, 255, 0.5);
      box-shadow: 0 8px 25px rgba(214, 51, 132, 0.1);
    }
    
    .user-avatar {
      background: linear-gradient(135deg, var(--accent-pink), var(--dark-pink));
      color: white;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      font-weight: 600;
    }
  </style>
</head>
<body class="p-6">
  <div class="max-w-7xl mx-auto fade-in">
    <!-- Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
      <div class="flex items-center space-x-4 mb-4 md:mb-0">
        <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center pulse-animation shadow-lg">
          <i class="fas fa-users-cog text-pink-600 text-2xl"></i>
        </div>
        <div>
          <h1 class="text-3xl font-bold text-pink-800">Kelola User</h1>
          <p class="text-pink-600">Panel Administrasi Air Force One</p>
        </div>
      </div>
      <div class="flex items-center space-x-4">
        <a href="{{ route('admin.dashboard') }}" class="btn-back px-4 py-3 flex items-center">
          <i class="fas fa-arrow-left mr-2"></i> Dashboard
        </a>
        <form action="{{ route('logout') }}" method="POST">
          @csrf
          <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-3 rounded-lg font-semibold transition-all flex items-center shadow-md">
            <i class="fas fa-sign-out-alt mr-2"></i> Logout
          </button>
        </form>
      </div>
    </div>
    
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
      <div class="stats-card p-6 text-center">
        <div class="text-3xl font-bold text-pink-600 mb-2">{{ $users->count() }}</div>
        <div class="text-gray-600 font-medium">Total User</div>
      </div>
      <div class="stats-card p-6 text-center">
        <div class="text-3xl font-bold text-purple-600 mb-2">
          {{ $users->where('role', 'admin')->count() }}
        </div>
        <div class="text-gray-600 font-medium">Admin</div>
      </div>
      <div class="stats-card p-6 text-center">
        <div class="text-3xl font-bold text-green-600 mb-2">
          {{ $users->where('role', 'user')->count() }}
        </div>
        <div class="text-gray-600 font-medium">User</div>
      </div>
      <div class="stats-card p-6 text-center">
        <div class="text-3xl font-bold text-blue-600 mb-2">
          {{ $users->where('no_hp', '!=', null)->count() }}
        </div>
        <div class="text-gray-600 font-medium">Memiliki No HP</div>
      </div>
    </div>

    <!-- Success Message -->
    @if(session('success'))
      <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 rounded-lg mb-6 flex items-center">
        <i class="fas fa-check-circle text-green-500 text-xl mr-3"></i>
        <div>
          <p class="font-semibold">Berhasil!</p>
          <p>{{ session('success') }}</p>
        </div>
      </div>
    @endif
    
    <!-- Action Header -->
    <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-6">
      <div class="flex items-center space-x-2 text-pink-700 mb-4 md:mb-0">
        <i class="fas fa-info-circle"></i>
        <span class="text-sm">Total: {{ $users->count() }} user</span>
      </div>
      <a href="{{ route('admin.user.create') }}" class="btn-primary px-6 py-3 flex items-center">
        <i class="fas fa-user-plus mr-2"></i> Tambah User Baru
      </a>
    </div>
    
    <!-- Table Container -->
    <div class="admin-container overflow-hidden">
      <div class="scroll-container">
        <table class="w-full">
          <thead>
            <tr class="table-header">
              <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                <i class="fas fa-user mr-2"></i>User
              </th>
              <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                <i class="fas fa-envelope mr-2"></i>Email
              </th>
              <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                <i class="fas fa-shield-alt mr-2"></i>Role
              </th>
              <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                <i class="fas fa-phone mr-2"></i>No HP
              </th>
              <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                <i class="fas fa-cogs mr-2"></i>Aksi
              </th>
            </tr>
          </thead>
          <tbody class="divide-y divide-pink-100">
            @forelse($users as $u)
            <tr class="table-row">
              <!-- User Info -->
              <td class="px-6 py-4">
                <div class="flex items-center">
                  <div class="user-avatar mr-3">
                    {{ substr(($u->name ?? $u->nama_lengkap), 0, 1) }}
                  </div>
                  <div>
                    <div class="font-medium text-gray-800 text-sm">{{ $u->name ?? $u->nama_lengkap }}</div>
                    <div class="text-xs text-gray-500">ID: {{ $u->id }}</div>
                  </div>
                </div>
              </td>
              
              <!-- Email -->
              <td class="px-6 py-4">
                <div class="flex items-center">
                  <i class="fas fa-envelope text-gray-400 mr-2 text-sm"></i>
                  <span class="font-medium text-gray-800 text-sm">{{ $u->email }}</span>
                </div>
              </td>
              
              <!-- Role -->
              <td class="px-6 py-4">
                @if($u->role === 'admin')
                  <span class="role-admin">
                    <i class="fas fa-crown mr-1"></i>{{ ucfirst($u->role) }}
                  </span>
                @else
                  <span class="role-user">
                    <i class="fas fa-user mr-1"></i>{{ ucfirst($u->role) }}
                  </span>
                @endif
              </td>
              
              <!-- No HP -->
              <td class="px-6 py-4">
                <div class="flex items-center">
                  <i class="fas fa-phone text-gray-400 mr-2 text-sm"></i>
                  <span class="font-medium text-gray-800 text-sm">{{ $u->no_hp ?? '-' }}</span>
                </div>
              </td>
              
              <!-- Aksi -->
              <td class="px-6 py-4">
                <div class="flex space-x-2">
                  <a href="{{ route('admin.user.edit', $u->id) }}" 
                     class="btn-edit px-3 py-2 flex items-center text-sm">
                    <i class="fas fa-edit mr-1"></i> Edit
                  </a>
                  <form action="{{ route('admin.user.destroy', $u->id) }}" method="POST" 
                        onsubmit="return confirm('Apakah Anda yakin ingin menghapus user {{ $u->name ?? $u->nama_lengkap }}?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn-delete px-3 py-2 flex items-center text-sm">
                      <i class="fas fa-trash mr-1"></i> Hapus
                    </button>
                  </form>
                </div>
              </td>
            </tr>
            @empty
            <tr>
              <td colspan="5" class="px-6 py-12 text-center">
                <div class="flex flex-col items-center justify-center text-gray-500">
                  <i class="fas fa-users text-6xl mb-4 text-pink-300"></i>
                  <p class="text-xl font-medium mb-2">Belum Ada User</p>
                  <p class="text-pink-600 mb-4">Mulai dengan menambahkan user pertama Anda</p>
                  <a href="{{ route('admin.user.create') }}" class="btn-primary px-6 py-3 inline-flex items-center">
                    <i class="fas fa-user-plus mr-2"></i> Tambah User Pertama
                  </a>
                </div>
              </td>
            </tr>
            @endforelse
          </tbody>
        </table>
      </div>
    </div>
    
    <!-- Footer Info -->
    <div class="mt-6 text-center text-gray-500 text-sm">
      <p>Total {{ $users->count() }} user • 
         <span class="text-purple-600">{{ $users->where('role', 'admin')->count() }} admin</span> • 
         <span class="text-green-600">{{ $users->where('role', 'user')->count() }} user</span>
      </p>
    </div>
  </div>

  <script>
    // Konfirmasi penghapusan dengan sweet alert sederhana
    document.addEventListener('DOMContentLoaded', function() {
      const deleteForms = document.querySelectorAll('form[onsubmit]');
      
      deleteForms.forEach(form => {
        form.onsubmit = function(e) {
          e.preventDefault();
          const userName = form.closest('tr').querySelector('.font-medium').textContent;
          if(confirm(`Apakah Anda yakin ingin menghapus user "${userName}"? Tindakan ini tidak dapat dibatalkan.`)) {
            form.submit();
          }
        };
      });
    });
  </script>
</body>
</html>