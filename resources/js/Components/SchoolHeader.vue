<template>
  <header class="bg-white shadow-md sticky top-0 z-50" :class="{'shadow-lg': scrolled}">
    <div class="container mx-auto px-4">
      <!-- Top Header Bar with contact info and social media -->
      <div class="hidden md:flex justify-between py-2 text-sm text-gray-600 border-b border-gray-100">
        <div class="flex items-center space-x-4">
          <a href="mailto:info@smalsh.sch.id" class="flex items-center hover:text-[#0487E2] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
            </svg>
            <span>info@smalsh.sch.id</span>
          </a>
          <a href="tel:+6282123456789" class="flex items-center hover:text-[#0487E2] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
            </svg>
            <span>(0752) 123456</span>
          </a>
        </div>
        <div class="flex items-center space-x-3">
          <a href="#" class="hover:text-[#0487E2] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M22 7h-7v-2h7v2zm1.726 10c-.442 1.297-2.029 3-5.101 3-3.074 0-5.564-1.729-5.564-5.675 0-3.91 2.325-5.92 5.466-5.92 3.082 0 4.964 1.782 5.375 4.426.078.506.109 1.188.095 2.14h-8.027c.13 3.211 3.483 3.312 4.588 2.029h3.168zm-7.686-4h4.965c-.105-1.547-1.136-2.219-2.477-2.219-1.466 0-2.277.768-2.488 2.219zm-9.574 6.988h-6.466v-14.967h6.953c5.476.081 5.58 5.444 2.72 6.906 3.461 1.26 3.577 8.061-3.207 8.061zm-3.466-8.988h3.584c2.508 0 2.906-3-.312-3h-3.272v3zm3.391 3h-3.391v3.016h3.341c3.055 0 2.868-3.016.05-3.016z"/>
            </svg>
          </a>
          <a href="#" class="hover:text-[#0487E2] transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 0c-6.627 0-12 5.373-12 12s5.373 12 12 12 12-5.373 12-12-5.373-12-12-12zm3 8h-1.35c-.538 0-.65.221-.65.778v1.222h2l-.209 2h-1.791v7h-3v-7h-2v-2h2v-2.308c0-1.769.931-2.692 3.029-2.692h1.971v3z"/>
            </svg>
          </a>
          <a href="#" class="hover:text-blue-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/>
            </svg>
          </a>
          <a href="#" class="hover:text-blue-600 transition-colors">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="currentColor" viewBox="0 0 24 24">
              <path d="M19.615 3.184c-3.604-.246-11.631-.245-15.23 0-3.897.266-4.356 2.62-4.385 8.816.029 6.185.484 8.549 4.385 8.816 3.6.245 11.626.246 15.23 0 3.897-.266 4.356-2.62 4.385-8.816-.029-6.185-.484-8.549-4.385-8.816zm-10.615 12.816v-8l8 3.993-8 4.007z"/>
            </svg>
          </a>
        </div>
      </div>
      
      <!-- Main Header with Logo and Navigation -->
      <div class="flex justify-between items-center py-3">
        <!-- Logo and School Name -->
        <div class="flex items-center space-x-3">
          <img src="https://via.placeholder.com/80" alt="Logo SMA LSH" class="h-16 w-16 object-contain" />
          <div>
            <h1 class="font-bold text-xl md:text-2xl text-gray-800">SMA 1 LAREH SAGO HALABAN</h1>
            <p class="text-sm text-gray-600 hidden md:block">Unggul dalam Prestasi, Santun dalam Perilaku</p>
          </div>
        </div>

        <!-- Navigation for Desktop -->
        <nav class="hidden lg:flex">
          <ul class="flex space-x-1">
            <li v-for="(item, index) in navigationItems" :key="index">
              <a :href="item.url" class="px-3 py-2 rounded-md hover:bg-[#B0D6F5]/20 hover:text-[#0487E2] transition-colors" :class="{'text-[#0487E2] font-medium': item.active}">
                {{ item.name }}
              </a>
            </li>
          </ul>
        </nav>

        <!-- Mobile Menu Button -->
        <button @click="toggleMobileMenu" class="lg:hidden text-gray-600 focus:outline-none">
          <svg v-if="!mobileMenuOpen" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
          </svg>
          <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
        class="lg:hidden overflow-hidden">
        <nav class="py-3 border-t border-gray-100">
          <ul class="space-y-1">
            <li v-for="(item, index) in navigationItems" :key="index">
              <a :href="item.url" class="block px-3 py-2 rounded-md hover:bg-[#B0D6F5]/20 hover:text-[#0487E2] transition-colors" :class="{'text-[#0487E2] font-medium': item.active}">
                {{ item.name }}
              </a>
            </li>
          </ul>
          
          <!-- Mobile Contact Info -->
          <div class="mt-4 pt-4 border-t border-gray-100 space-y-2 text-sm text-gray-600">
            <a href="mailto:info@smalsh.sch.id" class="flex items-center hover:text-blue-600 transition-colors px-3 py-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
              </svg>
              <span>info@smalsh.sch.id</span>
            </a>
            <a href="tel:+6282123456789" class="flex items-center hover:text-blue-600 transition-colors px-3 py-1">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
