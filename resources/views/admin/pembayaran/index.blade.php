<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - List Pembayaran</title>
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
        
        .btn-update {
            background: linear-gradient(to right, #10b981, #059669);
            color: white;
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn-update:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 10px rgba(16, 185, 129, 0.3);
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
        
        .status-waiting {
            background: linear-gradient(135deg, #fbbf24, #f59e0b);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        
        .status-accepted {
            background: linear-gradient(135deg, #10b981, #059669);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }
        
        .status-rejected {
            background: linear-gradient(135deg, #ef4444, #dc2626);
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
        
        .form-select {
            border: 1px solid var(--primary-pink);
            border-radius: 8px;
            padding: 6px 12px;
            background: white;
            transition: all 0.3s ease;
        }
        
        .form-select:focus {
            border-color: var(--accent-pink);
            box-shadow: 0 0 0 2px rgba(231, 84, 128, 0.2);
            outline: none;
        }
        
        .badge-id {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            color: white;
            padding: 4px 8px;
            border-radius: 12px;
            font-weight: 600;
            font-size: 0.7rem;
        }
    </style>
</head>
<body class="p-6">
    <div class="max-w-7xl mx-auto fade-in">
        <!-- Header dengan Tombol Kembali -->
        <div class="flex flex-col md:flex-row justify-between items-start md:items-center mb-8">
            <div class="flex items-center space-x-4 mb-4 md:mb-0">
                <a href="{{ url()->previous() }}" class="btn-back px-4 py-3 flex items-center mr-4">
                    <i class="fas fa-arrow-left mr-2"></i> Kembali
                </a>
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center pulse-animation shadow-lg">
                    <i class="fas fa-credit-card text-pink-600 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-pink-800">Manajemen Pembayaran</h1>
                    <p class="text-pink-600">Panel Administrasi Air Force One</p>
                </div>
            </div>
            <div class="flex items-center space-x-2 text-pink-700">
                <i class="fas fa-info-circle"></i>
                <span class="text-sm">Total: {{ $list->count() }} pembayaran</span>
            </div>
        </div>
        
        <!-- Stats Cards -->
        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
            <div class="stats-card p-6 text-center">
                <div class="text-3xl font-bold text-pink-600 mb-2">{{ $list->count() }}</div>
                <div class="text-gray-600 font-medium">Total Pembayaran</div>
            </div>
            <div class="stats-card p-6 text-center">
                <div class="text-3xl font-bold text-yellow-600 mb-2">
                    {{ $list->where('status', 'Menunggu Verifikasi')->count() }}
                </div>
                <div class="text-gray-600 font-medium">Menunggu Verifikasi</div>
            </div>
            <div class="stats-card p-6 text-center">
                <div class="text-3xl font-bold text-green-600 mb-2">
                    {{ $list->where('status', 'Diterima')->count() }}
                </div>
                <div class="text-gray-600 font-medium">Diterima</div>
            </div>
            <div class="stats-card p-6 text-center">
                <div class="text-3xl font-bold text-red-600 mb-2">
                    {{ $list->where('status', 'Ditolak')->count() }}
                </div>
                <div class="text-gray-600 font-medium">Ditolak</div>
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
        
        <!-- Table Container -->
        <div class="admin-container overflow-hidden">
            <div class="scroll-container">
                <table class="w-full">
                    <thead>
                        <tr class="table-header">
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-hashtag mr-2"></i>ID
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-user mr-2"></i>User
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-plane mr-2"></i>Penerbangan
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-couch mr-2"></i>Kelas
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-wallet mr-2"></i>Metode
                            </th>
                            <th class="px-6 py-4 text-left font-semibold uppercase tracking-wider">
                                <i class="fas fa-receipt mr-2"></i>Bukti
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
                        @forelse($list as $p)
                        <tr class="table-row">
                            <!-- ID -->
                            <td class="px-6 py-4">
                                <span class="badge-id">#{{ $p->id }}</span>
                            </td>
                            
                            <!-- User -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-pink-200 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-user text-pink-700 text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-800 text-sm">{{ $p->pemesanan->user->name }}</div>
                                        <div class="text-xs text-gray-500">User ID: {{ $p->pemesanan->user->id }}</div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Penerbangan -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <div class="w-8 h-8 bg-blue-200 rounded-full flex items-center justify-center mr-3">
                                        <i class="fas fa-plane text-blue-700 text-xs"></i>
                                    </div>
                                    <div>
                                        <div class="font-medium text-gray-800 text-sm">{{ $p->pemesanan->penerbangan->kode_penerbangan }}</div>
                                        <div class="text-xs text-gray-500">{{ $p->pemesanan->penerbangan->maskapai }}</div>
                                    </div>
                                </div>
                            </td>
                            
                            <!-- Kelas -->
                            <td class="px-6 py-4">
                                <div class="bg-purple-100 text-purple-700 px-3 py-1 rounded-lg font-medium text-sm inline-block">
                                    {{ $p->pemesanan->kelas->nama_kelas }}
                                </div>
                            </td>
                            
                            <!-- Metode Pembayaran -->
                            <td class="px-6 py-4">
                                <div class="flex items-center">
                                    <i class="fas fa-credit-card text-green-500 mr-2 text-sm"></i>
                                    <span class="font-medium text-gray-800 text-sm">{{ $p->metode_pembayaran }}</span>
                                </div>
                            </td>
                            
                            <!-- Bukti Pembayaran -->
                            <td class="px-6 py-4">
                                <a href="{{ asset('storage/'.$p->bukti_pembayaran) }}" target="_blank" 
                                   class="btn-primary px-3 py-2 flex items-center text-sm w-fit">
                                    <i class="fas fa-eye mr-1"></i> Lihat Bukti
                                </a>
                            </td>
                            
                            <!-- Status -->
                            <td class="px-6 py-4">
                                @if($p->status === 'Menunggu Verifikasi')
                                    <span class="status-waiting">
                                        <i class="fas fa-clock mr-1"></i>{{ $p->status }}
                                    </span>
                                @elseif($p->status === 'Diterima')
                                    <span class="status-accepted">
                                        <i class="fas fa-check-circle mr-1"></i>{{ $p->status }}
                                    </span>
                                @else
                                    <span class="status-rejected">
                                        <i class="fas fa-times-circle mr-1"></i>{{ $p->status }}
                                    </span>
                                @endif
                            </td>
                            
                            <!-- Aksi -->
                            <td class="px-6 py-4">
                                <form action="{{ route('admin.pembayaran.update', $p->id) }}" method="POST" class="flex flex-col space-y-2">
                                    @csrf
                                    <select name="status" class="form-select text-sm">
                                        <option value="Menunggu Verifikasi" @if($p->status=='Menunggu Verifikasi') selected @endif>Menunggu Verifikasi</option>
                                        <option value="Diterima" @if($p->status=='Diterima') selected @endif>Diterima</option>
                                        <option value="Ditolak" @if($p->status=='Ditolak') selected @endif>Ditolak</option>
                                    </select>
                                    <button type="submit" class="btn-update px-3 py-2 flex items-center justify-center text-sm">
                                        <i class="fas fa-sync-alt mr-1"></i> Update
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="px-6 py-12 text-center">
                                <div class="flex flex-col items-center justify-center text-gray-500">
                                    <i class="fas fa-credit-card text-6xl mb-4 text-pink-300"></i>
                                    <p class="text-xl font-medium mb-2">Belum Ada Pembayaran</p>
                                    <p class="text-pink-600">Tidak ada data pembayaran yang ditemukan.</p>
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
            <p>Total {{ $list->count() }} pembayaran • 
               <span class="text-yellow-600">{{ $list->where('status', 'Menunggu Verifikasi')->count() }} menunggu</span> • 
               <span class="text-green-600">{{ $list->where('status', 'Diterima')->count() }} diterima</span> • 
               <span class="text-red-600">{{ $list->where('status', 'Ditolak')->count() }} ditolak</span>
            </p>
        </div>
    </div>

    <script>
        // Animasi untuk form update
        document.addEventListener('DOMContentLoaded', function() {
            const updateForms = document.querySelectorAll('form[action*="pembayaran.update"]');
            
            updateForms.forEach(form => {
                form.addEventListener('submit', function(e) {
                    const button = this.querySelector('button[type="submit"]');
                    const originalText = button.innerHTML;
                    
                    button.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i> Memproses...';
                    button.disabled = true;
                    
                    setTimeout(() => {
                        button.innerHTML = originalText;
                        button.disabled = false;
                    }, 2000);
                });
            });
        });
    </script>
</body>
</html>