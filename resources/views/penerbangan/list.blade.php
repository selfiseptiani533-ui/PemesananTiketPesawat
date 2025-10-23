<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Air Force One — Daftar Penerbangan Premium</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/alpinejs/3.12.0/cdn.min.js" defer></script>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap');
        
        :root {
            --primary-pink: #f8c8dc;
            --secondary-pink: #f5a6c6;
            --accent-pink: #e75480;
            --dark-pink: #d63384;
            --light-pink: #fdf2f8;
            --text-dark: #4a044e;
            --deep-pink: #c2185b;
            --gold: #ffd700;
            --light-blue: #87ceeb;
        }
        
        body {
            background: linear-gradient(135deg, var(--light-pink) 0%, var(--primary-pink) 100%);
            min-height: 100vh;
            font-family: 'Poppins', sans-serif;
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
            background: linear-gradient(135deg, #a8e6cf 0%, #56ab2f 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
        
        .flight-status-inactive {
            background: linear-gradient(135deg, #ff9a9e 0%, #f5576c 100%);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
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
        
        .fade-in {
            animation: fadeIn 0.8s ease-in-out;
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .slide-in {
            animation: slideIn 0.5s ease-out;
        }
        
        @keyframes slideIn {
            from { transform: translateX(-20px); opacity: 0; }
            to { transform: translateX(0); opacity: 1; }
        }
        
        .bounce-in {
            animation: bounceIn 0.8s ease-out;
        }
        
        @keyframes bounceIn {
            0% { transform: scale(0.3); opacity: 0; }
            50% { transform: scale(1.05); opacity: 0.8; }
            70% { transform: scale(0.9); opacity: 0.9; }
            100% { transform: scale(1); opacity: 1; }
        }
        
        .stagger-animation > * {
            opacity: 0;
            animation: fadeIn 0.5s ease-out forwards;
        }
        
        .stagger-animation > *:nth-child(1) { animation-delay: 0.1s; }
        .stagger-animation > *:nth-child(2) { animation-delay: 0.2s; }
        .stagger-animation > *:nth-child(3) { animation-delay: 0.3s; }
        .stagger-animation > *:nth-child(4) { animation-delay: 0.4s; }
        .stagger-animation > *:nth-child(5) { animation-delay: 0.5s; }
        
        .search-box {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 16px;
            box-shadow: 0 8px 25px rgba(214, 51, 132, 0.15);
        }
        
        .flight-path {
            position: relative;
        }
        
        .flight-path::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 0;
            right: 0;
            height: 2px;
            background: linear-gradient(to right, transparent, var(--accent-pink), transparent);
            z-index: 0;
        }
        
        .flight-dot {
            position: relative;
            z-index: 1;
            background: var(--accent-pink);
            width: 12px;
            height: 12px;
            border-radius: 50%;
        }
        
        .flight-line {
            position: relative;
            z-index: 1;
            flex-grow: 1;
            height: 2px;
            background: var(--accent-pink);
        }
        
        .glow {
            box-shadow: 0 0 15px rgba(230, 84, 128, 0.5);
        }
        
        .glow:hover {
            box-shadow: 0 0 20px rgba(230, 84, 128, 0.7);
        }
        
        /* Animasi kupon */
        .coupon-card {
            background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);
            border-radius: 16px;
            overflow: hidden;
            position: relative;
            transition: all 0.4s ease;
        }
        
        .coupon-card:hover {
            transform: translateY(-5px) rotate(1deg);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.2);
        }
        
        .coupon-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 4px;
            background: linear-gradient(to right, #ff9a9e, #fad0c4, #ff9a9e);
            animation: shimmer 2s infinite;
        }
        
        @keyframes shimmer {
            0% { background-position: -200px 0; }
            100% { background-position: calc(200px + 100%) 0; }
        }
        
        .coupon-code {
            background: rgba(255, 255, 255, 0.9);
            border: 2px dashed #e75480;
            border-radius: 8px;
            padding: 8px 12px;
            font-weight: bold;
            color: #e75480;
            transition: all 0.3s ease;
        }
        
        .coupon-code:hover {
            background: #e75480;
            color: white;
            transform: scale(1.05);
        }
        
        /* Animasi partner maskapai */
        .partner-scroll {
            animation: scroll-partners 30s linear infinite;
        }
        
        @keyframes scroll-partners {
            0% { transform: translateX(0); }
            100% { transform: translateX(-50%); }
        }
        
        .partner-logo {
            transition: all 0.3s ease;
            filter: grayscale(100%);
            opacity: 0.7;
        }
        
        .partner-logo:hover {
            filter: grayscale(0%);
            opacity: 1;
            transform: scale(1.1);
        }
        
        /* Animasi confetti */
        .confetti {
            position: absolute;
            width: 10px;
            height: 10px;
            background: #f00;
            opacity: 0.7;
            border-radius: 50%;
            animation: confetti-fall 5s linear infinite;
        }
        
        @keyframes confetti-fall {
            0% {
                transform: translateY(-100px) rotate(0deg);
                opacity: 1;
            }
            100% {
                transform: translateY(1000px) rotate(360deg);
                opacity: 0;
            }
        }
        
        /* Animasi pesawat terbang */
        .flying-plane {
            position: absolute;
            font-size: 2rem;
            animation: fly 15s linear infinite;
            opacity: 0.7;
        }
        
        @keyframes fly {
            0% {
                transform: translateX(-100px) translateY(0) rotate(0deg);
            }
            25% {
                transform: translateX(25vw) translateY(-20px) rotate(5deg);
            }
            50% {
                transform: translateX(50vw) translateY(0) rotate(0deg);
            }
            75% {
                transform: translateX(75vw) translateY(20px) rotate(-5deg);
            }
            100% {
                transform: translateX(100vw) translateY(0) rotate(0deg);
            }
        }
        
        /* Animasi baru untuk kartu penerbangan */
        .flight-card-animated {
            background: linear-gradient(145deg, #ffffff, var(--primary-pink));
            border-radius: 20px;
            box-shadow: 0 10px 20px rgba(214, 51, 132, 0.1);
            transition: all 0.4s cubic-bezier(0.175, 0.885, 0.32, 1.275);
            overflow: hidden;
            position: relative;
        }
        
        .flight-card-animated:hover {
            transform: translateY(-10px) scale(1.02);
            box-shadow: 0 15px 30px rgba(214, 51, 132, 0.2);
        }
        
        .flight-card-animated::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            height: 5px;
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            transform: scaleX(0);
            transform-origin: left;
            transition: transform 0.4s ease;
        }
        
        .flight-card-animated:hover::before {
            transform: scaleX(1);
        }
        
        .flight-icon {
            width: 60px;
            height: 60px;
            background: linear-gradient(135deg, var(--accent-pink), var(--dark-pink));
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 24px;
            box-shadow: 0 5px 15px rgba(214, 51, 132, 0.3);
            animation: planeWiggle 3s ease-in-out infinite;
        }
        
        @keyframes planeWiggle {
            0%, 100% { transform: rotate(0deg); }
            25% { transform: rotate(5deg); }
            75% { transform: rotate(-5deg); }
        }
        
        .route-animation {
            position: relative;
            height: 40px;
            display: flex;
            align-items: center;
            justify-content: center;
        }
        
        .route-line {
            position: absolute;
            height: 3px;
            width: 100%;
            background: linear-gradient(to right, transparent, var(--accent-pink), transparent);
            z-index: 1;
        }
        
        .plane-marker {
            position: absolute;
            z-index: 2;
            color: var(--accent-pink);
            font-size: 20px;
            animation: planeMove 3s ease-in-out infinite;
        }
        
        @keyframes planeMove {
            0% { left: 10%; transform: translateX(0) rotate(0deg); }
            50% { left: 50%; transform: translateX(-50%) rotate(10deg); }
            100% { left: 90%; transform: translateX(-100%) rotate(0deg); }
        }
        
        .cloud-bg {
            position: absolute;
            width: 100%;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 0;
            overflow: hidden;
        }
        
        .cloud {
            position: absolute;
            background: rgba(255, 255, 255, 0.8);
            border-radius: 50%;
            box-shadow: 0 0 20px rgba(255, 255, 255, 0.5);
        }
        
        .cloud-1 {
            width: 100px;
            height: 40px;
            top: 10%;
            left: 5%;
            animation: cloudFloat 20s linear infinite;
        }
        
        .cloud-2 {
            width: 150px;
            height: 60px;
            top: 30%;
            right: 10%;
            animation: cloudFloat 25s linear infinite reverse;
        }
        
        .cloud-3 {
            width: 120px;
            height: 50px;
            bottom: 20%;
            left: 15%;
            animation: cloudFloat 30s linear infinite;
        }
        
        @keyframes cloudFloat {
            0% { transform: translateX(-100px); }
            100% { transform: translateX(calc(100vw + 100px)); }
        }
        
        .price-bubble {
            background: linear-gradient(135deg, var(--gold), #ffed4a);
            color: var(--text-dark);
            padding: 8px 16px;
            border-radius: 20px;
            font-weight: bold;
            box-shadow: 0 4px 10px rgba(255, 215, 0, 0.3);
            position: relative;
            animation: pricePulse 2s infinite;
        }
        
        @keyframes pricePulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        
        .status-badge {
            padding: 6px 12px;
            border-radius: 20px;
            font-weight: bold;
            font-size: 0.8rem;
            display: inline-flex;
            align-items: center;
            gap: 5px;
            animation: statusGlow 2s infinite alternate;
        }
        
        @keyframes statusGlow {
            0% { box-shadow: 0 0 5px currentColor; }
            100% { box-shadow: 0 0 15px currentColor; }
        }
        
        .booking-btn {
            background: linear-gradient(135deg, var(--accent-pink), var(--dark-pink));
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 10px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
        }
        
        .booking-btn::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(255, 255, 255, 0.3), transparent);
            transition: left 0.5s;
        }
        
        .booking-btn:hover::before {
            left: 100%;
        }
        
        .booking-btn:hover {
            transform: translateY(-3px);
            box-shadow: 0 5px 15px rgba(214, 51, 132, 0.4);
        }
        
        .flight-card-header {
            background: linear-gradient(135deg, var(--light-blue), #a6d8ff);
            padding: 15px;
            border-radius: 15px 15px 0 0;
            color: white;
            font-weight: bold;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        
        .flight-card-body {
            padding: 20px;
        }
        
        .destination-highlight {
            font-size: 1.2rem;
            font-weight: bold;
            color: var(--text-dark);
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
        }
        
        .time-display {
            background: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 10px;
            text-align: center;
            margin: 10px 0;
            box-shadow: 0 3px 10px rgba(0, 0, 0, 0.1);
        }
        
        .duration-display {
            background: linear-gradient(135deg, var(--primary-pink), var(--secondary-pink));
            color: white;
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            display: inline-block;
            margin: 10px 0;
        }
        
        .flight-features {
            display: flex;
            justify-content: space-around;
            margin: 15px 0;
        }
        
        .flight-feature {
            text-align: center;
            font-size: 0.8rem;
        }
        
        .feature-icon-small {
            width: 30px;
            height: 30px;
            background: var(--light-blue);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 5px;
            color: white;
        }
        
        .empty-state {
            text-align: center;
            padding: 40px 20px;
            color: var(--text-dark);
        }
        
        .empty-icon {
            font-size: 4rem;
            color: var(--primary-pink);
            margin-bottom: 20px;
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-20px); }
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 30px;
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -10px;
            left: 0;
            width: 100%;
            height: 4px;
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            border-radius: 2px;
        }
        
        .filter-buttons {
            display: flex;
            gap: 10px;
            margin-bottom: 20px;
            flex-wrap: wrap;
        }
        
        .filter-btn {
            background: white;
            border: 2px solid var(--accent-pink);
            color: var(--accent-pink);
            padding: 8px 15px;
            border-radius: 20px;
            font-weight: bold;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        
        .filter-btn:hover, .filter-btn.active {
            background: var(--accent-pink);
            color: white;
        }
        
        .flight-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(350px, 1fr));
            gap: 20px;
        }
        
        @media (max-width: 768px) {
            .flight-grid {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="min-h-screen flex flex-col" x-data="{ activeFilter: 'all' }">

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
    <section class="hero-gradient text-white py-16 relative overflow-hidden">
        <!-- Background dengan awan -->
        <div class="cloud-bg">
            <div class="cloud cloud-1"></div>
            <div class="cloud cloud-2"></div>
            <div class="cloud cloud-3"></div>
        </div>
        
        <!-- Pesawat terbang animasi -->
        <div class="flying-plane" style="top: 20%; animation-delay: 0s;">
            <i class="fas fa-plane text-white"></i>
        </div>
        <div class="flying-plane" style="top: 60%; animation-delay: 5s;">
            <i class="fas fa-plane text-white"></i>
        </div>
        <div class="flying-plane" style="top: 40%; animation-delay: 10s;">
            <i class="fas fa-plane text-white"></i>
        </div>
        
        <div class="absolute inset-0 opacity-10">
            <div class="absolute top-10 left-10 floating" style="animation-delay: 0s;">
                <i class="fas fa-plane text-6xl"></i>
            </div>
            <div class="absolute top-20 right-20 floating" style="animation-delay: 1s;">
                <i class="fas fa-cloud text-4xl"></i>
            </div>
            <div class="absolute bottom-20 left-20 floating" style="animation-delay: 2s;">
                <i class="fas fa-suitcase text-5xl"></i>
            </div>
            <div class="absolute bottom-10 right-10 floating" style="animation-delay: 1.5s;">
                <i class="fas fa-passport text-4xl"></i>
            </div>
        </div>
        <div class="max-w-7xl mx-auto px-6 text-center relative z-10">
            <h1 class="text-5xl font-bold mb-6 fade-in">Daftar Penerbangan</h1>
            <p class="text-xl max-w-2xl mx-auto mb-8 fade-in" style="animation-delay: 0.2s;">Temukan penerbangan terbaik dengan kenyamanan dan layanan premium dari Air Force One</p>
            
            <div class="flex justify-center space-x-4 stagger-animation">
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
                <div class="bg-white/20 rounded-lg p-4 backdrop-blur-sm">
                    <i class="fas fa-concierge-bell text-2xl mb-2"></i>
                    <p class="font-semibold">Layanan Premium</p>
                </div>
            </div>
        </div>
    </section>

    {{-- 🔹 Section Kupon Spesial --}}
    <section class="py-12 bg-gradient-to-r from-pink-500 to-pink-600 relative overflow-hidden">
        <!-- Confetti animasi -->
        <div id="confetti-container"></div>
        
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-10">
                <h2 class="text-4xl font-bold text-white mb-4 fade-in">Kupon Spesial Untukmu, <span class="text-yellow-300">SERBUI!</span></h2>
                <p class="text-xl text-white/90 max-w-2xl mx-auto">Dapatkan penawaran terbaik untuk penerbangan impian Anda</p>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
                <!-- Kupon 1 -->
                <div class="coupon-card p-6 text-white relative overflow-hidden">
                    <div class="absolute top-2 right-2 bg-yellow-400 text-pink-800 text-xs font-bold px-2 py-1 rounded-full">
                        HOT
                    </div>
                    <div class="mb-4">
                        <h3 class="text-xl font-bold mb-2">Cashback s.d. 100rb</h3>
                        <p class="text-sm">Dengan minimum transaksi Rp 1.500.000</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="coupon-code">TEBRANGDOM</span>
                        <button class="bg-white text-pink-600 px-3 py-1 rounded-lg font-semibold hover:bg-gray-100 transition-all">
                            Salin
                        </button>
                    </div>
                </div>
                
                <!-- Kupon 2 -->
                <div class="coupon-card p-6 text-white relative overflow-hidden" style="background: linear-gradient(135deg, #f8c8dc 0%, #e75480 100%);">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold mb-2">Diskon Rp300rb</h3>
                        <p class="text-sm">Berlaku untuk tiket pesawat dan hotel dengan TPaylater</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="coupon-code">PLNEWUSER</span>
                        <button class="bg-white text-pink-600 px-3 py-1 rounded-lg font-semibold hover:bg-gray-100 transition-all">
                            Salin
                        </button>
                    </div>
                </div>
                
                <!-- Kupon 3 -->
                <div class="coupon-card p-6 text-white relative overflow-hidden" style="background: linear-gradient(135deg, #f5a6c6 0%, #d63384 100%);">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold mb-2">Diskon s.d. 300rb</h3>
                        <p class="text-sm">Minimum transaksi Rp800rb untuk penerbangan domestik</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="coupon-code">PETERBANG</span>
                        <button class="bg-white text-pink-600 px-3 py-1 rounded-lg font-semibold hover:bg-gray-100 transition-all">
                            Salin
                        </button>
                    </div>
                </div>
                
                <!-- Kupon 4 -->
                <div class="coupon-card p-6 text-white relative overflow-hidden" style="background: linear-gradient(135deg, #ff9a9e 0%, #fad0c4 100%);">
                    <div class="mb-4">
                        <h3 class="text-xl font-bold mb-2">Cashback s.d. 300rb</h3>
                        <p class="text-sm">Dengan minimum transaksi Rp 4.000.000</p>
                    </div>
                    <div class="flex justify-between items-center">
                        <span class="coupon-code">TEBRANGINT</span>
                        <button class="bg-white text-pink-600 px-3 py-1 rounded-lg font-semibold hover:bg-gray-100 transition-all">
                            Salin
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🔹 Section Partner Maskapai --}}
    <section class="py-16 bg-white">
        <div class="max-w-7xl mx-auto px-6">
            <div class="text-center mb-12">
                <h2 class="text-4xl font-bold text-gray-800 mb-4 fade-in">Partner Maskapai</h2>
                <p class="text-xl text-gray-600 max-w-3xl mx-auto">Lengkap, Resmi, Tepercaya! Kami bekerja sama dengan aneka maskapai penerbangan terbaik di dunia, bawa Anda terbang ke mana pun Anda inginkan</p>
            </div>
            
            <div class="relative overflow-hidden">
                <div class="partner-scroll flex space-x-12 py-4">
                    <!-- Baris pertama maskapai -->
                    <div class="flex space-x-12">
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Garuda Indonesia</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Citilink</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Sriwijaya Air</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Lion Air</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Batik Air</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Air Asia</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Super Air Jet</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Scoot</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Singapore Airlines</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Cathay Pacific</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Thai Airways</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Qatar Airways</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Emirates</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Ethiad Airways</span>
                        </div>
                    </div>
                    
                    <!-- Duplikat untuk efek scroll tak terbatas -->
                    <div class="flex space-x-12">
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Garuda Indonesia</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Citilink</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Sriwijaya Air</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Lion Air</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Batik Air</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Air Asia</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Super Air Jet</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Scoot</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Singapore Airlines</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Cathay Pacific</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Thai Airways</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Qatar Airways</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Emirates</span>
                        </div>
                        <div class="partner-logo w-32 h-16 bg-pink-50 rounded-lg flex items-center justify-center border border-pink-200">
                            <span class="font-bold text-pink-600">Ethiad Airways</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {{-- 🔹 Konten utama --}}
    <main class="flex-grow p-6">
        <div class="max-w-7xl mx-auto">
            <div class="bg-white/80 backdrop-blur-sm rounded-2xl shadow-xl p-6 mb-8">
                <div class="flex justify-between items-center mb-6">
                    <h2 class="text-2xl font-bold text-pink-800 section-title">Penerbangan Tersedia</h2>
                    <div class="filter-buttons">
                        <button class="filter-btn" :class="{ 'active': activeFilter === 'all' }" @click="activeFilter = 'all'">Semua</button>
                        <button class="filter-btn" :class="{ 'active': activeFilter === 'domestic' }" @click="activeFilter = 'domestic'">Domestik</button>
                        <button class="filter-btn" :class="{ 'active': activeFilter === 'international' }" @click="activeFilter = 'international'">Internasional</button>
                        <button class="filter-btn" :class="{ 'active': activeFilter === 'promo' }" @click="activeFilter = 'promo'">Promo</button>
                    </div>
                </div>
                
                <div class="flight-grid">
                    @forelse($penerbangan as $p)
                    <div class="flight-card-animated">
                        <div class="flight-card-header">
                            <div class="flex items-center">
                                <div class="flight-icon">
                                    <i class="fas fa-plane"></i>
                                </div>
                                <div class="ml-3">
                                    <div class="text-lg">{{ $p->maskapai }}</div>
                                    <div class="text-sm opacity-90">{{ $p->kode_penerbangan }}</div>
                                </div>
                            </div>
                            @if($p->status === 'Aktif')
                                <div class="status-badge" style="background: linear-gradient(135deg, #a8e6cf 0%, #56ab2f 100%); color: white;">
                                    <i class="fas fa-check-circle"></i> Aktif
                                </div>
                            @else
                                <div class="status-badge" style="background: linear-gradient(135deg, #ff9a9e 0%, #f5576c 100%); color: white;">
                                    <i class="fas fa-times-circle"></i> {{ $p->status }}
                                </div>
                            @endif
                        </div>
                        
                        <div class="flight-card-body">
                            <div class="destination-highlight">
                                <span>{{ substr($p->asal, 0, 3) }}</span>
                                <div class="route-animation">
                                    <div class="route-line"></div>
                                    <div class="plane-marker">
                                        <i class="fas fa-plane"></i>
                                    </div>
                                </div>
                                <span>{{ substr($p->tujuan, 0, 3) }}</span>
                            </div>
                            
                            <div class="time-display">
                                <div class="font-bold text-lg">
                                    {{ \Carbon\Carbon::parse($p->waktu_berangkat)->format('H:i') }} - {{ \Carbon\Carbon::parse($p->waktu_tiba)->format('H:i') }}
                                </div>
                                <div class="text-sm text-gray-600">
                                    {{ \Carbon\Carbon::parse($p->waktu_berangkat)->format('d M Y') }}
                                </div>
                            </div>
                            
                            @php
                                $berangkat = \Carbon\Carbon::parse($p->waktu_berangkat);
                                $tiba = \Carbon\Carbon::parse($p->waktu_tiba);
                                $durasi = $berangkat->diff($tiba);
                            @endphp
                            
                            <div class="duration-display">
                                <i class="fas fa-clock mr-2"></i> {{ $durasi->h }} jam {{ $durasi->i }} menit
                            </div>
                            
                            <div class="flight-features">
                                <div class="flight-feature">
                                    <div class="feature-icon-small">
                                        <i class="fas fa-utensils"></i>
                                    </div>
                                    <div>Makanan</div>
                                </div>
                                <div class="flight-feature">
                                    <div class="feature-icon-small">
                                        <i class="fas fa-suitcase"></i>
                                    </div>
                                    <div>Bagasi 20kg</div>
                                </div>
                                <div class="flight-feature">
                                    <div class="feature-icon-small">
                                        <i class="fas fa-tv"></i>
                                    </div>
                                    <div>Hiburan</div>
                                </div>
                            </div>
                            
                            <div class="flex justify-between items-center mt-4">
                                <div class="price-bubble">
                                    Rp {{ number_format($p->harga,0,',','.') }}
                                </div>
                                
                                @if($p->status === 'Aktif')
                                    @auth
                                        <div class="flex flex-col space-y-2">
                                            @foreach($p->kelas as $kelas)
                                                <a href="{{ route('pemesanan.create', $kelas->id) }}" 
                                                   class="booking-btn text-center text-sm">
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
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-span-full">
                        <div class="empty-state">
                            <div class="empty-icon">
                                <i class="fas fa-plane-slash"></i>
                            </div>
                            <h3 class="text-2xl font-bold mb-2">Tidak ada penerbangan tersedia</h3>
                            <p class="text-pink-600 max-w-md mx-auto">Silakan coba lagi nanti atau hubungi customer service kami untuk informasi lebih lanjut.</p>
                        </div>
                    </div>
                    @endforelse
                </div>
                
                <div class="flex justify-center mt-8">
                    <button class="bg-pink-100 text-pink-700 px-6 py-3 rounded-lg font-medium hover:bg-pink-200 transition-all flex items-center">
                        <i class="fas fa-chevron-down mr-2"></i>Muat Lebih Banyak Penerbangan
                    </button>
                </div>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mb-8 stagger-animation">
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
            
            <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-2xl p-8 text-white text-center mb-8 bounce-in">
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

    <script>
        // Animasi confetti
        function createConfetti() {
            const container = document.getElementById('confetti-container');
            const colors = ['#ff69b4', '#ff1493', '#db7093', '#c71585', '#ffb6c1'];
            
            for (let i = 0; i < 50; i++) {
                const confetti = document.createElement('div');
                confetti.className = 'confetti';
                confetti.style.left = Math.random() * 100 + 'vw';
                confetti.style.background = colors[Math.floor(Math.random() * colors.length)];
                confetti.style.animationDelay = Math.random() * 5 + 's';
                container.appendChild(confetti);
            }
        }
        
        // Jalankan animasi confetti saat halaman dimuat
        document.addEventListener('DOMContentLoaded', function() {
            createConfetti();
            
            // Animasi untuk tombol salin kupon
            document.querySelectorAll('.coupon-code').forEach(code => {
                code.addEventListener('click', function() {
                    const text = this.textContent;
                    navigator.clipboard.writeText(text).then(() => {
                        // Efek visual saat kode disalin
                        const originalText = this.textContent;
                        this.textContent = 'Tersalin!';
                        this.style.background = '#e75480';
                        this.style.color = 'white';
                        
                        setTimeout(() => {
                            this.textContent = originalText;
                            this.style.background = 'rgba(255, 255, 255, 0.9)';
                            this.style.color = '#e75480';
                        }, 2000);
                    });
                });
            });
            
            // Animasi untuk kartu penerbangan saat muncul
            const flightCards = document.querySelectorAll('.flight-card-animated');
            flightCards.forEach((card, index) => {
                card.style.animationDelay = `${index * 0.1}s`;
                card.classList.add('fade-in');
            });
        });
    </script>
</body>
</html>