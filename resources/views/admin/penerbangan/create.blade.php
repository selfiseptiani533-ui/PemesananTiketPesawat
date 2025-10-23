<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Penerbangan - Admin Panel</title>
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
            border-radius: 16px;
        }
        
        .form-input {
            border: 2px solid #e5e7eb;
            border-radius: 10px;
            padding: 12px 16px;
            transition: all 0.3s ease;
            width: 100%;
        }
        
        .form-input:focus {
            border-color: var(--accent-pink);
            box-shadow: 0 0 0 3px rgba(231, 84, 128, 0.1);
            outline: none;
        }
        
        .form-label {
            color: var(--text-dark);
            font-weight: 500;
            margin-bottom: 8px;
            display: block;
        }
        
        .btn-pink {
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            color: white;
            padding: 12px 24px;
            border-radius: 12px;
            font-weight: 600;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(214, 51, 132, 0.3);
            border: none;
            cursor: pointer;
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
            text-decoration: none;
            display: inline-flex;
            align-items: center;
            gap: 8px;
        }
        
        .btn-outline-pink:hover {
            background: var(--accent-pink);
            color: white;
        }
        
        .kelas-card {
            background: rgba(255, 255, 255, 0.8);
            border-radius: 12px;
            border: 2px dashed var(--primary-pink);
            transition: all 0.3s ease;
        }
        
        .kelas-card:hover {
            border-color: var(--accent-pink);
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(214, 51, 132, 0.1);
        }
        
        .section-title {
            position: relative;
            display: inline-block;
            margin-bottom: 20px;
            color: var(--text-dark);
        }
        
        .section-title::after {
            content: '';
            position: absolute;
            bottom: -8px;
            left: 0;
            width: 100%;
            height: 3px;
            background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
            border-radius: 2px;
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
        
        .required-field::after {
            content: '*';
            color: var(--accent-pink);
            margin-left: 4px;
        }
        
        .form-group {
            margin-bottom: 20px;
        }
        
        .grid-2 {
            display: grid;
            grid-template-columns: 1fr 1fr;
            gap: 16px;
        }
        
        @media (max-width: 768px) {
            .grid-2 {
                grid-template-columns: 1fr;
            }
        }
    </style>
</head>
<body class="min-h-screen">
    <!-- Header -->
    <header class="navbar-gradient text-white p-4 shadow-lg">
        <div class="max-w-6xl mx-auto flex justify-between items-center">
            <div class="flex items-center space-x-3">
                <div class="w-10 h-10 bg-white rounded-full flex items-center justify-center pulse-animation">
                    <i class="fas fa-plane-departure text-pink-600 text-lg"></i>
                </div>
                <div>
                    <div class="text-xl font-bold tracking-wide">Air Force One</div>
                    <div class="text-sm opacity-80">Admin Panel - Tambah Penerbangan</div>
                </div>
            </div>
            <a href="{{ route('admin.penerbangan.index') }}" class="btn-outline-pink">
                <i class="fas fa-arrow-left"></i>
                Kembali
            </a>
        </div>
    </header>

    <!-- Main Content -->
    <main class="p-6 max-w-4xl mx-auto">
        <div class="card-gradient p-8 shadow-xl fade-in">
            <div class="flex items-center mb-6">
                <div class="w-12 h-12 bg-gradient-to-r from-pink-500 to-pink-600 rounded-full flex items-center justify-center text-white mr-4">
                    <i class="fas fa-plus text-lg"></i>
                </div>
                <div>
                    <h1 class="text-2xl font-bold text-gray-800">Tambah Penerbangan Baru</h1>
                    <p class="text-gray-600">Isi formulir di bawah untuk menambahkan penerbangan baru ke sistem</p>
                </div>
            </div>

            <form action="{{ route('admin.penerbangan.store') }}" method="POST">
                @csrf
                
                <!-- Informasi Penerbangan -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 section-title">Informasi Penerbangan</h2>
                    
                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label required-field">Kode Penerbangan</label>
                            <input type="text" name="kode_penerbangan" class="form-input" placeholder="Contoh: AF001" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required-field">Maskapai</label>
                            <input type="text" name="maskapai" class="form-input" placeholder="Contoh: Air Force One" required>
                        </div>
                    </div>
                    
                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label required-field">Kota Asal</label>
                            <input type="text" name="asal" class="form-input" placeholder="Contoh: Jakarta" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required-field">Kota Tujuan</label>
                            <input type="text" name="tujuan" class="form-input" placeholder="Contoh: Bali" required>
                        </div>
                    </div>
                    
                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label required-field">Waktu Berangkat</label>
                            <input type="datetime-local" name="waktu_berangkat" class="form-input" required>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required-field">Waktu Tiba</label>
                            <input type="datetime-local" name="waktu_tiba" class="form-input" required>
                        </div>
                    </div>
                    
                    <div class="grid-2">
                        <div class="form-group">
                            <label class="form-label required-field">Harga Dasar</label>
                            <div class="relative">
                                <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                                <input type="number" name="harga" class="form-input pl-10" placeholder="0" min="0" required>
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label required-field">Kursi Tersedia</label>
                            <input type="number" name="kursi_tersedia" class="form-input" placeholder="0" min="0" required>
                        </div>
                    </div>
                    
                    <div class="form-group">
                        <label class="form-label required-field">Status</label>
                        <select name="status" class="form-input" required>
                            <option value="">Pilih Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Batal">Batal</option>
                        </select>
                    </div>
                </div>

                <!-- Kelas Penerbangan -->
                <div class="mb-8">
                    <h2 class="text-xl font-semibold text-gray-800 mb-4 section-title">Kelas Penerbangan</h2>
                    <p class="text-gray-600 mb-4">Tentukan harga dan fasilitas untuk setiap kelas penerbangan</p>
                    
                    @php
                        $kelasList = ['Ekonomi', 'Bisnis', 'First Class'];
                        $kelasIcons = ['fas fa-user', 'fas fa-briefcase', 'fas fa-crown'];
                        $kelasColors = ['from-green-400 to-green-500', 'from-blue-400 to-blue-500', 'from-purple-400 to-purple-500'];
                    @endphp
                    
                    @foreach($kelasList as $kelas)
                    <div class="kelas-card p-6 mb-6">
                        <div class="flex items-center mb-4">
                            <div class="w-10 h-10 bg-gradient-to-r {{ $kelasColors[$loop->index] }} rounded-full flex items-center justify-center text-white mr-3">
                                <i class="{{ $kelasIcons[$loop->index] }}"></i>
                            </div>
                            <h3 class="text-lg font-semibold text-gray-800">{{ $kelas }}</h3>
                        </div>
                        
                        <div class="grid-2">
                            <div class="form-group">
                                <label class="form-label required-field">Nama Kelas</label>
                                <input type="text" value="{{ $kelas }}" name="kelas[{{ $loop->index }}][nama_kelas]" readonly class="form-input bg-gray-100">
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label required-field">Harga Kelas</label>
                                <div class="relative">
                                    <span class="absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-500">Rp</span>
                                    <input type="number" name="kelas[{{ $loop->index }}][harga]" class="form-input pl-10" placeholder="0" min="0" required>
                                </div>
                            </div>
                        </div>
                        
                        <div class="grid-2">
                            <div class="form-group">
                                <label class="form-label required-field">Jumlah Kursi</label>
                                <input type="number" name="kelas[{{ $loop->index }}][jumlah_kursi]" class="form-input" placeholder="0" min="0" required>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Deskripsi (opsional)</label>
                                <input type="text" name="kelas[{{ $loop->index }}][deskripsi]" class="form-input" placeholder="Deskripsi singkat...">
                            </div>
                        </div>
                        
                        <div class="form-group">
                            <label class="form-label">Fasilitas (opsional)</label>
                            <input type="text" name="kelas[{{ $loop->index }}][fasilitas]" class="form-input" placeholder="Fasilitas yang tersedia...">
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Action Buttons -->
                <div class="flex justify-between items-center pt-6 border-t border-gray-200">
                    <a href="{{ route('admin.penerbangan.index') }}" class="btn-outline-pink">
                        <i class="fas fa-times"></i>
                        Batal
                    </a>
                    <button type="submit" class="btn-pink flex items-center">
                        <i class="fas fa-save mr-2"></i>
                        Simpan Penerbangan
                    </button>
                </div>
            </form>
        </div>
    </main>

    <script>
        // Validasi form sederhana
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            const requiredInputs = form.querySelectorAll('[required]');
            
            // Tambah efek visual untuk input yang diisi
            requiredInputs.forEach(input => {
                input.addEventListener('blur', function() {
                    if (this.value.trim() !== '') {
                        this.classList.add('border-green-400');
                    } else {
                        this.classList.remove('border-green-400');
                    }
                });
            });
            
            // Validasi waktu (waktu tiba harus setelah waktu berangkat)
            const waktuBerangkat = document.querySelector('input[name="waktu_berangkat"]');
            const waktuTiba = document.querySelector('input[name="waktu_tiba"]');
            
            function validateTime() {
                if (waktuBerangkat.value && waktuTiba.value) {
                    if (new Date(waktuTiba.value) <= new Date(waktuBerangkat.value)) {
                        waktuTiba.setCustomValidity('Waktu tiba harus setelah waktu berangkat');
                    } else {
                        waktuTiba.setCustomValidity('');
                    }
                }
            }
            
            waktuBerangkat.addEventListener('change', validateTime);
            waktuTiba.addEventListener('change', validateTime);
        });
    </script>
</body>
</html>