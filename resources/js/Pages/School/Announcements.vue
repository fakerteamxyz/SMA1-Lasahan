<template>
  <Head title="Pengumuman" />
  
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
          <h1 class="text-4xl md:text-5xl font-bold mb-4">Pengumuman Sekolah</h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto">
            Informasi terbaru dan penting dari SMA Negeri 1 Lareh Sago Halaban
          </p>
        </div>
      </div>
      <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </section>

    <!-- Filter and Stats Section -->
    <section class="relative -mt-8 mb-16">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 50 },
            enter: { opacity: 1, y: 0, transition: { delay: 400 } }
          }"
          class="bg-white rounded-xl shadow-lg p-6"
        >
          <!-- Filter Tabs -->
          <div class="flex flex-wrap justify-center gap-2 mb-6">
            <button 
              v-for="(category, index) in categories" 
              :key="index"
              @click="activeCategory = category.value"
              class="px-4 py-2 rounded-lg transition-colors flex items-center"
              :class="activeCategory === category.value ? 'bg-[#0487E2] text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200'"
            >
              <span v-html="category.icon" class="w-4 h-4 mr-2"></span>
              {{ category.label }}
              <span v-if="category.count > 0" class="ml-2 bg-white/20 text-xs px-2 py-1 rounded-full">
                {{ category.count }}
              </span>
            </button>
          </div>

          <!-- Stats -->
          <div class="grid grid-cols-2 md:grid-cols-4 gap-4">
            <div class="text-center p-4 bg-green-50 rounded-lg">
              <div class="text-2xl font-bold text-green-600">{{ featuredCount }}</div>
              <div class="text-sm text-green-700">Pengumuman Penting</div>
            </div>
            <div class="text-center p-4 bg-blue-50 rounded-lg">
              <div class="text-2xl font-bold text-blue-600">{{ totalAnnouncements }}</div>
              <div class="text-sm text-blue-700">Total Pengumuman</div>
            </div>
            <div class="text-center p-4 bg-purple-50 rounded-lg">
              <div class="text-2xl font-bold text-purple-600">{{ thisMonthCount }}</div>
              <div class="text-sm text-purple-700">Bulan Ini</div>
            </div>
            <div class="text-center p-4 bg-amber-50 rounded-lg">
              <div class="text-2xl font-bold text-amber-600">{{ urgentCount }}</div>
              <div class="text-sm text-amber-700">Mendesak</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Featured Announcements -->
    <section v-if="featuredAnnouncements.length > 0" class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Pengumuman Penting</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Informasi prioritas yang perlu segera diperhatikan
          </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div 
            v-for="(announcement, index) in featuredAnnouncements" 
            :key="announcement.id"
            v-motion="{
              initial: { opacity: 0, y: 30 },
              enter: { opacity: 1, y: 0, transition: { delay: 300 + (index * 100) } }
            }"
            class="bg-gradient-to-br from-white to-gray-50 rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-all duration-300 border-l-4"
            :class="getPriorityBorderClass(announcement.priority)"
          >
            <div class="p-6">
              <div class="flex items-center justify-between mb-4">
                <span 
                  class="px-3 py-1 text-xs font-semibold rounded-full"
                  :class="getCategoryBadgeClass(announcement.category)"
                >
                  {{ getCategoryLabel(announcement.category) }}
                </span>
                <span 
                  class="px-2 py-1 text-xs font-medium rounded"
                  :class="getPriorityBadgeClass(announcement.priority)"
                >
                  {{ getPriorityLabel(announcement.priority) }}
                </span>
              </div>
              
              <h3 class="text-xl font-bold text-gray-800 mb-3 line-clamp-2">{{ announcement.title }}</h3>
              <p class="text-gray-600 mb-4 line-clamp-3">{{ announcement.content }}</p>
              
              <div class="flex items-center justify-between text-sm text-gray-500">
                <div class="flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                  </svg>
                  {{ formatDate(announcement.announcement_date) }}
                </div>
                <button 
                  @click="openModal(announcement)"
                  class="text-[#0487E2] hover:text-[#0463CA] font-medium flex items-center"
                >
                  Baca Selengkapnya
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- All Announcements -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Semua Pengumuman</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Daftar lengkap pengumuman yang telah dipublikasikan
          </p>
        </div>

        <div class="space-y-6">
          <div 
            v-for="(announcement, index) in filteredAnnouncements" 
            :key="announcement.id"
            v-motion="{
              initial: { opacity: 0, x: -30 },
              enter: { opacity: 1, x: 0, transition: { delay: 200 + (index * 50) } }
            }"
            class="bg-white rounded-xl shadow-md hover:shadow-lg transition-shadow p-6 border-l-4"
            :class="getPriorityBorderClass(announcement.priority)"
          >
            <div class="flex flex-col lg:flex-row lg:items-center lg:justify-between">
              <div class="flex-grow">
                <div class="flex items-center gap-3 mb-3">
                  <span 
                    class="px-3 py-1 text-xs font-semibold rounded-full"
                    :class="getCategoryBadgeClass(announcement.category)"
                  >
                    {{ getCategoryLabel(announcement.category) }}
                  </span>
                  <span 
                    class="px-2 py-1 text-xs font-medium rounded"
                    :class="getPriorityBadgeClass(announcement.priority)"
                  >
                    {{ getPriorityLabel(announcement.priority) }}
                  </span>
                  <span class="text-sm text-gray-500">{{ formatDate(announcement.announcement_date) }}</span>
                </div>
                
                <h3 class="text-xl font-bold text-gray-800 mb-2">{{ announcement.title }}</h3>
                <p class="text-gray-600 line-clamp-2 mb-3">{{ announcement.content }}</p>
                
                <div v-if="announcement.valid_until" class="flex items-center text-sm text-amber-600">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Berlaku sampai: {{ formatDate(announcement.valid_until) }}
                </div>
              </div>
              
              <div class="flex items-center gap-3 mt-4 lg:mt-0">
                <button 
                  v-if="announcement.attachment_url"
                  :href="announcement.attachment_url"
                  class="flex items-center text-green-600 hover:text-green-700 text-sm font-medium"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                  Lampiran
                </button>
                <button 
                  @click="openModal(announcement)"
                  class="bg-[#0487E2] text-white px-4 py-2 rounded-lg hover:bg-[#0463CA] transition-colors flex items-center"
                >
                  Baca Lengkap
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 ml-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7" />
                  </svg>
                </button>
              </div>
            </div>
          </div>
        </div>

        <!-- Load More Button -->
        <div v-if="hasMoreAnnouncements" class="text-center mt-8">
          <button 
            @click="loadMoreAnnouncements"
            class="bg-white text-[#0487E2] border-2 border-[#0487E2] px-6 py-3 rounded-lg hover:bg-[#0487E2] hover:text-white transition-colors"
          >
            Muat Lebih Banyak
          </button>
        </div>

        <!-- Empty State -->
        <div v-if="filteredAnnouncements.length === 0" class="text-center py-12">
          <svg xmlns="http://www.w3.org/2000/svg" class="h-16 w-16 text-gray-400 mx-auto mb-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20 13V6a2 2 0 00-2-2H6a2 2 0 00-2 2v7m16 0v5a2 2 0 01-2 2H6a2 2 0 01-2-2v-5m16 0h-2.586a1 1 0 00-.707.293l-2.414 2.414a1 1 0 01-.707.293h-3.172a1 1 0 01-.707-.293l-2.414-2.414A1 1 0 006.586 13H4" />
          </svg>
          <h3 class="text-xl font-semibold text-gray-600 mb-2">Tidak ada pengumuman</h3>
          <p class="text-gray-500">Belum ada pengumuman untuk kategori yang dipilih.</p>
        </div>
      </div>
    </section>

    <!-- Announcement Detail Modal -->
    <div v-if="selectedAnnouncement" class="fixed inset-0 z-50 overflow-y-auto" @click.self="closeModal">
      <div class="flex items-center justify-center min-h-screen px-4">
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity"></div>
        <div 
          v-motion="{
            initial: { opacity: 0, scale: 0.9 },
            enter: { opacity: 1, scale: 1 },
            leave: { opacity: 0, scale: 0.9 }
          }"
          class="bg-white rounded-xl shadow-xl max-w-2xl w-full relative z-10 max-h-[90vh] overflow-y-auto"
        >
          <div class="p-6">
            <div class="flex items-center justify-between mb-6">
              <div class="flex items-center gap-3">
                <span 
                  class="px-3 py-1 text-xs font-semibold rounded-full"
                  :class="getCategoryBadgeClass(selectedAnnouncement.category)"
                >
                  {{ getCategoryLabel(selectedAnnouncement.category) }}
                </span>
                <span 
                  class="px-2 py-1 text-xs font-medium rounded"
                  :class="getPriorityBadgeClass(selectedAnnouncement.priority)"
                >
                  {{ getPriorityLabel(selectedAnnouncement.priority) }}
                </span>
              </div>
              <button @click="closeModal" class="text-gray-400 hover:text-gray-600">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
              </button>
            </div>
            
            <h2 class="text-2xl font-bold text-gray-800 mb-4">{{ selectedAnnouncement.title }}</h2>
            
            <div class="flex items-center gap-4 text-sm text-gray-500 mb-6">
              <div class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
                {{ formatDate(selectedAnnouncement.announcement_date) }}
              </div>
              <div v-if="selectedAnnouncement.valid_until" class="flex items-center">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                Berlaku sampai: {{ formatDate(selectedAnnouncement.valid_until) }}
              </div>
            </div>
            
            <div class="prose max-w-none">
              <p class="text-gray-700 leading-relaxed whitespace-pre-line">{{ selectedAnnouncement.content }}</p>
            </div>
            
            <div v-if="selectedAnnouncement.attachment_url || selectedAnnouncement.external_link" class="mt-6 pt-6 border-t border-gray-200">
              <h3 class="font-semibold text-gray-800 mb-3">Tautan Terkait</h3>
              <div class="space-y-2">
                <a 
                  v-if="selectedAnnouncement.attachment_url"
                  :href="selectedAnnouncement.attachment_url"
                  target="_blank"
                  class="flex items-center text-[#0487E2] hover:text-[#0463CA]"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13" />
                  </svg>
                  Lampiran Dokumen
                </a>
                <a 
                  v-if="selectedAnnouncement.external_link"
                  :href="selectedAnnouncement.external_link"
                  target="_blank"
                  class="flex items-center text-[#0487E2] hover:text-[#0463CA]"
                >
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                  </svg>
                  Tautan Eksternal
                </a>
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
import { computed, onMounted, ref } from 'vue';

