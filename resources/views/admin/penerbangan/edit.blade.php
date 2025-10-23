<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Penerbangan - Air Force One</title>
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
        
        .form-container {
            background: rgba(255, 255, 255, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 20px;
            box-shadow: 0 15px 35px rgba(214, 51, 132, 0.2);
            border: 1px solid rgba(255, 255, 255, 0.5);
            overflow: hidden;
        }
        
        .form-header {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            border-radius: 20px 20px 0 0;
        }
        
        .form-input {
            border: 1px solid var(--primary-pink);
            border-radius: 12px;
            transition: all 0.3s ease;
            background: rgba(255, 255, 255, 0.8);
        }
        
        .form-input:focus {
            border-color: var(--accent-pink);
            box-shadow: 0 0 0 3px rgba(231, 84, 128, 0.2);
            outline: none;
            background: white;
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
        
        .btn-secondary {
            background: rgba(255, 255, 255, 0.8);
            color: var(--dark-pink);
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            border: 1px solid var(--primary-pink);
        }
        
        .btn-secondary:hover {
            background: white;
            box-shadow: 0 4px 10px rgba(214, 51, 132, 0.2);
        }
        
        .flight-icon {
            background: linear-gradient(135deg, var(--accent-pink), var(--dark-pink));
            color: white;
            width: 70px;
            height: 70px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto;
            font-size: 28px;
            box-shadow: 0 5px 15px rgba(214, 51, 132, 0.4);
        }
        
        .status-active {
            background: linear-gradient(135deg, #a8e6cf 0%, #56ab2f 100%);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
        }
        
        .status-inactive {
            background: linear-gradient(135deg, #ff9a9e 0%, #f5576c 100%);
            color: white;
            padding: 6px 16px;
            border-radius: 20px;
            font-weight: 600;
            display: inline-block;
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
        
        .info-box {
            background: linear-gradient(135deg, #f8c8dc 0%, #f5a6c6 100%);
            border: 1px solid rgba(255, 255, 255, 0.5);
            border-radius: 16px;
        }
        
        .label-icon {
            background: linear-gradient(135deg, var(--accent-pink), var(--dark-pink));
            color: white;
            width: 32px;
            height: 32px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 10px;
            font-size: 14px;
        }
        
        .form-section {
            background: rgba(255, 255, 255, 0.5);
            border-radius: 16px;
            padding: 20px;
            margin-bottom: 20px;
            border: 1px solid rgba(255, 255, 255, 0.8);
        }
        
        .form-section-title {
            color: var(--dark-pink);
            font-weight: 600;
            margin-bottom: 15px;
            display: flex;
            align-items: center;
            font-size: 18px;
        }
        
        .plane-decoration {
            position: absolute;
            font-size: 1.5rem;
            opacity: 0.7;
            color: var(--accent-pink);
        }
    </style>
</head>
<body class="p-6">
    <!-- Dekorasi Pesawat Terbang -->
    <div class="plane-decoration floating" style="top: 5%; left: 5%; animation-delay: 0s;">
        <i class="fas fa-plane"></i>
    </div>
    <div class="plane-decoration floating" style="top: 10%; right: 5%; animation-delay: 1s;">
        <i class="fas fa-plane"></i>
    </div>
    <div class="plane-decoration floating" style="bottom: 15%; left: 8%; animation-delay: 2s;">
        <i class="fas fa-plane"></i>
    </div>
    
    <div class="max-w-3xl mx-auto fade-in">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center pulse-animation shadow-lg">
                    <i class="fas fa-plane-departure text-pink-600 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-pink-800">Air Force One</h1>
                    <p class="text-pink-600">Administrasi Penerbangan</p>
                </div>
            </div>
            <a href="{{ url()->previous() }}" class="btn-secondary px-5 py-3 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali
            </a>
        </div>
        
        <!-- Form Container -->
        <div class="form-container">
            <!-- Form Header -->
            <div class="form-header text-white p-8 text-center">
                <div class="flight-icon mb-4 floating">
                    <i class="fas fa-plane"></i>
                </div>
                <h1 class="text-3xl font-bold">Edit Penerbangan</h1>
                <p class="text-pink-100 mt-2 text-lg">Perbarui informasi penerbangan dengan data terbaru</p>
            </div>
            
            <!-- Form Content -->
            <div class="p-8">
                <form action="{{ route('admin.penerbangan.update', $penerbangan->id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    
                    <!-- Informasi Penerbangan -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <div class="label-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            Informasi Penerbangan
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-hashtag"></i>
                                    </div>
                                    Kode Penerbangan
                                </label>
                                <input type="text" name="kode_penerbangan" value="{{ $penerbangan->kode_penerbangan }}" 
                                    class="w-full form-input p-4" required>
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-plane"></i>
                                    </div>
                                    Maskapai
                                </label>
                                <input type="text" name="maskapai" value="{{ $penerbangan->maskapai }}" 
                                    class="w-full form-input p-4" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Rute Penerbangan -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <div class="label-icon">
                                <i class="fas fa-route"></i>
                            </div>
                            Rute Penerbangan
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    Kota Asal
                                </label>
                                <input type="text" name="asal" value="{{ $penerbangan->asal }}" 
                                    class="w-full form-input p-4" required>
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-map-marker-alt"></i>
                                    </div>
                                    Kota Tujuan
                                </label>
                                <input type="text" name="tujuan" value="{{ $penerbangan->tujuan }}" 
                                    class="w-full form-input p-4" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Jadwal Penerbangan -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <div class="label-icon">
                                <i class="fas fa-clock"></i>
                            </div>
                            Jadwal Penerbangan
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-plane-departure"></i>
                                    </div>
                                    Waktu Berangkat
                                </label>
                                <input type="datetime-local" name="waktu_berangkat" 
                                    value="{{ \Carbon\Carbon::parse($penerbangan->waktu_berangkat)->format('Y-m-d\TH:i') }}" 
                                    class="w-full form-input p-4" required>
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-plane-arrival"></i>
                                    </div>
                                    Waktu Tiba
                                </label>
                                <input type="datetime-local" name="waktu_tiba" 
                                    value="{{ \Carbon\Carbon::parse($penerbangan->waktu_tiba)->format('Y-m-d\TH:i') }}" 
                                    class="w-full form-input p-4" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Harga dan Kapasitas -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <div class="label-icon">
                                <i class="fas fa-money-bill-wave"></i>
                            </div>
                            Harga dan Kapasitas
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-tag"></i>
                                    </div>
                                    Harga (Rp)
                                </label>
                                <input type="number" name="harga" value="{{ $penerbangan->harga }}" 
                                    class="w-full form-input p-4" required>
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-chair"></i>
                                    </div>
                                    Kursi Tersedia
                                </label>
                                <input type="number" name="kursi_tersedia" value="{{ $penerbangan->kursi_tersedia }}" 
                                    class="w-full form-input p-4" required>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Status Penerbangan -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <div class="label-icon">
                                <i class="fas fa-info-circle"></i>
                            </div>
                            Status Penerbangan
                        </div>
                        
                        <div class="mb-2">
                            <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                <div class="label-icon">
                                    <i class="fas fa-toggle-on"></i>
                                </div>
                                Status
                            </label>
                            <select name="status" class="w-full form-input p-4" required>
                                <option value="Aktif" {{ $penerbangan->status=='Aktif'?'selected':'' }}>
                                    Aktif
                                </option>
                                <option value="Dibatalkan" {{ $penerbangan->status=='Dibatalkan'?'selected':'' }}>
                                    Dibatalkan
                                </option>
                            </select>
                        </div>
                        
                        <div class="mt-4 text-center">
                            @if($penerbangan->status == 'Aktif')
                                <span class="status-active">
                                    <i class="fas fa-check-circle mr-2"></i> Penerbangan Saat Ini: Aktif
                                </span>
                            @else
                                <span class="status-inactive">
                                    <i class="fas fa-times-circle mr-2"></i> Penerbangan Saat Ini: Dibatalkan
                                </span>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center pt-6 border-t border-pink-200 mt-6">
                        <a href="{{ url()->previous() }}" class="btn-secondary px-8 py-4 flex items-center text-lg">
                            <i class="fas fa-times mr-2"></i> Batal
                        </a>
                        <button type="submit" class="btn-primary px-8 py-4 flex items-center text-lg">
                            <i class="fas fa-save mr-2"></i> Update Penerbangan
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Info Box -->
        <div class="info-box mt-8 p-6 slide-in">
            <div class="flex items-start">
                <i class="fas fa-lightbulb text-pink-700 text-2xl mt-1 mr-4"></i>
                <div>
                    <h3 class="font-bold text-pink-800 text-xl mb-2">Tips Mengedit Penerbangan</h3>
                    <p class="text-pink-700">
                        Pastikan semua informasi yang Anda masukkan akurat dan sesuai dengan jadwal sebenarnya. 
                        Perubahan akan langsung berdampak pada sistem pemesanan tiket. Periksa kembali data sebelum menyimpan.
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>