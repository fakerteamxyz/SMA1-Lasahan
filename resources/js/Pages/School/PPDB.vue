<template>
  <Head title="PPDB Online 2025/2026" />
  
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
          <h1 class="text-4xl md:text-5xl font-bold mb-4">PPDB Online 2025/2026</h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto mb-8">
            Penerimaan Peserta Didik Baru SMA Negeri 1 Lareh Sago Halaban Tahun Ajaran 2025/2026
          </p>
          
          <!-- PPDB Status Banner -->
          <div 
            v-motion="{
              initial: { opacity: 0, scale: 0.9 },
              enter: { opacity: 1, scale: 1, transition: { delay: 400 } }
            }"
            class="inline-flex items-center bg-white/10 backdrop-blur-sm px-6 py-3 rounded-full"
          >
            <div class="w-3 h-3 bg-green-400 rounded-full mr-3 animate-pulse"></div>
            <span class="font-semibold">Status: Pendaftaran Dibuka</span>
          </div>
        </div>
      </div>
    </section>

    <!-- Important Information Section -->
    <section class="py-12 bg-white">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Informasi Penting PPDB 2025/2026</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Pastikan Anda memahami semua persyaratan dan jadwal penting sebelum melakukan pendaftaran
          </p>
        </div>

        <!-- Timeline -->
        <div 
          v-motion="{
            initial: { opacity: 0, y: 50 },
            enter: { opacity: 1, y: 0, transition: { delay: 400 } }
          }"
          class="max-w-4xl mx-auto mb-12"
        >
          <h3 class="text-2xl font-bold text-center text-gray-800 mb-8">Timeline PPDB</h3>
          
          <div class="relative">
            <!-- Timeline Line -->
            <div class="absolute left-4 md:left-1/2 md:transform md:-translate-x-1/2 top-0 bottom-0 w-0.5 bg-[#B0D6F5]"></div>
            
            <div class="space-y-8">
              <div 
                v-for="(timeline, index) in ppdbTimeline" 
                :key="index"
                v-motion="{
                  initial: { opacity: 0, x: index % 2 === 0 ? -50 : 50 },
                  enter: { opacity: 1, x: 0, transition: { delay: (index * 100) + 600 } }
                }"
                class="relative flex items-center"
                :class="index % 2 === 0 ? 'md:flex-row' : 'md:flex-row-reverse'"
              >
                <!-- Timeline Dot -->
                <div 
                  class="absolute left-4 md:left-1/2 md:transform md:-translate-x-1/2 w-8 h-8 rounded-full flex items-center justify-center"
                  :class="timeline.status === 'completed' 
                    ? 'bg-green-500' 
                    : timeline.status === 'active' 
                      ? 'bg-[#0487E2]' 
                      : 'bg-gray-300'"
                >
                  <svg v-if="timeline.status === 'completed'" xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                  </svg>
                  <div v-else-if="timeline.status === 'active'" class="w-3 h-3 bg-white rounded-full animate-pulse"></div>
                  <div v-else class="w-3 h-3 bg-white rounded-full"></div>
                </div>
                
                <!-- Timeline Content -->
                <div 
                  class="ml-16 md:ml-0 md:w-5/12 bg-white rounded-lg shadow-lg p-6 border-l-4"
                  :class="timeline.status === 'completed' 
                    ? 'border-green-500' 
                    : timeline.status === 'active' 
                      ? 'border-[#0487E2]' 
                      : 'border-gray-300'"
                >
                  <div class="flex items-center mb-2">
                    <span 
                      class="text-xs font-semibold px-2 py-1 rounded-full"
                      :class="timeline.status === 'completed' 
                        ? 'bg-green-100 text-green-800' 
                        : timeline.status === 'active' 
                          ? 'bg-blue-100 text-blue-800' 
                          : 'bg-gray-100 text-gray-800'"
                    >
                      {{ timeline.status === 'completed' ? 'SELESAI' : timeline.status === 'active' ? 'BERLANGSUNG' : 'AKAN DATANG' }}
                    </span>
                  </div>
                  <h4 class="text-lg font-bold text-gray-800 mb-2">{{ timeline.title }}</h4>
                  <p class="text-gray-600 mb-2">{{ timeline.description }}</p>
                  <p class="text-sm font-medium text-[#0487E2]">{{ timeline.date }}</p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- Quick Stats -->
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 800 } }
          }"
          class="grid md:grid-cols-4 gap-6 mb-12"
        >
          <div 
            v-for="(stat, index) in ppdbStats" 
            :key="index"
            class="bg-white rounded-lg shadow-lg p-6 text-center border-t-4 border-[#0487E2]"
          >
            <div class="text-3xl font-bold text-[#0487E2] mb-2">{{ stat.value }}</div>
            <p class="text-gray-600 font-medium">{{ stat.label }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- PPDB Online Form Section -->
    <PPDBForm />

    <!-- FAQ Section -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0 }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Frequently Asked Questions</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Pertanyaan yang sering diajukan seputar PPDB SMA 1 Lareh Sago Halaban
          </p>
        </div>

        <div 
          v-motion="{
            initial: { opacity: 0, y: 50 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="max-w-4xl mx-auto"
        >
          <div class="space-y-4">
            <div 
              v-for="(faq, index) in faqs" 
              :key="index"
              class="bg-white rounded-lg shadow-lg overflow-hidden"
            >
              <button 
                @click="toggleFAQ(index)"
                class="w-full px-6 py-4 text-left font-semibold text-gray-800 hover:bg-gray-50 transition-colors flex justify-between items-center"
              >
                <span>{{ faq.question }}</span>
                <svg 
                  xmlns="http://www.w3.org/2000/svg" 
                  class="h-5 w-5 transition-transform"
                  :class="faq.open ? 'rotate-180' : ''"
                  fill="none" 
                  viewBox="0 0 24 24" 
                  stroke="currentColor"
                >
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7" />
                </svg>
              </button>
              
              <div 
                v-if="faq.open"
                class="px-6 pb-4 text-gray-600 border-t border-gray-100"
              >
                <p class="pt-4">{{ faq.answer }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Contact Support Section -->
    <section class="py-16 bg-gradient-to-r from-[#0487E2] to-[#65C2F5] text-white">
      <div class="container mx-auto px-4 text-center">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0 }
          }"
        >
          <h2 class="text-3xl font-bold mb-4">Butuh Bantuan?</h2>
          <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
            Tim PPDB kami siap membantu Anda dalam proses pendaftaran
          </p>
          
          <div class="flex flex-wrap justify-center gap-4">
            <a 
              href="https://wa.me/6281234567890?text=Halo%2C%20saya%20butuh%20bantuan%20PPDB"
              target="_blank"
              class="bg-green-600 hover:bg-green-700 text-white px-8 py-3 rounded-lg font-semibold transition-colors flex items-center"
            >
              <svg class="w-5 h-5 mr-2" fill="currentColor" viewBox="0 0 24 24">
                <path d="M20.885 3.106A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
              </svg>
              WhatsApp Support
            </a>
            
            <a 
              href="mailto:ppdb@sma1lsh.sch.id"
              class="bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:bg-white/20 px-8 py-3 rounded-lg font-semibold transition-colors"
            >
              📧 Email PPDB
            </a>
            
            <a 
              href="tel:+6275212345678"
              class="bg-white/10 backdrop-blur-sm border border-white/20 text-white hover:bg-white/20 px-8 py-3 rounded-lg font-semibold transition-colors"
            >
              📞 Telepon
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
import PPDBForm from '@/Components/PPDBForm.vue';
import SchoolFooter from '@/Components/SchoolFooter.vue';
import SchoolHeader from '@/Components/SchoolHeader.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

