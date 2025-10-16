<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Force One - Login</title>
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
        
        .login-container {
            background: rgba(255, 255, 255, 0.95);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 20px 40px rgba(214, 51, 132, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
            overflow: hidden;
        }
        
        .btn-pink {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            color: white;
            padding: 14px 20px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
        }
        
        .btn-pink:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(214, 51, 132, 0.4);
        }
        
        .input-pink {
            border: 2px solid var(--primary-pink);
            border-radius: 12px;
            padding: 14px 16px 14px 45px;
            transition: all 0.3s ease;
            font-size: 16px;
        }
        
        .input-pink:focus {
            border-color: var(--accent-pink);
            outline: none;
            box-shadow: 0 0 0 3px rgba(230, 84, 128, 0.2);
            transform: translateY(-1px);
        }
        
        .floating-plane {
            animation: floating 3s ease-in-out infinite;
        }
        
        @keyframes floating {
            0% { transform: translate(0, 0px) rotate(0deg); }
            50% { transform: translate(0, 15px) rotate(2deg); }
            100% { transform: translate(0, 0px) rotate(0deg); }
        }
        
        .pulse-animation {
            animation: pulse 2s infinite;
        }
        
        @keyframes pulse {
            0% {
                box-shadow: 0 0 0 0 rgba(230, 84, 128, 0.7);
            }
            70% {
                box-shadow: 0 0 0 15px rgba(230, 84, 128, 0);
            }
            100% {
                box-shadow: 0 0 0 0 rgba(230, 84, 128, 0);
            }
        }
        
        .slide-in {
            animation: slideIn 0.8s ease-out;
        }
        
        @keyframes slideIn {
            from {
                opacity: 0;
                transform: translateY(40px) scale(0.95);
            }
            to {
                opacity: 1;
                transform: translateY(0) scale(1);
            }
        }
        
        .bounce-in {
            animation: bounceIn 1s ease-out;
        }
        
        @keyframes bounceIn {
            0% {
                opacity: 0;
                transform: scale(0.3);
            }
            50% {
                opacity: 1;
                transform: scale(1.05);
            }
            70% {
                transform: scale(0.9);
            }
            100% {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .icon-float {
            animation: iconFloat 4s ease-in-out infinite;
        }
        
        @keyframes iconFloat {
            0%, 100% { transform: translateY(0px) rotate(0deg); }
            33% { transform: translateY(-8px) rotate(3deg); }
            66% { transform: translateY(5px) rotate(-2deg); }
        }
        
        .glow-text {
            text-shadow: 0 0 20px rgba(230, 84, 128, 0.3);
        }
        
        .social-btn {
            transition: all 0.3s ease;
            border: 2px solid var(--primary-pink);
        }
        
        .social-btn:hover {
            transform: translateY(-2px);
            border-color: var(--accent-pink);
            box-shadow: 0 5px 15px rgba(214, 51, 132, 0.2);
        }
    </style>
</head>
<body class="min-h-screen flex items-center justify-center p-4">
    <!-- Animated Background Elements -->
    <div class="fixed top-5 left-5 text-pink-400 text-3xl floating-plane" style="animation-delay: 0s;">
        <i class="fas fa-plane"></i>
    </div>
    <div class="fixed top-10 right-10 text-pink-300 text-4xl floating-plane" style="animation-delay: 1s;">
        <i class="fas fa-cloud"></i>
    </div>
    <div class="fixed bottom-10 left-10 text-pink-200 text-5xl floating-plane" style="animation-delay: 2s;">
        <i class="fas fa-heart"></i>
    </div>
    <div class="fixed bottom-5 right-5 text-pink-500 text-2xl floating-plane" style="animation-delay: 1.5s;">
        <i class="fas fa-star"></i>
    </div>
    <div class="fixed top-1/3 left-1/4 text-pink-300 text-xl floating-plane" style="animation-delay: 0.5s;">
        <i class="fas fa-passport"></i>
    </div>
    <div class="fixed bottom-1/3 right-1/4 text-pink-400 text-lg floating-plane" style="animation-delay: 2.5s;">
        <i class="fas fa-suitcase"></i>
    </div>

    <!-- Main Login Container -->
    <div class="login-container w-full max-w-md slide-in">
        <!-- Header Section -->
        <div class="bg-gradient-to-r from-pink-500 to-pink-600 text-white p-8 text-center">
            <div class="w-24 h-24 bg-white rounded-full flex items-center justify-center mx-auto mb-4 pulse-animation bounce-in">
                <i class="fas fa-plane-departure text-pink-600 text-4xl icon-float"></i>
            </div>
            <h1 class="text-3xl font-bold mb-2 glow-text">Air Force One</h1>
            <p class="text-pink-100 opacity-90">Masuk ke akun Anda untuk pengalaman penerbangan terbaik</p>
        </div>

        <!-- Login Form Section -->
        <div class="p-8">
            <!-- Error Message -->
            @if(session('error'))
            <div class="mb-6 p-4 bg-red-50 border border-red-200 rounded-xl text-red-600 text-center transform transition-all duration-300 hover:scale-105">
                <div class="flex items-center justify-center">
                    <i class="fas fa-exclamation-circle mr-2"></i>
                    <span class="font-medium">{{ session('error') }}</span>
                </div>
            </div>
            @endif

            <form action="{{ route('login') }}" method="POST" class="space-y-6">
                @csrf
                
                <!-- Email Input -->
                <div class="space-y-2">
                    <label class="block text-sm font-semibold text-gray-700">Email</label>
                    <div class="relative">
                        <i class="fas fa-envelope absolute left-4 top-1/2 transform -translate-y-1/2 text-pink-400 text-lg"></i>
                        <input type="email" name="email" required 
                               class="input-pink w-full transition-all duration-300" 
                               placeholder="masukkan email Anda">
                    </div>
                </div>
                
                <!-- Password Input -->
                <div class="space-y-2">
                    <div class="flex items-center justify-between">
                        <label class="block text-sm font-semibold text-gray-700">Password</label>
                        <a href="#" class="text-xs text-pink-600 hover:text-pink-800 transition-colors">
                            Lupa password?
                        </a>
                    </div>
                    <div class="relative">
                        <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-pink-400 text-lg"></i>
                        <input type="password" name="password" required 
                               class="input-pink w-full transition-all duration-300" 
                               placeholder="masukkan password Anda">
                    </div>
                </div>
                
                <!-- Remember Me -->
                <div class="flex items-center">
                    <input type="checkbox" id="remember" class="w-4 h-4 text-pink-600 bg-gray-100 border-gray-300 rounded focus:ring-pink-500 focus:ring-2">
                    <label for="remember" class="ml-2 text-sm text-gray-600">Ingat saya</label>
                </div>
                
                <!-- Login Button -->
                <button type="submit" class="btn-pink w-full group transition-all duration-300">
                    <span class="flex items-center justify-center">
                        <i class="fas fa-sign-in-alt mr-3 group-hover:translate-x-1 transition-transform duration-300"></i>
                        Masuk ke Akun
                    </span>
                </button>
            </form>

            <!-- Divider -->
            <div class="my-6 flex items-center">
                <div class="flex-1 border-t border-gray-200"></div>
                <span class="px-4 text-sm text-gray-500">atau lanjutkan dengan</span>
                <div class="flex-1 border-t border-gray-200"></div>
            </div>

            <!-- Social Login -->
            <div class="grid grid-cols-3 gap-3 mb-6">
                <button class="social-btn p-3 rounded-xl flex items-center justify-center text-gray-600 hover:text-pink-600">
                    <i class="fab fa-google text-lg"></i>
                </button>
                <button class="social-btn p-3 rounded-xl flex items-center justify-center text-gray-600 hover:text-pink-600">
                    <i class="fab fa-facebook-f text-lg"></i>
                </button>
                <button class="social-btn p-3 rounded-xl flex items-center justify-center text-gray-600 hover:text-pink-600">
                    <i class="fab fa-twitter text-lg"></i>
                </button>
            </div>

            <!-- Register Link -->
            <div class="text-center pt-4 border-t border-gray-100">
                <p class="text-gray-600">
                    Belum punya akun? 
                    <a href="{{ route('register') }}" class="text-pink-600 font-semibold hover:text-pink-800 transition-colors duration-300 inline-flex items-center">
                        Daftar sekarang
                        <i class="fas fa-arrow-right ml-1 text-sm transform transition-transform duration-300 hover:translate-x-1"></i>
                    </a>
                </p>
            </div>
        </div>

        <!-- Footer -->
        <div class="bg-pink-50 p-4 text-center">
            <p class="text-xs text-gray-600">
                &copy; 2024 Air Force One. Semua hak dilindungi.
            </p>
        </div>
    </div>

    <!-- Floating Action Button -->
    <div class="fixed bottom-6 right-6">
        <button class="w-12 h-12 bg-pink-500 text-white rounded-full flex items-center justify-center shadow-lg hover:shadow-xl transition-all duration-300 hover:scale-110 pulse-animation">
            <i class="fas fa-headset"></i>
        </button>
    </div>

    <script>
        // Add interactive effects
        document.addEventListener('DOMContentLoaded', function() {
            // Add focus effects to inputs
            const inputs = document.querySelectorAll('.input-pink');
            inputs.forEach(input => {
                input.addEventListener('focus', function() {
                    this.parentElement.querySelector('i').classList.add('text-pink-600');
                    this.parentElement.querySelector('i').classList.remove('text-pink-400');
                });
                
                input.addEventListener('blur', function() {
                    this.parentElement.querySelector('i').classList.remove('text-pink-600');
                    this.parentElement.querySelector('i').classList.add('text-pink-400');
                });
            });

            // Add loading state to login button
            const loginForm = document.querySelector('form');
            loginForm.addEventListener('submit', function() {
                const button = this.querySelector('button[type="submit"]');
                button.innerHTML = `
                    <span class="flex items-center justify-center">
                        <i class="fas fa-spinner fa-spin mr-3"></i>
                        Memproses...
                    </span>
                `;
                button.disabled = true;
            });

            // Add hover effects to social buttons
            const socialButtons = document.querySelectorAll('.social-btn');
            socialButtons.forEach(btn => {
                btn.addEventListener('mouseenter', function() {
                    const icon = this.querySelector('i');
                    if (icon.classList.contains('fa-google')) {
                        this.classList.add('hover:bg-red-50');
                    } else if (icon.classList.contains('fa-facebook-f')) {
                        this.classList.add('hover:bg-blue-50');
                    } else if (icon.classList.contains('fa-twitter')) {
                        this.classList.add('hover:bg-sky-50');
                    }
                });
                
                btn.addEventListener('mouseleave', function() {
                    this.classList.remove('hover:bg-red-50', 'hover:bg-blue-50', 'hover:bg-sky-50');
                });
            });
        });
    </script>
</body>
</html>