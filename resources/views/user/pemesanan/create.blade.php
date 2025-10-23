<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pesan Tiket - Air Force One</title>
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
    }
    
    .card-gradient {
      background: linear-gradient(145deg, #ffffff, var(--primary-pink));
      border: 1px solid rgba(255, 255, 255, 0.5);
      box-shadow: 0 10px 30px rgba(214, 51, 132, 0.15);
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
    
    .flight-path {
      position: relative;
      display: flex;
      align-items: center;
      justify-content: space-between;
      margin: 20px 0;
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
    
    .price-tag {
      background: linear-gradient(to right, var(--accent-pink), var(--dark-pink));
      color: white;
      padding: 8px 16px;
      border-radius: 12px;
      font-weight: 700;
      box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
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
    
    .fade-in {
      animation: fadeIn 0.8s ease-in-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
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
  </style>
</head>
<body class="min-h-screen p-6 flex items-center justify-center">
  <div class="max-w-2xl w-full fade-in">
    <!-- Header Card -->
    <div class="card-gradient rounded-2xl p-8 mb-6 text-center">
      <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center mx-auto mb-4 pulse-animation">
        <i class="fas fa-plane-departure text-pink-600 text-2xl"></i>
      </div>
      <h1 class="text-3xl font-bold text-gray-800 mb-2">Pesan Tiket</h1>
      <p class="text-gray-600 mb-6">Air Force One — Perjalanan Nyaman & Terjangkau</p>
      
      <!-- Flight Route -->
      <div class="flight-path">
        <div class="text-center z-10 bg-white p-3 rounded-xl shadow-sm">
          <div class="font-bold text-pink-700 text-xl">{{ $kelas->penerbangan->asal }}</div>
          <div class="text-sm text-gray-500">Keberangkatan</div>
        </div>
        <div class="flight-dot mx-2"></div>
        <div class="flight-line"></div>
        <div class="flight-dot mx-2"></div>
        <div class="text-center z-10 bg-white p-3 rounded-xl shadow-sm">
          <div class="font-bold text-pink-700 text-xl">{{ $kelas->penerbangan->tujuan }}</div>
          <div class="text-sm text-gray-500">Tujuan</div>
        </div>
      </div>
    </div>

    <!-- Main Form Card -->
    <div class="card-gradient rounded-2xl p-8 bounce-in">
      <!-- Flight Info -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
        <div class="bg-pink-50 p-4 rounded-xl text-center">
          <i class="fas fa-chair text-pink-600 text-xl mb-2"></i>
          <h3 class="font-bold text-gray-800">Kelas</h3>
          <p class="text-pink-700 font-semibold">{{ $kelas->nama_kelas }}</p>
        </div>
        
        <div class="bg-pink-50 p-4 rounded-xl text-center">
          <i class="fas fa-tag text-pink-600 text-xl mb-2"></i>
          <h3 class="font-bold text-gray-800">Harga Tiket</h3>
          <p class="text-pink-700 font-semibold">Rp {{ number_format($kelas->harga,0,',','.') }}</p>
        </div>
        
        <div class="bg-pink-50 p-4 rounded-xl text-center">
          <i class="fas fa-users text-pink-600 text-xl mb-2"></i>
          <h3 class="font-bold text-gray-800">Sisa Kursi</h3>
          <p class="text-pink-700 font-semibold">{{ $kelas->sisa_kursi }}</p>
        </div>
      </div>

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

      <form action="{{ route('pemesanan.store') }}" method="POST">
        @csrf
        <input type="hidden" name="kelas_id" value="{{ $kelas->id }}">

        <!-- Jumlah Tiket -->
        <div class="mb-6">
          <label class="block mb-3 font-semibold text-gray-700">
            <i class="fas fa-ticket-alt mr-2 text-pink-600"></i>Jumlah Tiket
          </label>
          <div class="relative">
            <input type="number" 
                   id="jumlah_tiket"
                   name="jumlah_tiket" 
                   min="1" 
                   max="{{ $kelas->sisa_kursi }}" 
                   value="{{ old('jumlah_tiket', 1) }}" 
                   class="input-field w-full pr-20">
            <div class="absolute right-3 top-1/2 transform -translate-y-1/2 text-gray-500">
              Maks: {{ $kelas->sisa_kursi }}
            </div>
          </div>
        </div>

        <!-- Catatan -->
        <div class="mb-8">
          <label class="block mb-3 font-semibold text-gray-700">
            <i class="fas fa-sticky-note mr-2 text-pink-600"></i>Catatan (opsional)
          </label>
          <textarea name="catatan" 
                    rows="3" 
                    class="input-field w-full resize-none"
                    placeholder="Tambahkan catatan khusus untuk penerbangan Anda...">{{ old('catatan') }}</textarea>
        </div>

        <!-- Total Harga -->
        <div class="bg-gradient-to-r from-pink-500 to-pink-600 rounded-xl p-6 mb-8 text-white text-center">
          <div class="flex justify-between items-center mb-2">
            <span class="text-pink-100">Total Pembayaran:</span>
            <span id="total_harga" class="text-2xl font-bold">Rp {{ number_format($kelas->harga,0,',','.') }}</span>
          </div>
          <p class="text-pink-200 text-sm">Termasuk semua pajak dan biaya layanan</p>
        </div>

        <input type="hidden" name="total_harga" id="hidden_total_harga" value="{{ $kelas->harga }}">

        <!-- Action Buttons -->
        <div class="flex flex-col sm:flex-row gap-4">
          <button type="submit" class="btn-primary flex-1 flex items-center justify-center">
            <i class="fas fa-shopping-cart mr-2"></i>Pesan Sekarang
          </button>
          <a href="{{ url()->previous() }}" class="bg-gray-100 text-gray-700 px-6 py-3 rounded-xl font-semibold hover:bg-gray-200 transition-all text-center flex items-center justify-center">
            <i class="fas fa-arrow-left mr-2"></i>Kembali
          </a>
        </div>
      </form>
    </div>

    <!-- Additional Info -->
    <div class="mt-6 text-center text-gray-600 text-sm">
      <p><i class="fas fa-shield-alt mr-2 text-pink-600"></i>Pembayaran aman dan terenkripsi</p>
    </div>
  </div>

  <script>
    const jumlahInput = document.getElementById('jumlah_tiket');
    const totalHargaEl = document.getElementById('total_harga');
    const hiddenTotalInput = document.getElementById('hidden_total_harga');
    const hargaTiket = {{ $kelas->harga }};

    jumlahInput.addEventListener('input', () => {
      let jumlah = parseInt(jumlahInput.value) || 1;
      jumlah = Math.max(1, Math.min(jumlah, {{ $kelas->sisa_kursi }}));
      let total = jumlah * hargaTiket;
      totalHargaEl.textContent = 'Rp ' + new Intl.NumberFormat('id-ID').format(total);
      hiddenTotalInput.value = total;
      
      // Update input value if it was adjusted
      jumlahInput.value = jumlah;
    });

    // Add some interactive effects
    document.addEventListener('DOMContentLoaded', function() {
      // Add focus effect to inputs
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