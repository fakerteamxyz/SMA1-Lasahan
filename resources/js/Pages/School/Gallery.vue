<template>
  <Head title="Galeri Dokumentasi" />
  
  <div class="min-h-screen bg-gray-50">
    <!-- Header Component -->
    <SchoolHeader />
    
    <!-- Hero Section -->
    <section class="relative bg-gradient-to-r from-[#0487E2] to-[#65C2F5] text-white py-16">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center"
        >
          <h1 class="text-4xl md:text-5xl font-bold mb-4">Galeri Dokumentasi</h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto">
            Kumpulan foto dan video kegiatan sekolah yang menampilkan semangat dan prestasi siswa-siswi kami
          </p>
        </div>
      </div>
      <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </section>

    <!-- Quick Stats -->
    <section class="relative -mt-8 mb-16">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 50 },
            enter: { opacity: 1, y: 0, transition: { delay: 400 } }
          }"
          class="bg-white rounded-xl shadow-lg p-6"
        >
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="text-center p-4 bg-blue-50 rounded-lg">
              <div class="text-3xl font-bold text-blue-600">{{ totalPhotos }}</div>
              <div class="text-sm text-blue-700">Total Foto</div>
            </div>
            <div class="text-center p-4 bg-green-50 rounded-lg">
              <div class="text-3xl font-bold text-green-600">{{ totalVideos }}</div>
              <div class="text-sm text-green-700">Video Dokumentasi</div>
            </div>
            <div class="text-center p-4 bg-purple-50 rounded-lg">
              <div class="text-3xl font-bold text-purple-600">{{ totalAlbums }}</div>
              <div class="text-sm text-purple-700">Album Kegiatan</div>
            </div>
            <div class="text-center p-4 bg-amber-50 rounded-lg">
              <div class="text-3xl font-bold text-amber-600">{{ totalEvents }}</div>
              <div class="text-sm text-amber-700">Event Terdokumentasi</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Category Filter -->
    <section class="py-8">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 20 },
            enter: { opacity: 1, y: 0, transition: { delay: 400 } }
          }"
          class="flex flex-wrap justify-center gap-3 mb-8"
        >
          <button 
            v-for="(category, index) in categories" 
            :key="index"
            @click="activeCategory = category.value"
            class="px-6 py-3 rounded-lg transition-all duration-300 flex items-center"
            :class="activeCategory === category.value ? 'bg-[#0487E2] text-white shadow-lg scale-105' : 'bg-white text-gray-700 hover:bg-gray-50 shadow-md'"
          >
            <span v-html="category.icon" class="w-5 h-5 mr-2"></span>
            {{ category.label }}
            <span v-if="category.count > 0" class="ml-2 bg-white/20 text-xs px-2 py-1 rounded-full">
              {{ category.count }}
            </span>
          </button>
        </div>

        <!-- Media Type Filter -->
        <div class="flex justify-center gap-3 mb-8">
          <button 
            v-for="(type, index) in mediaTypes" 
            :key="index"
            @click="activeMediaType = type.value"
            class="px-4 py-2 rounded-lg transition-all duration-300"
            :class="activeMediaType === type.value ? 'bg-[#65C2F5] text-white' : 'bg-white text-gray-700 hover:bg-gray-50'"
          >
            <span v-html="type.icon" class="w-4 h-4 mr-2 inline-block"></span>
            {{ type.label }}
          </button>
        </div>
      </div>
    </section>

    <!-- Gallery Grid -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <!-- Photo Grid -->
        <div v-if="activeMediaType === 'all' || activeMediaType === 'photo'" class="mb-16">
          <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">📸 Galeri Foto</h2>
          <div class="grid md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-6">
            <div 
              v-for="(photo, index) in filteredPhotos" 
              :key="photo.id"
              v-motion="{
                initial: { opacity: 0, scale: 0.9 },
                enter: { opacity: 1, scale: 1, transition: { delay: 200 + (index * 50) } }
              }"
              class="group relative bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2 cursor-pointer"
              @click="openLightbox(photo, 'photo')"
            >
              <!-- Image -->
              <div class="relative h-48 overflow-hidden">
                <img 
                  :src="photo.thumbnail" 
                  :alt="photo.title" 
                  class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                >
                <div class="absolute inset-0 bg-black/40 opacity-0 group-hover:opacity-100 transition-opacity duration-300 flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                  </svg>
                </div>
                <!-- Category Badge -->
                <div class="absolute top-3 left-3">
                  <span 
                    class="px-2 py-1 text-xs font-semibold rounded-full"
                    :class="getCategoryBadgeClass(photo.category)"
                  >
                    {{ getCategoryLabel(photo.category) }}
                  </span>
                </div>
                <!-- Photo Count for Albums -->
                <div v-if="photo.photoCount" class="absolute top-3 right-3 bg-black/60 text-white text-xs px-2 py-1 rounded-full">
                  {{ photo.photoCount }} foto
                </div>
              </div>

              <!-- Content -->
              <div class="p-4">
                <h3 class="text-lg font-bold text-gray-800 mb-2 line-clamp-2">{{ photo.title }}</h3>
                <p class="text-gray-600 text-sm mb-3 line-clamp-2">{{ photo.description }}</p>
                <div class="flex items-center justify-between text-xs text-gray-500">
                  <span>{{ photo.date }}</span>
                  <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    {{ photo.likes }}
                  </span>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Video Grid -->
        <div v-if="activeMediaType === 'all' || activeMediaType === 'video'" class="mb-16">
          <h2 class="text-2xl font-bold text-gray-800 mb-8 text-center">🎥 Video Dokumentasi</h2>
          <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <div 
              v-for="(video, index) in filteredVideos" 
              :key="video.id"
              v-motion="{
                initial: { opacity: 0, y: 30 },
                enter: { opacity: 1, y: 0, transition: { delay: 300 + (index * 100) } }
              }"
              class="group bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2"
            >
              <!-- Video Thumbnail -->
              <div class="relative h-48 overflow-hidden cursor-pointer" @click="openVideoModal(video)">
                <img 
                  :src="video.thumbnail" 
                  :alt="video.title" 
                  class="w-full h-full object-cover transition-transform duration-300 group-hover:scale-110"
                >
                <div class="absolute inset-0 bg-black/40 flex items-center justify-center">
                  <div class="bg-white/90 rounded-full p-4 transform transition-transform group-hover:scale-110">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#0487E2]" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                  </div>
                </div>
                <div class="absolute top-3 left-3">
                  <span 
                    class="px-2 py-1 text-xs font-semibold rounded-full"
                    :class="getCategoryBadgeClass(video.category)"
                  >
                    {{ getCategoryLabel(video.category) }}
                  </span>
                </div>
                <div class="absolute bottom-3 right-3 bg-black/60 text-white text-xs px-2 py-1 rounded-full">
                  {{ video.duration }}
                </div>
              </div>

              <!-- Content -->
              <div class="p-6">
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ video.title }}</h3>
                <p class="text-gray-600 mb-4 line-clamp-3">{{ video.description }}</p>
                <div class="flex items-center justify-between text-sm text-gray-500 mb-4">
                  <span>{{ video.date }}</span>
                  <span class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{ video.views }} views
                  </span>
                </div>
                <button 
                  @click="openVideoModal(video)"
                  class="w-full bg-[#0487E2] text-white py-2 rounded-lg hover:bg-[#0463CA] transition-colors flex items-center justify-center"
                >
                  <span class="text-white">Tonton Video</span>
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2 text-white" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Empty State -->
        <div v-if="filteredPhotos.length === 0 && filteredVideos.length === 0" class="text-center py-12">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" />
          </svg>
          <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak ada media</h3>
          <p class="text-gray-500">Belum ada foto atau video untuk kategori yang dipilih.</p>
        </div>
      </div>
    </section>

    <!-- Call to Action -->
    <section class="py-16 bg-gradient-to-r from-[#0487E2] to-[#65C2F5] text-white">
      <div class="container mx-auto px-4 text-center">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
        >
          <h2 class="text-3xl font-bold mb-4">Ikuti Kegiatan Sekolah Kami!</h2>
          <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
            Jangan lewatkan berbagai kegiatan menarik dan bergabunglah dengan keluarga besar SMA LSH
          </p>
          <div class="flex flex-wrap justify-center gap-4">
            <a href="/kontak" class="bg-white text-[#0487E2] px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 hover:text-[#0487E2] transition-colors">
              <span class="text-[#0487E2]">Hubungi Kami</span>
            </a>
            <a href="/ppdb" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-[#0487E2] transition-colors">
              <span class="text-white hover:text-[#0487E2]">Daftar Sekolah</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Photo Lightbox Modal -->
    <div v-if="lightboxPhoto" class="fixed inset-0 z-50 overflow-y-auto" @click.self="closeLightbox">
      <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black bg-opacity-80 transition-opacity"></div>
        <div 
          v-motion="{
            initial: { opacity: 0, scale: 0.9 },
            enter: { opacity: 1, scale: 1 },
            leave: { opacity: 0, scale: 0.9 }
          }"
          class="bg-white rounded-xl shadow-xl max-w-4xl w-full relative z-10 max-h-[90vh] overflow-y-auto"
        >
          <div class="relative">
            <!-- Close Button -->
            <button @click="closeLightbox" class="absolute top-4 right-4 z-20 bg-black/60 text-white rounded-full p-2 hover:bg-black/80 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>

            <!-- Main Image -->
            <div class="relative">
              <img :src="lightboxPhoto.fullSize" :alt="lightboxPhoto.title" class="w-full h-auto max-h-[60vh] object-contain">
              
              <!-- Navigation Arrows -->
              <button v-if="canNavigatePrev" @click="navigateLightbox(-1)" class="absolute left-4 top-1/2 transform -translate-y-1/2 bg-black/60 text-white rounded-full p-3 hover:bg-black/80 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7" />
                </svg>
              </button>
              <button v-if="canNavigateNext" @click="navigateLightbox(1)" class="absolute right-4 top-1/2 transform -translate-y-1/2 bg-black/60 text-white rounded-full p-3 hover:bg-black/80 transition-colors">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </button>
            </div>

            <!-- Photo Details -->
            <div class="p-6">
              <div class="flex items-center justify-between mb-4">
                <div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ lightboxPhoto.title }}</h3>
                  <span 
                    class="px-3 py-1 text-sm font-semibold rounded-full"
                    :class="getCategoryBadgeClass(lightboxPhoto.category)"
                  >
                    {{ getCategoryLabel(lightboxPhoto.category) }}
                  </span>
                </div>
                <div class="text-right text-sm text-gray-500">
                  <div>{{ lightboxPhoto.date }}</div>
                  <div class="flex items-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" />
                    </svg>
                    {{ lightboxPhoto.likes }} likes
                  </div>
                </div>
              </div>
              <p class="text-gray-600 leading-relaxed">{{ lightboxPhoto.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Video Modal -->
    <div v-if="selectedVideo" class="fixed inset-0 z-50 overflow-y-auto" @click.self="closeVideoModal">
      <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black bg-opacity-80 transition-opacity"></div>
        <div 
          v-motion="{
            initial: { opacity: 0, scale: 0.9 },
            enter: { opacity: 1, scale: 1 },
            leave: { opacity: 0, scale: 0.9 }
          }"
          class="bg-white rounded-xl shadow-xl max-w-4xl w-full relative z-10 max-h-[90vh] overflow-y-auto"
        >
          <div class="relative">
            <!-- Close Button -->
            <button @click="closeVideoModal" class="absolute top-4 right-4 z-20 bg-black/60 text-white rounded-full p-2 hover:bg-black/80 transition-colors">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
              </svg>
            </button>

            <!-- Video Player -->
            <div class="relative">
              <div class="aspect-video bg-black rounded-t-xl overflow-hidden">
                <iframe 
                  :src="selectedVideo.embedUrl" 
                  class="w-full h-full" 
                  frameborder="0" 
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                  allowfullscreen
                ></iframe>
              </div>
            </div>

            <!-- Video Details -->
            <div class="p-6">
              <div class="flex items-center justify-between mb-4">
                <div>
                  <h3 class="text-2xl font-bold text-gray-800 mb-2">{{ selectedVideo.title }}</h3>
                  <span 
                    class="px-3 py-1 text-sm font-semibold rounded-full"
                    :class="getCategoryBadgeClass(selectedVideo.category)"
                  >
                    {{ getCategoryLabel(selectedVideo.category) }}
                  </span>
                </div>
                <div class="text-right text-sm text-gray-500">
                  <div>{{ selectedVideo.date }}</div>
                  <div class="flex items-center mt-1">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{ selectedVideo.views }} views
                  </div>
                </div>
              </div>
              <p class="text-gray-600 leading-relaxed">{{ selectedVideo.description }}</p>
            </div>
          </div>
        </div>
      </div>
    </div>

    <!-- Footer Component -->
    <SchoolFooter />
  </div>
