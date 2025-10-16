<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Force One - Login & Register</title>
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
        
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(214, 51, 132, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
        }
        
        .btn-pink {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            color: white;
            padding: 12px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
        }
        
        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 6px 20px rgba(214, 51, 132, 0.4);
        }
        
        .input-pink {
            border: 2px solid var(--primary-pink);
            border-radius: 12px;
            padding: 12px 15px;
            transition: all 0.3s ease;
        }
        
        .input-pink:focus {
            border-color: var(--accent-pink);
            outline: none;
            box-shadow: 0 0 0 3px rgba(230, 84, 128, 0.2);
        }
        
        .floating-plane {
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
        
        .toggle-form {
            transition: all 0.5s ease;
        }
        
        .hidden-form {
            opacity: 0;
            transform: translateX(50px);
            pointer-events: none;
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
        }
        
        .active-form {
            opacity: 1;
            transform: translateX(0);
            pointer-events: all;
            position: relative;
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <!-- Background Elements -->
    <div class="fixed top-10 left-10 text-pink-400 text-2xl floating-plane">
        <i class="fas fa-plane"></i>
    </div>
    <div class="fixed top-20 right-20 text-pink-300 text-3xl floating-plane" style="animation-delay: 1s;">
        <i class="fas fa-cloud"></i>
    </div>
    <div class="fixed bottom-20 left-20 text-pink-200 text-4xl floating-plane" style="animation-delay: 2s;">
        <i class="fas fa-heart"></i>
    </div>
    <div class="fixed bottom-10 right-10 text-pink-500 text-xl floating-plane" style="animation-delay: 1.5s;">
        <i class="fas fa-star"></i>
    </div>

    <!-- Main Container -->
    <div class="form-container w-full max-w-4xl overflow-hidden slide-in">
        <div class="flex flex-col md:flex-row">
            <!-- Left Side - Branding -->
            <div class="bg-gradient-to-br from-pink-500 to-pink-600 text-white p-8 md:w-2/5 flex flex-col justify-center items-center text-center">
                <div class="w-20 h-20 bg-white rounded-full flex items-center justify-center mb-6 pulse-animation">
                    <i class="fas fa-plane-departure text-pink-600 text-3xl"></i>
                </div>
                <h1 class="text-3xl font-bold mb-4">Air Force One</h1>
                <p class="text-pink-100 mb-6">Bergabunglah dengan kami untuk pengalaman penerbangan terbaik</p>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2 text-pink-200"></i>
                        <span>Penerbangan Tepat Waktu</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2 text-pink-200"></i>
                        <span>Layanan Premium</span>
                    </div>
                    <div class="flex items-center">
                        <i class="fas fa-check-circle mr-2 text-pink-200"></i>
                        <span>Keamanan Terjamin</span>
                    </div>
                </div>
            </div>

            <!-- Right Side - Forms -->
            <div class="p-8 md:w-3/5 relative">
                <!-- Login Form -->
                <div id="loginForm" class="toggle-form active-form">
                    <h2 class="text-2xl font-bold text-pink-800 mb-2">Selamat Datang Kembali</h2>
                    <p class="text-gray-600 mb-6">Masuk ke akun Anda untuk melanjutkan</p>

                    @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-600">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <div class="relative">
                                    <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="email" name="email" required 
                                           class="input-pink w-full pl-10" 
                                           placeholder="masukkan email Anda">
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                <div class="relative">
                                    <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="password" name="password" required 
                                           class="input-pink w-full pl-10" 
                                           placeholder="masukkan password Anda">
                                </div>
                            </div>
                            
                            <div class="flex items-center justify-between">
                                <label class="flex items-center">
                                    <input type="checkbox" class="rounded border-pink-300 text-pink-600 focus:ring-pink-500">
                                    <span class="ml-2 text-sm text-gray-600">Ingat saya</span>
                                </label>
                                <a href="#" class="text-sm text-pink-600 hover:text-pink-800">Lupa password?</a>
                            </div>
                            
                            <button type="submit" class="btn-pink w-full">
                                <i class="fas fa-sign-in-alt mr-2"></i>Masuk
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-gray-600">Belum punya akun? 
                            <button onclick="showRegister()" class="text-pink-600 font-semibold hover:text-pink-800 transition-colors">
                                Daftar di sini
                            </button>
                        </p>
                    </div>

                    <div class="mt-6 pt-6 border-t border-gray-200">
                        <p class="text-center text-gray-600 text-sm mb-3">Atau masuk dengan</p>
                        <div class="flex justify-center space-x-4">
                            <button class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition-colors">
                                <i class="fab fa-google"></i>
                            </button>
                            <button class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition-colors">
                                <i class="fab fa-facebook-f"></i>
                            </button>
                            <button class="w-10 h-10 rounded-full border border-gray-300 flex items-center justify-center text-gray-600 hover:bg-gray-50 transition-colors">
                                <i class="fab fa-twitter"></i>
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Register Form -->
                <div id="registerForm" class="toggle-form hidden-form">
                    <h2 class="text-2xl font-bold text-pink-800 mb-2">Buat Akun Baru</h2>
                    <p class="text-gray-600 mb-6">Bergabunglah dengan Air Force One</p>

                    @if ($errors->any())
                    <div class="mb-4 p-3 bg-red-50 border border-red-200 rounded-lg text-red-600">
                        <ul class="list-disc list-inside">
                            @foreach($errors->all() as $error)
                            <li class="text-sm">{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('register') }}" method="POST">
                        @csrf
                        <div class="space-y-4">
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Username</label>
                                    <div class="relative">
                                        <i class="fas fa-user absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" name="name" required 
                                               class="input-pink w-full pl-10" 
                                               placeholder="username">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                                    <div class="relative">
                                        <i class="fas fa-id-card absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" name="nama_lengkap" required 
                                               class="input-pink w-full pl-10" 
                                               placeholder="nama lengkap">
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                                <div class="relative">
                                    <i class="fas fa-envelope absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                    <input type="email" name="email" required 
                                           class="input-pink w-full pl-10" 
                                           placeholder="email@contoh.com">
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">No HP</label>
                                    <div class="relative">
                                        <i class="fas fa-phone absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="text" name="no_hp" required 
                                               class="input-pink w-full pl-10" 
                                               placeholder="08xxxxxxxxxx">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir</label>
                                    <div class="relative">
                                        <i class="fas fa-calendar absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="date" name="tanggal_lahir" required 
                                               class="input-pink w-full pl-10">
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-medium text-gray-700 mb-2">Alamat</label>
                                <div class="relative">
                                    <i class="fas fa-map-marker-alt absolute left-3 top-3 text-gray-400"></i>
                                    <textarea name="alamat" rows="2" required 
                                              class="input-pink w-full pl-10" 
                                              placeholder="alamat lengkap"></textarea>
                                </div>
                            </div>
                            
                            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Password</label>
                                    <div class="relative">
                                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="password" name="password" required 
                                               class="input-pink w-full pl-10" 
                                               placeholder="buat password">
                                    </div>
                                </div>
                                
                                <div>
                                    <label class="block text-sm font-medium text-gray-700 mb-2">Konfirmasi Password</label>
                                    <div class="relative">
                                        <i class="fas fa-lock absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
                                        <input type="password" name="password_confirmation" required 
                                               class="input-pink w-full pl-10" 
                                               placeholder="ulangi password">
                                    </div>
                                </div>
                            </div>
                            
                            <div class="flex items-center">
                                <input type="checkbox" required class="rounded border-pink-300 text-pink-600 focus:ring-pink-500">
                                <span class="ml-2 text-sm text-gray-600">
                                    Saya menyetujui 
                                    <a href="#" class="text-pink-600 hover:text-pink-800">Syarat & Ketentuan</a>
                                </span>
                            </div>
                            
                            <button type="submit" class="btn-pink w-full">
                                <i class="fas fa-user-plus mr-2"></i>Daftar Sekarang
                            </button>
                        </div>
                    </form>

                    <div class="mt-6 text-center">
                        <p class="text-gray-600">Sudah punya akun? 
                            <button onclick="showLogin()" class="text-pink-600 font-semibold hover:text-pink-800 transition-colors">
                                Masuk di sini
                            </button>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showRegister() {
            document.getElementById('loginForm').classList.remove('active-form');
            document.getElementById('loginForm').classList.add('hidden-form');
            document.getElementById('registerForm').classList.remove('hidden-form');
            document.getElementById('registerForm').classList.add('active-form');
        }

        function showLogin() {
            document.getElementById('registerForm').classList.remove('active-form');
            document.getElementById('registerForm').classList.add('hidden-form');
            document.getElementById('loginForm').classList.remove('hidden-form');
            document.getElementById('loginForm').classList.add('active-form');
        }

        // Auto-focus on first input when form becomes active
        document.addEventListener('DOMContentLoaded', function() {
            const observer = new MutationObserver(function(mutations) {
                mutations.forEach(function(mutation) {
                    if (mutation.type === 'attributes' && mutation.attributeName === 'class') {
                        const target = mutation.target;
                        if (target.classList.contains('active-form')) {
                            const firstInput = target.querySelector('input');
                            if (firstInput) firstInput.focus();
                        }
                    }
                });
            });

            observer.observe(document.getElementById('loginForm'), { attributes: true });
            observer.observe(document.getElementById('registerForm'), { attributes: true });
        });
    </script>
</body>
</html>