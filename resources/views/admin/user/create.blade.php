<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah User - Admin Panel</title>
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
        
        .user-icon {
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
        
        .role-badge {
            background: linear-gradient(135deg, #8b5cf6, #7c3aed);
            color: white;
            padding: 4px 12px;
            border-radius: 20px;
            font-weight: 600;
            font-size: 0.75rem;
        }
    </style>
</head>
<body class="p-6">
    <!-- Dekorasi -->
    <div class="floating" style="position: absolute; top: 10%; left: 5%;">
        <i class="fas fa-user-plus text-pink-300 text-4xl"></i>
    </div>
    <div class="floating" style="position: absolute; bottom: 15%; right: 5%; animation-delay: 1s;">
        <i class="fas fa-users text-pink-300 text-4xl"></i>
    </div>
    
    <div class="max-w-4xl mx-auto fade-in">
        <!-- Header -->
        <div class="flex items-center justify-between mb-8">
            <div class="flex items-center space-x-4">
                <div class="w-14 h-14 bg-white rounded-full flex items-center justify-center pulse-animation shadow-lg">
                    <i class="fas fa-user-cog text-pink-600 text-2xl"></i>
                </div>
                <div>
                    <h1 class="text-3xl font-bold text-pink-800">Tambah User Baru</h1>
                    <p class="text-pink-600">Panel Administrasi Air Force One</p>
                </div>
            </div>
            <a href="{{ route('admin.user.index') }}" class="btn-secondary px-6 py-3 flex items-center">
                <i class="fas fa-arrow-left mr-2"></i> Kembali ke Daftar User
            </a>
        </div>
        
        <!-- Form Container -->
        <div class="form-container overflow-hidden">
            <!-- Form Header -->
            <div class="form-header text-white p-8 text-center">
                <div class="user-icon mb-4 floating">
                    <i class="fas fa-user-plus"></i>
                </div>
                <h1 class="text-3xl font-bold">Buat Akun User Baru</h1>
                <p class="text-pink-100 mt-2 text-lg">Isi informasi user dengan data yang valid</p>
            </div>
            
            <!-- Form Content -->
            <div class="p-8">
                <form action="{{ route('admin.user.store') }}" method="POST">
                    @csrf
                    
                    <!-- Informasi Akun -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <div class="label-icon">
                                <i class="fas fa-key"></i>
                            </div>
                            Informasi Akun
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-user"></i>
                                    </div>
                                    Username
                                </label>
                                <input type="text" name="name" class="w-full form-input p-4" required
                                       placeholder="Masukkan username">
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-envelope"></i>
                                    </div>
                                    Email
                                </label>
                                <input type="email" name="email" class="w-full form-input p-4" required
                                       placeholder="Masukkan alamat email">
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                <div class="label-icon">
                                    <i class="fas fa-lock"></i>
                                </div>
                                Password
                            </label>
                            <input type="password" name="password" class="w-full form-input p-4" required
                                   placeholder="Masukkan password">
                        </div>
                    </div>
                    
                    <!-- Informasi Pribadi -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <div class="label-icon">
                                <i class="fas fa-id-card"></i>
                            </div>
                            Informasi Pribadi
                        </div>
                        
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-signature"></i>
                                    </div>
                                    Nama Lengkap
                                </label>
                                <input type="text" name="nama_lengkap" class="w-full form-input p-4" required
                                       placeholder="Masukkan nama lengkap">
                            </div>
                            
                            <div>
                                <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                    <div class="label-icon">
                                        <i class="fas fa-phone"></i>
                                    </div>
                                    No HP
                                </label>
                                <input type="text" name="no_hp" class="w-full form-input p-4"
                                       placeholder="Masukkan nomor telepon">
                            </div>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                <div class="label-icon">
                                    <i class="fas fa-map-marker-alt"></i>
                                </div>
                                Alamat
                            </label>
                            <textarea name="alamat" class="w-full form-input p-4" rows="3"
                                      placeholder="Masukkan alamat lengkap"></textarea>
                        </div>
                        
                        <div class="mt-4">
                            <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                <div class="label-icon">
                                    <i class="fas fa-birthday-cake"></i>
                                </div>
                                Tanggal Lahir
                            </label>
                            <input type="date" name="tanggal_lahir" class="w-full form-input p-4">
                        </div>
                    </div>
                    
                    <!-- Role dan Hak Akses -->
                    <div class="form-section">
                        <div class="form-section-title">
                            <div class="label-icon">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            Role dan Hak Akses
                        </div>
                        
                        <div class="mb-2">
                            <label class="block text-gray-700 font-medium mb-3 flex items-center">
                                <div class="label-icon">
                                    <i class="fas fa-user-tag"></i>
                                </div>
                                Role User
                            </label>
                            <select name="role" class="w-full form-input p-4">
                                <option value="user">
                                    <span class="role-badge">User</span> - Akses standar untuk pemesanan tiket
                                </option>
                                <option value="admin">
                                    <span class="role-badge">Admin</span> - Akses penuh ke sistem administrasi
                                </option>
                            </select>
                        </div>
                        
                        <div class="mt-4 p-4 bg-yellow-50 border border-yellow-200 rounded-lg">
                            <div class="flex items-start">
                                <i class="fas fa-exclamation-triangle text-yellow-500 text-xl mt-1 mr-3"></i>
                                <div>
                                    <h4 class="font-semibold text-yellow-800">Perhatian!</h4>
                                    <p class="text-yellow-700 text-sm mt-1">
                                        Pastikan data yang dimasukkan sudah benar. Role "Admin" memberikan akses penuh ke sistem.
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Action Buttons -->
                    <div class="flex justify-between items-center pt-6 border-t border-pink-200 mt-6">
                        <a href="{{ route('admin.user.index') }}" class="btn-secondary px-8 py-4 flex items-center text-lg">
                            <i class="fas fa-times mr-2"></i> Batal
                        </a>
                        <button type="submit" class="btn-primary px-8 py-4 flex items-center text-lg">
                            <i class="fas fa-save mr-2"></i> Simpan User Baru
                        </button>
                    </div>
                </form>
            </div>
        </div>
        
        <!-- Info Box -->
        <div class="mt-8 bg-blue-50 border border-blue-200 rounded-xl p-6 slide-in">
            <div class="flex items-start">
                <i class="fas fa-lightbulb text-blue-500 text-2xl mt-1 mr-4"></i>
                <div>
                    <h3 class="font-bold text-blue-800 text-xl mb-2">Tips Menambah User</h3>
                    <ul class="text-blue-700 list-disc list-inside space-y-2">
                        <li>Pastikan username unik dan mudah diingat</li>
                        <li>Gunakan email yang valid untuk verifikasi</li>
                        <li>Password minimal 8 karakter dengan kombinasi huruf dan angka</li>
                        <li>Pilih role dengan hati-hati sesuai kebutuhan akses</li>
                    </ul>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Animasi untuk form submission
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            
            form.addEventListener('submit', function(e) {
                const button = this.querySelector('button[type="submit"]');
                const originalText = button.innerHTML;
                
                button.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i> Menyimpan...';
                button.disabled = true;
                
                // Simulasi loading
                setTimeout(() => {
                    button.innerHTML = originalText;
                    button.disabled = false;
                }, 3000);
            });
        });
    </script>
</body>
</html>