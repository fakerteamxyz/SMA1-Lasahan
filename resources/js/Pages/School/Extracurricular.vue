<template>
  <Head title="Ekstrakurikuler" />
  
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
          <h1 class="text-4xl md:text-5xl font-bold mb-4">Ekstrakurikuler</h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto">
            Kembangkan bakat dan minat melalui berbagai kegiatan ekstrakurikuler yang menarik dan berprestasi
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
            <div class="text-center p-4 bg-green-50 rounded-lg">
              <div class="text-3xl font-bold text-green-600">{{ totalExtracurriculars }}</div>
              <div class="text-sm text-green-700">Total Ekstrakurikuler</div>
            </div>
            <div class="text-center p-4 bg-blue-50 rounded-lg">
              <div class="text-3xl font-bold text-blue-600">{{ activeMembers }}</div>
              <div class="text-sm text-blue-700">Siswa Aktif</div>
            </div>
            <div class="text-center p-4 bg-purple-50 rounded-lg">
              <div class="text-3xl font-bold text-purple-600">{{ totalAchievements }}</div>
              <div class="text-sm text-purple-700">Prestasi Tahun Ini</div>
            </div>
            <div class="text-center p-4 bg-amber-50 rounded-lg">
              <div class="text-3xl font-bold text-amber-600">{{ coaches }}</div>
              <div class="text-sm text-amber-700">Pembina</div>
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
      </div>
    </section>

    <!-- Extracurricular Grid -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
          <div 
            v-for="(ekskul, index) in filteredExtracurriculars" 
            :key="ekskul.id"
            v-motion="{
              initial: { opacity: 0, y: 30 },
              enter: { opacity: 1, y: 0, transition: { delay: 200 + (index * 100) } }
            }"
            class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 transform hover:-translate-y-2"
          >
            <!-- Image -->
            <div class="relative h-48 overflow-hidden">
              <img 
                :src="ekskul.image" 
                :alt="ekskul.name" 
                class="w-full h-full object-cover transition-transform duration-300 hover:scale-110"
              >
              <div class="absolute top-4 left-4">
                <span 
                  class="px-3 py-1 text-xs font-semibold rounded-full"
                  :class="getCategoryBadgeClass(ekskul.category)"
                >
                  {{ getCategoryLabel(ekskul.category) }}
                </span>
              </div>
              <div class="absolute top-4 right-4 bg-white/90 backdrop-blur-sm rounded-full p-2">
                <span v-html="getCategoryIcon(ekskul.category)" class="w-4 h-4 text-[#0487E2]"></span>
              </div>
            </div>

            <!-- Content -->
            <div class="p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-2">{{ ekskul.name }}</h3>
              <p class="text-gray-600 mb-4 line-clamp-3">{{ ekskul.description }}</p>
              
              <!-- Info Grid -->
              <div class="grid grid-cols-2 gap-3 mb-4 text-sm">
                <div class="flex items-center text-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-[#0487E2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                  </svg>
                  {{ ekskul.members }} Anggota
                </div>
                <div class="flex items-center text-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-[#0487E2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  {{ ekskul.schedule }}
                </div>
                <div class="flex items-center text-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-[#0487E2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                  </svg>
                  {{ ekskul.coach }}
                </div>
                <div class="flex items-center text-gray-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2 text-[#0487E2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  {{ ekskul.location }}
                </div>
              </div>

              <!-- Achievements -->
              <div v-if="ekskul.achievements.length > 0" class="mb-4">
                <h4 class="text-sm font-semibold text-gray-800 mb-2">Prestasi Terbaru:</h4>
                <div class="space-y-1">
                  <div 
                    v-for="achievement in ekskul.achievements.slice(0, 2)" 
                    :key="achievement.id"
                    class="flex items-center text-xs text-amber-600"
                  >
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-3 w-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                      <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                    </svg>
                    {{ achievement.title }}
                  </div>
                </div>
              </div>

              <!-- Action Button -->
              <button 
                @click="openModal(ekskul)"
                class="w-full bg-[#0487E2] text-white py-2 rounded-lg hover:bg-[#0463CA] transition-colors flex items-center justify-center"
              >
                Lihat Detail
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </button>
            </div>
          </div>
        </div>

        <!-- Empty State -->
        <div v-if="filteredExtracurriculars.length === 0" class="text-center py-12">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5" />
          </svg>
          <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak ada ekstrakurikuler</h3>
          <p class="text-gray-500">Belum ada ekstrakurikuler untuk kategori yang dipilih.</p>
        </div>
      </div>
    </section>

    <!-- Outstanding Achievements Section -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Prestasi Membanggakan</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Berbagai pencapaian luar biasa siswa-siswi kami di tingkat lokal, nasional, dan internasional
          </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div 
            v-for="(achievement, index) in outstandingAchievements" 
            :key="achievement.id"
            v-motion="{
              initial: { opacity: 0, scale: 0.9 },
              enter: { opacity: 1, scale: 1, transition: { delay: 300 + (index * 100) } }
            }"
            class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow border-l-4"
            :class="getAchievementBorderClass(achievement.level)"
          >
            <div class="flex items-center justify-between mb-4">
              <span 
                class="px-3 py-1 text-xs font-semibold rounded-full"
                :class="getAchievementBadgeClass(achievement.level)"
              >
                {{ achievement.level }}
              </span>
              <span class="text-sm text-gray-500">{{ achievement.year }}</span>
            </div>
            
            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ achievement.title }}</h3>
            <p class="text-gray-600 mb-3">{{ achievement.description }}</p>
            
            <div class="flex items-center text-sm text-gray-500 mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
              </svg>
              {{ achievement.student }}
            </div>
            
            <div class="flex items-center text-sm text-[#0487E2]">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
              </svg>
              {{ achievement.category }}
            </div>
          </div>
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
          <h2 class="text-3xl font-bold mb-4">Bergabung dengan Ekstrakurikuler Kami!</h2>
          <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
            Kembangkan bakat dan minatmu bersama teman-teman yang memiliki passion yang sama
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

    <!-- Detail Modal -->
    <div v-if="selectedEkskul" class="fixed inset-0 z-50 overflow-y-auto" @click.self="closeModal">
      <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
        <div 
          v-motion="{
            initial: { opacity: 0, scale: 0.9 },
            enter: { opacity: 1, scale: 1 },
            leave: { opacity: 0, scale: 0.9 }
          }"
          class="bg-white rounded-xl shadow-xl max-w-4xl w-full relative z-10 max-h-[90vh] overflow-y-auto"
        >
          <div class="p-6">
            <!-- Header -->
            <div class="flex items-center justify-between mb-6">
              <div class="flex items-center gap-4">
                <img :src="selectedEkskul.image" :alt="selectedEkskul.name" class="w-16 h-16 rounded-lg object-cover">
                <div>
                  <h2 class="text-2xl font-bold text-gray-800">{{ selectedEkskul.name }}</h2>
                  <span 
                    class="px-3 py-1 text-sm font-semibold rounded-full"
                    :class="getCategoryBadgeClass(selectedEkskul.category)"
                  >
                    {{ getCategoryLabel(selectedEkskul.category) }}
                  </span>
                </div>
              </div>
              <button @click="closeModal" class="text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>

            <div class="grid lg:grid-cols-2 gap-8">
              <!-- Left Column -->
              <div>
                <h3 class="text-lg font-bold text-gray-800 mb-3">Deskripsi</h3>
                <p class="text-gray-600 mb-6 leading-relaxed">{{ selectedEkskul.fullDescription || selectedEkskul.description }}</p>
                
                <h3 class="text-lg font-bold text-gray-800 mb-3">Informasi Kegiatan</h3>
                <div class="space-y-3">
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-[#0487E2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    <span class="font-medium">Jadwal:</span>
                    <span class="ml-2 text-gray-600">{{ selectedEkskul.schedule }}</span>
                  </div>
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-[#0487E2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                    </svg>
                    <span class="font-medium">Lokasi:</span>
                    <span class="ml-2 text-gray-600">{{ selectedEkskul.location }}</span>
                  </div>
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-[#0487E2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" />
                    </svg>
                    <span class="font-medium">Pembina:</span>
                    <span class="ml-2 text-gray-600">{{ selectedEkskul.coach }}</span>
                  </div>
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-[#0487E2]" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                    <span class="font-medium">Anggota:</span>
                    <span class="ml-2 text-gray-600">{{ selectedEkskul.members }} siswa</span>
                  </div>
                </div>
              </div>

              <!-- Right Column -->
              <div>
                <h3 class="text-lg font-bold text-gray-800 mb-3">Prestasi & Pencapaian</h3>
                <div class="space-y-3">
                  <div 
                    v-for="achievement in selectedEkskul.achievements" 
                    :key="achievement.id"
                    class="bg-gradient-to-r from-amber-50 to-yellow-50 border border-amber-200 rounded-lg p-4"
                  >
                    <div class="flex items-center justify-between mb-2">
                      <h4 class="font-semibold text-gray-800">{{ achievement.title }}</h4>
                      <span class="text-sm text-amber-600 font-medium">{{ achievement.level }}</span>
                    </div>
                    <p class="text-sm text-gray-600 mb-2">{{ achievement.description }}</p>
                    <div class="flex items-center justify-between text-xs text-gray-500">
                      <span>{{ achievement.student }}</span>
                      <span>{{ achievement.year }}</span>
                    </div>
                  </div>
                </div>

                <div v-if="selectedEkskul.achievements.length === 0" class="text-center py-8">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-12 w-12 text-gray-300 mx-auto mb-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z" />
                  </svg>
                  <p class="text-gray-500">Belum ada prestasi yang tercatat</p>
                </div>
              </div>
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
const selectedEkskul = ref(null);

// Categories
const categories = ref([
  { 
    value: 'all', 
    label: 'Semua', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5" /></svg>', 
    count: 0 
  },
  { 
    value: 'olahraga', 
    label: 'Olahraga', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>', 
    count: 0 
  },
  { 
    value: 'seni', 
    label: 'Seni & Budaya', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>', 
    count: 0 
  },
  { 
    value: 'akademik', 
    label: 'Akademik', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>', 
    count: 0 
  },
  { 
    value: 'teknologi', 
    label: 'Teknologi', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" /></svg>', 
    count: 0 
  },
  { 
    value: 'sosial', 
    label: 'Sosial', 
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>', 
    count: 0 
  }
]);

// Extracurricular data
const extracurriculars = ref([
  {
    id: 1,
    name: 'Basket',
    category: 'olahraga',
    description: 'Klub basket yang aktif dalam berbagai kompetisi antar sekolah dan melatih keterampilan bermain basket tingkat lanjut.',
    fullDescription: 'Ekstrakurikuler basket SMA Negeri 1 Lareh Sago Halaban merupakan wadah bagi siswa yang memiliki minat dan bakat dalam olahraga basket. Kegiatan ini tidak hanya fokus pada pengembangan teknik bermain, tetapi juga membentuk karakter sportivitas, kerjasama tim, dan disiplin. Tim basket sekolah kami telah meraih berbagai prestasi di tingkat kabupaten dan provinsi.',
    image: 'https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    members: 25,
    schedule: 'Selasa & Kamis 15:30-17:00',
    coach: 'Budi Santoso, S.Pd',
    location: 'Lapangan Basket Sekolah',
    achievements: [
      {
        id: 1,
        title: 'Juara 2 Turnamen Basket Antar SMA Se-Kabupaten',
        description: 'Tim basket putra meraih juara 2 dalam turnamen bergengsi tingkat kabupaten',
        student: 'Tim Basket Putra',
        level: 'Kabupaten',
        year: '2025',
        category: 'Olahraga'
      },
      {
        id: 2,
        title: 'Juara 3 Liga Basket Remaja Sumbar',
        description: 'Prestasi membanggakan dalam kompetisi tingkat provinsi',
        student: 'Tim Basket Putri',
        level: 'Provinsi',
        year: '2024',
        category: 'Olahraga'
      }
    ]
  },
  {
    id: 2,
    name: 'Pramuka',
    category: 'sosial',
    description: 'Gerakan kepanduan yang membentuk karakter kepemimpinan, kemandirian, dan kepedulian terhadap lingkungan.',
    fullDescription: 'Gugus Depan Pramuka SMA Negeri 1 Lareh Sago Halaban aktif dalam membina karakter siswa melalui berbagai kegiatan kepramukaan. Mulai dari kegiatan rutin mingguan, perkemahan, bakti sosial, hingga kegiatan peduli lingkungan. Pramuka sekolah kami juga sering menjadi tuan rumah untuk kegiatan pramuka tingkat kabupaten.',
    image: 'https://images.unsplash.com/photo-1517486808906-6ca8b3f04846?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    members: 45,
    schedule: 'Sabtu 14:00-16:00',
    coach: 'Drs. Surya Dinata',
    location: 'Aula & Lapangan Sekolah',
    achievements: [
      {
        id: 3,
        title: 'Juara 1 Lomba Pioneering Tingkat Kabupaten',
        description: 'Prestasi dalam kompetisi keterampilan kepramukaan',
        student: 'Regu Putra Pramuka',
        level: 'Kabupaten',
        year: '2025',
        category: 'Kepramukaan'
      }
    ]
  },
  {
    id: 3,
    name: 'Paduan Suara',
    category: 'seni',
    description: 'Mengembangkan bakat vokal siswa melalui latihan menyanyi bersama dengan berbagai genre musik.',
    fullDescription: 'Paduan suara SMA Negeri 1 Lareh Sago Halaban merupakan salah satu ekstrakurikuler seni yang paling bergengsi. Dengan repertoar lagu yang beragam mulai dari lagu daerah, nasional, hingga internasional, paduan suara kami sering tampil dalam berbagai acara sekolah dan acara resmi pemerintah daerah.',
    image: 'https://images.unsplash.com/photo-1493225457124-a3eb161ffa5f?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    members: 30,
    schedule: 'Rabu & Jumat 15:30-17:00',
    coach: 'Dra. Siti Aminah, M.Pd',
    location: 'Ruang Musik',
    achievements: [
      {
        id: 4,
        title: 'Juara 1 Festival Paduan Suara Tingkat Provinsi',
        description: 'Prestasi tertinggi dalam kompetisi paduan suara se-Sumatra Barat',
        student: 'Tim Paduan Suara',
        level: 'Provinsi',
        year: '2024',
        category: 'Seni Musik'
      }
    ]
  },
  {
    id: 4,
    name: 'Komputer & Programming',
    category: 'teknologi',
    description: 'Mempelajari programming, web development, dan teknologi informasi untuk mempersiapkan era digital.',
    fullDescription: 'Ekstrakurikuler komputer dan programming memfasilitasi siswa untuk mendalami dunia teknologi informasi. Dengan kurikulum yang up-to-date, siswa belajar berbagai bahasa pemrograman, pengembangan web, mobile app development, dan teknologi terkini seperti AI dan machine learning.',
    image: 'https://images.unsplash.com/photo-1517077304055-6e89abbf09b0?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    members: 20,
    schedule: 'Senin & Rabu 15:30-17:00',
    coach: 'Ahmad Fauzi, S.Kom',
    location: 'Lab Komputer',
    achievements: [
      {
        id: 5,
        title: 'Juara 2 Lomba Web Design Tingkat Nasional',
        description: 'Prestasi dalam kompetisi desain web tingkat nasional',
        student: 'Andi Pratama (XI IPA 2)',
        level: 'Nasional',
        year: '2025',
        category: 'Teknologi'
      }
    ]
  },
  {
    id: 5,
    name: 'English Club',
    category: 'akademik',
    description: 'Meningkatkan kemampuan bahasa Inggris melalui conversation, debate, dan public speaking.',
    fullDescription: 'English Club adalah tempat siswa mengasah kemampuan bahasa Inggris dalam suasana yang menyenangkan. Melalui berbagai aktivitas seperti English conversation, debate competition, story telling, dan drama performance, siswa dapat meningkatkan confidence dalam berbahasa Inggris.',
    image: 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    members: 35,
    schedule: 'Selasa & Kamis 15:30-17:00',
    coach: 'Sarah Johnson, M.Ed',
    location: 'Ruang Bahasa',
    achievements: [
      {
        id: 6,
        title: 'Juara 1 English Debate Competition',
        description: 'Prestasi dalam kompetisi debat bahasa Inggris tingkat provinsi',
        student: 'Sari Indah (XII IPA 1)',
        level: 'Provinsi',
        year: '2024',
        category: 'Bahasa'
      }
    ]
  },
  {
    id: 6,
    name: 'Tari Tradisional',
    category: 'seni',
    description: 'Melestarikan budaya lokal melalui pembelajaran tari tradisional Minangkabau dan daerah lainnya.',
    fullDescription: 'Ekstrakurikuler tari tradisional berkomitmen untuk melestarikan kekayaan budaya Indonesia, khususnya tari-tari tradisional Minangkabau. Siswa belajar berbagai jenis tarian seperti Tari Piring, Tari Indang, dan tarian tradisional dari berbagai daerah di Indonesia.',
    image: 'https://images.unsplash.com/photo-1508700115892-45ecd05ae2ad?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    members: 28,
    schedule: 'Sabtu 15:00-17:00',
    coach: 'Hj. Nurlela, S.Sn',
    location: 'Aula Sekolah',
    achievements: [
      {
        id: 7,
        title: 'Juara 1 Festival Tari Tradisional',
        description: 'Prestasi dalam festival tari tradisional tingkat kabupaten',
        student: 'Grup Tari Piring',
        level: 'Kabupaten',
        year: '2025',
        category: 'Seni Tari'
      }
    ]
  },
  {
    id: 7,
    name: 'Futsal',
    category: 'olahraga',
    description: 'Olahraga futsal yang mengembangkan keterampilan bermain sepak bola dalam ruangan dengan teknik dan strategi khusus.',
    fullDescription: 'Tim futsal SMA Negeri 1 Lareh Sago Halaban merupakan salah satu ekstrakurikuler olahraga yang paling diminati. Dengan pelatihan rutin dan strategi bermain yang matang, tim futsal kami konsisten meraih prestasi dalam berbagai turnamen antar sekolah.',
    image: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    members: 22,
    schedule: 'Senin & Rabu 15:30-17:00',
    coach: 'Rizki Pratama, S.Pd',
    location: 'Lapangan Futsal',
    achievements: [
      {
        id: 8,
        title: 'Juara 1 Turnamen Futsal Antar SMA',
        description: 'Juara turnamen futsal tingkat kabupaten',
        student: 'Tim Futsal Putra',
        level: 'Kabupaten',
        year: '2025',
        category: 'Olahraga'
      }
    ]
  },
  {
    id: 8,
    name: 'Jurnalistik & Media',
    category: 'akademik',
    description: 'Mengembangkan kemampuan menulis, fotografi, dan produksi media untuk majalah sekolah dan website.',
    fullDescription: 'Ekstrakurikuler jurnalistik dan media melatih siswa dalam bidang komunikasi massa, mulai dari penulisan berita, feature writing, fotografi jurnalistik, hingga produksi konten digital. Tim ini bertanggung jawab atas publikasi majalah sekolah dan pengelolaan media sosial sekolah.',
    image: 'https://images.unsplash.com/photo-1586953208448-b95a79798f07?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    members: 18,
    schedule: 'Kamis & Sabtu 15:00-17:00',
    coach: 'Dewi Sartika, S.Sos',
    location: 'Ruang Media',
    achievements: [
      {
        id: 9,
        title: 'Juara 2 Lomba Jurnalistik Siswa',
        description: 'Prestasi dalam kompetisi jurnalistik tingkat provinsi',
        student: 'Rini Handayani (XI IPS 1)',
        level: 'Provinsi',
        year: '2024',
        category: 'Media'
      }
    ]
  }
]);

// Outstanding achievements
const outstandingAchievements = ref([
  {
    id: 1,
    title: 'Juara 1 Festival Paduan Suara Tingkat Provinsi',
    description: 'Prestasi tertinggi dalam kompetisi paduan suara se-Sumatra Barat dengan menampilkan lagu daerah dan nasional.',
    student: 'Tim Paduan Suara SMA LSH',
    level: 'Provinsi',
    year: '2024',
    category: 'Seni Musik'
  },
  {
    id: 2,
    title: 'Juara 2 Lomba Web Design Tingkat Nasional',
    description: 'Pencapaian luar biasa dalam kompetisi desain web dengan tema "Smart City Indonesia".',
    student: 'Andi Pratama (XI IPA 2)',
    level: 'Nasional',
    year: '2025',
    category: 'Teknologi'
  },
  {
    id: 3,
    title: 'Juara 1 English Debate Competition',
    description: 'Prestasi membanggakan dalam kompetisi debat bahasa Inggris dengan tema lingkungan.',
    student: 'Sari Indah (XII IPA 1)',
    level: 'Provinsi',
    year: '2024',
    category: 'Bahasa'
  },
  {
    id: 4,
    title: 'Juara 1 Turnamen Futsal Antar SMA',
    description: 'Kemenangan bergengsi dalam turnamen futsal dengan mengalahkan 16 sekolah peserta.',
    student: 'Tim Futsal Putra SMA LSH',
    level: 'Kabupaten',
    year: '2025',
    category: 'Olahraga'
  },
  {
    id: 5,
    title: 'Juara 2 Turnamen Basket Antar SMA',
    description: 'Prestasi konsisten tim basket dalam kompetisi tingkat kabupaten.',
    student: 'Tim Basket Putra SMA LSH',
    level: 'Kabupaten',
    year: '2025',
    category: 'Olahraga'
  },
  {
    id: 6,
    title: 'Juara 1 Festival Tari Tradisional',
    description: 'Pelestarian budaya Minangkabau melalui penampilan Tari Piring yang memukau.',
    student: 'Grup Tari Piring SMA LSH',
    level: 'Kabupaten',
    year: '2025',
    category: 'Seni Tari'
  }
]);

// Computed properties
const filteredExtracurriculars = computed(() => {
  if (activeCategory.value === 'all') {
    return extracurriculars.value;
  }
  return extracurriculars.value.filter(ekskul => ekskul.category === activeCategory.value);
});

const totalExtracurriculars = computed(() => extracurriculars.value.length);
const activeMembers = computed(() => extracurriculars.value.reduce((total, ekskul) => total + ekskul.members, 0));
const totalAchievements = computed(() => {
  return extracurriculars.value.reduce((total, ekskul) => total + ekskul.achievements.length, 0);
});
const coaches = computed(() => {
  const uniqueCoaches = new Set(extracurriculars.value.map(ekskul => ekskul.coach));
  return uniqueCoaches.size;
});

// Update category counts
categories.value.forEach(category => {
  if (category.value === 'all') {
    category.count = extracurriculars.value.length;
  } else {
    category.count = extracurriculars.value.filter(e => e.category === category.value).length;
  }
});

// Methods
const openModal = (ekskul) => {
  selectedEkskul.value = ekskul;
};

const closeModal = () => {
  selectedEkskul.value = null;
};

const getCategoryLabel = (category) => {
  const categoryMap = {
    'olahraga': 'Olahraga',
    'seni': 'Seni & Budaya',
    'akademik': 'Akademik',
    'teknologi': 'Teknologi',
    'sosial': 'Sosial'
  };
  return categoryMap[category] || 'Lainnya';
};

const getCategoryIcon = (category) => {
  const iconMap = {
    'olahraga': '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" /></svg>',
    'seni': '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>',
    'akademik': '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>',
    'teknologi': '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 3v2m6-2v2M9 19v2m6-2v2M5 9H3m2 6H3m18-6h-2m2 6h-2M7 19h10a2 2 0 002-2V7a2 2 0 00-2-2H7a2 2 0 00-2 2v10a2 2 0 002 2zM9 9h6v6H9V9z" /></svg>',
    'sosial': '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>'
  };
  return iconMap[category] || '';
};

const getCategoryBadgeClass = (category) => {
  const classMap = {
    'olahraga': 'bg-green-100 text-green-800',
    'seni': 'bg-purple-100 text-purple-800',
    'akademik': 'bg-blue-100 text-blue-800',
    'teknologi': 'bg-indigo-100 text-indigo-800',
    'sosial': 'bg-pink-100 text-pink-800'
  };
  return classMap[category] || 'bg-gray-100 text-gray-800';
};

const getAchievementBadgeClass = (level) => {
  const classMap = {
    'Internasional': 'bg-red-100 text-red-800',
    'Nasional': 'bg-blue-100 text-blue-800',
    'Provinsi': 'bg-green-100 text-green-800',
    'Kabupaten': 'bg-yellow-100 text-yellow-800'
  };
  return classMap[level] || 'bg-gray-100 text-gray-800';
};

const getAchievementBorderClass = (level) => {
  const classMap = {
    'Internasional': 'border-red-400',
    'Nasional': 'border-blue-400',
    'Provinsi': 'border-green-400',
    'Kabupaten': 'border-yellow-400'
  };
  return classMap[level] || 'border-gray-400';
};
</script>

<style scoped>
.line-clamp-3 {
  display: -webkit-box;
  -webkit-line-clamp: 3;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
