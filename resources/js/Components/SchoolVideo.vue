<template>
  <section class="py-16 bg-gradient-to-br from-[#0487E2]/5 to-[#65C2F5]/10">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0 }
        }"
        class="text-center mb-12"
      >
        <h2 class="text-sm text-[#0487E2] font-semibold uppercase tracking-wider mb-2">Video Profil</h2>
        <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Mengenal SMA 1 Lareh Sago Halaban</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">
          Saksikan profil lengkap sekolah kami melalui video yang menampilkan fasilitas, kegiatan, dan prestasi yang telah diraih
        </p>
      </div>

      <!-- Main Video Section -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 50 },
          enter: { opacity: 1, y: 0, transition: { delay: 200 } }
        }"
        class="mb-16"
      >
        <div class="bg-white rounded-2xl shadow-xl overflow-hidden">
          <div class="relative">
            <!-- Video Player -->
            <div class="relative aspect-video bg-gray-900">
              <video
                v-if="isPlaying && currentVideo"
                :src="currentVideo.url"
                controls
                autoplay
                class="w-full h-full object-cover"
                @ended="isPlaying = false"
              ></video>
              
              <!-- Video Thumbnail -->
              <div 
                v-else
                class="relative w-full h-full cursor-pointer group"
                @click="playVideo(featuredVideo)"
              >
                <img 
                  :src="featuredVideo.thumbnail" 
                  :alt="featuredVideo.title"
                  class="w-full h-full object-cover"
                >
                
                <!-- Overlay -->
                <div class="absolute inset-0 bg-black/40 group-hover:bg-black/50 transition-colors flex items-center justify-center">
                  <!-- Play Button -->
                  <div class="w-20 h-20 bg-white/90 rounded-full flex items-center justify-center group-hover:bg-white transition-colors">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-[#0487E2] ml-1" fill="currentColor" viewBox="0 0 24 24">
                      <path d="M8 5v14l11-7z"/>
                    </svg>
                  </div>
                </div>

                <!-- Video Info Overlay -->
                <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black/80 to-transparent p-6">
                  <h4 class="text-white text-xl font-bold mb-2">{{ featuredVideo.title }}</h4>
                  <p class="text-white/90 text-sm mb-3">{{ featuredVideo.description }}</p>
                  <div class="flex items-center text-white/80 text-sm">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    {{ featuredVideo.duration }}
                    <span class="mx-2">•</span>
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                    </svg>
                    {{ featuredVideo.views }} ditonton
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Playlist -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0, transition: { delay: 400 } }
        }"
        class="mb-12"
      >
        <h4 class="text-2xl font-bold text-gray-800 mb-8 text-center">Video Lainnya</h4>
        
        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div 
            v-for="(video, index) in videoPlaylist" 
            :key="video.id"
            v-motion="{
              initial: { opacity: 0, y: 30 },
              enter: { opacity: 1, y: 0, transition: { delay: (index * 100) + 600 } }
            }"
            class="bg-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow duration-300 cursor-pointer"
            @click="playVideo(video)"
          >
            <div class="relative aspect-video">
              <img 
                :src="video.thumbnail" 
                :alt="video.title"
                class="w-full h-full object-cover"
              >
              
              <!-- Play Overlay -->
              <div class="absolute inset-0 bg-black/40 flex items-center justify-center opacity-0 hover:opacity-100 transition-opacity">
                <div class="w-12 h-12 bg-white/90 rounded-full flex items-center justify-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-[#0487E2] ml-0.5" fill="currentColor" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                  </svg>
                </div>
              </div>

              <!-- Duration Badge -->
              <div class="absolute bottom-2 right-2 bg-black/80 text-white text-xs px-2 py-1 rounded">
                {{ video.duration }}
              </div>
            </div>

            <div class="p-4">
              <h5 class="font-semibold text-gray-800 mb-2 line-clamp-2">{{ video.title }}</h5>
              <p class="text-sm text-gray-600 mb-3 line-clamp-2">{{ video.description }}</p>
              
              <div class="flex items-center justify-between text-xs text-gray-500">
                <span>{{ video.views }} ditonton</span>
                <span>{{ video.uploadDate }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Video Statistics -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0, transition: { delay: 800 } }
        }"
        class="bg-white rounded-xl shadow-lg p-8"
      >
        <h4 class="text-2xl font-bold text-center text-gray-800 mb-8">Statistik Video</h4>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <div 
            v-for="(stat, index) in videoStats" 
            :key="index"
            class="text-center"
          >
            <div class="w-16 h-16 bg-gradient-to-br from-[#0487E2] to-[#65C2F5] rounded-full mx-auto mb-3 flex items-center justify-center">
              <component :is="stat.icon" class="h-8 w-8 text-white" />
            </div>
            <div class="text-2xl font-bold text-gray-800 mb-1">{{ stat.value }}</div>
            <p class="text-sm text-gray-600">{{ stat.label }}</p>
          </div>
        </div>
      </div>

      <!-- Call to Action -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0, transition: { delay: 1000 } }
        }"
        class="text-center mt-12"
      >
        <p class="text-gray-600 mb-6">Tertarik untuk bergabung dengan SMA 1 Lareh Sago Halaban?</p>
        <div class="flex flex-wrap justify-center gap-4">
          <a href="/ppdb" class="bg-[#0487E2] hover:bg-[#0463CA] text-white px-8 py-3 rounded-lg font-semibold transition-colors">
            <span class="text-white">Daftar Sekarang</span>
          </a>
          <a href="/kontak" class="border-2 border-[#0487E2] text-[#0487E2] hover:bg-[#0487E2] hover:text-white px-8 py-3 rounded-lg font-semibold transition-colors">
            Hubungi Kami
          </a>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';