</template>

<script setup>
import SchoolFooter from '@/Components/SchoolFooter.vue';
import SchoolHeader from '@/Components/SchoolHeader.vue';
import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

// Reactive data
const activeCategory = ref('all');
const activeMediaType = ref('all');
const lightboxPhoto = ref(null);
const selectedVideo = ref(null);
const currentLightboxIndex = ref(0);

// Categories
const categories = ref([
  { 
    value: 'all', 
    label: 'Semua', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5" /></svg>', 
    count: 0 
  },
  { 
    value: 'osis', 
    label: 'OSIS & MPK', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>', 
    count: 0 
  },
  { 
    value: 'lomba', 
    label: 'Lomba & Kompetisi', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" /></svg>', 
    count: 0 
  },
  { 
    value: 'upacara', 
    label: 'Upacara & Peringatan', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 21v-4m0 0V5a2 2 0 012-2h6.5l1 1H21l-3 6 3 6h-8.5l-1-1H5a2 2 0 00-2 2zm9-13.5V9" /></svg>', 
    count: 0 
  },
  { 
    value: 'ekskul', 
    label: 'Ekstrakurikuler', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>', 
    count: 0 
  },
  { 
    value: 'wisuda', 
    label: 'Wisuda & Kelulusan', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0012 20.055a11.952 11.952 0 00-6.824-2.998 12.078 12.078 0 01.665-6.479L12 14z" /></svg>', 
    count: 0 
  },
  { 
    value: 'event', 
    label: 'Event Sekolah', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>', 
    count: 0 
  }
]);

