<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Dashboard</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <link rel="stylesheet" href={{ asset('main') }}>
</head>
<body class="bg-gray-100 text-gray-800">

  <div class="flex min-h-screen">
    <!-- Sidebar -->
    <aside class="w-64 bg-gray-900 text-white flex flex-col justify-between">
      <div>
        <div class="flex items-center gap-2 p-6">
          <img src="{{ asset('images/logo.png') }}" alt="logo" class="w-8 h-8">
          <span class="font-bold text-lg">nesco.id</span>
        </div>
        <nav class="mt-4">
          <ul class="space-y-2 px-6">
            <li class="bg-yellow-400 text-black font-semibold rounded p-2">Dashboard</li>
            <li class="flex items-center gap-2 p-2 hover:bg-gray-800 rounded cursor-pointer">👥 Manajemen Peserta</li>
            <li class="flex items-center gap-2 p-2 hover:bg-gray-800 rounded cursor-pointer">📄 Manajemen Soal</li>
            <li class="flex items-center gap-2 p-2 hover:bg-gray-800 rounded cursor-pointer">📊 Rekap Nilai</li>
          </ul>
        </nav>
      </div>
      <div class="p-6 flex items-center gap-2">
        <div class="bg-yellow-400 text-black rounded-full h-8 w-8 flex items-center justify-center font-bold">A</div>
        <div>
          <div class="text-sm font-semibold">Admin</div>
          <div class="text-xs">Panitia Lomba</div>
        </div>
      </div>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8 space-y-6">
      <h1 class="text-3xl font-bold">Dashboard</h1>
      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="bg-white p-4 rounded-lg shadow">
          <div class="text-gray-400 text-sm">Total Peserta</div>
          <div class="text-2xl font-bold">190 <span class="font-normal text-lg">Siswa</span></div>
          <div class="text-xs mt-2 text-gray-500">SD: 70 | SMP: 60 | SMA: 60</div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <div class="text-gray-400 text-sm">Total Paket Soal</div>
          <div class="text-2xl font-bold">6 <span class="font-normal text-lg">Paket Soal</span></div>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <div class="text-gray-400 text-sm">Ujian Selesai</div>
          <div class="text-2xl font-bold">177 <span class="font-normal text-lg">Siswa</span></div>
        </div>
      </div>

      <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
        <div class="md:col-span-2 bg-white p-4 rounded-lg shadow">
          <div class="text-lg font-semibold mb-4">Peserta per Jenjang</div>
          <canvas id="barChart" height="200"></canvas>
        </div>
        <div class="bg-white p-4 rounded-lg shadow">
          <div class="text-lg font-semibold mb-4">Aktivitas Terkini</div>
          <ul class="text-sm space-y-3">
            <li class="flex items-start gap-2 text-blue-600">
              <span class="text-xl">ℹ️</span>
              <div>
                Andhika Hijau baru saja menyelesaikan ujian
                <div class="text-xs text-gray-400">2 menit lalu</div>
              </div>
            </li>
            <li class="flex items-start gap-2 text-blue-600">
              <span class="text-xl">ℹ️</span>
              <div>
                Soal baru ditambahkan untuk Jenjang SMA
                <div class="text-xs text-gray-400">5 menit lalu</div>
              </div>
            </li>
            <li class="flex items-start gap-2 text-blue-600">
              <span class="text-xl">ℹ️</span>
              <div>
                3 peserta baru login untuk jenjang SD
                <div class="text-xs text-gray-400">10 menit lalu</div>
              </div>
            </li>
          </ul>
        </div>
      </div>
    </main>
  </div>

  <script>
    const ctx = document.getElementById('barChart').getContext('2d');
    new Chart(ctx, {
      type: 'bar',
      data: {
        labels: ['SD', 'SMP', 'SMA'],
        datasets: [{
          label: 'Peserta',
          data: [70, 60, 60],
          backgroundColor: ['#EF4444', '#3B82F6', '#F59E0B'],
          borderRadius: 8
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            max: 100
          }
        },
        plugins: {
          legend: { display: false }
        }
      }
    });
  </script>
</body>
</html>
