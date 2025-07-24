<template>
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0 }
        }"
        class="text-center mb-12"
      >
        <h2 class="text-sm text-[#0487E2] font-semibold uppercase tracking-wider mb-2">Berita Sekolah</h2>
        <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Artikel & Update Terkini</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">
          Tetap update dengan berita, kegiatan, dan pencapaian terbaru dari SMA Negeri 1 Lareh Sago Halaban
        </p>
      </div>

      <!-- Featured Article -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0, transition: { delay: 200 } }
        }"
        class="mb-12"
      >
        <div class="bg-gradient-to-r from-[#0487E2] to-[#65C2F5] rounded-2xl overflow-hidden shadow-xl">
          <div class="grid md:grid-cols-2 gap-0">
            <div class="relative h-64 md:h-auto">
              <img 
                :src="featuredArticle.image" 
                :alt="featuredArticle.title"
                class="w-full h-full object-cover"
              >
              <div class="absolute top-4 left-4">
                <span class="bg-white/90 text-[#0487E2] px-3 py-1 rounded-full text-xs font-semibold">
                  UTAMA
                </span>
              </div>
            </div>
            <div class="p-8 text-white flex flex-col justify-center">
              <div class="flex items-center mb-4">
                <span class="text-white/80 text-sm">{{ featuredArticle.date }}</span>
                <span class="mx-2 text-white/60">•</span>
                <span class="text-white/80 text-sm">{{ featuredArticle.category }}</span>
              </div>
              <h4 class="text-2xl md:text-3xl font-bold mb-4 leading-tight">{{ featuredArticle.title }}</h4>
              <p class="text-white/90 mb-6 leading-relaxed">{{ featuredArticle.excerpt }}</p>
              <button 
                @click="readMore(featuredArticle)"
                class="bg-white text-[#0487E2] px-6 py-3 rounded-lg font-semibold hover:bg-gray-100 transition-colors w-fit"
              >
                Baca Selengkapnya
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Category Filter -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 20 },
          enter: { opacity: 1, y: 0, transition: { delay: 400 } }
        }"
        class="flex flex-wrap justify-center gap-4 mb-8"
      >
        <button 
          v-for="category in categories" 
          :key="category.id"
          @click="activeCategory = category.id"
          class="px-6 py-2 rounded-full font-medium transition-all duration-300"
          :class="activeCategory === category.id 
            ? 'bg-[#0487E2] text-white shadow-lg' 
            : 'bg-gray-100 text-gray-600 hover:bg-[#B0D6F5]/30 hover:text-[#0487E2]'"
        >
          {{ category.name }}
        </button>
      </div>

      <!-- Articles Grid -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <div 
          v-for="(article, index) in filteredArticles" 
          :key="article.id"
          v-motion="{
            initial: { opacity: 0, y: 50 },
            enter: { opacity: 1, y: 0, transition: { delay: (index * 100) + 600 } }
          }"
          class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300"
        >
          <!-- Article Image -->
          <div class="relative h-48 overflow-hidden">
            <img 
              :src="article.image" 
              :alt="article.title"
              class="w-full h-full object-cover hover:scale-105 transition-transform duration-300"
            >
            <div class="absolute top-4 left-4">
              <span class="bg-[#0487E2] text-white px-3 py-1 rounded-full text-xs font-semibold">
                {{ article.category }}
              </span>
            </div>
          </div>

          <!-- Article Content -->
          <div class="p-6">
            <div class="flex items-center text-sm text-gray-500 mb-3">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
              {{ article.date }}
              <span class="mx-2">•</span>
              <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
              </svg>
              {{ article.views }} views
            </div>
            
            <h4 class="text-lg font-bold text-gray-800 mb-3 line-clamp-2 hover:text-[#0487E2] transition-colors">
              {{ article.title }}
            </h4>
            
            <p class="text-gray-600 mb-4 line-clamp-3">{{ article.excerpt }}</p>
            
            <div class="flex items-center justify-between">
              <div class="flex items-center">
                <div class="w-8 h-8 bg-[#0487E2] rounded-full flex items-center justify-center mr-3">
                  <span class="text-white text-xs font-bold">{{ article.author.initials }}</span>
                </div>
                <div>
                  <p class="text-sm font-medium text-gray-800">{{ article.author.name }}</p>
                  <p class="text-xs text-gray-500">{{ article.author.role }}</p>
                </div>
              </div>
              
              <button 
                @click="readMore(article)"
                class="text-[#0487E2] hover:text-[#0463CA] font-semibold text-sm flex items-center"
              >
                Baca
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                </svg>
              </button>
            </div>
          </div>
        </div>
      </div>

      <!-- Load More Button -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 20 },
          enter: { opacity: 1, y: 0, transition: { delay: 1000 } }
        }"
        class="text-center"
      >
        <button class="bg-[#0487E2] hover:bg-[#0463CA] text-white px-8 py-3 rounded-lg font-semibold transition-colors">
          <span class="text-white">Muat Berita Lainnya</span>
        </button>
      </div>
    </div>

    <!-- Article Modal -->
    <div 
      v-if="selectedArticle" 
      class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4"
      @click.self="selectedArticle = null"
    >
      <div class="bg-white rounded-xl max-w-4xl w-full max-h-[90vh] overflow-y-auto">
        <!-- Modal Header -->
        <div class="relative">
          <img 
            :src="selectedArticle.image" 
            :alt="selectedArticle.title"
            class="w-full h-64 object-cover"
          >
          <button 
            @click="selectedArticle = null"
            class="absolute top-4 right-4 bg-black/50 text-white p-2 rounded-full hover:bg-black/70"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <!-- Modal Content -->
        <div class="p-8">
          <div class="flex items-center text-sm text-gray-500 mb-4">
            <span class="bg-[#0487E2] text-white px-3 py-1 rounded-full text-xs font-semibold mr-4">
              {{ selectedArticle.category }}
            </span>
            {{ selectedArticle.date }}
            <span class="mx-2">•</span>
            {{ selectedArticle.views }} views
          </div>
          
          <h2 class="text-3xl font-bold text-gray-800 mb-4">{{ selectedArticle.title }}</h2>
          
          <div class="flex items-center mb-6">
            <div class="w-12 h-12 bg-[#0487E2] rounded-full flex items-center justify-center mr-4">
              <span class="text-white font-bold">{{ selectedArticle.author.initials }}</span>
            </div>
            <div>
              <p class="font-medium text-gray-800">{{ selectedArticle.author.name }}</p>
              <p class="text-sm text-gray-500">{{ selectedArticle.author.role }}</p>
            </div>
          </div>
          
          <div class="prose max-w-none">
            <p class="text-gray-600 leading-relaxed">{{ selectedArticle.content }}</p>
          </div>

          <!-- Share Buttons -->
          <div class="flex items-center justify-between mt-8 pt-6 border-t border-gray-200">
            <div class="flex items-center space-x-4">
              <span class="text-sm font-medium text-gray-600">Bagikan:</span>
              <button class="text-blue-600 hover:text-blue-700">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M24 4.557c-.883.392-1.832.656-2.828.775 1.017-.609 1.798-1.574 2.165-2.724-.951.564-2.005.974-3.127 1.195-.897-.957-2.178-1.555-3.594-1.555-3.179 0-5.515 2.966-4.797 6.045-4.091-.205-7.719-2.165-10.148-5.144-1.29 2.213-.669 5.108 1.523 6.574-.806-.026-1.566-.247-2.229-.616-.054 2.281 1.581 4.415 3.949 4.89-.693.188-1.452.232-2.224.084.626 1.956 2.444 3.379 4.6 3.419-2.07 1.623-4.678 2.348-7.29 2.04 2.179 1.397 4.768 2.212 7.548 2.212 9.142 0 14.307-7.721 13.995-14.646.962-.695 1.797-1.562 2.457-2.549z"/>
                </svg>
              </button>
              <button class="text-blue-800 hover:text-blue-900">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M22.46 6c-.77.35-1.6.58-2.46.69.88-.53 1.56-1.37 1.88-2.38-.83.5-1.75.85-2.72 1.05C18.37 4.5 17.26 4 16 4c-2.35 0-4.27 1.92-4.27 4.29 0 .34.04.67.11.98C8.28 9.09 5.11 7.38 3 4.79c-.37.63-.58 1.37-.58 2.15 0 1.49.75 2.81 1.91 3.56-.71 0-1.37-.2-1.95-.5v.03c0 2.08 1.48 3.82 3.44 4.21a4.22 4.22 0 0 1-1.93.07 4.28 4.28 0 0 0 4 2.98 8.521 8.521 0 0 1-5.33 1.84c-.34 0-.68-.02-1.02-.06C3.44 20.29 5.7 21 8.12 21 16 21 20.33 14.46 20.33 8.79c0-.19 0-.37-.01-.56.84-.6 1.56-1.36 2.14-2.23z"/>
                </svg>
              </button>
              <button class="text-green-600 hover:text-green-700">
                <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
                </svg>
              </button>
            </div>
            <button 
              @click="selectedArticle = null"
              class="text-gray-500 hover:text-gray-700"
            >
              Tutup
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { computed, ref } from 'vue';