// Media types
const mediaTypes = ref([
  { 
    value: 'all', 
    label: 'Semua', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5" /></svg>' 
  },
  { 
    value: 'photo', 
    label: 'Foto', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>' 
  },
  { 
    value: 'video', 
    label: 'Video', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" /></svg>' 
  }
]);

// Sample photo data
const photos = ref([
  {
    id: 1,
    title: 'Pelantikan Pengurus OSIS Periode 2024-2025',
    description: 'Pelantikan pengurus OSIS periode baru yang dihadiri oleh seluruh siswa dan guru SMA LSH',
    category: 'osis',
    thumbnail: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    fullSize: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
    date: '15 Januari 2025',
    likes: 245,
    photoCount: 15
  },
  {
    id: 2,
    title: 'Juara 1 Lomba Debate Bahasa Inggris',
    description: 'Tim debate SMA LSH meraih juara 1 dalam kompetisi debate bahasa Inggris tingkat provinsi',
    category: 'lomba',
    thumbnail: 'https://images.unsplash.com/photo-1591115765373-5207764f72e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    fullSize: 'https://images.unsplash.com/photo-1591115765373-5207764f72e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
    date: '20 Februari 2025',
    likes: 189,
    photoCount: 8
  },
  {
    id: 3,
    title: 'Upacara Bendera Hari Senin',
    description: 'Upacara bendera rutin setiap hari Senin dengan seluruh siswa dan guru SMA LSH',
    category: 'upacara',
    thumbnail: 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    fullSize: 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
    date: '10 Maret 2025',
    likes: 156,
    photoCount: 12
  },
  {
    id: 4,
    title: 'Latihan Paduan Suara Persiapan Lomba',
    description: 'Latihan intensif paduan suara SMA LSH mempersiapkan diri untuk kompetisi tingkat provinsi',
    category: 'ekskul',
    thumbnail: 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    fullSize: 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
    date: '5 April 2025',
    likes: 198,
    photoCount: 20
  },
  {
    id: 5,
    title: 'Wisuda Siswa Kelas XII',
    description: 'Upacara wisuda siswa kelas XII SMA LSH yang telah menyelesaikan pendidikan dengan baik',
    category: 'wisuda',
    thumbnail: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    fullSize: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
    date: '25 Mei 2025',
    likes: 312,
    photoCount: 45
  },
  {
    id: 6,
    title: 'Festival Sains dan Teknologi',
    description: 'Pameran karya ilmiah dan teknologi hasil kreativitas siswa SMA LSH',
    category: 'event',
    thumbnail: 'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    fullSize: 'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
    date: '12 Juni 2025',
    likes: 267,
    photoCount: 35
  },
  {
    id: 7,
    title: 'Turnamen Futsal Antar Kelas',
    description: 'Kompetisi futsal seru antar kelas yang diselenggarakan oleh OSIS SMA LSH',
    category: 'event',
    thumbnail: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    fullSize: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
    date: '18 Juli 2025',
    likes: 223,
    photoCount: 28
  },
  {
    id: 8,
    title: 'Peringatan Hari Kemerdekaan RI',
    description: 'Upacara peringatan HUT RI ke-80 di SMA LSH dengan berbagai lomba tradisional',
    category: 'upacara',
    thumbnail: 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    fullSize: 'https://images.unsplash.com/photo-1559827260-dc66d52bef19?ixlib=rb-4.0.3&auto=format&fit=crop&w=1200&q=80',
    date: '17 Agustus 2025',
    likes: 389,
    photoCount: 50
  }
]);

