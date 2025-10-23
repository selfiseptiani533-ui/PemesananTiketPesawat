<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <title>Admin Dashboard - Air Force One</title>
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
      --text-dark: #4a044e;
    }
    
    body {
      font-family: 'Poppins', sans-serif;
      background: linear-gradient(135deg, var(--light-pink) 0%, var(--primary-pink) 100%);
      min-height: 100vh;
    }
    
    .navbar-gradient {
      background: linear-gradient(to right, var(--dark-pink), var(--accent-pink));
      box-shadow: 0 4px 20px rgba(214, 51, 132, 0.3);
    }
    
    .card-gradient {
      background: linear-gradient(145deg, #ffffff, var(--primary-pink));
      border: 1px solid rgba(255, 255, 255, 0.5);
    }
    
    .stat-card {
      transition: all 0.3s ease;
      border-radius: 16px;
      overflow: hidden;
      position: relative;
    }
    
    .stat-card:hover {
      transform: translateY(-5px);
      box-shadow: 0 10px 25px rgba(214, 51, 132, 0.2);
    }
    
    .stat-card::before {
      content: '';
      position: absolute;
      top: 0;
      left: 0;
      right: 0;
      height: 4px;
      background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
    }
    
    .stat-icon {
      width: 50px;
      height: 50px;
      border-radius: 12px;
      display: flex;
      align-items: center;
      justify-content: center;
      font-size: 24px;
      margin-bottom: 15px;
    }
    
    .btn-pink {
      background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
      color: white;
      padding: 12px 24px;
      border-radius: 12px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 10px rgba(214, 51, 132, 0.3);
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    
    .btn-pink:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 15px rgba(214, 51, 132, 0.4);
    }
    
    .btn-outline-pink {
      background: transparent;
      color: var(--accent-pink);
      border: 2px solid var(--accent-pink);
      padding: 10px 22px;
      border-radius: 12px;
      font-weight: 600;
      transition: all 0.3s ease;
      display: inline-flex;
      align-items: center;
      gap: 8px;
    }
    
    .btn-outline-pink:hover {
      background: var(--accent-pink);
      color: white;
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
    
    .fade-in {
      animation: fadeIn 0.8s ease-in-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
    }
    
    .stagger-animation > * {
      opacity: 0;
      animation: fadeIn 0.5s ease-out forwards;
    }
    
    .stagger-animation > *:nth-child(1) { animation-delay: 0.1s; }
    .stagger-animation > *:nth-child(2) { animation-delay: 0.2s; }
    .stagger-animation > *:nth-child(3) { animation-delay: 0.3s; }
    .stagger-animation > *:nth-child(4) { animation-delay: 0.4s; }
    
    .dashboard-title {
      position: relative;
      display: inline-block;
      margin-bottom: 30px;
    }
    
    .dashboard-title::after {
      content: '';
      position: absolute;
      bottom: -10px;
      left: 0;
      width: 100%;
      height: 4px;
      background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
      border-radius: 2px;
    }
  </style>
</head>
<body class="min-h-screen">
<header class="navbar-gradient text-white p-4 shadow-lg">
  <div class="max-w-7xl mx-auto flex justify-between items-center">
    <div class="flex items-center space-x-3">
      <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center pulse-animation">
        <i class="fas fa-plane-departure text-pink-600 text-xl"></i>
      </div>
      <div>
        <div class="text-xl font-bold tracking-wide">Air Force One</div>
        <div class="text-sm opacity-80">Admin Dashboard</div>
      </div>
    </div>
    <div class="flex items-center space-x-4">
      <div class="text-sm bg-white/20 px-3 py-1 rounded-full">
        <i class="fas fa-user-circle mr-2"></i>Admin
      </div>
      <form action="{{ route('logout') }}" method="POST">
        @csrf
        <button class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-md flex items-center">
          <i class="fas fa-sign-out-alt mr-2"></i>Logout
        </button>
      </form>
    </div>
  </div>
</header>

<main class="p-6 max-w-7xl mx-auto">
  <h1 class="text-3xl font-bold text-gray-800 mb-6 dashboard-title fade-in">Dashboard Admin</h1>

  <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8 stagger-animation">
    <div class="stat-card card-gradient p-6 shadow-lg">
      <div class="stat-icon" style="background: linear-gradient(135deg, #a8e6cf, #56ab2f); color: white;">
        <i class="fas fa-users"></i>
      </div>
      <div class="text-gray-500 text-sm font-medium">Total User</div>
      <div class="text-3xl font-bold text-gray-800 mt-2">{{ $totalUser }}</div>
      <div class="text-xs text-gray-500 mt-2 flex items-center">
        <i class="fas fa-arrow-up text-green-500 mr-1"></i> 
        <span class="text-green-500">+12%</span> dari bulan lalu
      </div>
    </div>
    
    <div class="stat-card card-gradient p-6 shadow-lg">
      <div class="stat-icon" style="background: linear-gradient(135deg, #ffd8cb, #ff9a76); color: white;">
        <i class="fas fa-plane"></i>
      </div>
      <div class="text-gray-500 text-sm font-medium">Total Penerbangan</div>
      <div class="text-3xl font-bold text-gray-800 mt-2">{{ $totalPenerbangan }}</div>
      <div class="text-xs text-gray-500 mt-2 flex items-center">
        <i class="fas fa-arrow-up text-green-500 mr-1"></i> 
        <span class="text-green-500">+5%</span> dari bulan lalu
      </div>
    </div>
    
    <div class="stat-card card-gradient p-6 shadow-lg">
      <div class="stat-icon" style="background: linear-gradient(135deg, #a8c0ff, #6a93cb); color: white;">
        <i class="fas fa-ticket-alt"></i>
      </div>
      <div class="text-gray-500 text-sm font-medium">Total Pemesanan</div>
      <div class="text-3xl font-bold text-gray-800 mt-2">{{ $totalPemesanan }}</div>
      <div class="text-xs text-gray-500 mt-2 flex items-center">
        <i class="fas fa-arrow-up text-green-500 mr-1"></i> 
        <span class="text-green-500">+18%</span> dari bulan lalu
      </div>
    </div>
    
    <div class="stat-card card-gradient p-6 shadow-lg">
      <div class="stat-icon" style="background: linear-gradient(135deg, #ff9a9e, #f5576c); color: white;">
        <i class="fas fa-clock"></i>
      </div>
      <div class="text-gray-500 text-sm font-medium">Pembayaran Menunggu</div>
      <div class="text-3xl font-bold text-gray-800 mt-2">{{ $pembayaranMenunggu }}</div>
      <div class="text-xs text-gray-500 mt-2 flex items-center">
        <i class="fas fa-exclamation-circle text-yellow-500 mr-1"></i> 
        <span class="text-yellow-500">Perlu perhatian</span>
      </div>
    </div>
  </div>

  <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 mb-8 fade-in" style="animation-delay: 0.5s;">
    <h2 class="text-xl font-bold text-gray-800 mb-4">Kelola Sistem</h2>
    <p class="text-gray-600 mb-6">Pilih modul yang ingin Anda kelola dari menu di bawah ini:</p>
    
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4">
      <a href="{{ route('admin.user.index') }}" class="btn-pink text-center justify-center">
        <i class="fas fa-users"></i>
        Kelola User
      </a>
      <a href="{{ route('admin.penerbangan.index') }}" class="btn-pink text-center justify-center">
        <i class="fas fa-plane"></i>
        Kelola Penerbangan
      </a>
      <a href="{{ route('admin.pembayaran.index') }}" class="btn-pink text-center justify-center">
        <i class="fas fa-credit-card"></i>
        Kelola Pembayaran
      </a>
      <a href="{{ route('home') }}" class="btn-outline-pink text-center justify-center">
        <i class="fas fa-external-link-alt"></i>
        Lihat Situs
      </a>
    </div>
  </div>

  <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 fade-in" style="animation-delay: 0.6s;">
      <h2 class="text-xl font-bold text-gray-800 mb-4">Aktivitas Terbaru</h2>
      <div class="space-y-4">
        <div class="flex items-start p-3 bg-pink-50 rounded-lg">
          <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center text-pink-600 mr-3">
            <i class="fas fa-user-plus"></i>
          </div>
          <div>
            <p class="font-medium">User baru terdaftar</p>
            <p class="text-sm text-gray-500">2 menit yang lalu</p>
          </div>
        </div>
        
        <div class="flex items-start p-3 bg-blue-50 rounded-lg">
          <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mr-3">
            <i class="fas fa-plane-departure"></i>
          </div>
          <div>
            <p class="font-medium">Penerbangan baru ditambahkan</p>
            <p class="text-sm text-gray-500">1 jam yang lalu</p>
          </div>
        </div>
        
        <div class="flex items-start p-3 bg-green-50 rounded-lg">
          <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 mr-3">
            <i class="fas fa-check-circle"></i>
          </div>
          <div>
            <p class="font-medium">Pembayaran berhasil dikonfirmasi</p>
            <p class="text-sm text-gray-500">3 jam yang lalu</p>
          </div>
        </div>
      </div>
    </div>
    
    <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 fade-in" style="animation-delay: 0.7s;">
      <h2 class="text-xl font-bold text-gray-800 mb-4">Statistik Cepat</h2>
      <div class="space-y-4">
        <div class="flex justify-between items-center p-3 bg-gradient-to-r from-pink-50 to-purple-50 rounded-lg">
          <div class="flex items-center">
            <div class="w-10 h-10 bg-pink-100 rounded-full flex items-center justify-center text-pink-600 mr-3">
              <i class="fas fa-chart-line"></i>
            </div>
            <span>Penerbangan Aktif</span>
          </div>
          <span class="font-bold text-lg">{{ $totalPenerbangan - 5 }}</span>
        </div>
        
        <div class="flex justify-between items-center p-3 bg-gradient-to-r from-blue-50 to-cyan-50 rounded-lg">
          <div class="flex items-center">
            <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600 mr-3">
              <i class="fas fa-money-bill-wave"></i>
            </div>
            <span>Pendapatan Bulan Ini</span>
          </div>
          <span class="font-bold text-lg">Rp 125jt</span>
        </div>
        
        <div class="flex justify-between items-center p-3 bg-gradient-to-r from-green-50 to-emerald-50 rounded-lg">
          <div class="flex items-center">
            <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600 mr-3">
              <i class="fas fa-star"></i>
            </div>
            <span>Rating Rata-rata</span>
          </div>
          <span class="font-bold text-lg">4.7/5</span>
        </div>
      </div>
    </div>
  </div>
</main>

<footer class="bg-gray-800 text-white py-4 mt-8">
  <div class="max-w-7xl mx-auto px-6 text-center">
    <p class="text-sm">&copy; {{ date('Y') }} Air Force One - Admin Dashboard. All rights reserved.</p>
  </div>
</footer>

<script>
  // Animasi untuk elemen statistik
  document.addEventListener('DOMContentLoaded', function() {
    // Efek counter untuk statistik
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
      card.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-5px)';
      });
      
      card.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
      });
    });
    
    // Efek hover untuk tombol
    const buttons = document.querySelectorAll('.btn-pink, .btn-outline-pink');
    buttons.forEach(button => {
      button.addEventListener('mouseenter', function() {
        this.style.transform = 'translateY(-2px)';
      });
      
      button.addEventListener('mouseleave', function() {
        this.style.transform = 'translateY(0)';
      });
    });
  });
</script>
</body>
</html>