const activeCategory = ref('all');
const selectedArticle = ref(null);

const categories = ref([
  { id: 'all', name: 'Semua Berita' },
  { id: 'prestasi', name: 'Prestasi' },
  { id: 'kegiatan', name: 'Kegiatan' },
  { id: 'akademik', name: 'Akademik' },
  { id: 'ekstrakurikuler', name: 'Ekstrakurikuler' }
]);

const featuredArticle = ref({
  id: 1,
  title: 'SMA 1 Lareh Sago Halaban Raih Juara 1 Lomba Karya Tulis Ilmiah Tingkat Provinsi',
  excerpt: 'Tim peneliti muda dari SMA 1 Lareh Sago Halaban berhasil meraih juara pertama dalam Lomba Karya Tulis Ilmiah Remaja tingkat Provinsi Sumatera Barat dengan penelitian tentang pengolahan limbah organik menjadi pupuk ramah lingkungan.',
  content: 'Tim peneliti muda dari SMA 1 Lareh Sago Halaban yang terdiri dari tiga siswa kelas XI berhasil meraih juara pertama dalam Lomba Karya Tulis Ilmiah Remaja tingkat Provinsi Sumatera Barat. Penelitian yang berjudul "Inovasi Pengolahan Limbah Organik Menjadi Pupuk Ramah Lingkungan dengan Teknologi Fermentasi Modern" berhasil mengalahkan 150 peserta dari seluruh sekolah di Sumatera Barat...',
  image: 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
  date: '22 Juli 2025',
  category: 'PRESTASI',
  views: '1,234',
  author: {
    name: 'Dra. Siti Aminah',
    role: 'Guru Pembimbing',
    initials: 'SA'
  }
});

