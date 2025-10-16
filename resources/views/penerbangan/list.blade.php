<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Force One — Daftar Penerbangan</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/animejs/3.2.1/anime.min.js"></script>
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
            overflow-x: hidden;
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
        
        /* Animasi baru */
        .flying-plane {
            position: absolute;
            font-size: 24px;
            color: var(--accent-pink);
            opacity: 0.7;
            z-index: 1;
        }
        
        .bounce {
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        
        .fade-in {
            opacity: 0;
            transform: translateY(20px);
            transition: all 0.6s ease;
        }
        
        .fade-in.visible {
            opacity: 1;
            transform: translateY(0);
        }
        
        .slide-in-left {
            opacity: 0;
            transform: translateX(-50px);
            transition: all 0.6s ease;
        }
        
        .slide-in-left.visible {
            opacity: 1;
            transform: translateX(0);
        }
        
        .slide-in-right {
            opacity: 0;
            transform: translateX(50px);
            transition: all 0.6s ease;
        }
        
        .slide-in-right.visible {
            opacity: 1;
            transform: translateX(0);
        }
        
        .modal {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            z-index: 100;
            justify-content: center;
            align-items: center;
        }
        
        .modal-content {
            background: white;
            border-radius: 16px;
            padding: 30px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.2);
            position: relative;
        }
        
        .close-modal {
            position: absolute;
            top: 15px;
            right: 15px;
            font-size: 24px;
            cursor: pointer;
            color: var(--dark-pink);
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .form-group label {
            display: block;
            margin-bottom: 8px;
            font-weight: 600;
            color: var(--text-dark);
        }
        
        .form-group input {
            width: 100%;
            padding: 12px 15px;
            border: 2px solid var(--primary-pink);
            border-radius: 10px;
            font-size: 16px;
            transition: all 0.3s ease;
        }
        
        .form-group input:focus {
            border-color: var(--accent-pink);
            outline: none;
            box-shadow: 0 0 0 3px rgba(230, 84, 128, 0.2);
        }
        
        .btn-submit {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            color: white;
            border: none;
            padding: 12px 20px;
            border-radius: 10px;
            font-size: 16px;
            font-weight: 600;
            width: 100%;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .btn-submit:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(214, 51, 132, 0.4);
        }
        
        .partner-logo {
            height: 40px;
            filter: grayscale(100%);
            transition: all 0.3s ease;
            opacity: 0.7;
        }
        
        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.1);
        }
        
        .animated-bg {
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            overflow: hidden;
        }
        
        .floating-shape {
            position: absolute;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.2);
            animation: float 15s infinite linear;
        }
        
        @keyframes float {
            0% {
                transform: translate(0, 0) rotate(0deg);
            }
            100% {
                transform: translate(100px, 100px) rotate(360deg);
            }
        }

        /* New animations */
        .glow {
            animation: glow 2s ease-in-out infinite alternate;
        }
        
        @keyframes glow {
            from {
                box-shadow: 0 0 5px #fff, 0 0 10px #fff, 0 0 15px var(--accent-pink), 0 0 20px var(--accent-pink);
            }
            to {
                box-shadow: 0 0 10px #fff, 0 0 15px var(--accent-pink), 0 0 20px var(--accent-pink), 0 0 25px var(--accent-pink);
            }
        }
        
        .typewriter {
            overflow: hidden;
            border-right: .15em solid var(--accent-pink);
            white-space: nowrap;
            margin: 0 auto;
            animation: typing 3.5s steps(40, end), blink-caret .75s step-end infinite;
        }
        
        @keyframes typing {
            from { width: 0 }
            to { width: 100% }
        }
        
        @keyframes blink-caret {
            from, to { border-color: transparent }
            50% { border-color: var(--accent-pink); }
        }
        
        .parallax {
            background-attachment: fixed;
            background-position: center;
            background-repeat: no-repeat;
            background-size: cover;
        }
        
        .stagger-animation > * {
            opacity: 0;
            transform: translateY(30px);
        }
        
        .search-box {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            padding: 20px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body class="min-h-screen flex flex-col relative">
    <!-- Animated Background -->
    <div class="animated-bg">
        <div class="floating-shape" style="width: 100px; height: 100px; top: 10%; left: 5%; animation-delay: 0s;"></div>
        <div class="floating-shape" style="width: 150px; height: 150px; top: 60%; left: 80%; animation-delay: -5s;"></div>
        <div class="floating-shape" style="width: 80px; height: 80px; top: 80%; left: 20%; animation-delay: -10s;"></div>
        <div class="floating-shape" style="width: 120px; height: 120px; top: 30%; left: 70%; animation-delay: -7s;"></div>
    </div>

    <!-- Flying planes animation -->
    <div class="flying-plane" style="top: 15%; left: 5%; animation-delay: 0s;"><i class="fas fa-plane"></i></div>
    <div class="flying-plane" style="top: 25%; left: 85%; animation-delay: 2s;"><i class="fas fa-plane"></i></div>
    <div class="flying-plane" style="top: 65%; left: 10%; animation-delay: 4s;"><i class="fas fa-plane"></i></div>
    <div class="flying-plane" style="top: 75%; left: 90%; animation-delay: 6s;"><i class="fas fa-plane"></i></div>

    {{-- 🔹 Navbar --}}
    <nav class="navbar-gradient text-white py-4 shadow-lg sticky top-0 z-50">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center pulse-animation glow">
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
                    <button id="loginBtn" class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-md">Login</button>
                    <button id="registerBtn" class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-md">Register</button>
                @endauth
            </div>
        </div>
    </nav>

    {{-- 🔹 Hero Section --}}
    <section class="hero-gradient text-white py-20 relative overflow-hidden">
        <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
            <h1 class="text-5xl font-bold mb-6 slide-in-left typewriter">Daftar Penerbangan Air Force One</h1>
            <p class="text-xl max-w-2xl mx-auto mb-8 slide-in-right">Temukan penerbangan terbaik dengan kenyamanan dan layanan premium dari maskapai terpercaya</p>
            <div class="flex justify-center space-x-4">
                <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm bounce">
                    <i class="fas fa-clock text-2xl mb-2"></i>
                    <p class="font-semibold">Tepat Waktu</p>
                </div>
                <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm bounce" style="animation-delay: 0.2s;">
                    <i class="fas fa-shield-alt text-2xl mb-2"></i>
                    <p class="font-semibold">Aman & Nyaman</p>
                </div>
                <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm bounce" style="animation-delay: 0.4s;">
                    <i class="fas fa-tag text-2xl mb-2"></i>
                    <p class="font-semibold">Harga Terjangkau</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 🔹 Search Section --}}
    <section class="py-8 -mt-10 relative z-20">
        <div class="max-w-5xl mx-auto px-6">
            <div class="search-box hover-lift">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="block text-sm font-medium text-pink-700 mb-2">Dari</label>
                        <select class="w-full p-3 border border-pink-200 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                            <option>Jakarta (CGK)</option>
                            <option>Denpasar (DPS)</option>
                            <option>Surabaya (SUB)</option>
                            <option>Medan (KNO)</option>
                            <option>Makassar (UPG)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-pink-700 mb-2">Ke</label>
                        <select class="w-full p-3 border border-pink-200 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                            <option>Denpasar (DPS)</option>
                            <option>Jakarta (CGK)</option>
                            <option>Surabaya (SUB)</option>
                            <option>Singapore (SIN)</option>
                            <option>Kuala Lumpur (KUL)</option>
                        </select>
                    </div>
                    <div>
                        <label class="block text-sm font-medium text-pink-700 mb-2">Tanggal Berangkat</label>
                        <input type="date" class="w-full p-3 border border-pink-200 rounded-lg focus:ring-2 focus:ring-pink-500 focus:border-pink-500">
                    </div>
                    <div class="flex items-end">
                        <button class="w-full bg-pink-500 hover:bg-pink-600 text-white p-3 rounded-lg font-semibold transition-all shadow-md hover-lift">
                            <i class="fas fa-search mr-2"></i>Cari Penerbangan
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🔹 Partner Airlines Section --}}
    <section class="py-12 bg-white/50">
        <div class="max-w-7xl mx-auto px-6">
            <h2 class="text-3xl font-bold text-center text-pink-800 mb-8 fade-in">Partner Maskapai Terpercaya</h2>
            <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6 stagger-animation">
                <!-- Logos akan ditambahkan dengan JavaScript -->
            </div>
        </div>
    </section>

    {{-- 🔹 Konten utama --}}
    <main class="flex-grow p-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 mb-8 fade-in">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-pink-800">Penerbangan Tersedia <span class="text-pink-600">({{ count($penerbangan) }} hasil)</span></h2>
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
                        <tbody id="flightTableBody">
                            <!-- Data penerbangan akan diisi oleh JavaScript -->
                        </tbody>
                    </table>
                </div>
                
                <!-- Pagination -->
                <div class="flex justify-between items-center mt-6">
                    <div class="text-sm text-gray-600">
                        Menampilkan <span id="showingFrom">1</span>-<span id="showingTo">10</span> dari <span id="totalFlights">0</span> penerbangan
                    </div>
                    <div class="flex space-x-2">
                        <button id="prevPage" class="bg-pink-100 text-pink-700 px-4 py-2 rounded-lg font-medium hover:bg-pink-200 transition-all disabled:opacity-50" disabled>
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button id="nextPage" class="bg-pink-100 text-pink-700 px-4 py-2 rounded-lg font-medium hover:bg-pink-200 transition-all">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="card-gradient rounded-xl p-6 shadow-lg hover-lift fade-in">
                    <div class="feature-icon">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-xl font-bold text-pink-800 text-center mb-3">Penerbangan Tepat Waktu</h3>
                    <p class="text-pink-700 text-center">Kami berkomitmen untuk memberikan pengalaman penerbangan yang tepat waktu dan nyaman dengan tingkat ketepatan waktu 95%.</p>
                </div>
                
                <div class="card-gradient rounded-xl p-6 shadow-lg hover-lift fade-in" style="transition-delay: 0.2s;">
                    <div class="feature-icon">
                        <i class="fas fa-shield-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-pink-800 text-center mb-3">Keamanan Terjamin</h3>
                    <p class="text-pink-700 text-center">Keselamatan penumpang adalah prioritas utama kami dengan standar keamanan tertinggi dan kru berpengalaman.</p>
                </div>
                
                <div class="card-gradient rounded-xl p-6 shadow-lg hover-lift fade-in" style="transition-delay: 0.4s;">
                    <div class="feature-icon">
                        <i class="fas fa-concierge-bell"></i>
                    </div>
                    <h3 class="text-xl font-bold text-pink-800 text-center mb-3">Layanan Premium</h3>
                    <p class="text-pink-700 text-center">Nikmati layanan terbaik dari kru berpengalaman kami dengan fasilitas premium selama penerbangan.</p>
                </div>
            </div>
            
            <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl p-8 text-white text-center mb-8 fade-in">
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

    <!-- Login Modal -->
    <div id="loginModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2 class="text-2xl font-bold text-pink-800 mb-6 text-center">Login ke Akun Anda</h2>
            <form id="loginForm">
                <div class="form-group">
                    <label for="loginEmail">Email</label>
                    <input type="email" id="loginEmail" placeholder="Masukkan email Anda" required>
                </div>
                <div class="form-group">
                    <label for="loginPassword">Password</label>
                    <input type="password" id="loginPassword" placeholder="Masukkan password Anda" required>
                </div>
                <button type="submit" class="btn-submit">Login</button>
            </form>
            <p class="text-center mt-4">Belum punya akun? <a href="#" class="text-pink-600 font-semibold" id="switchToRegister">Daftar di sini</a></p>
        </div>
    </div>

    <!-- Register Modal -->
    <div id="registerModal" class="modal">
        <div class="modal-content">
            <span class="close-modal">&times;</span>
            <h2 class="text-2xl font-bold text-pink-800 mb-6 text-center">Daftar Akun Baru</h2>
            <form id="registerForm">
                <div class="form-group">
                    <label for="registerName">Nama Lengkap</label>
                    <input type="text" id="registerName" placeholder="Masukkan nama lengkap Anda" required>
                </div>
                <div class="form-group">
                    <label for="registerEmail">Email</label>
                    <input type="email" id="registerEmail" placeholder="Masukkan email Anda" required>
                </div>
                <div class="form-group">
                    <label for="registerPassword">Password</label>
                    <input type="password" id="registerPassword" placeholder="Buat password Anda" required>
                </div>
                <div class="form-group">
                    <label for="registerConfirmPassword">Konfirmasi Password</label>
                    <input type="password" id="registerConfirmPassword" placeholder="Konfirmasi password Anda" required>
                </div>
                <button type="submit" class="btn-submit">Daftar</button>
            </form>
            <p class="text-center mt-4">Sudah punya akun? <a href="#" class="text-pink-600 font-semibold" id="switchToLogin">Login di sini</a></p>
        </div>
    </div>

    <script>
        // Data penerbangan lengkap
        const flightData = [
            // Penerbangan Domestik
            { id: 1, kode: "AFO101", maskapai: "Air Force One", asal: "Jakarta (CGK)", tujuan: "Denpasar (DPS)", berangkat: "2024-01-15 08:00", tiba: "2024-01-15 10:30", harga: 1250000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 2, kode: "GIA231", maskapai: "Garuda Indonesia", asal: "Jakarta (CGK)", tujuan: "Surabaya (SUB)", berangkat: "2024-01-15 09:15", tiba: "2024-01-15 10:45", harga: 950000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 3, kode: "LIO701", maskapai: "Lion Air", asal: "Jakarta (CGK)", tujuan: "Medan (KNO)", berangkat: "2024-01-15 11:30", tiba: "2024-01-15 13:45", harga: 850000, status: "Aktif", kelas: ["Ekonomi"] },
            { id: 4, kode: "CIT451", maskapai: "Citilink", asal: "Jakarta (CGK)", tujuan: "Yogyakarta (JOG)", berangkat: "2024-01-15 14:20", tiba: "2024-01-15 15:50", harga: 750000, status: "Aktif", kelas: ["Ekonomi"] },
            { id: 5, kode: "BAT321", maskapai: "Batik Air", asal: "Jakarta (CGK)", tujuan: "Makassar (UPG)", berangkat: "2024-01-15 16:10", tiba: "2024-01-15 19:25", harga: 1450000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 6, kode: "SJ182", maskapai: "Sriwijaya Air", asal: "Jakarta (CGK)", tujuan: "Balikpapan (BPN)", berangkat: "2024-01-15 20:05", tiba: "2024-01-15 22:30", harga: 1100000, status: "Aktif", kelas: ["Ekonomi"] },
            { id: 7, kode: "SAJ251", maskapai: "Super Air Jet", asal: "Jakarta (CGK)", tujuan: "Lombok (LOP)", berangkat: "2024-01-16 07:45", tiba: "2024-01-16 10:00", harga: 1050000, status: "Aktif", kelas: ["Ekonomi"] },
            { id: 8, kode: "AFO202", maskapai: "Air Force One", asal: "Denpasar (DPS)", tujuan: "Jakarta (CGK)", berangkat: "2024-01-16 11:15", tiba: "2024-01-16 13:45", harga: 1300000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 9, kode: "GIA432", maskapai: "Garuda Indonesia", asal: "Surabaya (SUB)", tujuan: "Jakarta (CGK)", berangkat: "2024-01-16 14:30", tiba: "2024-01-16 16:00", harga: 980000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 10, kode: "LIO802", maskapai: "Lion Air", asal: "Medan (KNO)", tujuan: "Jakarta (CGK)", berangkat: "2024-01-16 17:20", tiba: "2024-01-16 19:35", harga: 870000, status: "Aktif", kelas: ["Ekonomi"] },
            
            // Penerbangan Internasional
            { id: 11, kode: "AFO301", maskapai: "Air Force One", asal: "Jakarta (CGK)", tujuan: "Singapore (SIN)", berangkat: "2024-01-15 10:00", tiba: "2024-01-15 13:00", harga: 2450000, status: "Aktif", kelas: ["Ekonomi", "Bisnis", "First"] },
            { id: 12, kode: "SIA238", maskapai: "Singapore Airlines", asal: "Jakarta (CGK)", tujuan: "Singapore (SIN)", berangkat: "2024-01-15 14:30", tiba: "2024-01-15 17:30", harga: 2850000, status: "Aktif", kelas: ["Ekonomi", "Bisnis", "First"] },
            { id: 13, kode: "MAS512", maskapai: "Malaysia Airlines", asal: "Jakarta (CGK)", tujuan: "Kuala Lumpur (KUL)", berangkat: "2024-01-15 16:45", tiba: "2024-01-15 19:30", harga: 1950000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 14, kode: "THA631", maskapai: "Thai Airways", asal: "Jakarta (CGK)", tujuan: "Bangkok (BKK)", berangkat: "2024-01-16 09:20", tiba: "2024-01-16 13:10", harga: 2250000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 15, kode: "CPA441", maskapai: "Cathay Pacific", asal: "Jakarta (CGK)", tujuan: "Hong Kong (HKG)", berangkat: "2024-01-16 11:50", tiba: "2024-01-16 17:40", harga: 3850000, status: "Aktif", kelas: ["Ekonomi", "Bisnis", "First"] },
            { id: 16, kode: "QTR725", maskapai: "Qatar Airways", asal: "Jakarta (CGK)", tujuan: "Doha (DOH)", berangkat: "2024-01-16 22:15", tiba: "2024-01-17 04:30", harga: 6250000, status: "Aktif", kelas: ["Ekonomi", "Bisnis", "First"] },
            { id: 17, kode: "UAE351", maskapai: "Emirates", asal: "Jakarta (CGK)", tujuan: "Dubai (DXB)", berangkat: "2024-01-17 01:30", tiba: "2024-01-17 08:45", harga: 7850000, status: "Aktif", kelas: ["Ekonomi", "Bisnis", "First"] },
            { id: 18, kode: "JAL118", maskapai: "Japan Airlines", asal: "Jakarta (CGK)", tujuan: "Tokyo (NRT)", berangkat: "2024-01-17 10:10", tiba: "2024-01-17 19:55", harga: 5850000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 19, kode: "KAL229", maskapai: "Korean Air", asal: "Jakarta (CGK)", tujuan: "Seoul (ICN)", berangkat: "2024-01-17 13:40", tiba: "2024-01-17 22:15", harga: 4950000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 20, kode: "ANA335", maskapai: "ANA", asal: "Jakarta (CGK)", tujuan: "Tokyo (HND)", berangkat: "2024-01-18 08:25", tiba: "2024-01-18 18:10", harga: 5450000, status: "Aktif", kelas: ["Ekonomi", "Bisnis", "First"] },
            
            // Penerbangan Tambahan
            { id: 21, kode: "AFO401", maskapai: "Air Force One", asal: "Surabaya (SUB)", tujuan: "Denpasar (DPS)", berangkat: "2024-01-15 12:30", tiba: "2024-01-15 13:45", harga: 650000, status: "Aktif", kelas: ["Ekonomi"] },
            { id: 22, kode: "CIT551", maskapai: "Citilink", asal: "Medan (KNO)", tujuan: "Jakarta (CGK)", berangkat: "2024-01-16 06:15", tiba: "2024-01-16 08:30", harga: 820000, status: "Aktif", kelas: ["Ekonomi"] },
            { id: 23, kode: "BAT621", maskapai: "Batik Air", asal: "Makassar (UPG)", tujuan: "Balikpapan (BPN)", berangkat: "2024-01-16 09:40", tiba: "2024-01-16 11:10", harga: 750000, status: "Aktif", kelas: ["Ekonomi"] },
            { id: 24, kode: "SJ282", maskapai: "Sriwijaya Air", asal: "Balikpapan (BPN)", tujuan: "Makassar (UPG)", berangkat: "2024-01-17 14:20", tiba: "2024-01-17 15:50", harga: 720000, status: "Aktif", kelas: ["Ekonomi"] },
            { id: 25, kode: "SAJ351", maskapai: "Super Air Jet", asal: "Lombok (LOP)", tujuan: "Surabaya (SUB)", berangkat: "2024-01-17 16:30", tiba: "2024-01-17 17:45", harga: 680000, status: "Aktif", kelas: ["Ekonomi"] },
            { id: 26, kode: "AFO501", maskapai: "Air Force One", asal: "Jakarta (CGK)", tujuan: "Singapore (SIN)", berangkat: "2024-01-18 19:00", tiba: "2024-01-18 22:00", harga: 2550000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] },
            { id: 27, kode: "SIA338", maskapai: "Singapore Airlines", asal: "Singapore (SIN)", tujuan: "Jakarta (CGK)", berangkat: "2024-01-19 08:30", tiba: "2024-01-19 09:30", harga: 2650000, status: "Aktif", kelas: ["Ekonomi", "Bisnis", "First"] },
            { id: 28, kode: "QTR825", maskapai: "Qatar Airways", asal: "Doha (DOH)", tujuan: "Jakarta (CGK)", berangkat: "2024-01-19 10:45", tiba: "2024-01-19 22:30", harga: 6150000, status: "Aktif", kelas: ["Ekonomi", "Bisnis", "First"] },
            { id: 29, kode: "UAE451", maskapai: "Emirates", asal: "Dubai (DXB)", tujuan: "Jakarta (CGK)", berangkat: "2024-01-20 03:15", tiba: "2024-01-20 15:30", harga: 7750000, status: "Aktif", kelas: ["Ekonomi", "Bisnis", "First"] },
            { id: 30, kode: "AFO601", maskapai: "Air Force One", asal: "Denpasar (DPS)", tujuan: "Singapore (SIN)", berangkat: "2024-01-20 13:20", tiba: "2024-01-20 16:00", harga: 1850000, status: "Aktif", kelas: ["Ekonomi", "Bisnis"] }
        ];

        // Variabel untuk pagination
        let currentPage = 1;
        const flightsPerPage = 10;

        // Animasi scroll
        document.addEventListener('DOMContentLoaded', function() {
            // Animasi elemen saat scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('visible');
                    }
                });
            }, observerOptions);
            
            // Terapkan animasi ke elemen
            document.querySelectorAll('.fade-in, .slide-in-left, .slide-in-right').forEach(el => {
                observer.observe(el);
            });
            
            // Animasi pesawat terbang
            const planes = document.querySelectorAll('.flying-plane');
            planes.forEach((plane, index) => {
                anime({
                    targets: plane,
                    translateX: ['-100px', '120vw'],
                    translateY: () => anime.random(-100, 100),
                    rotate: () => anime.random(-10, 10),
                    duration: () => anime.random(15000, 30000),
                    delay: () => anime.random(0, 5000),
                    loop: true,
                    easing: 'linear'
                });
            });
            
            // Animasi shape floating
            const shapes = document.querySelectorAll('.floating-shape');
            shapes.forEach(shape => {
                anime({
                    targets: shape,
                    translateX: () => anime.random(-100, 100),
                    translateY: () => anime.random(-100, 100),
                    duration: () => anime.random(10000, 20000),
                    loop: true,
                    direction: 'alternate',
                    easing: 'easeInOutSine'
                });
            });
            
            // Animasi stagger untuk partner airlines
            const partnerItems = document.querySelectorAll('.stagger-animation > *');
            partnerItems.forEach((item, index) => {
                anime({
                    targets: item,
                    opacity: [0, 1],
                    translateY: [30, 0],
                    delay: index * 100,
                    duration: 800,
                    easing: 'easeOutQuad'
                });
            });
            
            // Modal functionality
            const loginModal = document.getElementById('loginModal');
            const registerModal = document.getElementById('registerModal');
            const loginBtn = document.getElementById('loginBtn');
            const registerBtn = document.getElementById('registerBtn');
            const closeButtons = document.querySelectorAll('.close-modal');
            const switchToRegister = document.getElementById('switchToRegister');
            const switchToLogin = document.getElementById('switchToLogin');
            const loginPromptButtons = document.querySelectorAll('.login-prompt');
            
            if (loginBtn) {
                loginBtn.addEventListener('click', () => {
                    loginModal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            }
            
            if (registerBtn) {
                registerBtn.addEventListener('click', () => {
                    registerModal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            }
            
            closeButtons.forEach(button => {
                button.addEventListener('click', () => {
                    loginModal.style.display = 'none';
                    registerModal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                });
            });
            
            if (switchToRegister) {
                switchToRegister.addEventListener('click', (e) => {
                    e.preventDefault();
                    loginModal.style.display = 'none';
                    registerModal.style.display = 'flex';
                });
            }
            
            if (switchToLogin) {
                switchToLogin.addEventListener('click', (e) => {
                    e.preventDefault();
                    registerModal.style.display = 'none';
                    loginModal.style.display = 'flex';
                });
            }
            
            loginPromptButtons.forEach(button => {
                button.addEventListener('click', () => {
                    loginModal.style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            });
            
            window.addEventListener('click', (e) => {
                if (e.target === loginModal) {
                    loginModal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
                if (e.target === registerModal) {
                    registerModal.style.display = 'none';
                    document.body.style.overflow = 'auto';
                }
            });
            
            // Form submission
            document.getElementById('loginForm').addEventListener('submit', function(e) {
                e.preventDefault();
                // Simulasi login berhasil
                alert('Login berhasil!');
                loginModal.style.display = 'none';
                document.body.style.overflow = 'auto';
                // Di aplikasi nyata, ini akan mengarahkan ke halaman setelah login
            });
            
            document.getElementById('registerForm').addEventListener('submit', function(e) {
                e.preventDefault();
                // Simulasi registrasi berhasil
                alert('Registrasi berhasil! Silakan login.');
                registerModal.style.display = 'none';
                loginModal.style.display = 'flex';
            });
            
            // Add partner airline logos
            const airlines = [
                'Garuda Indonesia', 'Citilink', 'Sriwijaya Air', 'Lion Air', 'Batik Air', 'Air Asia',
                'Super Air Jet', 'Scoot', 'Singapore Airlines', 'Cathay Pacific', 'Thai Airways',
                'Qatar Airways', 'Emirates', 'Ethiopian Airlines', 'ANA', 'Malaysia Airlines',
                'Japan Airlines', 'Asiana Airlines', 'China Airlines', 'Eva Air', 'KLM',
                'Air France', 'Xiamen Airlines', 'Air China', 'Oman Air', 'Lufthansa',
                'Delta Airlines', 'Korean Air', 'Jetstar', 'Firefly', 'Thai Lion Air',
                'Wings Air', 'Trigana Air', 'Transnusa', 'Bangkok Airways', 'Philippine Airlines',
                'Vietnam Airlines', 'Qantas', 'Turkish Airlines'
            ];
            
            const partnerContainer = document.querySelector('.stagger-animation');
            
            airlines.forEach(airline => {
                const logoDiv = document.createElement('div');
                logoDiv.className = 'flex items-center justify-center p-4 bg-white rounded-lg shadow-md hover-lift';
                logoDiv.innerHTML = `
                    <div class="text-center">
                        <i class="fas fa-plane text-2xl text-pink-600 mb-2"></i>
                        <p class="text-xs font-medium text-gray-700">${airline}</p>
                    </div>
                `;
                partnerContainer.appendChild(logoDiv);
            });
            
            // Initialize flight table
            renderFlightTable();
            setupPagination();
        });

        // Fungsi untuk merender tabel penerbangan
        function renderFlightTable() {
            const tableBody = document.getElementById('flightTableBody');
            tableBody.innerHTML = '';
            
            const startIndex = (currentPage - 1) * flightsPerPage;
            const endIndex = startIndex + flightsPerPage;
            const currentFlights = flightData.slice(startIndex, endIndex);
            
            currentFlights.forEach(flight => {
                const row = document.createElement('tr');
                row.className = 'flight-card border-b border-pink-100 fade-in';
                
                // Format tanggal
                const berangkatDate = new Date(flight.berangkat);
                const tibaDate = new Date(flight.tiba);
                
                const formattedBerangkatDate = berangkatDate.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
                const formattedBerangkatTime = berangkatDate.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                
                const formattedTibaDate = tibaDate.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
                const formattedTibaTime = tibaDate.toLocaleTimeString('id-ID', { hour: '2-digit', minute: '2-digit' });
                
                // Format harga
                const formattedHarga = new Intl.NumberFormat('id-ID').format(flight.harga);
                
                row.innerHTML = `
                    <td class="px-6 py-4">
                        <div class="font-bold text-pink-700">${flight.kode}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center">
                            <div class="w-10 h-10 bg-pink-200 rounded-full flex items-center justify-center mr-3">
                                <i class="fas fa-plane text-pink-700"></i>
                            </div>
                            <span class="font-medium">${flight.maskapai}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">${flight.asal}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">${flight.tujuan}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">${formattedBerangkatDate}</div>
                        <div class="text-sm text-gray-500">${formattedBerangkatTime}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="font-medium">${formattedTibaDate}</div>
                        <div class="text-sm text-gray-500">${formattedTibaTime}</div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="price-tag inline-block">Rp ${formattedHarga}</div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="flight-status-active">
                            <i class="fas fa-check-circle mr-1"></i>${flight.status}
                        </span>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex flex-col space-y-2">
                            ${flight.kelas.map(kelas => `
                                <button class="btn-pink text-center login-prompt">
                                    <i class="fas fa-ticket-alt mr-2"></i>Pesan ${kelas}
                                </button>
                            `).join('')}
                        </div>
                    </td>
                `;
                
                tableBody.appendChild(row);
            });
            
            // Update pagination info
            document.getElementById('showingFrom').textContent = startIndex + 1;
            document.getElementById('showingTo').textContent = Math.min(endIndex, flightData.length);
            document.getElementById('totalFlights').textContent = flightData.length;
            
            // Update button states
            document.getElementById('prevPage').disabled = currentPage === 1;
            document.getElementById('nextPage').disabled = endIndex >= flightData.length;
            
            // Add event listeners to login prompt buttons
            document.querySelectorAll('.login-prompt').forEach(button => {
                button.addEventListener('click', () => {
                    document.getElementById('loginModal').style.display = 'flex';
                    document.body.style.overflow = 'hidden';
                });
            });
        }

        // Setup pagination
        function setupPagination() {
            document.getElementById('prevPage').addEventListener('click', () => {
                if (currentPage > 1) {
                    currentPage--;
                    renderFlightTable();
                }
            });
            
            document.getElementById('nextPage').addEventListener('click', () => {
                if (currentPage * flightsPerPage < flightData.length) {
                    currentPage++;
                    renderFlightTable();
                }
            });
        }
    </script>
</body>
</html>