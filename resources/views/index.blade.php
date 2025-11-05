<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>SistemPoin - Manajemen Poin Siswa</title>
  <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;600;700;800&display=swap" rel="stylesheet">
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-[#f3f8fc] text-gray-800 font-['Inter']">
  <!-- Navbar -->
  <nav class="flex justify-between items-center py-5 px-10 bg-white shadow-sm">
    <div class="flex items-center space-x-2">
      <div class="bg-blue-600 text-white p-2 rounded-xl">
        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 11c0 1.1-.9 2-2 2s-2-.9-2-2 .9-2 2-2 2 .9 2 2zM4 6h16v12H4z" />
        </svg>
      </div>
      <span class="text-xl font-semibold">SistemPoin</span>
    </div>
    <div class="hidden md:flex space-x-8">
      <a href="#tentang" class="hover:text-blue-600">Tentang</a>
      <a href="#fitur" class="hover:text-blue-600">Fitur</a>
      <a href="#manfaat" class="hover:text-blue-600">Manfaat</a>
    </div>
    <div class="flex space-x-4">
      <button class="border border-gray-300 px-4 py-2 rounded-md hover:bg-gray-100">Masuk</button>
      <button class="bg-blue-700 text-white px-4 py-2 rounded-md hover:bg-blue-800">Daftar Sekarang</button>
    </div>
  </nav>

  <!-- Hero -->
  <section class="px-10 py-20 flex flex-col md:flex-row items-center justify-between bg-gradient-to-br from-[#f3f8fc] to-[#e6f1fa]">
    <div class="md:w-1/2">
      <p class="text-blue-700 font-semibold bg-blue-50 px-4 py-2 rounded-full inline-block mb-4">
        ✨ Solusi Manajemen Disiplin Siswa
      </p>
      <h1 class="text-5xl font-extrabold leading-tight mb-6">
        Kelola Poin Pelanggaran & Penghargaan dengan <span class="text-blue-700">Mudah</span>
      </h1>
      <p class="text-gray-600 text-lg mb-6">
        Platform terpadu untuk mencatat pelanggaran dan prestasi siswa secara real-time. 
        Tingkatkan disiplin dan motivasi dengan sistem poin yang transparan dan adil.
      </p>
      <button class="bg-blue-700 text-white px-6 py-3 rounded-md hover:bg-blue-800">Mulai Sekarang</button>
    </div>
    <div class="md:w-1/2 mt-10 md:mt-0">
      <div class="bg-white p-6 rounded-xl shadow-md space-y-4">
        <div class="bg-blue-50 p-4 rounded-md flex justify-between items-center">
          <span>⚠️ Pelanggaran Ringan</span><span class="text-gray-500">-5 Poin</span>
        </div>
        <div class="bg-blue-100 p-4 rounded-md flex justify-between items-center">
          <span>🏅 Prestasi Akademik</span><span class="text-gray-600">+10 Poin</span>
        </div>
        <div class="bg-blue-50 p-4 rounded-md flex justify-between items-center">
          <span>🎖️ Penghargaan Khusus</span><span class="text-gray-600">+20 Poin</span>
        </div>
      </div>
    </div>
  </section>

  <!-- Mengapa SistemPoin -->
  <section id="tentang" class="py-20 px-10 text-center">
    <h2 class="text-3xl font-extrabold mb-4">Mengapa SistemPoin?</h2>
    <p class="text-gray-600 mb-10">
      Sistem manajemen poin yang dirancang khusus untuk meningkatkan disiplin dan prestasi siswa dengan cara yang adil, transparan, dan mudah digunakan.
    </p>
    <div class="grid md:grid-cols-3 gap-6">
      <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold text-lg mb-2">👥 Transparan & Adil</h3>
        <p class="text-gray-600 text-sm">Siswa dapat melihat riwayat poin secara real-time tanpa keputusan tersembunyi.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold text-lg mb-2">📊 Analitik Mendalam</h3>
        <p class="text-gray-600 text-sm">Pantau tren pelanggaran & prestasi dengan grafik dan data yang jelas.</p>
      </div>
      <div class="bg-white p-6 rounded-xl shadow">
        <h3 class="font-semibold text-lg mb-2">🧾 Laporan Otomatis</h3>
        <p class="text-gray-600 text-sm">Cetak laporan PDF dengan satu klik untuk guru dan orang tua.</p>
      </div>
    </div>
  </section>

  <!-- CTA -->
  <section class="bg-blue-100 py-20 text-center">
    <h2 class="text-4xl font-extrabold mb-4">Siap Meningkatkan Disiplin Siswa?</h2>
    <p class="text-gray-700 mb-8">
      Bergabunglah dengan sekolah-sekolah yang telah mempercayai SistemPoin untuk mengelola disiplin dan prestasi siswa.
    </p>
    <div class="flex justify-center space-x-4">
      <button class="bg-blue-700 text-white px-6 py-3 rounded-md hover:bg-blue-800">Mulai Sekarang</button>
      <button class="bg-white text-blue-700 px-6 py-3 rounded-md border border-blue-700 hover:bg-blue-50">Hubungi Kami</button>
    </div>
  </section>

  <footer class="py-6 text-center text-gray-500 text-sm bg-white">
    © 2025 SistemPoin. Semua hak dilindungi.
  </footer>
</body>
</html>