// Sample video data
const videos = ref([
  {
    id: 1,
    title: 'Profil SMA Negeri 1 Lareh Sago Halaban',
    description: 'Video profil lengkap tentang sejarah, fasilitas, dan prestasi SMA Negeri 1 Lareh Sago Halaban',
    category: 'event',
    thumbnail: 'https://www.youtube.com/watch?v=WidO2o3fGd8',
    embedUrl: 'https://www.youtube.com/watch?v=WidO2o3fGd8',
    duration: '8:45',
    date: '1 Januari 2025',
    views: 1250
  },
  {
    id: 2,
    title: 'Highlights Lomba Debate Bahasa Inggris',
    description: 'Cuplikan terbaik dari kompetisi debate bahasa Inggris yang dimenangkan oleh SMA LSH',
    category: 'lomba',
    thumbnail: 'https://images.unsplash.com/photo-1591115765373-5207764f72e7?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    embedUrl: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
    duration: '5:32',
    date: '22 Februari 2025',
    views: 856
  },
  {
    id: 3,
    title: 'Penampilan Paduan Suara di Kompetisi Provinsi',
    description: 'Penampilan memukau paduan suara SMA LSH yang meraih juara 1 tingkat provinsi',
    category: 'ekskul',
    thumbnail: 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    embedUrl: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
    duration: '12:15',
    date: '15 April 2025',
    views: 2150
  },
  {
    id: 4,
    title: 'Dokumentasi Wisuda Siswa 2025',
    description: 'Dokumentasi lengkap upacara wisuda siswa kelas XII SMA LSH tahun 2025',
    category: 'wisuda',
    thumbnail: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    embedUrl: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
    duration: '25:30',
    date: '27 Mei 2025',
    views: 3250
  },
  {
    id: 5,
    title: 'Kegiatan OSIS: Bakti Sosial ke Panti Asuhan',
    description: 'Dokumentasi kegiatan bakti sosial OSIS SMA LSH ke panti asuhan di sekitar sekolah',
    category: 'osis',
    thumbnail: 'https://images.unsplash.com/photo-1559027615-cd4628902d4a?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    embedUrl: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
    duration: '7:20',
    date: '10 Juni 2025',
    views: 1125
  },
  {
    id: 6,
    title: 'Festival Sains dan Teknologi 2025',
    description: 'Highlights dari Festival Sains dan Teknologi SMA LSH dengan berbagai inovasi siswa',
    category: 'event',
    thumbnail: 'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    embedUrl: 'https://www.youtube.com/embed/dQw4w9WgXcQ',
    duration: '15:45',
    date: '14 Juni 2025',
    views: 1875
  }
]);

