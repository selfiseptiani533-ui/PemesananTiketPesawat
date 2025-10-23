<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Penerbangan - Admin</title>
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
            border-radius: 10px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(214, 51, 132, 0.3);
        }
        
        .btn-primary:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(214, 51, 132, 0.4);
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
        
        .status-active {
            background: linear-gradient(135deg, #a8e6cf 0%, #56ab2f 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        
        .status-inactive {
            background: linear-gradient(135deg, #ff9a9e 0%, #f5576c 100%);
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
    </style>
</head>
<body class="p-6">
    <div class="max-w-7xl mx-auto fade-in">
        <!-- Header -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center pulse-animation shadow-lg">
                    <i class="fas fa-plane-departure text-pink-600 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-pink-800">Daftar Penerbangan</h1>
                    <p class="text-pink-600">Panel Administrasi Air Force One</p>
                </div>
            </div>
            <a href="{{ route('admin.penerbangan.create') }}" class="btn-primary px-6 py-3 flex items-center text-lg">
                <i class="fas fa-plus-circle mr-2"></i> Tambah Penerbangan
            </a>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="stats-card p-6 text-center">
                <div class="text-3xl font-bold text-pink-600 mb-2">{{ $penerbangans->count() }}</div>
                <div class="text-gray-600 font-medium">Total Penerbangan</div>
            </div>
            <div class="stats-card p-6 text-center">
                <div class="text-3xl font-bold text-green-600 mb-2">
                    {{ $penerbangans->where('status', 'Aktif')->count() }}
                </div>
                <div class="text-gray-600 font-medium">Penerbangan Aktif</div>
            </div>
            <div class="stats-card p-6 text-center">
                <div class="text-3xl font-bold text-red-600 mb-2">
                    {{ $penerbangans->where('status', 'Dibatalkan')->count() }}
                </div>
                <div class="text-gray-600 font-medium">Penerbangan Dibatalkan</div>
            </div>
            <div class="stats-card p-6 text-center">
                <div class="text-3xl font-bold text-blue-600 mb-2">
                    {{ $penerbangans->sum('kursi_tersedia') }}
                </div>
                <div class="text-gray-600 font-medium">Total Kursi Tersedia</div>
            </div>
        </div>
        
        <!-- Table Container -->
        <div class="admin-container overflow-hidden">
            <div class="scroll-container">
                <table class="w-full">
                    <thead>
                        <tr class="table-header">
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-hashtag mr-2"></i>Kode
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-plane mr-2"></i>Maskapai
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-route mr-2"></i>Rute
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-clock mr-2"></i>Jadwal
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-tag mr-2"></i>Harga
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-chair mr-2"></i>Kursi
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-info-circle mr-2"></i>Status
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-cogs mr-2"></i>Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-pink-100">
                        @foreach($penerbangans as $p)
                        <tr class="table-row">
                            <!-- Kode Penerbangan -->
                            <td class="px-6 py-4">
                                <div class="font-bold text-pink-700 text-sm">{{ $p->kode_penerbangan }}</div>
                            </td>
                            
                            <!-- Maskapai -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-pink-200 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-plane text-pink-700 text-xs"></i>
                                    </div>
                                    <span class="font-medium text-gray-800">{{ $p->maskapai }}</span>
                                </div>
                            </td>
                            
                            <!-- Rute -->
                            <td class="px-6 py-4">
                                <div class="flex items-center space-x-2">
                                    <div class="text-center">
                                        <div class="font-bold text-pink-700 text-sm">{{ substr($p->asal, 0, 3) }}</div>
                                        <div class="text-xs text-gray-500">{{ $p->asal }}</div>
                                    </div>
                                    <i class="fas fa-arrow-right text-pink-400 text-xs"></i>
                                    <div class="text-center">
                                        <div class="font-bold text-pink-700 text-sm">{{ substr($p->tujuan, 0, 3) }}</div>
                                        <div class="text-xs text-gray-500">{{ $p->tujuan }}</div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Jadwal -->
                            <td class="px-6 py-4">
                                <div class="text-sm">
                                    <div class="font-medium text-gray-800">
                                        {{ \Carbon\Carbon::parse($p->waktu_berangkat)->format('d M Y') }}
                                    </div>
                                    <div class="text-xs text-gray-500">
                                        {{ \Carbon\Carbon::parse($p->waktu_berangkat)->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($p->waktu_tiba)->format('H:i') }}
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Harga -->
                            <td class="px-6 py-4">
                                <div class="bg-pink-100 text-pink-700 px-3 py-1 rounded-lg font-bold text-sm inline-block">
                                    Rp {{ number_format($p->harga,0,',','.') }}
                                </div>
                            </td>
                            
                            <!-- Kursi Tersedia -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <i class="fas fa-chair text-gray-400 mr-2 text-sm"></i>
                                    <span class="font-medium text-gray-800">{{ $p->kursi_tersedia }}</span>
                                </div>
                            </td>
                            
                            <!-- Status -->
                            <td class="px-6 py-4">
                                @if($p->status === 'Aktif')
                                    <span class="status-active">
                                        <i class="fas fa-check-circle mr-1"></i>{{ $p->status }}
                                    </span>
                                @else
                                    <span class="status-inactive">
                                        <i class="fas fa-times-circle mr-1"></i>{{ $p->status }}
                                    </span>
                                @endif
                            </td>
                            
                            <!-- Aksi -->
                            <td class="px-6 py-4">
                                <div class="flex space-x-2">
                                    <a href="{{ route('admin.penerbangan.edit',$p->id) }}" 
                                       class="btn-edit px-3 py-2 flex items-center text-sm">
                                        <i class="fas fa-edit mr-1"></i> Edit
                                    </a>
                                    <form action="{{ route('admin.penerbangan.destroy',$p->id) }}" method="POST" 
                                          onsubmit="return confirm('Apakah Anda yakin ingin menghapus penerbangan {{ $p->kode_penerbangan }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-delete px-3 py-2 flex items-center text-sm">
                                            <i class="fas fa-trash mr-1"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <!-- Empty State -->
            @if($penerbangans->count() == 0)
            <div class="text-center py-12">
                <i class="fas fa-plane-slash text-6xl text-pink-300 mb-4"></i>
                <h3 class="text-xl font-medium text-gray-600 mb-2">Belum Ada Penerbangan</h3>
                <p class="text-gray-500 mb-6">Mulai dengan menambahkan penerbangan pertama Anda</p>
                <a href="{{ route('admin.penerbangan.create') }}" class="btn-primary px-6 py-3 inline-flex items-center">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Penerbangan Pertama
                </a>
            </div>
            @endif
        </div>
        
        <!-- Footer Info -->
        <div class="mt-6 text-center text-gray-500 text-sm">
            <p>Total {{ $penerbangans->count() }} penerbangan ditemukan • 
               <span class="text-green-600">{{ $penerbangans->where('status', 'Aktif')->count() }} aktif</span> • 
               <span class="text-red-600">{{ $penerbangans->where('status', 'Dibatalkan')->count() }} dibatalkan</span>
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
                    const flightCode = form.closest('tr').querySelector('td:first-child div').textContent;
                    if(confirm(`Apakah Anda yakin ingin menghapus penerbangan ${flightCode}? Tindakan ini tidak dapat dibatalkan.`)) {
                        form.submit();
                    }
                };
            });
        });
    </script>
</body>
</html>