const ppdbTimeline = ref([
  {
    title: 'Sosialisasi PPDB',
    description: 'Penyebaran informasi dan sosialisasi PPDB kepada SMP/MTs se-Kabupaten Lima Puluh Kota',
    date: '15 - 31 Mei 2025',
    status: 'completed'
  },
  {
    title: 'Pendaftaran Online',
    description: 'Pembukaan pendaftaran online melalui website resmi sekolah',
    date: '1 - 30 Juni 2025',
    status: 'active'
  },
  {
    title: 'Verifikasi Berkas',
    description: 'Verifikasi berkas persyaratan dan validasi data pendaftar',
    date: '1 - 31 Juli 2025',
    status: 'upcoming'
  },
  {
    title: 'Pengumuman Hasil',
    description: 'Pengumuman hasil seleksi PPDB dan daftar calon peserta didik diterima',
    date: '5 Agustus 2025',
    status: 'upcoming'
  },
  {
    title: 'Daftar Ulang',
    description: 'Proses daftar ulang bagi calon peserta didik yang dinyatakan diterima',
    date: '6 - 10 Agustus 2025',
    status: 'upcoming'
  },
  {
    title: 'Masa Orientasi Siswa',
    description: 'Kegiatan pengenalan lingkungan sekolah untuk siswa baru',
    date: '12 - 14 Agustus 2025',
    status: 'upcoming'
  }
]);

