<template>
  <footer class="bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900 text-white relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-5">
      <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 25% 25%, #00ffff 1px, transparent 1px), radial-gradient(circle at 75% 75%, #8b5cf6 1px, transparent 1px); background-size: 40px 40px;"></div>
    </div>
    
    <!-- Main Footer Content -->
    <div class="container mx-auto px-4 py-16 relative z-10">
      <div class="grid lg:grid-cols-4 md:grid-cols-2 gap-8">
        
        <!-- School Info -->
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="lg:col-span-1"
        >
          <div class="flex items-center space-x-4 mb-8">
            <div class="relative">
              <div class="absolute inset-0 bg-gradient-to-r from-cyan-400 to-purple-500 rounded-full blur-sm opacity-75"></div>
              <img src="/logo/logo_souca.png" alt="Logo SMA LSH" class="relative h-14 w-14 object-contain rounded-full border-2 border-cyan-300/50" />
            </div>
            <div>
              <h3 class="font-black text-xl bg-gradient-to-r from-cyan-300 to-purple-300 bg-clip-text text-transparent">SMA LSH</h3>
              <p class="text-cyan-200 text-sm font-medium">Unggul dalam Prestasi</p>
            </div>
          </div>
          
          <div class="mb-6">
            <h4 class="font-semibold text-white mb-3">Alamat Sekolah</h4>
            <div class="text-gray-300 text-sm leading-relaxed">
              <p>Jl. Lintas Padang - Bukittinggi Km. 25</p>
              <p>Lareh Sago Halaban, Kab. Solok</p>
              <p>Sumatera Barat 27365</p>
            </div>
          </div>

          <div>
            <h4 class="font-semibold text-white mb-3">Kontak</h4>
            <div class="space-y-2 text-sm">
              <a href="tel:+6207521234567" class="flex items-center text-gray-300 hover:text-[#65C2F5] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
                (0752) 123-4567
              </a>
              <a href="mailto:info@smalsh.sch.id" class="flex items-center text-gray-300 hover:text-[#65C2F5] transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
                info@smalsh.sch.id
              </a>
            </div>
          </div>
        </div>

        <!-- Quick Links -->
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 300 } }
          }"
        >
          <h4 class="font-semibold text-white mb-6">Menu Utama</h4>
          <ul class="space-y-3">
            <li v-for="(link, index) in mainNavigation" :key="index">
              <a 
                :href="link.url" 
                class="text-gray-300 hover:text-[#65C2F5] transition-colors text-sm flex items-center group"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                {{ link.name }}
              </a>
            </li>
          </ul>
        </div>

        <!-- Quick Services -->
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 400 } }
          }"
        >
          <h4 class="font-semibold text-white mb-6">Layanan</h4>
          <ul class="space-y-3">
            <li v-for="(service, index) in services" :key="index">
              <a 
                :href="service.url" 
                class="text-gray-300 hover:text-[#65C2F5] transition-colors text-sm flex items-center group"
                :target="service.external ? '_blank' : '_self'"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-2 opacity-0 group-hover:opacity-100 transition-opacity" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
                {{ service.name }}
              </a>
            </li>
          </ul>

          <!-- Important Documents -->
          <div class="mt-8">
            <h5 class="font-semibold text-white mb-4">Dokumen Penting</h5>
            <ul class="space-y-2">
              <li v-for="(doc, index) in documents" :key="index">
                <a 
                  :href="doc.url" 
                  target="_blank"
                  class="text-gray-300 hover:text-[#65C2F5] transition-colors text-sm flex items-center group"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  {{ doc.name }}
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 ml-1 opacity-60" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                  </svg>
                </a>
              </li>
            </ul>
          </div>
        </div>

        <!-- Social Media & Admin -->
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 500 } }
          }"
        >
          <h4 class="font-semibold text-white mb-6">Ikuti Kami</h4>
          
          <!-- Social Media Links -->
          <div class="grid grid-cols-2 gap-3 mb-8">
            <a 
              v-for="(social, index) in socialMedia" 
              :key="index"
              :href="social.url" 
              target="_blank"
              class="bg-gray-800 hover:bg-gradient-to-r hover:from-[#0487E2] hover:to-[#65C2F5] p-3 rounded-lg transition-all duration-300 flex items-center justify-center group"
              :title="social.name"
            >
              <span v-html="social.icon" class="w-5 h-5 text-gray-400 group-hover:text-white transition-colors"></span>
            </a>
          </div>

          <!-- Admin Login -->
          <div class="mb-6">
            <h5 class="font-semibold text-white mb-4">Area Admin</h5>
            <a 
              href="/admin" 
              class="bg-gradient-to-r from-[#0487E2] to-[#65C2F5] text-white px-4 py-2 rounded-lg text-sm hover:shadow-lg transition-all duration-300 flex items-center justify-center group"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" />
              </svg>
              <span class="text-white">Login Admin</span>
            </a>
          </div>

          <!-- Newsletter Subscription -->
          <div>
            <h5 class="font-semibold text-white mb-4">Newsletter</h5>
            <p class="text-gray-400 text-sm mb-3">Dapatkan update terbaru dari sekolah</p>
            <div class="flex">
              <input 
                type="email" 
                placeholder="Email Anda"
                v-model="newsletterEmail"
                class="flex-1 px-3 py-2 bg-gray-800 border border-gray-700 rounded-l-lg text-white text-sm focus:outline-none focus:border-[#65C2F5] transition-colors"
              >
              <button 
                @click="subscribeNewsletter"
                class="bg-[#0487E2] hover:bg-[#0463CA] px-4 py-2 rounded-r-lg transition-colors"
              >
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Bottom Footer -->
    <div class="border-t border-gray-800">
      <div class="container mx-auto px-4 py-6">
        <div 
          v-motion="{
            initial: { opacity: 0 },
            enter: { opacity: 1, transition: { delay: 600 } }
          }"
          class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0"
        >
          <!-- Copyright -->
          <div class="text-center md:text-left">
            <p class="text-gray-400 text-sm">
              © {{ currentYear }} SMA Negeri 1 Lareh Sago Halaban. All rights reserved.
            </p>
            <p class="text-gray-500 text-xs mt-1">
              Developed with ❤️ for Education Excellence
            </p>
          </div>

          <!-- Quick Links Bottom -->
          <div class="flex flex-wrap justify-center md:justify-end space-x-6 text-sm">
            <a href="/privacy-policy" class="text-gray-400 hover:text-[#65C2F5] transition-colors">
              Privacy Policy
            </a>
            <a href="/terms-of-service" class="text-gray-400 hover:text-[#65C2F5] transition-colors">
              Terms of Service
            </a>
            <a href="/sitemap" class="text-gray-400 hover:text-[#65C2F5] transition-colors">
              Sitemap
            </a>
          </div>
        </div>
      </div>
    </div>

    <!-- Back to Top Button -->
    <button 
      v-if="showBackToTop"
      @click="scrollToTop"
      class="fixed bottom-6 right-6 bg-gradient-to-r from-[#0487E2] to-[#65C2F5] text-white p-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 z-40 group"
      title="Kembali ke atas"
    >
      <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 group-hover:scale-110 transition-transform" fill="none" viewBox="0 0 24 24" stroke="currentColor">
        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
      </svg>
    </button>
  </footer>
