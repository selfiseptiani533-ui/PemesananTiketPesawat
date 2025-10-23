<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Upload Pembayaran - Air Force One</title>
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
      background: linear-gradient(135deg, var(--light-pink) 0%, var(--primary-pink) 100%);
      min-height: 100vh;
      font-family: 'Poppins', sans-serif;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    
    .card-gradient {
      background: linear-gradient(145deg, #ffffff, var(--primary-pink));
      border: 1px solid rgba(255, 255, 255, 0.5);
      box-shadow: 0 20px 40px rgba(214, 51, 132, 0.15);
    }
    
    .btn-primary {
      background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
      color: white;
      padding: 12px 24px;
      border-radius: 12px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(214, 51, 132, 0.4);
    }
    
    .input-field {
      border: 2px solid #f1f5f9;
      border-radius: 12px;
      padding: 12px 16px;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.8);
    }
    
    .input-field:focus {
      border-color: var(--accent-pink);
      box-shadow: 0 0 0 3px rgba(231, 84, 128, 0.1);
      background: white;
    }
    
    .file-upload {
      border: 2px dashed #e2e8f0;
      border-radius: 12px;
      padding: 40px 20px;
      text-align: center;
      transition: all 0.3s ease;
      background: rgba(255, 255, 255, 0.5);
      cursor: pointer;
    }
    
    .file-upload:hover {
      border-color: var(--accent-pink);
      background: rgba(255, 255, 255, 0.8);
    }
    
    .file-upload.dragover {
      border-color: var(--accent-pink);
      background: rgba(231, 84, 128, 0.1);
    }
    
    .price-tag {
      background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
      color: white;
      padding: 8px 16px;
      border-radius: 12px;
      font-weight: 700;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
    }
    
    .fade-in {
      animation: fadeIn 0.8s ease-in-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
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
    
    .success-check {
      color: #10b981;
      animation: bounceIn 0.6s ease-out;
    }
    
    @keyframes bounceIn {
      0% { transform: scale(0.3); opacity: 0; }
      50% { transform: scale(1.05); opacity: 0.8; }
      70% { transform: scale(0.9); opacity: 0.9; }
      100% { transform: scale(1); opacity: 1; }
    }
  </style>
</head>
<body class="p-6">
  <div class="max-w-2xl w-full fade-in">
    <!-- Header Card -->
    <div class="card-gradient rounded-2xl p-8 mb-6">
      <div class="flex items-center justify-between mb-6">
        <div class="flex items-center">
          <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center pulse-animation mr-4">
            <i class="fas fa-credit-card text-pink-600 text-2xl"></i>
          </div>
          <div>
            <h1 class="text-3xl font-bold text-gray-800">Konfirmasi Pembayaran</h1>
            <p class="text-gray-600">Selesaikan pembayaran untuk pesanan Anda</p>
          </div>
        </div>
        <div class="text-right">
          <div class="text-sm text-gray-500">ID Pesanan</div>
          <div class="font-bold text-pink-600 text-xl">#{{ $pemesanan->id }}</div>
        </div>
      </div>

      <!-- Order Summary -->
      <div class="bg-pink-50 rounded-xl p-6 mb-6">
        <h3 class="font-bold text-gray-800 mb-4 flex items-center">
          <i class="fas fa-receipt mr-2 text-pink-600"></i>Ringkasan Pesanan
        </h3>
        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
          <div>
            <p class="text-gray-600 text-sm">Penerbangan</p>
            <p class="font-semibold text-gray-800">
              {{ $pemesanan->penerbangan->asal }} → {{ $pemesanan->penerbangan->tujuan }}
            </p>
          </div>
          <div>
            <p class="text-gray-600 text-sm">Kelas</p>
            <p class="font-semibold text-gray-800">{{ $pemesanan->kelas->nama_kelas }}</p>
          </div>
          <div>
            <p class="text-gray-600 text-sm">Jumlah Tiket</p>
            <p class="font-semibold text-gray-800">{{ $pemesanan->jumlah_tiket }} orang</p>
          </div>
          <div>
            <p class="text-gray-600 text-sm">Total Pembayaran</p>
            <div class="price-tag inline-block">Rp {{ number_format($pemesanan->total_harga,0,',','.') }}</div>
          </div>
        </div>
      </div>
    </div>

    <!-- Payment Form Card -->
    <div class="card-gradient rounded-2xl p-8">
      @if ($errors->any())
        <div class="mb-6 p-4 bg-red-50 border border-red-200 text-red-700 rounded-xl">
          <div class="flex items-center mb-2">
            <i class="fas fa-exclamation-triangle mr-2"></i>
            <span class="font-semibold">Perhatian!</span>
          </div>
          <ul class="list-disc list-inside text-sm">
            @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
            @endforeach
          </ul>
        </div>
      @endif

      <form action="{{ route('pembayaran.store') }}" method="POST" enctype="multipart/form-data" id="paymentForm">
        @csrf
        <input type="hidden" name="pemesanan_id" value="{{ $pemesanan->id }}">
        <input type="hidden" name="jumlah" value="{{ $pemesanan->total_harga }}">
        <input type="hidden" name="tanggal_bayar" value="{{ now()->format('Y-m-d') }}">

        <!-- Payment Method -->
        <div class="mb-6">
          <label class="block mb-3 font-semibold text-gray-700">
            <i class="fas fa-wallet mr-2 text-pink-600"></i>Metode Pembayaran
          </label>
          <select name="metode_pembayaran" class="input-field w-full" required>
            <option value="">-- Pilih Metode Pembayaran --</option>
            <option value="Transfer">Transfer Bank</option>
            <option value="E-Wallet">E-Wallet</option>
            <option value="Virtual Account">Virtual Account</option>
            <option value="Credit Card">Kartu Kredit</option>
          </select>
        </div>

        <!-- File Upload -->
        <div class="mb-8">
          <label class="block mb-3 font-semibold text-gray-700">
            <i class="fas fa-file-upload mr-2 text-pink-600"></i>Upload Bukti Pembayaran
          </label>
          
          <div class="file-upload" id="fileUploadArea">
            <input type="file" name="bukti_pembayaran" accept="image/*" class="hidden" id="fileInput" required>
            <div class="text-center">
              <i class="fas fa-cloud-upload-alt text-4xl text-gray-400 mb-3"></i>
              <p class="text-gray-600 font-semibold mb-2">Klik atau drag file ke sini</p>
              <p class="text-gray-500 text-sm">Format: JPG, PNG (Maks. 5MB)</p>
              <div class="mt-3" id="fileName"></div>
            </div>
          </div>
        </div>

        <!-- Payment Instructions -->
        <div class="bg-blue-50 border border-blue-200 rounded-xl p-4 mb-6">
          <h4 class="font-semibold text-blue-800 mb-2 flex items-center">
            <i class="fas fa-info-circle mr-2"></i>Petunjuk Pembayaran
          </h4>
          <ul class="text-blue-700 text-sm list-disc list-inside space-y-1">
            <li>Pastikan bukti pembayaran jelas terbaca</li>
            <li>File harus dalam format JPG atau PNG</li>
            <li>Maksimal ukuran file 5MB</li>
            <li>Proses verifikasi membutuhkan waktu 1-2 jam kerja</li>
          </ul>
        </div>

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4">
          <button type="submit" class="btn-primary flex-1 flex items-center justify-center" id="submitBtn">
            <i class="fas fa-paper-plane mr-2"></i>Kirim Bukti Pembayaran
          </button>
          <a href="{{ url()->previous() }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all text-center flex items-center justify-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
          </a>
        </div>
      </form>
    </div>

    <!-- Security Info -->
    <div class="mt-6 text-center text-gray-600 text-sm">
      <p><i class="fas fa-shield-alt mr-2 text-pink-600"></i>Data pembayaran Anda aman dan terenkripsi</p>
    </div>
  </div>

  <script>
    document.addEventListener('DOMContentLoaded', function() {
      const fileInput = document.getElementById('fileInput');
      const fileUploadArea = document.getElementById('fileUploadArea');
      const fileName = document.getElementById('fileName');
      const submitBtn = document.getElementById('submitBtn');
      const paymentForm = document.getElementById('paymentForm');

      // File upload handling
      fileUploadArea.addEventListener('click', () => {
        fileInput.click();
      });

      fileInput.addEventListener('change', function(e) {
        if (this.files && this.files[0]) {
          const file = this.files[0];
          fileName.innerHTML = `
            <div class="bg-green-50 border border-green-200 rounded-lg p-3">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <i class="fas fa-check-circle text-green-500 mr-2"></i>
                  <span class="font-semibold text-green-700">${file.name}</span>
                </div>
                <span class="text-green-600 text-sm">${(file.size / 1024 / 1024).toFixed(2)} MB</span>
              </div>
            </div>
          `;
          fileUploadArea.classList.add('border-green-400', 'bg-green-50');
        }
      });

      // Drag and drop functionality
      fileUploadArea.addEventListener('dragover', (e) => {
        e.preventDefault();
        fileUploadArea.classList.add('dragover');
      });

      fileUploadArea.addEventListener('dragleave', () => {
        fileUploadArea.classList.remove('dragover');
      });

      fileUploadArea.addEventListener('drop', (e) => {
        e.preventDefault();
        fileUploadArea.classList.remove('dragover');
        
        if (e.dataTransfer.files && e.dataTransfer.files[0]) {
          fileInput.files = e.dataTransfer.files;
          const file = e.dataTransfer.files[0];
          fileName.innerHTML = `
            <div class="bg-green-50 border border-green-200 rounded-lg p-3">
              <div class="flex items-center justify-between">
                <div class="flex items-center">
                  <i class="fas fa-check-circle text-green-500 mr-2"></i>
                  <span class="font-semibold text-green-700">${file.name}</span>
                </div>
                <span class="text-green-600 text-sm">${(file.size / 1024 / 1024).toFixed(2)} MB</span>
              </div>
            </div>
          `;
          fileUploadArea.classList.add('border-green-400', 'bg-green-50');
        }
      });

      // Form submission handling
      paymentForm.addEventListener('submit', function(e) {
        const file = fileInput.files[0];
        if (file) {
          // Check file size (5MB limit)
          if (file.size > 5 * 1024 * 1024) {
            e.preventDefault();
            alert('Ukuran file terlalu besar. Maksimal 5MB.');
            return;
          }
          
          // Show loading state
          submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengupload...';
          submitBtn.disabled = true;
        }
      });

      // Add focus effects to inputs
      const inputs = document.querySelectorAll('.input-field');
      inputs.forEach(input => {
        input.addEventListener('focus', function() {
          this.parentElement.classList.add('ring-2', 'ring-pink-200', 'rounded-xl');
        });
        
        input.addEventListener('blur', function() {
          this.parentElement.classList.remove('ring-2', 'ring-pink-200', 'rounded-xl');
        });
      });
    });
  </script>
</body>
</html>