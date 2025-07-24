<template>
  <header class="bg-gradient-to-r from-gray-900 via-purple-900 to-indigo-900 shadow-2xl sticky top-0 z-50 border-b-2 border-cyan-400/30" :class="{'shadow-2xl shadow-purple-500/25': scrolled}">
    <div class="container mx-auto px-4">
      <!-- Main Header with Logo and Navigation -->
      <div class="flex justify-between items-center py-4">
        <!-- Logo and School Name -->
        <div class="flex items-center space-x-4">
          <div class="relative">
            <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-purple-500 rounded-full blur-sm opacity-75"></div>
            <img src="/logo/logo_souca.png" alt="Logo SMA LSH" class="relative h-16 w-16 object-contain rounded-full border-2 border-cyan-300/50" />
          </div>
          <div>
            <h1 class="font-black text-xl md:text-2xl bg-gradient-to-r from-cyan-300 via-blue-300 to-purple-300 bg-clip-text text-transparent">SMA 1 LAREH SAGO HALABAN</h1>
            <p class="text-cyan-200 text-sm font-medium">Unggul dalam Prestasi & Karakter</p>
          </div>
        </div>

        <!-- Desktop Navigation -->
        <nav class="hidden lg:flex space-x-2">
          <ul class="flex space-x-2">
            <li v-for="item in navigationItems" :key="item.name">
              <a :href="item.url" class="px-4 py-2 rounded-lg text-gray-200 hover:bg-gradient-to-r hover:from-cyan-500/20 hover:to-purple-500/20 hover:text-cyan-300 transition-all duration-300 font-medium" :class="{'bg-gradient-to-r from-cyan-500 to-purple-600 text-white shadow-lg': item.active}">
                {{ item.name }}
              </a>
            </li>
          </ul>
        </nav>

        <!-- Mobile Menu Button -->
        <button @click="toggleMobileMenu" class="lg:hidden text-cyan-300 hover:text-cyan-200 focus:outline-none transition-colors duration-300">
          <svg v-if="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-7 w-7" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
          </svg>
        </button>
      </div>

      <!-- Mobile Menu Dropdown -->
      <div v-motion="{
          initial: { opacity: 0, height: 0 },
          enter: { opacity: 1, height: 'auto' },
          leave: { opacity: 0, height: 0 },
          visible: mobileMenuOpen
        }" 
        class="lg:hidden overflow-hidden bg-gradient-to-br from-gray-800 to-purple-900 border-t border-cyan-400/30">
        <nav class="py-4 border-t border-cyan-400/20">
          <ul class="space-y-2">
            <li v-for="(item, index) in navigationItems" :key="index">
              <a :href="item.url" class="block px-4 py-3 rounded-lg text-gray-200 hover:bg-gradient-to-r hover:from-cyan-500/20 hover:to-purple-500/20 hover:text-cyan-300 transition-all duration-300 font-medium" :class="{'bg-gradient-to-r from-cyan-500 to-purple-600 text-white shadow-lg': item.active}">
                {{ item.name }}
              </a>
            </li>
          </ul>
          
          <!-- Mobile Contact Info -->
          <div class="mt-6 pt-4 border-t border-cyan-400/20 space-y-3 text-sm">
            <a href="mailto:info@smalsh.sch.id" class="flex items-center text-cyan-200 hover:text-cyan-300 transition-colors px-4 py-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <span>info@smalsh.sch.id</span>
            </a>
            <a href="tel:+6282123456789" class="flex items-center text-cyan-200 hover:text-cyan-300 transition-colors px-4 py-2">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
              </svg>
              <span>(0752) 123456</span>
            </a>
          </div>
        </nav>
      </div>
    </div>
  </header>
</template>

<script setup>
import { usePage } from '@inertiajs/vue3';
import { computed, onMounted, onUnmounted, ref } from 'vue';

const mobileMenuOpen = ref(false);
const scrolled = ref(false);

// Get current page
const page = usePage();
const currentUrl = computed(() => page.url);

// Toggle mobile menu
const toggleMobileMenu = () => {
  mobileMenuOpen.value = !mobileMenuOpen.value;
};

// Navigation items
const navigationItems = computed(() => [
  { name: 'Beranda', url: '/', active: currentUrl.value === '/' },
  { name: 'Tentang Sekolah', url: '/tentang', active: currentUrl.value === '/tentang' },
  { name: 'Pengumuman', url: '/pengumuman', active: currentUrl.value === '/pengumuman' },
  { name: 'Informasi Akademik', url: '/akademik', active: currentUrl.value === '/akademik' },
  { name: 'Ekstrakurikuler', url: '/ekskul', active: currentUrl.value === '/ekskul' },
  { name: 'Galeri', url: '/galeri', active: currentUrl.value === '/galeri' },
  { name: 'PPDB', url: '/ppdb', active: currentUrl.value === '/ppdb' },
  { name: 'Kontak', url: '/kontak', active: currentUrl.value === '/kontak' },
]);

// Add scroll event for sticky header effect
const handleScroll = () => {
  scrolled.value = window.scrollY > 10;
};

onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<style scoped>
/* Add any header-specific styles here */
</style>
