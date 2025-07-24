<template>
  <section class="py-20 bg-gradient-to-br from-indigo-900 via-purple-900 to-pink-800 relative overflow-hidden">
    <!-- Background Pattern -->
    <div class="absolute inset-0 opacity-10">
      <div class="absolute top-0 left-0 w-full h-full" style="background-image: radial-gradient(circle at 25% 25%, #ffffff 2px, transparent 2px), radial-gradient(circle at 75% 75%, #ffffff 2px, transparent 2px); background-size: 50px 50px;"></div>
    </div>
    
    <div class="container mx-auto px-4 relative z-10">
      <!-- Section Header -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 80, scale: 0.7 },
          visibleOnce: { 
            opacity: 1, 
            y: 0, 
            scale: 1,
            transition: { 
              type: 'spring',
              stiffness: 100,
              damping: 15,
              delay: 200
            }
          }
        }"
        class="text-center mb-16"
      >
        <div class="inline-block px-6 py-2 mb-6 bg-gradient-to-r from-cyan-400 to-blue-500 text-white rounded-full text-sm font-bold uppercase tracking-wider shadow-lg">
          Video Profil
        </div>
        <h3 class="text-4xl md:text-6xl font-black text-white mb-6 leading-tight">
          <span class="bg-gradient-to-r from-cyan-300 via-blue-300 to-purple-300 bg-clip-text text-transparent">
            Mengenal SMA 1 Lareh Sago Halaban
          </span>
        </h3>
        <p class="text-xl text-gray-100 max-w-3xl mx-auto leading-relaxed">
          Saksikan profil lengkap sekolah kami melalui video yang menampilkan fasilitas modern, kegiatan pembelajaran inovatif, dan prestasi membanggakan yang telah diraih
        </p>
      </div>

      <!-- Main Video Section -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 120, rotateX: 20, scale: 0.9 },
          visibleOnce: { 
            opacity: 1, 
            y: 0, 
            rotateX: 0,
            scale: 1,
            transition: { 
              type: 'spring',
              stiffness: 80,
              damping: 20,
              delay: 600
            }
          }
        }"
              damping: 15,
              delay: 400,
              duration: 1000
            }
          }
        }"
        class="mb-20"
      >
        <div class="relative">
          <!-- Glow Effect -->
          <div class="absolute -inset-4 bg-gradient-to-r from-cyan-400 via-blue-500 to-purple-600 rounded-3xl blur-lg opacity-75 animate-pulse"></div>
          
          <div class="relative bg-gradient-to-br from-gray-900 to-black rounded-3xl shadow-2xl overflow-hidden border border-gray-700">
            <div class="relative">
              <!-- Video Player -->
              <div class="relative aspect-video bg-black">
                <!-- YouTube Embed Player -->
                <iframe
                  v-if="isPlaying && currentVideo"
                  :src="getYouTubeEmbedUrl(currentVideo.url)"
                  class="w-full h-full rounded-t-3xl"
                  frameborder="0"
                  allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                  allowfullscreen
                ></iframe>
                
                <!-- Video Thumbnail -->
                <div 
                  v-else
                  class="relative w-full h-full cursor-pointer group"
                  @click="playVideo(featuredVideo)"
                >
                  <img 
                    :src="featuredVideo.thumbnail" 
                    :alt="featuredVideo.title"
                    class="w-full h-full object-cover rounded-t-3xl"
                  >
                  
                  <!-- Overlay -->
                  <div class="absolute inset-0 bg-gradient-to-br from-black/60 via-purple-900/40 to-blue-900/60 group-hover:from-black/40 group-hover:via-purple-800/60 group-hover:to-blue-800/40 transition-all duration-500 flex items-center justify-center rounded-t-3xl">
                    <!-- Play Button -->
                    <div 
                      v-motion="{
                        initial: { scale: 0, rotate: -180 },
                        enter: { 
                          scale: 1, 
                          rotate: 0,
                          transition: { 
                            type: 'spring',
                            stiffness: 200,
                            damping: 10,
                            delay: 800
                          }
                        }
                      }"
                      class="w-24 h-24 bg-gradient-to-br from-cyan-400 to-blue-500 rounded-full flex items-center justify-center group-hover:from-cyan-300 group-hover:to-blue-400 transition-all duration-300 shadow-2xl border-4 border-white/20 group-hover:scale-110 group-hover:shadow-cyan-400/50"
                    >
                      <svg xmlns="http://www.w3.org/2000/svg" class="h-10 w-10 text-white ml-1" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M8 5v14l11-7z"/>
                      </svg>
                    </div>
                  </div>

                  <!-- Video Info Overlay -->
                  <div class="absolute bottom-0 left-0 right-0 bg-gradient-to-t from-black via-gray-900/80 to-transparent p-8 rounded-b-3xl">
                    <h4 class="text-white text-2xl font-bold mb-3 leading-tight">{{ featuredVideo.title }}</h4>
                    <p class="text-gray-200 text-base mb-4 leading-relaxed">{{ featuredVideo.description }}</p>
                    <div class="flex items-center text-cyan-300 text-sm font-medium">
                      <div class="flex items-center mr-6">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                        {{ featuredVideo.duration }}
                      </div>
                      <div class="flex items-center">
                        <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
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
        </div>
      </div>

      <!-- Call to Action -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 80, scale: 0.9 },
          enter: { 
            opacity: 1, 
            y: 0, 
            scale: 1,
            transition: { 
              type: 'spring',
              stiffness: 100,
              damping: 12,
              delay: 1200,
              duration: 800
            }
          }
        }"
        class="text-center"
      >
        <div class="bg-gradient-to-r from-gray-800/50 to-gray-900/50 backdrop-blur-lg rounded-3xl p-12 border border-gray-600/30">
          <h4 class="text-3xl font-bold text-white mb-4">Tertarik Bergabung?</h4>
          <p class="text-gray-200 text-lg mb-8 max-w-2xl mx-auto">
            Bergabunglah dengan SMA 1 Lareh Sago Halaban dan wujudkan masa depan cemerlang bersama pendidikan berkualitas tinggi
          </p>
          <div class="flex flex-wrap justify-center gap-6">
            <a href="/ppdb" 
               v-motion="{
                 initial: { opacity: 0, x: -50 },
                 enter: { 
                   opacity: 1, 
                   x: 0,
                   transition: { 
                     delay: 1400,
                     duration: 600
                   }
                 }
               }"
               class="group relative px-10 py-4 bg-gradient-to-r from-cyan-500 to-blue-600 hover:from-cyan-400 hover:to-blue-500 text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-105 hover:shadow-2xl hover:shadow-cyan-500/25">
              <span class="relative z-10">🎓 Daftar Sekarang</span>
              <div class="absolute inset-0 bg-gradient-to-r from-cyan-300 to-blue-400 rounded-xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
            </a>
            <a href="/kontak" 
               v-motion="{
                 initial: { opacity: 0, x: 50 },
                 enter: { 
                   opacity: 1, 
                   x: 0,
                   transition: { 
                     delay: 1600,
                     duration: 600
                   }
                 }
               }"
               class="group relative px-10 py-4 border-2 border-cyan-400 text-cyan-300 hover:text-white font-bold rounded-xl transition-all duration-300 transform hover:scale-105 hover:bg-gradient-to-r hover:from-cyan-500 hover:to-blue-600 hover:border-transparent hover:shadow-2xl hover:shadow-cyan-500/25">
              📞 Hubungi Kami
            </a>
          </div>
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
  url: 'https://www.youtube.com/watch?v=WidO2o3fGd8', // Sample video URL
  duration: '15:30',
  views: '12,450',
  uploadDate: '1 Juli 2025'
});

const playVideo = (video) => {
  currentVideo.value = video;
  isPlaying.value = true;
  // Scroll to video player
  setTimeout(() => {
    const videoElement = document.querySelector('iframe');
    if (videoElement) {
      videoElement.scrollIntoView({ behavior: 'smooth', block: 'center' });
    }
  }, 100);
};

// Function to convert YouTube URL to embed format
const getYouTubeEmbedUrl = (url) => {
  if (!url) return '';
  
  // Extract video ID from various YouTube URL formats
  const regExp = /^.*(youtu.be\/|v\/|u\/\w\/|embed\/|watch\?v=|&v=)([^#&?]*).*/;
  const match = url.match(regExp);
  
  if (match && match[2].length === 11) {
    return `https://www.youtube.com/embed/${match[2]}?autoplay=1&rel=0`;
  }
  
  return url;
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
