<template>
  <Head title="Beranda" />
  
  <div class="min-h-screen bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900">
    <!-- Header Component -->
    <SchoolHeader />
    
    <!-- Hero Section with Image Slider -->
    <section class="relative h-[600px] md:h-[650px] overflow-hidden">
      <!-- Image Slider -->
      <div class="absolute inset-0 w-full h-full">
        <div 
          v-for="(slide, index) in heroSlides" 
          :key="index"
          class="absolute inset-0 w-full h-full bg-cover bg-center transition-opacity duration-1000"
          :style="{
            backgroundImage: `url(${slide.image})`,
            opacity: currentSlide === index ? 1 : 0,
          }"
        ></div>
        
        <!-- Overlay with gradient -->
        <div class="absolute inset-0 bg-gradient-to-r from-black/70 via-black/50 to-transparent"></div>
      </div>

      <!-- Content -->
      <div class="container mx-auto px-4 h-full flex items-center relative z-10">
        <div class="grid md:grid-cols-3 gap-8 items-center">
          <!-- Left Column with Text -->
          <div 
            v-motion="{
              initial: { opacity: 0, x: -50 },
              enter: { opacity: 1, x: 0, transition: { delay: 300 } }
            }"
            class="md:col-span-2 text-white max-w-2xl"
          >
            <h5 
              v-motion="{
                initial: { opacity: 0, y: -20 },
                enter: { opacity: 1, y: 0, transition: { delay: 200 } }
              }"
              class="inline-block px-4 py-1 mb-4 bg-gradient-to-r from-cyan-600 to-purple-600 text-white rounded-full text-sm font-semibold shadow-lg"
            >
              {{ heroSlides[currentSlide].tag }}
            </h5>
            <h1 class="text-4xl md:text-5xl lg:text-6xl font-bold mb-4 leading-tight">
              <span 
                v-motion="{
                  initial: { opacity: 0, x: -30 },
                  enter: { opacity: 1, x: 0, transition: { delay: 400 } }
                }"
              >
                Selamat Datang di
              </span>
              <br>
              <span 
                class="text-cyan-400"
                v-motion="{
                  initial: { opacity: 0, x: -30 },
                  enter: { opacity: 1, x: 0, transition: { delay: 600 } }
                }"
              >
                SMA Negeri 1 Lareh Sago Halaban
              </span>
            </h1>

            <p 
              v-motion="{
                initial: { opacity: 0, y: 30 },
                enter: { opacity: 1, y: 0, transition: { delay: 800 } }
              }"
              class="text-xl mb-8 text-gray-100 max-w-lg"
            >
              {{ heroSlides[currentSlide].description }}
            </p>

            <div 
              v-motion="{
                initial: { opacity: 0, y: 30 },
                enter: { opacity: 1, y: 0, transition: { delay: 1000 } }
              }"
              class="flex flex-wrap gap-4"
            >
              <a href="/pendaftaran" class="btn bg-gradient-to-r from-cyan-600 to-purple-600 text-white hover:from-cyan-700 hover:to-purple-700 border-none px-6 shadow-lg hover:shadow-cyan-500/25">
                <span class="text-white">Pendaftaran Siswa Baru</span>
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-white" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </a>
              <a href="/tentang" class="btn btn-outline bg-white/10 backdrop-blur-sm text-cyan-300 border-cyan-300 hover:bg-cyan-300 hover:text-gray-900 px-6">
                <span>Profil Sekolah</span>
              </a>
            </div>

            <!-- Stats -->
            <div 
              v-motion="{
                initial: { opacity: 0, y: 30 },
                enter: { opacity: 1, y: 0, transition: { delay: 1200 } }
              }"
              class="flex flex-wrap gap-8 mt-8 text-white"
            >
              <div v-for="(stat, index) in stats" :key="index" class="text-center">
                <div class="text-3xl font-bold text-cyan-400">{{ stat.value }}</div>
                <div class="text-sm text-gray-200">{{ stat.label }}</div>
              </div>
            </div>
          </div>

          <!-- Right Column with Accreditation Badge -->
          <div 
            v-motion="{
              initial: { opacity: 0, scale: 0.8 },
              enter: { opacity: 1, scale: 1, transition: { delay: 800 } }
            }"
            class="hidden md:flex justify-center items-center"
          >
            <div class="bg-white/10 backdrop-blur-md p-6 rounded-full relative">
              <div class="bg-white/20 backdrop-blur-md p-6 rounded-full">
                <div class="bg-white/95 p-8 rounded-full flex items-center justify-center">
                  <div class="text-center">
                    <span class="text-4xl font-bold text-cyan-600">A</span>
                    <div class="text-xs font-semibold mt-1 text-gray-600">AKREDITASI</div>
                  </div>
                </div>
              </div>
              <div class="absolute -top-4 -right-4 bg-gradient-to-r from-purple-600 to-indigo-600 text-white text-xs font-bold rounded-full h-12 w-12 flex items-center justify-center shadow-lg">
                2025
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Slider Controls -->
      <div class="absolute bottom-6 left-0 right-0 flex justify-center gap-2 z-20">
        <button 
          v-for="(_, index) in heroSlides" 
          :key="index"
          @click="currentSlide = index"
          class="w-3 h-3 rounded-full transition-all duration-300"
          :class="currentSlide === index ? 'bg-cyan-400 w-8' : 'bg-white/50 hover:bg-white'"
        ></button>
      </div>

      <!-- Scroll Down Indicator -->
      <div class="absolute bottom-6 right-6 z-20 hidden md:block">
        <a 
          href="#overview"
          class="flex flex-col items-center text-white hover:text-cyan-400 transition-colors"
          v-motion="{ 
            initial: { y: -10 },
            enter: { y: 0, transition: { repeat: Infinity, duration: 1500, ease: 'easeInOut' } }
          }"
        >
          <span class="text-xs mb-2">Scroll</span>
          <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
            <path fill-rule="evenodd" d="M16.707 10.293a1 1 0 010 1.414l-6 6a1 1 0 01-1.414 0l-6-6a1 1 0 111.414-1.414L10 14.586l5.293-5.293a1 1 0 011.414 0z" clip-rule="evenodd" />
          </svg>
        </a>
      </div>
    </section>

    <!-- School Overview Section -->
    <section id="overview" class="py-16 bg-gradient-to-br from-gray-100 to-purple-50">
      <div class="container mx-auto px-4">
        <div class="flex flex-col md:flex-row gap-8 items-center">
          <!-- Image Side -->
          <div 
            v-motion="{
              initial: { opacity: 0, x: -80, rotateY: -15 },
              visibleOnce: { 
                opacity: 1, 
                x: 0, 
                rotateY: 0,
                transition: { 
                  type: 'spring',
                  stiffness: 80,
                  damping: 20,
                  delay: 200
                }
              }
            }"
            class="md:w-1/2"
          >
            <div class="relative">
              <img 
                src="https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80" 
                alt="Gedung SMA 1 Lareh Sago Halaban" 
                class="rounded-lg shadow-xl w-full object-cover h-[400px]" 
              />
              <div class="absolute -bottom-6 -right-6 bg-gradient-to-r from-cyan-600 to-purple-600 rounded-lg p-6 w-32 h-32 flex items-center justify-center text-white shadow-lg">
                <div class="text-center">
                  <div class="text-3xl font-bold">25</div>
                  <div class="text-sm">Tahun</div>
                  <div class="text-xs mt-1">Berdiri</div>
                </div>
              </div>
            </div>
          </div>

          <!-- Text Side -->
          <div 
            v-motion="{
              initial: { opacity: 0, x: 80, scale: 0.9 },
              visibleOnce: { 
                opacity: 1, 
                x: 0, 
                scale: 1,
                transition: { 
                  type: 'spring',
                  stiffness: 80,
                  damping: 20,
                  delay: 400
                }
              }
            }"
            class="md:w-1/2"
          >
            <h2 class="text-sm text-cyan-600 font-semibold uppercase tracking-wider mb-2">Tentang Sekolah</h2>
            <h3 class="text-3xl font-bold text-gray-800 mb-6">Mewujudkan Pendidikan Berkualitas di Kabupaten Lima Puluh Kota</h3>
            
            <p class="text-gray-600 mb-4">SMA Negeri 1 Lareh Sago Halaban adalah lembaga pendidikan menengah atas yang berkomitmen menghasilkan lulusan berprestasi, berkarakter, dan siap menghadapi tantangan global.</p>
            
            <p class="text-gray-600 mb-6">Dengan fasilitas pembelajaran modern, tenaga pendidik berkualifikasi tinggi, dan kurikulum yang komprehensif, kami terus berupaya memberikan pelayanan pendidikan terbaik bagi generasi penerus bangsa.</p>
            
            <div class="grid grid-cols-2 gap-4 mb-8">
              <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-[#B0D6F5] flex items-center justify-center mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0487E2]" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-800">Kurikulum Merdeka</h4>
                  <p class="text-sm text-gray-600">Pembelajaran Berbasis Projek</p>
                </div>
              </div>
              <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-cyan-100 flex items-center justify-center mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-cyan-600" viewBox="0 0 20 20" fill="currentColor">
                    <path d="M9 6a3 3 0 11-6 0 3 3 0 016 0zM17 6a3 3 0 11-6 0 3 3 0 016 0zM12.93 17c.046-.327.07-.66.07-1a6.97 6.97 0 00-1.5-4.33A5 5 0 0119 16v1h-6.07zM6 11a5 5 0 015 5v1H1v-1a5 5 0 015-5z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-800">Guru Profesional</h4>
                  <p class="text-sm text-gray-600">Berkualifikasi S2 & S3</p>
                </div>
              </div>
              <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-purple-100 flex items-center justify-center mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-purple-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M6 6V5a3 3 0 013-3h2a3 3 0 013 3v1h2a2 2 0 012 2v3.57A22.952 22.952 0 0110 13a22.95 22.95 0 01-8-1.43V8a2 2 0 012-2h2zm2-1a1 1 0 011-1h2a1 1 0 011 1v1H8V5zm1 5a1 1 0 011-1h.01a1 1 0 110 2H10a1 1 0 01-1-1z" clip-rule="evenodd" />
                    <path d="M2 13.692V16a2 2 0 002 2h12a2 2 0 002-2v-2.308A24.974 24.974 0 0110 15c-2.796 0-5.487-.46-8-1.308z" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-800">Beasiswa Prestasi</h4>
                  <p class="text-sm text-gray-600">Akademik & Non-Akademik</p>
                </div>
              </div>
              <div class="flex items-center">
                <div class="w-10 h-10 rounded-full bg-indigo-100 flex items-center justify-center mr-3">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-indigo-600" viewBox="0 0 20 20" fill="currentColor">
                    <path fill-rule="evenodd" d="M3 3a1 1 0 000 2v8a2 2 0 002 2h2.586l-1.293 1.293a1 1 0 101.414 1.414L10 15.414l2.293 2.293a1 1 0 001.414-1.414L12.414 15H15a2 2 0 002-2V5a1 1 0 100-2H3zm11.707 4.707a1 1 0 00-1.414-1.414L10 9.586 8.707 8.293a1 1 0 00-1.414 0l-2 2a1 1 0 101.414 1.414L8 10.414l1.293 1.293a1 1 0 001.414 0l4-4z" clip-rule="evenodd" />
                  </svg>
                </div>
                <div>
                  <h4 class="font-semibold text-gray-800">Prestasi Nasional</h4>
                  <p class="text-sm text-gray-600">Akademik & Ekstrakurikuler</p>
                </div>
              </div>
            </div>
            
            <a href="/tentang" class="btn bg-gradient-to-r from-cyan-600 to-purple-600 hover:from-cyan-700 hover:to-purple-700 text-white px-6 shadow-lg hover:shadow-cyan-500/25">
              <span>Lihat Profil Lengkap</span>
            </a>
          </div>
        </div>
      </div>
    </section>
    
    <!-- Quick Info Cards -->
    <section class="py-12 bg-gradient-to-br from-gray-50 to-cyan-50">
      <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-8">
          <!-- Announcement Card -->
          <div 
            v-motion="{
              initial: { opacity: 0, y: 80, rotateX: -15, scale: 0.8 },
              visibleOnce: { 
                opacity: 1, 
                y: 0, 
                rotateX: 0, 
                scale: 1,
                transition: { 
                  type: 'spring',
                  stiffness: 100,
                  damping: 15,
                  delay: 200
                }
              }
            }"
            class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg p-6 border-t-4 border-cyan-500 hover:shadow-xl transition-all duration-500 hover:scale-105"
          >
            <h3 class="font-bold text-xl mb-4 text-gray-800">Pengumuman Terkini</h3>
            <ul class="space-y-3">
              <li v-for="(item, index) in announcements" :key="index" class="pb-2 border-b border-cyan-200 last:border-b-0">
                <a href="#" class="hover:text-cyan-600 transition-colors">
                  <p class="font-medium">{{ item.title }}</p>
                  <p class="text-sm text-gray-600">{{ item.date }}</p>
                </a>
              </li>
            </ul>
            <div class="mt-4">
              <a href="/pengumuman" class="inline-flex items-center text-cyan-600 hover:text-cyan-800">
                Lihat Semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>

          <!-- Events Card -->
          <div 
            v-motion="{
              initial: { opacity: 0, y: 50 },
              enter: { opacity: 1, y: 0, transition: { delay: 200 } }
            }"
            class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg p-6 border-t-4 border-purple-500 hover:shadow-xl transition-shadow"
          >
            <h3 class="font-bold text-xl mb-4 text-gray-800">Agenda Kegiatan</h3>
            <ul class="space-y-3">
              <li v-for="(item, index) in events" :key="index" class="pb-2 border-b border-purple-200 last:border-b-0">
                <a href="#" class="hover:text-purple-600 transition-colors">
                  <p class="font-medium">{{ item.title }}</p>
                  <p class="text-sm text-gray-600">{{ item.date }}</p>
                </a>
              </li>
            </ul>
            <div class="mt-4">
              <a href="/agenda" class="inline-flex items-center text-purple-600 hover:text-purple-800">
                Lihat Semua
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" viewBox="0 0 20 20" fill="currentColor">
                  <path fill-rule="evenodd" d="M12.293 5.293a1 1 0 011.414 0l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-2.293-2.293a1 1 0 010-1.414z" clip-rule="evenodd" />
                </svg>
              </a>
            </div>
          </div>

          <!-- Quick Links Card -->
          <div 
            v-motion="{
              initial: { opacity: 0, y: 50 },
              enter: { opacity: 1, y: 0, transition: { delay: 300 } }
            }"
            class="bg-white/80 backdrop-blur-sm rounded-lg shadow-lg p-6 border-t-4 border-indigo-500 hover:shadow-xl transition-shadow"
          >
            <h3 class="font-bold text-xl mb-4 text-gray-800">Tautan Penting</h3>
            <ul class="space-y-3">
              <li v-for="(item, index) in quickLinks" :key="index" class="pb-2 border-b border-indigo-200 last:border-b-0">
                <a href="#" class="hover:text-indigo-600 transition-colors flex items-center">
                  <span class="mr-2" v-html="item.icon"></span>
                  <span>{{ item.title }}</span>
                </a>
              </li>
            </ul>
            <div class="mt-4 flex space-x-4">
              <a href="/login" class="btn btn-sm bg-gradient-to-r from-cyan-600 to-purple-600 text-white hover:from-cyan-700 hover:to-purple-700 border-none shadow-lg">Login Siswa</a>
              <a href="/ppdb" class="btn btn-sm btn-outline border-indigo-500 text-indigo-600 hover:bg-indigo-50">PPDB Online</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- School Video Section -->
    <SchoolVideo />

    <!-- Alumni Testimonials Section -->
    <AlumniTestimonials />

    <!-- School News Section -->
    <SchoolNews />

    <!-- Footer Component -->
    <SchoolFooter />
  </div>
