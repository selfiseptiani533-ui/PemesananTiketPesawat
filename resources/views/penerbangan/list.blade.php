<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Force One — Daftar Penerbangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        :root {
            --primary-pink: #f8c8dc;
            --secondary-pink: #f5a6c6;
            --accent-pink: #e75480;
            --dark-pink: #d63384;
            --light-pink: #fdf2f8;
            --text-dark: #4a044e;
            --deep-pink: #c2185b;
        }
        
        body {
            background: linear-gradient(135deg, var(--light-pink) 0%, var(--primary-pink) 100%);
            min-height: 100vh;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        
        .navbar-gradient {
            background: linear-gradient(to right, var(--dark-pink), var(--accent-pink));
            box-shadow: 0 4px 20px rgba(214, 51, 132, 0.3);
        }
        
        .footer-gradient {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
        }
        
        .card-gradient {
            background: linear-gradient(145deg, #ffffff, var(--primary-pink));
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        
        .hero-gradient {
            background: linear-gradient(135deg, rgba(230, 84, 128, 0.9) 0%, rgba(214, 51, 132, 0.9) 100%);
        }
        
        .hover-lift {
            transition: all 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(214, 51, 132, 0.3);
        }
        
        .flight-status-active {
            background-color: rgba(34, 197, 94, 0.2);
            color: #16a34a;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .flight-status-inactive {
            background-color: rgba(239, 68, 68, 0.2);
            color: #dc2626;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
        }
        
        .price-tag {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            color: white;
            padding: 6px 12px;
            border-radius: 12px;
            font-weight: 700;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .scroll-container {
            max-height: 70vh;
            overflow-y: auto;
        }
        
        /* Custom scrollbar */
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
        
        .table-header {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            color: white;
            position: sticky;
            top: 0;
            z-index: 10;
        }
        
        .flight-card {
            background: rgba(255, 255, 255, 0.8);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }
        
        .flight-card:hover {
            background: rgba(255, 255, 255, 0.95);
            transform: translateY(-3px);
            box-shadow: 0 10px 25px rgba(214, 51, 132, 0.2);
        }
        
        .btn-pink {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            color: white;
            padding: 10px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(214, 51, 132, 0.3);
        }
        
        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 15px rgba(214, 51, 132, 0.4);
        }
        
        .feature-icon {
            background: linear-gradient(135deg, var(--accent-pink), var(--dark-pink));
            color: white;
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
            font-size: 24px;
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
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 10px); }
            100% { transform: translate(0, -0px); }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">

    {{-- 🔹 Navbar --}}
    <nav class="navbar-gradient text-white py-4 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center pulse-animation">
                    <i class="fas fa-plane-departure text-pink-600 text-xl"></i>
                </div>
                <a href="{{ url('/') }}" class="text-2xl font-bold tracking-wide">Air Force One</a>
            </div>
            <div class="space-x-4">
                @auth
                    <span class="font-semibold">Halo, {{ Auth::user()->name }}</span>
                    <form action="{{ route('logout') }}" method="POST" class="inline">
                        @csrf
                        <button class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-md">Logout</button>
                    </form>
                @else
                    <a href="{{ route('login') }}" class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-md">Login</a>
                    <a href="{{ route('register') }}" class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-md">Register</a>
                @endauth
            </div>
        </div>
    </nav>

    {{-- 🔹 Hero Section --}}
    <section class="hero-gradient text-white py-16">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <h1 class="text-5xl font-bold mb-6">Daftar Penerbangan</h1>
            <p class="text-xl max-w-2xl mx-auto mb-8">Temukan penerbangan terbaik dengan kenyamanan dan layanan premium dari Air Force One</p>
            <div class="flex justify-center space-x-4">
                <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm">
                    <i class="fas fa-clock text-2xl mb-2"></i>
                    <p class="font-semibold">Tepat Waktu</p>
                </div>
                <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm">
                    <i class="fas fa-shield-alt text-2xl mb-2"></i>
                    <p class="font-semibold">Aman & Nyaman</p>
                </div>
                <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm">
                    <i class="fas fa-tag text-2xl mb-2"></i>
                    <p class="font-semibold">Harga Terjangkau</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 🔹 Konten utama --}}
    <main class="flex-grow p-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-pink-800">Penerbangan Tersedia</h2>
                    <div class="flex space-x-2">
                        <button class="bg-pink-100 text-pink-700 px-4 py-2 rounded-lg font-medium hover:bg-pink-200 transition-all">
                            <i class="fas fa-filter mr-2"></i>Filter
                        </button>
                        <button class="bg-pink-100 text-pink-700 px-4 py-2 rounded-lg font-medium hover:bg-pink-200 transition-all">
                            <i class="fas fa-sort mr-2"></i>Urutkan
                        </button>
                    </div>
                </div>
                
                <div class="scroll-container">
                    <table class="min-w-full">
                        <thead>
                            <tr class="table-header rounded-lg">
                                <th class="px-6 py-4 text-left rounded-tl-lg">Kode</th>
                                <th class="px-6 py-4 text-left">Maskapai</th>
                                <th class="px-6 py-4 text-left">Asal</th>
                                <th class="px-6 py-4 text-left">Tujuan</th>
                                <th class="px-6 py-4 text-left">Berangkat</th>
                                <th class="px-6 py-4 text-left">Tiba</th>
                                <th class="px-6 py-4 text-left">Harga</th>
                                <th class="px-6 py-4 text-left">Status</th>
                                <th class="px-6 py-4 text-left rounded-tr-lg">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($penerbangan as $p)
                                <tr class="flight-card border-b border-pink-100">
                                    <td class="px-6 py-4">
                                        <div class="font-bold text-pink-700">{{ $p->kode_penerbangan }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex items-center">
                                            <div class="w-10 h-10 bg-pink-200 rounded-full flex items-center justify-center mr-3">
                                                <i class="fas fa-plane text-pink-700"></i>
                                            </div>
                                            <span class="font-medium">{{ $p->maskapai }}</span>
                                        </div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium">{{ $p->asal }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium">{{ $p->tujuan }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium">{{ \Carbon\Carbon::parse($p->waktu_berangkat)->format('d M Y') }}</div>
                                        <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($p->waktu_berangkat)->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="font-medium">{{ \Carbon\Carbon::parse($p->waktu_tiba)->format('d M Y') }}</div>
                                        <div class="text-sm text-gray-500">{{ \Carbon\Carbon::parse($p->waktu_tiba)->format('H:i') }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="price-tag inline-block">Rp {{ number_format($p->harga,0,',','.') }}</div>
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($p->status === 'Aktif')
                                            <span class="flight-status-active">
                                                <i class="fas fa-check-circle mr-1"></i>Aktif
                                            </span>
                                        @else
                                            <span class="flight-status-inactive">
                                                <i class="fas fa-times-circle mr-1"></i>{{ $p->status }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4">
                                        @if($p->status === 'Aktif')
                                            @auth
                                                <div class="flex flex-col space-y-2">
                                                    @foreach($p->kelas as $kelas)
                                                        <a href="{{ route('pemesanan.create', $kelas->id) }}" 
                                                           class="btn-pink text-center">
                                                            <i class="fas fa-ticket-alt mr-2"></i>Pesan {{ $kelas->nama_kelas }}
                                                        </a>
                                                    @endforeach
                                                </div>
                                            @else
                                                <a href="{{ route('login') }}" 
                                                   class="text-pink-600 hover:text-pink-800 font-semibold text-sm inline-flex items-center">
                                                   <i class="fas fa-sign-in-alt mr-2"></i>
                                                   Login untuk memesan
                                                </a>
                                            @endauth
                                        @else
                                            <span class="text-gray-400 text-sm">
                                                <i class="fas fa-ban mr-1"></i>Tidak tersedia
                                            </span>
                                        @endif
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="9" class="px-6 py-12 text-center">
                                        <div class="flex flex-col items-center justify-center text-gray-500">
                                            <i class="fas fa-plane-slash text-6xl mb-4 text-pink-300"></i>
                                            <p class="text-xl font-medium mb-2">Tidak ada penerbangan tersedia</p>
                                            <p class="text-pink-600">Silakan coba lagi nanti atau hubungi customer service kami.</p>
                                        </div>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="card-gradient rounded-xl p-6 shadow-lg hover-lift">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-xl font-bold text-pink-800 text-center mb-3">Penerbangan Tepat Waktu</h3>
                    <p class="text-pink-700 text-center">Kami berkomitmen untuk memberikan pengalaman penerbangan yang tepat waktu dan nyaman dengan tingkat ketepatan waktu 95%.</p>
                </div>
                
                <div class="card-gradient rounded-xl p-6 shadow-lg hover-lift">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-pink-800 text-center mb-3">Keamanan Terjamin</h3>
                    <p class="text-pink-700 text-center">Keselamatan penumpang adalah prioritas utama kami dengan standar keamanan tertinggi dan kru berpengalaman.</p>
                </div>
                
                <div class="card-gradient rounded-xl p-6 shadow-lg hover-lift">
                    <div class="feature-icon">
                        <i class="fas fa-concierge-bell"></i>
                    </div>
                    <h3 class="text-xl font-bold text-pink-800 text-center mb-3">Layanan Premium</h3>
                    <p class="text-pink-700 text-center">Nikmati layanan terbaik dari kru berpengalaman kami dengan fasilitas premium selama penerbangan.</p>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl p-8 text-white text-center mb-8">
                <h2 class="text-3xl font-bold mb-4">Butuh Bantuan Memesan?</h2>
                <p class="text-xl mb-6 max-w-2xl mx-auto">Tim customer service kami siap membantu Anda 24/7 untuk pengalaman pemesanan yang mudah dan menyenangkan.</p>
                <div class="flex justify-center space-x-4">
                    <button class="bg-white text-pink-600 px-6 py-3 rounded-lg font-bold hover:bg-gray-100 transition-all">
                        <i class="fas fa-phone-alt mr-2"></i>Hubungi Kami
                    </button>
                    <button class="bg-transparent border-2 border-white text-white px-6 py-3 rounded-lg font-bold hover:bg-white/10 transition-all">
                        <i class="fas fa-comments mr-2"></i>Live Chat
                    </button>
                </div>
            </div>
        </div>
    </main>

    {{-- 🔹 Footer --}}
    <footer class="footer-gradient text-white py-10">
        <div class="max-w-7xl mx-auto px-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-8 mb-8">
                <div>
                    <div class="flex items-center mb-4">
                        <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center mr-3">
                            <i class="fas fa-plane-departure text-pink-600"></i>
                        </div>
                        <span class="text-xl font-bold">Air Force One</span>
                    </div>
                    <p class="text-pink-100">Perusahaan penerbangan terkemuka dengan layanan premium dan kenyamanan maksimal untuk perjalanan Anda.</p>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Tautan Cepat</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-pink-100 hover:text-white transition">Tentang Kami</a></li>
                        <li><a href="#" class="text-pink-100 hover:text-white transition">Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-pink-100 hover:text-white transition">Syarat & Ketentuan</a></li>
                        <li><a href="#" class="text-pink-100 hover:text-white transition">Karir</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Layanan</h3>
                    <ul class="space-y-2">
                        <li><a href="#" class="text-pink-100 hover:text-white transition">Penerbangan Domestik</a></li>
                        <li><a href="#" class="text-pink-100 hover:text-white transition">Penerbangan Internasional</a></li>
                        <li><a href="#" class="text-pink-100 hover:text-white transition">Kelas Bisnis</a></li>
                        <li><a href="#" class="text-pink-100 hover:text-white transition">Kelas Ekonomi Premium</a></li>
                    </ul>
                </div>
                
                <div>
                    <h3 class="text-lg font-bold mb-4">Kontak</h3>
                    <ul class="space-y-2">
                        <li class="flex items-center">
                            <i class="fas fa-phone-alt mr-3 text-pink-200"></i>
                            <span class="text-pink-100">+62 21 1234 5678</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-envelope mr-3 text-pink-200"></i>
                            <span class="text-pink-100">info@airforceone.com</span>
                        </li>
                        <li class="flex items-center">
                            <i class="fas fa-map-marker-alt mr-3 text-pink-200"></i>
                            <span class="text-pink-100">Jakarta, Indonesia</span>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="pt-8 border-t border-pink-400 flex flex-col md:flex-row justify-between items-center">
                <div class="mb-4 md:mb-0">
                    <p class="text-sm text-pink-100">&copy; {{ date('Y') }} Air Force One — Semua Hak Dilindungi.</p>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-pink-200 transition text-xl">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-white hover:text-pink-200 transition text-xl">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white hover:text-pink-200 transition text-xl">
                        <i class="fab fa-instagram"></i>
                    </a>
                    <a href="#" class="text-white hover:text-pink-200 transition text-xl">
                        <i class="fab fa-youtube"></i>
                    </a>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>