const articles = ref([
  {
    id: 2,
    title: 'Pelaksanaan Ujian Akhir Semester Ganjil 2025 Berjalan Lancar',
    excerpt: 'Ujian Akhir Semester Ganjil tahun ajaran 2024/2025 telah selesai dilaksanakan dengan tertib dan mengikuti protokol kesehatan yang ketat.',
    content: 'Pelaksanaan Ujian Akhir Semester Ganjil tahun ajaran 2024/2025 di SMA Negeri 1 Lareh Sago Halaban telah selesai dilaksanakan pada tanggal 15-19 Juli 2025...',
    image: 'https://images.unsplash.com/photo-1434030216411-0b793f4b4173?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
    date: '20 Juli 2025',
    category: 'akademik',
    views: '856',
    author: {
      name: 'Drs. Ahmad Fauzi',
      role: 'Wakil Kepala Sekolah',
      initials: 'AF'
    }
  },
  {
    id: 3,
    title: 'Tim Basket SMA 1 LSH Juara Turnamen Antar SMA Se-Kabupaten',
    excerpt: 'Tim basket putra SMA 1 Lareh Sago Halaban berhasil meraih juara pertama dalam turnamen basket antar SMA se-Kabupaten Lima Puluh Kota.',
    content: 'Tim basket putra SMA 1 Lareh Sago Halaban kembali mengukir prestasi membanggakan dengan meraih juara pertama dalam turnamen basket antar SMA se-Kabupaten Lima Puluh Kota...',
    image: 'https://images.unsplash.com/photo-1546519638-68e109498ffc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1390&q=80',
    date: '18 Juli 2025',
    category: 'prestasi',
    views: '2,145',
    author: {
      name: 'Budi Santoso, S.Pd',
      role: 'Pelatih Basket',
      initials: 'BS'
    }
  },
  {
    id: 4,
    title: 'Workshop Digital Literacy untuk Guru dan Siswa',
    excerpt: 'SMA 1 Lareh Sago Halaban mengadakan workshop literasi digital untuk meningkatkan kemampuan teknologi informasi seluruh civitas akademika.',
    content: 'Dalam rangka meningkatkan kemampuan literasi digital seluruh civitas akademika, SMA 1 Lareh Sago Halaban mengadakan workshop literasi digital...',
    image: 'https://images.unsplash.com/photo-1552664730-d307ca884978?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
    date: '15 Juli 2025',
    category: 'kegiatan',
    views: '1,067',
    author: {
      name: 'Fitri Handayani, M.Pd',
      role: 'Koordinator IT',
      initials: 'FH'
    }
  },
  {
    id: 5,
    title: 'Pameran Karya Seni Siswa dalam Rangka Hari Seni Nasional',
    excerpt: 'Siswa-siswi SMA 1 Lareh Sago Halaban menggelar pameran karya seni rupa, musik, dan tari dalam rangka memperingati Hari Seni Nasional.',
    content: 'Dalam rangka memperingati Hari Seni Nasional, siswa-siswi SMA 1 Lareh Sago Halaban menggelar pameran karya seni yang menampilkan berbagai kreativitas...',
    image: 'https://images.unsplash.com/photo-1460661419201-fd4cecdf8a8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
    date: '12 Juli 2025',
    category: 'ekstrakurikuler',
    views: '743',
    author: {
      name: 'Rina Marlina, S.Sn',
      role: 'Guru Seni Budaya',
      initials: 'RM'
    }
  },
  {
    id: 6,
    title: 'Implementasi Kurikulum Merdeka: Pembelajaran Berbasis Proyek',
    excerpt: 'SMA 1 Lareh Sago Halaban mulai menerapkan pembelajaran berbasis proyek sebagai bagian dari implementasi Kurikulum Merdeka.',
    content: 'Sebagai bagian dari implementasi Kurikulum Merdeka, SMA 1 Lareh Sago Halaban mulai menerapkan pembelajaran berbasis proyek di berbagai mata pelajaran...',
    image: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80',
    date: '10 Juli 2025',
    category: 'akademik',
    views: '1,456',
    author: {
      name: 'Dr. Indra Wijaya',
      role: 'Kepala Sekolah',
      initials: 'IW'
    }
  }
]);

const filteredArticles = computed(() => {
  if (activeCategory.value === 'all') {
    return articles.value;
  }
  return articles.value.filter(article => article.category === activeCategory.value);
});

const readMore = (article) => {
  selectedArticle.value = article;
  // Increment view count (in a real app, this would be an API call)
  article.views = parseInt(article.views.replace(',', '')) + 1;
  article.views = article.views.toLocaleString();
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

.prose {
  max-width: none;
}

.prose p {
  margin-bottom: 1rem;
  line-height: 1.7;
}
</style>