</template>

<script setup>
import AlumniTestimonials from '@/Components/AlumniTestimonials.vue';
import SchoolFooter from '@/Components/SchoolFooter.vue';
import SchoolHeader from '@/Components/SchoolHeader.vue';
import SchoolNews from '@/Components/SchoolNews.vue';
import SchoolVideo from '@/Components/SchoolVideo.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted, onUnmounted, ref } from 'vue';

// Hero Slider data
const currentSlide = ref(0);
const heroSlides = ref([
  {
    image: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80',
    tag: 'Sekolah Unggul',
    description: 'Menyiapkan Generasi Unggul, Berakhlak dan Berwawasan Global dengan Pendidikan Berkualitas dan Fasilitas Modern'
  },
  {
    image: 'https://images.unsplash.com/photo-1571260899304-425eee4c7efd?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80',
    tag: 'Kurikulum Merdeka',
    description: 'Menerapkan Kurikulum Merdeka dengan Pendekatan Pembelajaran Berbasis Proyek dan Pengembangan Karakter Siswa'
  },
  {
    image: 'https://images.unsplash.com/photo-1583373834259-46cc92173cb7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1548&q=80',
    tag: 'Prestasi Membanggakan',
    description: 'Meraih Berbagai Prestasi Akademik dan Non-Akademik di Tingkat Kabupaten, Provinsi, dan Nasional'
  }
]);

