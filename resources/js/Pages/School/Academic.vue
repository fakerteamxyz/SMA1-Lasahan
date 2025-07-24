<template>
  <Head title="Informasi Akademik" />
  
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
          <h1 class="text-4xl md:text-5xl font-bold mb-4">Informasi Akademik</h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto">
            Informasi lengkap mengenai sistem pembelajaran, kurikulum, dan kegiatan akademik di SMA Negeri 1 Lareh Sago Halaban
          </p>
        </div>
      </div>
      <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </section>

    <!-- Quick Navigation -->
    <section class="relative -mt-8 mb-16">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 50 },
            enter: { opacity: 1, y: 0, transition: { delay: 400 } }
          }"
          class="bg-white rounded-xl shadow-lg p-6"
        >
          <div class="grid grid-cols-2 md:grid-cols-5 gap-4">
            <a 
              v-for="(nav, index) in quickNavigation" 
              :key="index"
              :href="nav.href"
              class="flex flex-col items-center p-4 rounded-lg hover:bg-[#0487E2]/5 transition-colors group"
            >
              <div class="text-[#0487E2] mb-2 group-hover:scale-110 transition-transform" v-html="nav.icon"></div>
              <span class="text-sm font-medium text-gray-700 text-center">{{ nav.title }}</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Kurikulum Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Kurikulum Merdeka</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            SMA Negeri 1 Lareh Sago Halaban menerapkan Kurikulum Merdeka yang memberikan fleksibilitas dan kebebasan kepada siswa untuk mengembangkan potensi dan minatnya
          </p>
        </div>

        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div 
            v-motion="{
              initial: { opacity: 0, x: -50 },
              enter: { opacity: 1, x: 0, transition: { delay: 400 } }
            }"
          >
            <img 
              src="https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&auto=format&fit=crop&w=800&q=80" 
              alt="Kurikulum Merdeka" 
              class="rounded-lg shadow-lg"
            >
          </div>
          <div 
            v-motion="{
              initial: { opacity: 0, x: 50 },
              enter: { opacity: 1, x: 0, transition: { delay: 600 } }
            }"
            class="space-y-6"
          >
            <div class="bg-gradient-to-r from-[#0487E2]/10 to-[#65C2F5]/10 rounded-lg p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-4">Keunggulan Kurikulum Merdeka</h3>
              <ul class="space-y-3">
                <li v-for="(feature, index) in curriculumFeatures" :key="index" class="flex items-start">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0487E2] mr-3 mt-0.5 flex-shrink-0" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <span class="text-gray-700">{{ feature }}</span>
                </li>
              </ul>
            </div>
            
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
              <div class="bg-white border border-[#0487E2]/20 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-[#0487E2] mb-1">3</div>
                <div class="text-sm text-gray-600">Peminatan</div>
              </div>
              <div class="bg-white border border-[#0487E2]/20 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-[#0487E2] mb-1">12</div>
                <div class="text-sm text-gray-600">Mata Pelajaran Pilihan</div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Jadwal Pelajaran -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Jadwal Pelajaran</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Jadwal kegiatan belajar mengajar yang terstruktur untuk mengoptimalkan proses pembelajaran
          </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
          <!-- Sample Schedule Card -->
          <div 
            v-for="(kelas, index) in scheduleClasses" 
            :key="index"
            v-motion="{
              initial: { opacity: 0, y: 30 },
              enter: { opacity: 1, y: 0, transition: { delay: 300 + (index * 100) } }
            }"
            class="bg-white rounded-xl shadow-lg overflow-hidden"
          >
            <div class="bg-gradient-to-r from-[#0487E2] to-[#65C2F5] text-white p-4">
              <h3 class="text-xl font-bold">{{ kelas.name }}</h3>
              <p class="text-white/90">{{ kelas.waliKelas }}</p>
            </div>
            <div class="p-6">
              <div class="space-y-3">
                <div v-for="(jadwal, jIndex) in kelas.schedule.slice(0, 5)" :key="jIndex" class="flex justify-between items-center py-2 border-b border-gray-100 last:border-0">
                  <div>
                    <div class="font-medium text-gray-800">{{ jadwal.subject }}</div>
                    <div class="text-sm text-gray-500">{{ jadwal.teacher }}</div>
                  </div>
                  <div class="text-sm text-[#0487E2] font-medium">{{ jadwal.time }}</div>
                </div>
              </div>
              <div class="mt-4 pt-4 border-t border-gray-100">
                <button class="w-full bg-[#0487E2] text-white py-2 rounded-lg hover:bg-[#0463CA] transition-colors">
                  Lihat Jadwal Lengkap
                </button>
              </div>
            </div>
          </div>
        </div>

        <div class="text-center mt-8">
          <a href="/jadwal-lengkap" class="inline-flex items-center bg-white text-[#0487E2] px-6 py-3 rounded-lg shadow-md hover:shadow-lg transition-shadow">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
            </svg>
            Download Jadwal Lengkap (PDF)
          </a>
        </div>
      </div>
    </section>

    <!-- Daftar Guru & Mata Pelajaran -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Daftar Guru & Mata Pelajaran</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Tim pengajar profesional dan berpengalaman yang siap membimbing siswa meraih prestasi terbaik
          </p>
        </div>

        <!-- Filter Tabs -->
        <div 
          v-motion="{
            initial: { opacity: 0, y: 20 },
            enter: { opacity: 1, y: 0, transition: { delay: 400 } }
          }"
          class="flex flex-wrap justify-center gap-2 mb-8"
        >
          <button 
            v-for="(subject, index) in subjectCategories" 
            :key="index"
            @click="activeSubject = subject"
            class="px-4 py-2 rounded-lg transition-colors"
            :class="activeSubject === subject ? 'bg-[#0487E2] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
          >
            {{ subject }}
          </button>
        </div>

        <!-- Teachers Grid -->
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div 
            v-for="(teacher, index) in filteredTeachers" 
            :key="index"
            v-motion="{
              initial: { opacity: 0, scale: 0.9 },
              enter: { opacity: 1, scale: 1, transition: { delay: 200 + (index * 50) } }
            }"
            class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow"
          >
            <div class="flex items-center mb-4">
              <div class="w-16 h-16 bg-gradient-to-br from-[#0487E2] to-[#65C2F5] rounded-full flex items-center justify-center text-white text-xl font-bold mr-4">
                {{ teacher.name.charAt(0) }}
              </div>
              <div>
                <h3 class="font-bold text-gray-800">{{ teacher.name }}</h3>
                <p class="text-[#0487E2] font-medium">{{ teacher.subject }}</p>
                <p class="text-sm text-gray-500">{{ teacher.education }}</p>
              </div>
            </div>
            <div class="border-t border-gray-100 pt-4">
              <div class="flex justify-between text-sm text-gray-600 mb-2">
                <span>Pengalaman:</span>
                <span class="font-medium">{{ teacher.experience }}</span>
              </div>
              <div class="flex justify-between text-sm text-gray-600">
                <span>Sertifikasi:</span>
                <span class="font-medium text-green-600">{{ teacher.certification }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Kalender Akademik -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Kalender Akademik 2024/2025</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Jadwal kegiatan akademik dan non-akademik sepanjang tahun ajaran
          </p>
        </div>

        <div class="grid lg:grid-cols-3 gap-8">
          <!-- Current Month Events -->
          <div 
            v-motion="{
              initial: { opacity: 0, x: -30 },
              enter: { opacity: 1, x: 0, transition: { delay: 400 } }
            }"
            class="lg:col-span-2"
          >
            <div class="bg-white rounded-xl shadow-lg p-6">
              <h3 class="text-xl font-bold text-gray-800 mb-6">Kegiatan Bulan Ini</h3>
              <div class="space-y-4">
                <div v-for="(event, index) in currentMonthEvents" :key="index" class="flex items-start p-4 bg-gray-50 rounded-lg">
                  <div class="bg-[#0487E2] text-white rounded-lg p-2 mr-4 flex-shrink-0">
                    <div class="text-center">
                      <div class="text-xs">{{ event.month }}</div>
                      <div class="text-lg font-bold">{{ event.date }}</div>
                    </div>
                  </div>
                  <div class="flex-grow">
                    <h4 class="font-semibold text-gray-800 mb-1">{{ event.title }}</h4>
                    <p class="text-sm text-gray-600 mb-2">{{ event.description }}</p>
                    <div class="flex items-center text-xs text-gray-500">
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                      </svg>
                      {{ event.location }}
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick Actions -->
          <div 
            v-motion="{
              initial: { opacity: 0, x: 30 },
              enter: { opacity: 1, x: 0, transition: { delay: 600 } }
            }"
            class="space-y-6"
          >
            <div class="bg-white rounded-xl shadow-lg p-6">
              <h3 class="text-lg font-bold text-gray-800 mb-4">Download Kalender</h3>
              <div class="space-y-3">
                <a href="/kalender-akademik.pdf" class="flex items-center w-full bg-[#0487E2] text-white p-3 rounded-lg hover:bg-[#0463CA] transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                  </svg>
                  Kalender PDF
                </a>
                <a href="#" class="flex items-center w-full bg-green-600 text-white p-3 rounded-lg hover:bg-green-700 transition-colors">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  Google Calendar
                </a>
              </div>
            </div>

            <div class="bg-white rounded-xl shadow-lg p-6">
              <h3 class="text-lg font-bold text-gray-800 mb-4">Info Penting</h3>
              <div class="space-y-3 text-sm">
                <div class="flex items-center text-amber-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.664-.833-2.464 0L4.35 16.5c-.77.833.192 2.5 1.732 2.5z" />
                  </svg>
                  Ujian Tengah Semester
                </div>
                <div class="flex items-center text-blue-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Libur Semester Ganjil
                </div>
                <div class="flex items-center text-green-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Pendaftaran PPDB
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- PPDB Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">PPDB 2025/2026</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Penerimaan Peserta Didik Baru Tahun Ajaran 2025/2026 telah dibuka. Daftar sekarang dan raih masa depan cemerlang!
          </p>
        </div>

        <div class="grid lg:grid-cols-2 gap-12 items-center">
          <div 
            v-motion="{
              initial: { opacity: 0, x: -50 },
              enter: { opacity: 1, x: 0, transition: { delay: 400 } }
            }"
          >
            <div class="bg-gradient-to-br from-[#0487E2]/10 to-[#65C2F5]/10 rounded-xl p-8">
              <h3 class="text-2xl font-bold text-gray-800 mb-6">Informasi PPDB</h3>
              
              <div class="space-y-6">
                <div v-for="(info, index) in ppdbInfo" :key="index" class="flex items-start">
                  <div class="bg-[#0487E2] text-white rounded-full p-2 mr-4 flex-shrink-0">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                    </svg>
                  </div>
                  <div>
                    <h4 class="font-semibold text-gray-800 mb-1">{{ info.title }}</h4>
                    <p class="text-gray-600 text-sm">{{ info.description }}</p>
                  </div>
                </div>
              </div>

              <div class="mt-8 p-4 bg-amber-50 border border-amber-200 rounded-lg">
                <div class="flex items-center text-amber-800">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  <span class="font-semibold">Batas Pendaftaran: 31 Juli 2025</span>
                </div>
              </div>
            </div>
          </div>

          <div 
            v-motion="{
              initial: { opacity: 0, x: 50 },
              enter: { opacity: 1, x: 0, transition: { delay: 600 } }
            }"
            class="text-center"
          >
            <img 
              src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80" 
              alt="PPDB 2025" 
              class="rounded-xl shadow-lg mb-6"
            >
            
            <div class="grid grid-cols-2 gap-4 mb-6">
              <div class="bg-white border border-[#0487E2]/20 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-[#0487E2] mb-1">120</div>
                <div class="text-sm text-gray-600">Kuota Siswa</div>
              </div>
              <div class="bg-white border border-[#0487E2]/20 rounded-lg p-4 text-center">
                <div class="text-2xl font-bold text-[#0487E2] mb-1">3</div>
                <div class="text-sm text-gray-600">Jalur Masuk</div>
              </div>
            </div>

            <div class="space-y-3">
              <a href="/ppdb-online" class="block w-full bg-[#0487E2] text-white py-3 rounded-lg font-semibold hover:bg-[#0463CA] transition-colors">
                Daftar Online Sekarang
              </a>
              <a href="/ppdb-panduan" class="block w-full border-2 border-[#0487E2] text-[#0487E2] py-3 rounded-lg font-semibold hover:bg-[#0487E2] hover:text-white transition-colors">
                Download Panduan PPDB
              </a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-[#0487E2] to-[#65C2F5] text-white">
      <div class="container mx-auto px-4 text-center">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
        >
          <h2 class="text-3xl font-bold mb-4">Ada Pertanyaan Tentang Akademik?</h2>
          <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
            Tim akademik kami siap membantu menjawab pertanyaan Anda
          </p>
          <div class="flex flex-wrap justify-center gap-4">
            <a href="/kontak" class="bg-white text-[#0487E2] px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 hover:text-[#0487E2] transition-colors">
              <span class="text-[#0487E2]">Hubungi Kami</span>
            </a>
            <a href="/faq" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-[#0487E2] transition-colors">
              <span class="text-white hover:text-[#0487E2]">FAQ Akademik</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Footer Component -->
    <SchoolFooter />
  </div>
</template>

<script setup>
import SchoolFooter from '@/Components/SchoolFooter.vue';
import SchoolHeader from '@/Components/SchoolHeader.vue';
import { Head } from '@inertiajs/vue3';
import { computed, ref } from 'vue';

// Quick Navigation
const quickNavigation = ref([
  {
    title: 'Kurikulum',
    href: '#kurikulum',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>'
  },
  {
    title: 'Jadwal',
    href: '#jadwal',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
  },
  {
    title: 'Guru',
    href: '#guru',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>'
  },
  {
    title: 'Kalender',
    href: '#kalender',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>'
  },
  {
    title: 'PPDB',
    href: '#ppdb',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>'
  }
]);

// Curriculum Features
const curriculumFeatures = ref([
  'Pembelajaran berbasis proyek dan kolaboratif',
  'Fleksibilitas pemilihan mata pelajaran sesuai minat',
  'Pengembangan karakter dan profil pelajar Pancasila',
  'Integrasi teknologi dalam pembelajaran',
  'Penguatan literasi dan numerasi',
  'Pembelajaran diferensiasi sesuai kebutuhan siswa'
]);

// Schedule Classes
const scheduleClasses = ref([
  {
    name: 'Kelas X IPA 1',
    waliKelas: 'Dra. Siti Aminah, M.Pd',
    schedule: [
      { subject: 'Matematika', teacher: 'Drs. Ahmad Fauzi', time: '07:30-09:00' },
      { subject: 'Fisika', teacher: 'Dr. Bambang Susilo', time: '09:15-10:45' },
      { subject: 'Kimia', teacher: 'Dra. Nurlela, M.Si', time: '11:00-12:30' },
      { subject: 'Biologi', teacher: 'Hj. Yuni Astuti, S.Pd', time: '13:30-15:00' },
      { subject: 'Bahasa Indonesia', teacher: 'Drs. Irwan Syahputra', time: '15:15-16:45' }
    ]
  },
  {
    name: 'Kelas XI IPS 1',
    waliKelas: 'Drs. Bambang Susilo',
    schedule: [
      { subject: 'Sejarah', teacher: 'Dra. Siti Aminah, M.Pd', time: '07:30-09:00' },
      { subject: 'Geografi', teacher: 'Drs. Ahmad Fauzi', time: '09:15-10:45' },
      { subject: 'Ekonomi', teacher: 'Hj. Nurlela, M.M', time: '11:00-12:30' },
      { subject: 'Sosiologi', teacher: 'Yuni Astuti, S.Pd', time: '13:30-15:00' },
      { subject: 'Bahasa Inggris', teacher: 'Drs. Irwan Syahputra', time: '15:15-16:45' }
    ]
  },
  {
    name: 'Kelas XII MIPA 1',
    waliKelas: 'Hj. Nurlela, S.Pd, M.M',
    schedule: [
      { subject: 'Matematika Lanjut', teacher: 'Dr. Bambang Susilo', time: '07:30-09:00' },
      { subject: 'Fisika Lanjut', teacher: 'Drs. Ahmad Fauzi', time: '09:15-10:45' },
      { subject: 'Kimia Lanjut', teacher: 'Dra. Nurlela, M.Si', time: '11:00-12:30' },
      { subject: 'Biologi Lanjut', teacher: 'Hj. Yuni Astuti, S.Pd', time: '13:30-15:00' },
      { subject: 'Bahasa Inggris', teacher: 'Drs. Irwan Syahputra', time: '15:15-16:45' }
    ]
  }
]);

// Subject Categories and Teachers
const activeSubject = ref('Semua');
const subjectCategories = ref(['Semua', 'MIPA', 'IPS', 'Bahasa', 'Agama', 'Olahraga']);

const allTeachers = ref([
  {
    name: 'Drs. Ahmad Fauzi, M.Pd',
    subject: 'Matematika',
    education: 'S2 Pendidikan Matematika',
    experience: '15 tahun',
    certification: 'Tersertifikasi',
    category: 'MIPA'
  },
  {
    name: 'Dr. Bambang Susilo, M.Si',
    subject: 'Fisika',
    education: 'S3 Fisika Teoritis',
    experience: '12 tahun',
    certification: 'Tersertifikasi',
    category: 'MIPA'
  },
  {
    name: 'Dra. Nurlela, M.Si',
    subject: 'Kimia',
    education: 'S2 Kimia Analitik',
    experience: '18 tahun',
    certification: 'Tersertifikasi',
    category: 'MIPA'
  },
  {
    name: 'Hj. Yuni Astuti, S.Pd',
    subject: 'Biologi',
    education: 'S1 Pendidikan Biologi',
    experience: '10 tahun',
    certification: 'Tersertifikasi',
    category: 'MIPA'
  },
  {
    name: 'Drs. Irwan Syahputra',
    subject: 'Bahasa Indonesia',
    education: 'S1 Pendidikan Bahasa Indonesia',
    experience: '20 tahun',
    certification: 'Tersertifikasi',
    category: 'Bahasa'
  },
  {
    name: 'Dra. Siti Aminah, M.Pd',
    subject: 'Sejarah',
    education: 'S2 Pendidikan Sejarah',
    experience: '14 tahun',
    certification: 'Tersertifikasi',
    category: 'IPS'
  },
  {
    name: 'Hj. Nurlela, M.M',
    subject: 'Ekonomi',
    education: 'S2 Manajemen',
    experience: '16 tahun',
    certification: 'Tersertifikasi',
    category: 'IPS'
  },
  {
    name: 'Drs. Surya Dinata',
    subject: 'Pendidikan Agama Islam',
    education: 'S1 Pendidikan Agama Islam',
    experience: '13 tahun',
    certification: 'Tersertifikasi',
    category: 'Agama'
  },
  {
    name: 'Budi Santoso, S.Pd',
    subject: 'Pendidikan Jasmani',
    education: 'S1 Pendidikan Olahraga',
    experience: '8 tahun',
    certification: 'Tersertifikasi',
    category: 'Olahraga'
  }
]);

const filteredTeachers = computed(() => {
  if (activeSubject.value === 'Semua') {
    return allTeachers.value;
  }
  return allTeachers.value.filter(teacher => teacher.category === activeSubject.value);
});

// Current Month Events
const currentMonthEvents = ref([
  {
    date: '26',
    month: 'JUL',
    title: 'Ujian Akhir Semester Ganjil',
    description: 'Ujian akhir semester untuk kelas X, XI, dan XII',
    location: 'Seluruh Ruang Kelas'
  },
  {
    date: '28',
    month: 'JUL',
    title: 'Rapat Evaluasi Pembelajaran',
    description: 'Rapat evaluasi semester dan persiapan semester genap',
    location: 'Aula Sekolah'
  },
  {
    date: '30',
    month: 'JUL',
    title: 'Pembagian Rapor Semester Ganjil',
    description: 'Pembagian rapor untuk siswa kelas X, XI, dan XII',
    location: 'Ruang Kelas Masing-masing'
  },
  {
    date: '31',
    month: 'JUL',
    title: 'Batas Akhir Pendaftaran PPDB',
    description: 'Batas terakhir pendaftaran peserta didik baru',
    location: 'Ruang Pendaftaran'
  }
]);

// PPDB Information
const ppdbInfo = ref([
  {
    title: 'Pendaftaran Online',
    description: 'Daftar melalui sistem online yang mudah dan cepat'
  },
  {
    title: 'Jalur Zonasi (60%)',
    description: 'Jalur utama berdasarkan zona tempat tinggal'
  },
  {
    title: 'Jalur Afirmasi (20%)',
    description: 'Khusus untuk keluarga kurang mampu dengan KIP'
  },
  {
    title: 'Jalur Prestasi (20%)',
    description: 'Berdasarkan prestasi akademik dan non-akademik'
  },
  {
    title: 'Kuota Total: 120 Siswa',
    description: 'Dibagi dalam 4 rombongan belajar'
  },
  {
    title: 'Bebas Biaya Pendidikan',
    description: 'Gratis SPP dan buku pelajaran'
  }
]);
</script>

<style scoped>
/* Custom styles if needed */
</style>
