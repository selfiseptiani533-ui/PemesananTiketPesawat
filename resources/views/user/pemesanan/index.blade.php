<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Pemesanan Saya - Air Force One</title>
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
      padding: 10px 20px;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(214, 51, 132, 0.3);
    }
    
    .btn-primary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(214, 51, 132, 0.4);
    }
    
    .btn-secondary {
      background: linear-gradient(to right, #4facfe, #00f2fe);
      color: white;
      padding: 10px 20px;
      border-radius: 10px;
      font-weight: 600;
      transition: all 0.3s ease;
      box-shadow: 0 4px 15px rgba(79, 172, 254, 0.3);
    }
    
    .btn-secondary:hover {
      transform: translateY(-2px);
      box-shadow: 0 6px 20px rgba(79, 172, 254, 0.4);
    }
    
    .status-badge {
      padding: 6px 12px;
      border-radius: 20px;
      font-weight: 600;
      font-size: 0.875rem;
    }
    
    .status-pending {
      background: linear-gradient(135deg, #ffd89b, #19547b);
      color: white;
    }
    
    .status-success {
      background: linear-gradient(135deg, #a8e6cf, #56ab2f);
      color: white;
    }
    
    .status-processing {
      background: linear-gradient(135deg, #ff9a9e, #fad0c4);
      color: white;
    }
    
    .flight-card {
      transition: all 0.3s ease;
      border-left: 4px solid transparent;
    }
    
    .flight-card:hover {
      transform: translateY(-3px);
      box-shadow: 0 10px 25px rgba(214, 51, 132, 0.2);
      border-left-color: var(--accent-pink);
    }
    
    .fade-in {
      animation: fadeIn 0.8s ease-in-out;
    }
    
    @keyframes fadeIn {
      from { opacity: 0; transform: translateY(20px); }
      to { opacity: 1; transform: translateY(0); }
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
<body class="min-h-screen p-6">
  <div class="max-w-7xl mx-auto">
    <!-- Header Section -->
    <div class="card-gradient rounded-2xl p-8 mb-8 text-center fade-in">
      <div class="flex items-center justify-center mb-4">
        <div class="w-16 h-16 bg-white rounded-full flex items-center justify-center pulse-animation mr-4">
          <i class="fas fa-shopping-bag text-pink-600 text-2xl"></i>
        </div>
        <div>
          <h1 class="text-4xl font-bold text-gray-800 mb-2">Pemesanan Saya</h1>
          <p class="text-gray-600 text-lg">Kelola dan lacak semua pemesanan tiket Anda</p>
        </div>
      </div>
      
      <!-- Stats Overview -->
      <div class="grid grid-cols-1 md:grid-cols-3 gap-6 mt-6">
        <div class="bg-pink-50 p-4 rounded-xl">
          <div class="text-2xl font-bold text-pink-600 mb-1">{{ $data->count() }}</div>
          <div class="text-gray-600">Total Pemesanan</div>
        </div>
        <div class="bg-pink-50 p-4 rounded-xl">
          <div class="text-2xl font-bold text-pink-600 mb-1">
            {{ $data->where('pembayaran.status', 'Diterima')->count() }}
          </div>
          <div class="text-gray-600">Terkonfirmasi</div>
        </div>
        <div class="bg-pink-50 p-4 rounded-xl">
          <div class="text-2xl font-bold text-pink-600 mb-1">
            {{ $data->where('pembayaran', null)->count() }}
          </div>
          <div class="text-gray-600">Menunggu Pembayaran</div>
        </div>
      </div>
    </div>

    <!-- Pemesanan List -->
    <div class="space-y-6 stagger-animation">
      @forelse($data as $d)
      <div class="card-gradient rounded-2xl p-6 flight-card">
        <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
          <!-- Flight Info -->
          <div class="flex-1 mb-4 lg:mb-0">
            <div class="flex items-center mb-3">
              <div class="w-12 h-12 bg-pink-100 rounded-full flex items-center justify-center mr-4">
                <i class="fas fa-plane text-pink-600"></i>
              </div>
              <div>
                <h3 class="font-bold text-gray-800 text-lg">
                  {{ $d->penerbangan->kode_penerbangan }} • {{ $d->penerbangan->asal }} → {{ $d->penerbangan->tujuan }}
                </h3>
                <p class="text-gray-600 text-sm">ID Pemesanan: #{{ $d->id }}</p>
              </div>
            </div>
            
            <div class="grid grid-cols-2 md:grid-cols-4 gap-4 mt-4">
              <div>
                <p class="text-gray-500 text-sm">Kelas</p>
                <p class="font-semibold text-gray-800">{{ $d->kelas->nama_kelas }}</p>
              </div>
              <div>
                <p class="text-gray-500 text-sm">Jumlah Tiket</p>
                <p class="font-semibold text-gray-800">{{ $d->jumlah_tiket }} orang</p>
              </div>
              <div>
                <p class="text-gray-500 text-sm">Total Harga</p>
                <p class="font-semibold text-pink-600">Rp {{ number_format($d->total_harga,0,',','.') }}</p>
              </div>
              <div>
                <p class="text-gray-500 text-sm">Status</p>
                <span class="status-badge 
                  @if($d->pembayaran && $d->pembayaran->status === 'Diterima') status-success
                  @elseif($d->pembayaran) status-processing
                  @else status-pending @endif">
                  @if(!$d->pembayaran)
                    Menunggu Pembayaran
                  @else
                    {{ $d->pembayaran->status }}
                  @endif
                </span>
              </div>
            </div>
          </div>
          
          <!-- Action Buttons -->
          <div class="flex flex-col sm:flex-row lg:flex-col gap-3">
            @if(!$d->pembayaran)
              <a href="{{ route('pembayaran.create', $d->id) }}" class="btn-primary text-center">
                <i class="fas fa-credit-card mr-2"></i>Bayar Sekarang
              </a>
            @elseif($d->pembayaran->status === 'Diterima')
              <a href="{{ route('invoice.show', $d->id) }}" class="btn-secondary text-center">
                <i class="fas fa-file-invoice mr-2"></i>Lihat Invoice
              </a>
            @else
              <div class="text-center">
                <span class="text-gray-600 font-semibold">{{ $d->pembayaran->status }}</span>
                <p class="text-gray-500 text-sm mt-1">Menunggu konfirmasi</p>
              </div>
            @endif
            
            <!-- Additional Info -->
            <div class="text-center text-gray-500 text-sm">
              <i class="fas fa-clock mr-1"></i>
              {{ $d->created_at->format('d M Y, H:i') }}
            </div>
          </div>
        </div>
        
        <!-- Progress Bar for Payment Status -->
        @if($d->pembayaran)
        <div class="mt-4">
          <div class="flex justify-between text-sm text-gray-600 mb-2">
            <span>Status Pembayaran</span>
            <span>
              @if($d->pembayaran->status === 'Diterima') Selesai
              @elseif($d->pembayaran->status === 'Diproses') Diproses
              @elseif($d->pembayaran->status === 'Ditolak') Ditolak
              @else Menunggu @endif
            </span>
          </div>
          <div class="w-full bg-gray-200 rounded-full h-2">
            <div class="h-2 rounded-full 
              @if($d->pembayaran->status === 'Diterima') bg-green-500 w-full
              @elseif($d->pembayaran->status === 'Diproses') bg-yellow-500 w-2/3
              @elseif($d->pembayaran->status === 'Ditolak') bg-red-500 w-full
              @else bg-blue-500 w-1/3 @endif">
            </div>
          </div>
        </div>
        @endif
      </div>
      @empty
      <!-- Empty State -->
      <div class="card-gradient rounded-2xl p-12 text-center fade-in">
        <div class="w-24 h-24 bg-pink-100 rounded-full flex items-center justify-center mx-auto mb-6">
          <i class="fas fa-shopping-bag text-pink-600 text-3xl"></i>
        </div>
        <h3 class="text-2xl font-bold text-gray-800 mb-3">Belum Ada Pemesanan</h3>
        <p class="text-gray-600 mb-6 max-w-md mx-auto">
          Anda belum memiliki pemesanan tiket. Mulai pesan tiket penerbangan Anda sekarang!
        </p>
        <a href="{{ url('/') }}" class="btn-primary inline-flex items-center">
          <i class="fas fa-search mr-2"></i>Cari Penerbangan
        </a>
      </div>
      @endforelse
    </div>

    <!-- Footer Info -->
    @if($data->count() > 0)
    <div class="mt-8 text-center text-gray-600">
      <p><i class="fas fa-info-circle mr-2 text-pink-600"></i>Butuh bantuan dengan pemesanan Anda? 
        <a href="#" class="text-pink-600 hover:underline">Hubungi Customer Service</a>
      </p>
    </div>
    @endif
  </div>

  <script>
    // Add some interactive effects
    document.addEventListener('DOMContentLoaded', function() {
      // Add click effect to flight cards
      const flightCards = document.querySelectorAll('.flight-card');
      flightCards.forEach(card => {
        card.addEventListener('click', function(e) {
          // Don't trigger if clicking on a link or button
          if (!e.target.closest('a') && !e.target.closest('button')) {
            this.style.transform = 'scale(0.98)';
            setTimeout(() => {
              this.style.transform = '';
            }, 150);
          }
        });
      });
      
      // Add loading animation for buttons
      const buttons = document.querySelectorAll('a[href]');
      buttons.forEach(button => {
        button.addEventListener('click', function(e) {
          if (this.classList.contains('btn-primary') || this.classList.contains('btn-secondary')) {
            const originalText = this.innerHTML;
            this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Memproses...';
            this.style.opacity = '0.7';
            
            setTimeout(() => {
              this.innerHTML = originalText;
              this.style.opacity = '1';
            }, 2000);
          }
        });
      });
    });
  </script>
</body>
</html>