</template>

<script setup>
import { computed, onMounted, onUnmounted, ref } from 'vue';

// Reactive data
const newsletterEmail = ref('');
const showBackToTop = ref(false);

// Current year for copyright
const currentYear = computed(() => new Date().getFullYear());

// Navigation items
const mainNavigation = ref([
  { name: 'Beranda', url: '/' },
  { name: 'Tentang Sekolah', url: '/tentang' },
  { name: 'Pengumuman', url: '/pengumuman' },
  { name: 'Informasi Akademik', url: '/akademik' },
  { name: 'Ekstrakurikuler', url: '/ekskul' },
  { name: 'Galeri', url: '/galeri' },
  { name: 'Kontak', url: '/kontak' }
]);

// Services
const services = ref([
  { name: 'Pendaftaran Siswa Baru (PPDB)', url: '/ppdb', external: false },
  { name: 'Portal E-Learning', url: 'https://elearning.smalsh.sch.id', external: true },
  { name: 'Sistem Informasi Sekolah', url: 'https://siakad.smalsh.sch.id', external: true },
  { name: 'Perpustakaan Digital', url: 'https://perpus.smalsh.sch.id', external: true },
  { name: 'Raport Online', url: 'https://raport.smalsh.sch.id', external: true },
  { name: 'Konseling Online', url: '/konseling', external: false }
]);

// Important documents
const documents = ref([
  { name: 'Brosur Sekolah 2025', url: '/downloads/brosur-smalsh-2025.pdf' },
  { name: 'SK Pendirian Sekolah', url: '/downloads/sk-pendirian-smalsh.pdf' },
  { name: 'Akreditasi Sekolah', url: '/downloads/akreditasi-smalsh.pdf' },
  { name: 'Panduan PPDB 2025', url: '/downloads/panduan-ppdb-2025.pdf' },
  { name: 'Kalender Akademik', url: '/downloads/kalender-akademik-2025.pdf' },
  { name: 'Struktur Organisasi', url: '/downloads/struktur-organisasi-smalsh.pdf' }
]);

// Social media
const socialMedia = ref([
  {
    name: 'Instagram',
    url: 'https://instagram.com/smalsh.official',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>'
  },
  {
    name: 'Facebook',
    url: 'https://facebook.com/smalsh.official',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>'
  },
  {
    name: 'YouTube',
    url: 'https://youtube.com/@smalsh.official',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>'
  },
  {
    name: 'TikTok',
    url: 'https://tiktok.com/@smalsh.official',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>'
  },
  {
    name: 'Twitter',
    url: 'https://twitter.com/smalsh_official',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/></svg>'
  },
  {
    name: 'WhatsApp',
    url: 'https://wa.me/6282123456789',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>'
  }
]);

// Methods
const subscribeNewsletter = () => {
  if (!newsletterEmail.value) return;
  
  // Simulate subscription
  alert('Terima kasih! Anda telah berlangganan newsletter kami.');
  newsletterEmail.value = '';
};

const scrollToTop = () => {
  window.scrollTo({
    top: 0,
    behavior: 'smooth'
  });
};

const handleScroll = () => {
  showBackToTop.value = window.scrollY > 500;
};

// Lifecycle
onMounted(() => {
  window.addEventListener('scroll', handleScroll);
});

onUnmounted(() => {
  window.removeEventListener('scroll', handleScroll);
});
</script>

<style scoped>
/* Custom scrollbar for newsletter input */
input:focus {
  outline: none;
}

/* Smooth animations */
.transition-all {
  transition: all 0.3s ease;
}

/* Back to top button animation */
@keyframes bounce {
  0%, 20%, 53%, 80%, 100% {
    transform: translate3d(0,0,0);
  }
  40%, 43% {
    transform: translate3d(0,-8px,0);
  }
  70% {
    transform: translate3d(0,-4px,0);
  }
  90% {
    transform: translate3d(0,-2px,0);
  }
}

.animate-bounce-slow {
  animation: bounce 2s infinite;
}
</style>