const isPlaying = ref(false);
const currentVideo = ref(null);

const featuredVideo = ref({
  id: 1,
  title: 'Profil Lengkap SMA Negeri 1 Lareh Sago Halaban',
  description: 'Video profil resmi yang menampilkan fasilitas, kegiatan pembelajaran, prestasi, dan kehidupan siswa di SMA 1 Lareh Sago Halaban.',
  thumbnail: 'https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1740&q=80',
  url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4', // Sample video URL
  duration: '15:30',
  views: '12,450',
  uploadDate: '1 Juli 2025'
});

const videoPlaylist = ref([
  {
    id: 2,
    title: 'Fasilitas Laboratorium dan Perpustakaan',
    description: 'Mengenal lebih dekat fasilitas laboratorium IPA, komputer, dan perpustakaan modern di sekolah kami.',
    thumbnail: 'https://images.unsplash.com/photo-1581092918056-0c4c3acd3789?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
    url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4',
    duration: '8:45',
    views: '8,234',
    uploadDate: '25 Juni 2025'
  },
  {
    id: 3,
    title: 'Kegiatan Ekstrakurikuler dan Prestasi Siswa',
    description: 'Dokumentasi berbagai kegiatan ekstrakurikuler dan prestasi membanggakan yang diraih siswa-siswi kami.',
    thumbnail: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
    url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4',
    duration: '12:20',
    views: '15,678',
    uploadDate: '20 Juni 2025'
  },
  {
    id: 4,
    title: 'Sehari Bersama Siswa SMA 1 LSH',
    description: 'Mengikuti aktivitas sehari-hari siswa dari pagi hingga sore, mulai dari pembelajaran hingga kegiatan ekstrakurikuler.',
    thumbnail: 'https://images.unsplash.com/photo-1509062522246-3755977927d7?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1632&q=80',
    url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4',
    duration: '10:15',
    views: '9,432',
    uploadDate: '15 Juni 2025'
  },
  {
    id: 5,
    title: 'Testimoni Guru dan Alumni',
    description: 'Mendengar langsung pengalaman dan testimoni dari guru-guru berpengalaman dan alumni berprestasi.',
    thumbnail: 'https://images.unsplash.com/photo-1544717297-fa95b6ee9643?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1469&q=80',
    url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4',
    duration: '14:30',
    views: '11,789',
    uploadDate: '10 Juni 2025'
  },
  {
    id: 6,
    title: 'Virtual Tour Kampus Sekolah',
    description: 'Tour virtual mengelilingi seluruh area sekolah dengan panduan lengkap setiap fasilitas yang tersedia.',
    thumbnail: 'https://images.unsplash.com/photo-1546410531-bb4caa6b424d?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1471&q=80',
    url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4',
    duration: '18:45',
    views: '20,156',
    uploadDate: '5 Juni 2025'
  },
  {
    id: 7,
    title: 'Proses Pembelajaran Kurikulum Merdeka',
    description: 'Melihat langsung penerapan Kurikulum Merdeka dalam proses pembelajaran sehari-hari di kelas.',
    thumbnail: 'https://images.unsplash.com/photo-1427504494785-3a9ca7044f45?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=1470&q=80',
    url: 'https://sample-videos.com/zip/10/mp4/SampleVideo_1280x720_1mb.mp4',
    duration: '16:00',
    views: '7,865',
    uploadDate: '1 Juni 2025'
  }
]);

const videoStats = ref([
  {
    icon: 'PlayIcon',
    value: '85K+',
    label: 'Total Views'
  },
  {
    icon: 'VideoIcon',
    value: '25+',
    label: 'Video Tersedia'
  },
  {
    icon: 'UserGroupIcon',
    value: '3.2K',
    label: 'Subscriber'
  },
  {
    icon: 'ThumbUpIcon',
    value: '98%',
    label: 'Like Rate'
  }
]);

const playVideo = (video) => {
  currentVideo.value = video;
  isPlaying.value = true;
  // Scroll to video player
  document.querySelector('video')?.scrollIntoView({ behavior: 'smooth', block: 'center' });
};

// Icon components (you might want to use Heroicons or similar)
const PlayIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
      <path d="M8 5v14l11-7z"/>
    </svg>
  `
};

const VideoIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 10l4.553-2.276A1 1 0 0121 8.618v6.764a1 1 0 01-1.447.894L15 14M5 18h8a2 2 0 002-2V8a2 2 0 00-2-2H5a2 2 0 00-2 2v8a2 2 0 002 2z" />
    </svg>
  `
};

const UserGroupIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
    </svg>
  `
};

const ThumbUpIcon = {
  template: `
    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 10h4.764a2 2 0 011.789 2.894l-3.5 7A2 2 0 0115.263 21h-4.017c-.163 0-.326-.02-.485-.06L7 20m7-10V5a2 2 0 00-2-2h-.095c-.5 0-.905.405-.905.905 0 .714-.211 1.412-.608 2.006L7 11v9m7-10h-2M7 20H5a2 2 0 01-2-2v-6a2 2 0 012-2h2.5" />
    </svg>
  `
};
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}

.aspect-video {
  aspect-ratio: 16 / 9;
}
</style>