// Stats data
const stats = ref([
  { value: '350+', label: 'Siswa' },
  { value: '32', label: 'Guru' },
  { value: '15', label: 'Kelas' },
  { value: '98%', label: 'Lulusan di PTN' }
]);

// Automatic slider
let sliderInterval;

const startSlider = () => {
  sliderInterval = setInterval(() => {
    currentSlide.value = (currentSlide.value + 1) % heroSlides.value.length;
  }, 5000);
};

onMounted(() => {
  startSlider();
});

onUnmounted(() => {
  clearInterval(sliderInterval);
});

// Dummy data for the homepage
const announcements = ref([
  { title: 'Jadwal Ujian Akhir Semester Ganjil 2025', date: '15 Juli 2025' },
  { title: 'Pengumuman Hasil Seleksi PPDB 2025/2026', date: '10 Juli 2025' },
  { title: 'Pembagian Rapor Semester Genap 2024/2025', date: '25 Juni 2025' },
  { title: 'Jadwal Kegiatan Masa Orientasi Siswa (MOS)', date: '20 Juni 2025' },
]);

const events = ref([
  { title: 'Upacara Peringatan HUT RI ke-80', date: '17 Agustus 2025' },
  { title: 'Perlombaan Antar Kelas', date: '10-14 Agustus 2025' },
  { title: 'Workshop Pembelajaran Digital', date: '5 Agustus 2025' },
  { title: 'Pekan Olahraga Sekolah', date: '1-3 Agustus 2025' },
]);