// Computed properties
const filteredPhotos = computed(() => {
  if (activeCategory.value === 'all') {
    return photos.value;
  }
  return photos.value.filter(photo => photo.category === activeCategory.value);
});

const filteredVideos = computed(() => {
  if (activeCategory.value === 'all') {
    return videos.value;
  }
  return videos.value.filter(video => video.category === activeCategory.value);
});

const totalPhotos = computed(() => photos.value.length);
const totalVideos = computed(() => videos.value.length);
const totalAlbums = computed(() => {
  const uniqueCategories = new Set(photos.value.map(photo => photo.category));
  return uniqueCategories.size;
});
const totalEvents = computed(() => {
  const allEvents = [...photos.value, ...videos.value];
  const uniqueEvents = new Set(allEvents.map(item => item.title));
  return uniqueEvents.size;
});

// Lightbox navigation
const canNavigatePrev = computed(() => currentLightboxIndex.value > 0);
const canNavigateNext = computed(() => currentLightboxIndex.value < filteredPhotos.value.length - 1);

// Update category counts
categories.value.forEach(category => {
  if (category.value === 'all') {
    category.count = photos.value.length + videos.value.length;
  } else {
    const photoCount = photos.value.filter(p => p.category === category.value).length;
    const videoCount = videos.value.filter(v => v.category === category.value).length;
    category.count = photoCount + videoCount;
  }
});