const ppdbStats = ref([
  { value: '120', label: 'Kuota Tersedia' },
  { value: '324', label: 'Pendaftar' },
  { value: '4', label: 'Jalur Pendaftaran' },
  { value: '15', label: 'Hari Tersisa' }
]);

const faqs = ref([
  {
    question: 'Bagaimana cara mendaftar PPDB online?',
    answer: 'Anda dapat mendaftar melalui website resmi ini dengan mengisi formulir pendaftaran yang tersedia. Pastikan semua data diisi dengan benar dan lengkap.',
    open: false
  },
  {
    question: 'Apa saja persyaratan untuk mendaftar?',
    answer: 'Persyaratan meliputi: fotokopi ijazah/SKHUN yang dilegalisir, fotokopi KK, fotokopi KTP orang tua, pas foto 3x4 sebanyak 4 lembar, dan fotokopi akta kelahiran.',
    open: false
  },
  {
    question: 'Berapa biaya pendaftaran PPDB?',
    answer: 'Pendaftaran PPDB di SMA Negeri 1 Lareh Sago Halaban adalah GRATIS. Tidak ada biaya pendaftaran yang dikenakan.',
    open: false
  },
  {
    question: 'Bagaimana sistem seleksi PPDB?',
    answer: 'Seleksi dilakukan berdasarkan jalur: 50% zonasi, 20% afirmasi, 10% mutasi, dan 20% prestasi. Setiap jalur memiliki kriteria penilaian yang berbeda.',
    open: false
  },
  {
    question: 'Kapan pengumuman hasil PPDB?',
    answer: 'Pengumuman hasil PPDB akan diumumkan pada tanggal 5 Agustus 2025 melalui website resmi dan papan pengumuman sekolah.',
    open: false
  },
  {
    question: 'Apa yang harus dilakukan jika diterima?',
    answer: 'Jika diterima, Anda harus melakukan daftar ulang pada tanggal 6-10 Agustus 2025 dengan membawa berkas asli untuk verifikasi.',
    open: false
  },
  {
    question: 'Bisakah mendaftar di jalur yang berbeda?',
    answer: 'Setiap calon peserta didik hanya dapat mendaftar melalui satu jalur saja sesuai dengan kriteria yang dipenuhi.',
    open: false
  },
  {
    question: 'Bagaimana jika ada kendala teknis saat mendaftar?',
    answer: 'Jika mengalami kendala teknis, Anda dapat menghubungi tim support PPDB melalui WhatsApp, email, atau datang langsung ke sekolah pada jam kerja.',
    open: false
  }
]);

const toggleFAQ = (index) => {
  faqs.value[index].open = !faqs.value[index].open;
};
</script>