// Props
const props = defineProps({
  announcements: Array
});

// Reactive data
const activeCategory = ref('all');
const selectedAnnouncement = ref(null);
const displayLimit = ref(10);

// Categories
const categories = ref([
  { value: 'all', label: 'Semua', icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14-7H5m14 14H5" /></svg>', count: 0 },
  { value: 'kegiatan', label: 'Kegiatan', icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" /></svg>', count: 0 },
  { value: 'ujian', label: 'Ujian', icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" /></svg>', count: 0 },
  { value: 'libur', label: 'Libur', icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" /></svg>', count: 0 },
  { value: 'ppdb', label: 'PPDB', icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" /></svg>', count: 0 },
  { value: 'umum', label: 'Umum', icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>', count: 0 }
]);

// Computed properties
const filteredAnnouncements = computed(() => {
  let filtered = props.announcements;
  
  if (activeCategory.value !== 'all') {
    filtered = filtered.filter(announcement => announcement.category === activeCategory.value);
  }
  
  return filtered.slice(0, displayLimit.value);
});

const featuredAnnouncements = computed(() => {
  return props.announcements.filter(announcement => announcement.is_featured);
});

const totalAnnouncements = computed(() => props.announcements.length);

const featuredCount = computed(() => featuredAnnouncements.value.length);

const thisMonthCount = computed(() => {
  const now = new Date();
  const currentMonth = now.getMonth();
  const currentYear = now.getFullYear();
  
  return props.announcements.filter(announcement => {
    const announcementDate = new Date(announcement.announcement_date);
    return announcementDate.getMonth() === currentMonth && 
           announcementDate.getFullYear() === currentYear;
  }).length;
});

const urgentCount = computed(() => {
  return props.announcements.filter(announcement => announcement.priority === 'urgent').length;
});

const hasMoreAnnouncements = computed(() => {
  let totalFiltered = props.announcements;
  if (activeCategory.value !== 'all') {
    totalFiltered = totalFiltered.filter(announcement => announcement.category === activeCategory.value);
  }
  return totalFiltered.length > displayLimit.value;
});

// Methods
const loadMoreAnnouncements = () => {
  displayLimit.value += 10;
};

const openModal = (announcement) => {
  selectedAnnouncement.value = announcement;
};

const closeModal = () => {
  selectedAnnouncement.value = null;
};

const formatDate = (date) => {
  return new Date(date).toLocaleDateString('id-ID', {
    day: 'numeric',
    month: 'long',
    year: 'numeric'
  });
};

const getCategoryLabel = (category) => {
  const categoryMap = {
    'kegiatan': 'Kegiatan Sekolah',
    'ujian': 'Ujian',
    'libur': 'Libur',
    'ppdb': 'PPDB',
    'umum': 'Umum'
  };
  return categoryMap[category] || 'Lainnya';
};

const getPriorityLabel = (priority) => {
  const priorityMap = {
    'low': 'Rendah',
    'normal': 'Normal',
    'high': 'Tinggi',
    'urgent': 'Mendesak'
  };
  return priorityMap[priority] || 'Normal';
};

const getCategoryBadgeClass = (category) => {
  const classMap = {
    'kegiatan': 'bg-green-100 text-green-800',
    'ujian': 'bg-red-100 text-red-800',
    'libur': 'bg-purple-100 text-purple-800',
    'ppdb': 'bg-blue-100 text-blue-800',
    'umum': 'bg-gray-100 text-gray-800'
  };
  return classMap[category] || 'bg-gray-100 text-gray-800';
};

const getPriorityBadgeClass = (priority) => {
  const classMap = {
    'low': 'bg-gray-100 text-gray-700',
    'normal': 'bg-blue-100 text-blue-700',
    'high': 'bg-yellow-100 text-yellow-700',
    'urgent': 'bg-red-100 text-red-700'
  };
  return classMap[priority] || 'bg-blue-100 text-blue-700';
};

const getPriorityBorderClass = (priority) => {
  const classMap = {
    'low': 'border-gray-300',
    'normal': 'border-blue-400',
    'high': 'border-yellow-400',
    'urgent': 'border-red-400'
  };
  return classMap[priority] || 'border-blue-400';
};

// Update category counts
onMounted(() => {
  categories.value.forEach(category => {
    if (category.value === 'all') {
      category.count = props.announcements.length;
    } else {
      category.count = props.announcements.filter(a => a.category === category.value).length;
    }
  });
});
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