// Methods
const openLightbox = (photo, type) => {
  lightboxPhoto.value = photo;
  currentLightboxIndex.value = filteredPhotos.value.findIndex(p => p.id === photo.id);
};

const closeLightbox = () => {
  lightboxPhoto.value = null;
  currentLightboxIndex.value = 0;
};

const navigateLightbox = (direction) => {
  const newIndex = currentLightboxIndex.value + direction;
  if (newIndex >= 0 && newIndex < filteredPhotos.value.length) {
    currentLightboxIndex.value = newIndex;
    lightboxPhoto.value = filteredPhotos.value[newIndex];
  }
};

const openVideoModal = (video) => {
  selectedVideo.value = video;
};

const closeVideoModal = () => {
  selectedVideo.value = null;
};

const getCategoryLabel = (category) => {
  const categoryMap = {
    'osis': 'OSIS & MPK',
    'lomba': 'Lomba & Kompetisi',
    'upacara': 'Upacara & Peringatan',
    'ekskul': 'Ekstrakurikuler',
    'wisuda': 'Wisuda & Kelulusan',
    'event': 'Event Sekolah'
  };
  return categoryMap[category] || 'Lainnya';
};

const getCategoryBadgeClass = (category) => {
  const classMap = {
    'osis': 'bg-blue-100 text-blue-800',
    'lomba': 'bg-amber-100 text-amber-800',
    'upacara': 'bg-red-100 text-red-800',
    'ekskul': 'bg-green-100 text-green-800',
    'wisuda': 'bg-purple-100 text-purple-800',
    'event': 'bg-indigo-100 text-indigo-800'
  };
  return classMap[category] || 'bg-gray-100 text-gray-800';
};
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
