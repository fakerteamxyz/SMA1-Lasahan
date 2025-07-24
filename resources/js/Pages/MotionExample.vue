<template>
  <div class="min-h-screen bg-gradient-to-br from-blue-50 to-indigo-100 p-8">
    <!-- Header Animation -->
    <div 
      v-motion="{
        initial: { opacity: 0, y: -50 },
        enter: { opacity: 1, y: 0 },
        transition: { duration: 800, ease: 'easeOut' }
      }"
      class="text-center mb-12"
    >
      <h1 class="text-4xl font-bold text-gray-800 mb-4">
        SMA LSH - Sekolah Terdepan
      </h1>
      <p class="text-xl text-gray-600">
        Informasi Sekolah Terkini
      </p>
    </div>

    <!-- Cards Animation -->
    <div class="grid md:grid-cols-3 gap-8 max-w-6xl mx-auto">
      <!-- Card 1 -->
      <div 
        v-motion="{
          initial: { opacity: 0, x: -100 },
          enter: { opacity: 1, x: 0 },
          transition: { duration: 600, delay: 200 }
        }"
        class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow"
      >
        <div class="text-center">
          <div class="w-16 h-16 bg-blue-500 rounded-full mx-auto mb-4 flex items-center justify-center">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-2">Prestasi Akademik</h3>
          <p class="text-gray-600">Meraih berbagai prestasi di tingkat nasional dan internasional</p>
        </div>
      </div>

      <!-- Card 2 -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 100 },
          enter: { opacity: 1, y: 0 },
          transition: { duration: 600, delay: 400 }
        }"
        class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow"
      >
        <div class="text-center">
          <div class="w-16 h-16 bg-green-500 rounded-full mx-auto mb-4 flex items-center justify-center">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M13 6a3 3 0 11-6 0 3 3 0 016 0zM18 8a2 2 0 11-4 0 2 2 0 014 0zM14 15a4 4 0 00-8 0v3h8v-3z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-2">Tenaga Pengajar</h3>
          <p class="text-gray-600">Guru-guru berpengalaman dan berkualitas tinggi</p>
        </div>
      </div>

      <!-- Card 3 -->
      <div 
        v-motion="{
          initial: { opacity: 0, x: 100 },
          enter: { opacity: 1, x: 0 },
          transition: { duration: 600, delay: 600 }
        }"
        class="bg-white rounded-lg shadow-lg p-6 hover:shadow-xl transition-shadow"
      >
        <div class="text-center">
          <div class="w-16 h-16 bg-purple-500 rounded-full mx-auto mb-4 flex items-center justify-center">
            <svg class="w-8 h-8 text-white" fill="currentColor" viewBox="0 0 20 20">
              <path d="M3 4a1 1 0 011-1h12a1 1 0 011 1v2a1 1 0 01-1 1H4a1 1 0 01-1-1V4zM3 10a1 1 0 011-1h6a1 1 0 011 1v6a1 1 0 01-1 1H4a1 1 0 01-1-1v-6zM14 9a1 1 0 00-1 1v6a1 1 0 001 1h2a1 1 0 001-1v-6a1 1 0 00-1-1h-2z"/>
            </svg>
          </div>
          <h3 class="text-xl font-semibold mb-2">Fasilitas Modern</h3>
          <p class="text-gray-600">Laboratorium dan fasilitas pembelajaran terkini</p>
        </div>
      </div>
    </div>

    <!-- Bottom Section -->
    <div 
      v-motion="{
        initial: { opacity: 0, scale: 0.8 },
        enter: { opacity: 1, scale: 1 },
        transition: { duration: 800, delay: 800 }
      }"
      class="text-center mt-16"
    >
      <button class="btn btn-primary px-8 py-3 bg-blue-600 text-white rounded-lg hover:bg-blue-700 transition-colors">
        Pelajari Lebih Lanjut
      </button>
    </div>
  </div>
</template>

<script setup>
// Component menggunakan Composition API
// VueUse Motion sudah terintegrasi melalui plugin

// Props untuk Inertia.js (jika diperlukan)
defineProps({
  title: {
    type: String,
    default: 'SMA LSH'
  }
})
</script>