const quickLinks = ref([
  { 
    title: 'E-Learning Sekolah',
    url: '/elearning',
    icon: '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M10.394 2.08a1 1 0 00-.788 0l-7 3a1 1 0 000 1.84L5.25 8.051a.999.999 0 01.356-.257l4-1.714a1 1 0 11.788 1.838L7.667 9.088l1.94.831a1 1 0 00.787 0l7-3a1 1 0 000-1.838l-7-3zM3.31 9.397L5 10.12v4.102a8.969 8.969 0 00-1.05-.174 1 1 0 01-.89-.89 11.115 11.115 0 01.25-3.762zM9.3 16.573A9.026 9.026 0 007 14.935v-3.957l1.818.78a3 3 0 002.364 0l5.508-2.361a11.026 11.026 0 01.25 3.762 1 1 0 01-.89.89 8.968 8.968 0 00-5.35 2.524 1 1 0 01-1.4 0zM6 18a1 1 0 001-1v-2.065a8.935 8.935 0 00-2-.712V17a1 1 0 001 1z"/></svg>'
  },
  { 
    title: 'Portal Akademik', 
    url: '/akademik',
    icon: '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M9 4.804A7.968 7.968 0 005.5 4c-1.255 0-2.443.29-3.5.804v10A7.969 7.969 0 015.5 14c1.669 0 3.218.51 4.5 1.385A7.962 7.962 0 0114.5 14c1.255 0 2.443.29 3.5.804v-10A7.968 7.968 0 0014.5 4c-1.255 0-2.443.29-3.5.804V12a1 1 0 11-2 0V4.804z"/></svg>'
  },
  { 
    title: 'Unduh Kalender Akademik', 
    url: '/download/kalender',
    icon: '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M6 2a1 1 0 00-1 1v1H4a2 2 0 00-2 2v10a2 2 0 002 2h12a2 2 0 002-2V6a2 2 0 00-2-2h-1V3a1 1 0 10-2 0v1H7V3a1 1 0 00-1-1zm0 5a1 1 0 000 2h8a1 1 0 100-2H6z"/></svg>'
  },
  { 
    title: 'Beasiswa & Program Bantuan', 
    url: '/beasiswa',
    icon: '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path fill-rule="evenodd" d="M4 4a2 2 0 00-2 2v4a2 2 0 002 2V6h10a2 2 0 00-2-2H4zm2 6a2 2 0 012-2h8a2 2 0 012 2v4a2 2 0 01-2 2H8a2 2 0 01-2-2v-4zm6 4a2 2 0 100-4 2 2 0 000 4z" clip-rule="evenodd"/></svg>'
  },
  { 
    title: 'Pustaka Digital', 
    url: '/pustaka',
    icon: '<svg class="h-4 w-4" fill="currentColor" viewBox="0 0 20 20"><path d="M7 3a1 1 0 000 2h6a1 1 0 100-2H7zM4 7a1 1 0 011-1h10a1 1 0 110 2H5a1 1 0 01-1-1zM2 11a2 2 0 012-2h12a2 2 0 012 2v4a2 2 0 01-2 2H4a2 2 0 01-2-2v-4z"/></svg>'
  },
]);
</script>
