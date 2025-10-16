<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User - Air Force One</title>
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
        
        .card-gradient {
            background: linear-gradient(145deg, #ffffff, var(--primary-pink));
            border: 1px solid rgba(255, 255, 255, 0.5);
            backdrop-filter: blur(10px);
        }
        
        .btn-pink {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
        }
        
        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(214, 51, 132, 0.4);
        }
        
        .btn-outline-pink {
            border: 2px solid var(--accent-pink);
            color: var(--accent-pink);
            background: transparent;
            padding: 10px 22px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
        }
        
        .btn-outline-pink:hover {
            background: var(--accent-pink);
            color: white;
            transform: translateY(-2px);
        }
        
        .stat-card {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            border: 1px solid rgba(255, 255, 255, 0.5);
            transition: all 0.3s ease;
        }
        
        .stat-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(214, 51, 132, 0.2);
        }
        
        .floating {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px); }
            50% { transform: translate(0, 10px); }
            100% { transform: translate(0, -0px); }
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
        
        .slide-in {
            animation: slideIn 0.6s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
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
            font-size: 24px;
        }
    </style>
</head>
<body class="min-h-screen flex flex-col">
    <!-- Navigation Header -->
    <header class="navbar-gradient text-white py-4 shadow-lg">
        <div class="max-w-7xl mx-auto px-6 flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-white rounded-full flex items-center justify-center pulse-animation">
                    <i class="fas fa-plane-departure text-pink-600 text-xl"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold">Air Force One</h1>
                    <p class="text-pink-100 text-sm">User Dashboard</p>
                </div>
            </div>
            <div class="flex items-center space-x-4">
                <div class="text-right">
                    <p class="font-semibold">Halo, {{ auth()->user()?->name ?? 'User' }}</p>
                    <p class="text-pink-100 text-sm">{{ auth()->user()?->email ?? 'user@example.com' }}</p>
                </div>
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="bg-white text-pink-600 px-4 py-2 rounded-lg font-semibold hover:bg-gray-100 transition-all shadow-md flex items-center space-x-2">
                        <i class="fas fa-sign-out-alt"></i>
                        <span>Logout</span>
                    </button>
                </form>
            </div>
        </div>
    </header>

    <!-- Main Content -->
    <main class="flex-1 p-6">
        <div class="max-w-7xl mx-auto">
            <!-- Welcome Section -->
            <div class="card-gradient rounded-2xl p-8 shadow-xl mb-8 slide-in">
                <div class="flex flex-col md:flex-row items-center justify-between">
                    <div class="text-center md:text-left mb-6 md:mb-0">
                        <h2 class="text-3xl font-bold text-pink-800 mb-2">
                            Selamat Datang Kembali! ✈️
                        </h2>
                        <p class="text-lg text-pink-700 max-w-2xl">
                            Siap untuk petualangan baru? Jelajahi penerbangan terbaik dan kelola pemesanan Anda dengan mudah.
                        </p>
                    </div>
                    <div class="floating">
                        <i class="fas fa-plane text-6xl text-pink-500"></i>
                    </div>
                </div>
            </div>

            <!-- Quick Stats -->
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8">
                <div class="stat-card p-6 text-center">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-ticket-alt"></i>
                    </div>
                    <h3 class="text-xl font-bold text-pink-800 mb-2">Total Pemesanan</h3>
                    <p class="text-3xl font-bold text-pink-600">5</p>
                    <p class="text-gray-600 text-sm">Penerbangan</p>
                </div>
                
                <div class="stat-card p-6 text-center">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-clock"></i>
                    </div>
                    <h3 class="text-xl font-bold text-pink-800 mb-2">Menunggu</h3>
                    <p class="text-3xl font-bold text-pink-600">2</p>
                    <p class="text-gray-600 text-sm">Konfirmasi</p>
                </div>
                
                <div class="stat-card p-6 text-center">
                    <div class="feature-icon mx-auto mb-4">
                        <i class="fas fa-star"></i>
                    </div>
                    <h3 class="text-xl font-bold text-pink-800 mb-2">Points</h3>
                    <p class="text-3xl font-bold text-pink-600">1,250</p>
                    <p class="text-gray-600 text-sm">Loyalty Points</p>
                </div>
            </div>

            <!-- Action Cards -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Pemesanan Saya Card -->
                <div class="card-gradient rounded-2xl p-6 shadow-lg hover-lift">
                    <div class="flex items-start space-x-4">
                        <div class="feature-icon flex-shrink-0">
                            <i class="fas fa-suitcase"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-pink-800 mb-2">Pemesanan Saya</h3>
                            <p class="text-pink-700 mb-4">
                                Lihat dan kelola semua pemesanan penerbangan Anda. Cek status, detail, dan riwayat perjalanan.
                            </p>
                            <a href="{{ route('pemesanan.index') }}" class="btn-pink inline-flex items-center space-x-2">
                                <i class="fas fa-list"></i>
                                <span>Lihat Pemesanan</span>
                            </a>
                        </div>
                    </div>
                </div>

                <!-- Cari Penerbangan Card -->
                <div class="card-gradient rounded-2xl p-6 shadow-lg hover-lift">
                    <div class="flex items-start space-x-4">
                        <div class="feature-icon flex-shrink-0">
                            <i class="fas fa-search"></i>
                        </div>
                        <div class="flex-1">
                            <h3 class="text-xl font-bold text-pink-800 mb-2">Cari Penerbangan</h3>
                            <p class="text-pink-700 mb-4">
                                Temukan penerbangan terbaik dengan harga spesial. Rencanakan perjalanan Anda berikutnya sekarang!
                            </p>
                            <a href="{{ route('home') }}" class="btn-outline-pink inline-flex items-center space-x-2">
                                <i class="fas fa-plane"></i>
                                <span>Jelajahi Penerbangan</span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Recent Activity -->
            <div class="card-gradient rounded-2xl p-6 shadow-lg">
                <h3 class="text-2xl font-bold text-pink-800 mb-6 flex items-center">
                    <i class="fas fa-history mr-3"></i>
                    Aktivitas Terbaru
                </h3>
                
                <div class="space-y-4">
                    <!-- Activity Item 1 -->
                    <div class="flex items-center space-x-4 p-4 bg-white rounded-xl border border-pink-100">
                        <div class="w-10 h-10 bg-green-100 rounded-full flex items-center justify-center text-green-600">
                            <i class="fas fa-check"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Pemesanan Dikonfirmasi</p>
                            <p class="text-sm text-gray-600">Jakarta → Bali • 15 Jan 2024</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-pink-600">Rp 1.250.000</p>
                            <p class="text-xs text-gray-500">2 hari lalu</p>
                        </div>
                    </div>

                    <!-- Activity Item 2 -->
                    <div class="flex items-center space-x-4 p-4 bg-white rounded-xl border border-pink-100">
                        <div class="w-10 h-10 bg-blue-100 rounded-full flex items-center justify-center text-blue-600">
                            <i class="fas fa-clock"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Menunggu Pembayaran</p>
                            <p class="text-sm text-gray-600">Surabaya → Singapore • 20 Jan 2024</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-pink-600">Rp 2.850.000</p>
                            <p class="text-xs text-gray-500">1 jam lalu</p>
                        </div>
                    </div>

                    <!-- Activity Item 3 -->
                    <div class="flex items-center space-x-4 p-4 bg-white rounded-xl border border-pink-100">
                        <div class="w-10 h-10 bg-yellow-100 rounded-full flex items-center justify-center text-yellow-600">
                            <i class="fas fa-star"></i>
                        </div>
                        <div class="flex-1">
                            <p class="font-semibold text-gray-800">Points Bertambah</p>
                            <p class="text-sm text-gray-600">Loyalty Program</p>
                        </div>
                        <div class="text-right">
                            <p class="font-bold text-pink-600">+150 Points</p>
                            <p class="text-xs text-gray-500">5 jam lalu</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="bg-gradient-to-r from-pink-500 to-pink-600 text-white py-6 mt-8">
        <div class="max-w-7xl mx-auto px-6 text-center">
            <div class="flex flex-col md:flex-row justify-between items-center">
                <div class="flex items-center space-x-3 mb-4 md:mb-0">
                    <div class="w-8 h-8 bg-white rounded-full flex items-center justify-center">
                        <i class="fas fa-plane-departure text-pink-600 text-sm"></i>
                    </div>
                    <span class="text-lg font-bold">Air Force One</span>
                </div>
                <div class="flex space-x-4">
                    <a href="#" class="text-white hover:text-pink-200 transition">
                        <i class="fab fa-facebook"></i>
                    </a>
                    <a href="#" class="text-white hover:text-pink-200 transition">
                        <i class="fab fa-twitter"></i>
                    </a>
                    <a href="#" class="text-white hover:text-pink-200 transition">
                        <i class="fab fa-instagram"></i>
                    </a>
                </div>
                <div class="mt-4 md:mt-0">
                    <p class="text-sm text-pink-100">&copy; 2024 Air Force One. Semua hak dilindungi.</p>
                </div>
            </div>
        </div>
    </footer>

    <script>
        // Add interactive animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add hover effects to cards
            const cards = document.querySelectorAll('.stat-card, .card-gradient');
            cards.forEach(card => {
                card.addEventListener('mouseenter', function() {
                    this.style.transform = 'translateY(-5px)';
                });
                
                card.addEventListener('mouseleave', function() {
                    this.style.transform = 'translateY(0)';
                });
            });

            // Add loading animation to buttons
            const buttons = document.querySelectorAll('.btn-pink, .btn-outline-pink');
            buttons.forEach(button => {
                button.addEventListener('click', function(e) {
                    if (this.href) {
                        const originalText = this.innerHTML;
                        this.innerHTML = `
                            <i class="fas fa-spinner fa-spin"></i>
                            <span>Loading...</span>
                        `;
                        this.disabled = true;
                        
                        setTimeout(() => {
                            this.innerHTML = originalText;
                            this.disabled = false;
                        }, 2000);
                    }
                });
            });
        });
    </script>
</body>
</html>