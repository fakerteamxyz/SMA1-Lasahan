<template>
  <section class="py-16 bg-gradient-to-br from-gray-900 via-purple-900 to-indigo-900">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 60, scale: 0.8 },
          visibleOnce: { 
            opacity: 1, 
            y: 0, 
            scale: 1,
            transition: { 
              type: 'spring',
              stiffness: 150,
              damping: 15,
              mass: 1,
              delay: 200
            }
          }
        }"
        class="text-center mb-12 relative"
      >
        <!-- Decorative elements -->
        <div class="absolute left-1/2 top-0 -translate-x-1/2 w-24 h-1 bg-gradient-to-r from-cyan-500 to-purple-500 rounded-full opacity-70"></div>
        
        <h2 class="text-sm text-cyan-400 font-semibold uppercase tracking-wider mb-2 pt-4">Testimoni Alumni</h2>
        <h3 class="text-3xl md:text-4xl font-bold bg-gradient-to-r from-cyan-300 via-blue-300 to-purple-300 bg-clip-text text-transparent mb-4">Apa Kata Alumni Kami</h3>
        <p class="text-cyan-100 max-w-2xl mx-auto">
          Dengarkan cerita sukses dan pengalaman berharga dari para alumni SMA Negeri 1 Lareh Sago Halaban
        </p>
        
        <!-- Subtle glow effect -->
        <div class="absolute -bottom-6 left-1/2 -translate-x-1/2 w-64 h-1 bg-gradient-to-r from-cyan-500/0 via-cyan-500/50 to-purple-500/0 blur-sm"></div>
      </div>

      <!-- Testimonials Grid -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <div 
          v-for="(testimonial, index) in testimonials" 
          :key="index"
          v-motion="{
            initial: { 
              opacity: 0, 
              y: 80, 
              rotateX: -15, 
              scale: 0.9,
              rotateY: index % 2 === 0 ? -5 : 5
            },
            visibleOnce: { 
              opacity: 1, 
              y: 0, 
              rotateX: 0,
              rotateY: 0, 
              scale: 1,
              transition: { 
                type: 'spring',
                stiffness: 150,
                damping: 15,
                mass: 1,
                delay: 400 + (index * 150)
              }
            }
          }"
          class="bg-white/10 backdrop-blur-sm rounded-xl shadow-lg border border-purple-500/20 p-6 hover:shadow-2xl hover:shadow-cyan-500/25 transition-all duration-500 hover:border-cyan-400/40 hover:scale-105 relative overflow-hidden group"
        >
          <!-- Background glow effect -->
          <div class="absolute -inset-0.5 bg-gradient-to-r from-cyan-500/20 to-purple-500/20 rounded-xl blur opacity-0 group-hover:opacity-100 transition-opacity duration-700"></div>
          <div class="relative z-10">
          <!-- Quote Icon -->
          <div class="flex justify-center mb-4">
            <div 
              v-motion="{
                initial: { scale: 0.8, opacity: 0, rotateZ: -15 },
                visibleOnce: { 
                  scale: 1, 
                  opacity: 1, 
                  rotateZ: 0,
                  transition: { 
                    type: 'spring',
                    stiffness: 300,
                    damping: 15,
                    delay: 600 + (index * 150)
                  }
                }
              }"
              class="w-12 h-12 bg-gradient-to-r from-cyan-500/30 to-purple-500/30 rounded-full flex items-center justify-center shadow-lg shadow-cyan-500/10 border border-cyan-500/20"
            >
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-cyan-400" fill="currentColor" viewBox="0 0 24 24">
                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
              </svg>
            </div>
          </div>

          <!-- Testimonial Text -->
          <p class="text-gray-200 mb-6 italic text-center leading-relaxed">
            "{{ testimonial.quote }}"
          </p>

          <!-- Alumni Info -->
          <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-cyan-600 to-purple-600 rounded-full mx-auto mb-3 flex items-center justify-center shadow-lg">
              <span class="text-white font-bold text-lg">{{ testimonial.initials }}</span>
            </div>
            <h4 class="font-semibold text-white mb-1">{{ testimonial.name }}</h4>
            <p class="text-sm text-cyan-300 mb-1">{{ testimonial.graduation }}</p>
            <p class="text-xs text-gray-500">{{ testimonial.currentPosition }}</p>
          </div>

          <!-- Stars Rating -->
          <div class="flex justify-center mt-4">
            <div class="flex space-x-1">
              <svg v-for="i in 5" :key="i" class="w-4 h-4 text-yellow-400 fill-current" viewBox="0 0 20 20">
                <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"/>
              </svg>
            </div>
          </div>
          </div>
        </div>
      </div>

      <!-- Alumni Statistics -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 50, scale: 0.9 },
          visibleOnce: { 
            opacity: 1, 
            y: 0, 
            scale: 1,
            transition: { 
              type: 'spring',
              stiffness: 150,
              damping: 15,
              mass: 1,
              delay: 600
            }
          }
        }"
        class="bg-white/10 backdrop-blur-sm rounded-xl shadow-lg border border-purple-500/20 p-8"
      >
        <h4 class="text-2xl font-bold text-center text-white mb-8">Prestasi Alumni</h4>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <div 
            v-for="(stat, index) in alumniStats" 
            :key="index"
            v-motion="{
              initial: { opacity: 0, y: 30, scale: 0.8 },
              visibleOnce: { 
                opacity: 1, 
                y: 0, 
                scale: 1,
                transition: { 
                  type: 'spring',
                  stiffness: 150,
                  damping: 15,
                  delay: 700 + (index * 100)
                }
              }
            }"
            class="text-center"
          >
            <div class="w-16 h-16 bg-gradient-to-br from-cyan-500 to-purple-500 rounded-full mx-auto mb-3 flex items-center justify-center shadow-lg shadow-cyan-500/20">
              <span class="text-white font-bold text-xl">{{ stat.value }}</span>
            </div>
            <p class="text-sm font-medium text-cyan-200">{{ stat.label }}</p>
          </div>
        </div>
      </div>

      <!-- CTA Section -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 50, scale: 0.95 },
          visibleOnce: { 
            opacity: 1, 
            y: 0, 
            scale: 1,
            transition: { 
              type: 'spring',
              stiffness: 120,
              damping: 12,
              mass: 1,
              delay: 800
            }
          }
        }"
        class="text-center mt-12"
      >
        <p class="text-cyan-300 mb-6">Ingin berbagi cerita sukses Anda sebagai alumni?</p>
        <button 
          @click="showTestimonialForm = true"
          class="bg-gradient-to-r from-cyan-500 to-purple-600 hover:from-cyan-600 hover:to-purple-700 text-white px-8 py-3 rounded-lg font-semibold transition-all duration-300 shadow-lg hover:shadow-cyan-500/30"
        >
          <span class="text-white">Kirim Testimoni</span>
        </button>
      </div>
    </div>

    <!-- Testimonial Form Modal -->
    <div 
      v-if="showTestimonialForm" 
      class="fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50 p-4"
      @click.self="showTestimonialForm = false"
      v-motion="{
        initial: { opacity: 0 },
        enter: { 
          opacity: 1,
          transition: { duration: 300 }
        },
        leave: { 
          opacity: 0,
          transition: { duration: 200 }
        }
      }"
    >
      <div 
        class="bg-gradient-to-br from-gray-900 to-gray-800 rounded-xl max-w-md w-full p-6 border border-cyan-500/20 shadow-xl shadow-cyan-500/10"
        v-motion="{
          initial: { opacity: 0, scale: 0.9, y: 20 },
          enter: { 
            opacity: 1, 
            scale: 1, 
            y: 0,
            transition: { 
              type: 'spring',
              stiffness: 300,
              damping: 20
            }
          }
        }"
      >
        <div class="flex justify-between items-center mb-6">
          <h3 class="text-xl font-bold text-white">Kirim Testimoni</h3>
          <button 
            @click="showTestimonialForm = false"
            class="text-cyan-400 hover:text-cyan-300"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <form @submit.prevent="submitTestimonial" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-cyan-300 mb-2">Nama Lengkap</label>
            <input 
              v-model="testimonialForm.name"
              type="text" 
              required
              class="w-full px-3 py-2 bg-gray-800/50 border border-cyan-500/30 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white"
              placeholder="Nama lengkap Anda"
            >
          </div>

          <div>
            <label class="block text-sm font-medium text-cyan-300 mb-2">Tahun Lulus</label>
            <input 
              v-model="testimonialForm.graduation"
              type="text" 
              required
              class="w-full px-3 py-2 bg-gray-800/50 border border-cyan-500/30 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white"
              placeholder="Contoh: Lulusan 2020"
            >
          </div>

          <div>
            <label class="block text-sm font-medium text-cyan-300 mb-2">Pekerjaan/Pendidikan Saat Ini</label>
            <input 
              v-model="testimonialForm.currentPosition"
              type="text" 
              required
              class="w-full px-3 py-2 bg-gray-800/50 border border-cyan-500/30 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white"
              placeholder="Contoh: Mahasiswa UI / Engineer di Google"
            >
          </div>

          <div>
            <label class="block text-sm font-medium text-cyan-300 mb-2">Testimoni</label>
            <textarea 
              v-model="testimonialForm.testimonial"
              required
              rows="4"
              class="w-full px-3 py-2 bg-gray-800/50 border border-cyan-500/30 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white resize-none"
              placeholder="Ceritakan pengalaman dan pesan Anda sebagai alumni..."
            ></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-cyan-300 mb-2">Email</label>
            <input 
              v-model="testimonialForm.email"
              type="email" 
              required
              class="w-full px-3 py-2 bg-gray-800/50 border border-cyan-500/30 rounded-lg focus:ring-2 focus:ring-cyan-500 focus:border-transparent text-white"
              placeholder="email@example.com"
            >
          </div>

          <div class="flex gap-3 pt-4">
            <button 
              type="button"
              @click="showTestimonialForm = false"
              class="flex-1 px-4 py-2 border border-cyan-500/30 text-cyan-400 rounded-lg hover:bg-cyan-900/30 transition-colors"
            >
              Batal
            </button>
            <button 
              type="submit"
              class="flex-1 px-4 py-2 bg-gradient-to-r from-cyan-500 to-purple-600 text-white rounded-lg hover:from-cyan-600 hover:to-purple-700 transition-all duration-300 shadow-lg hover:shadow-cyan-500/30"
            >
              <span class="text-white">Kirim</span>
            </button>
          </div>
        </form>
      </div>
    </div>
  </section>
</template>

<script setup>
import { ref } from 'vue';

const showTestimonialForm = ref(false);

const testimonialForm = ref({
  name: '',
  graduation: '',
  currentPosition: '',
  testimonial: '',
  email: ''
});

const testimonials = ref([
  {
    name: 'Andi Pratama',
    initials: 'AP',
    graduation: 'Lulusan 2020',
    currentPosition: 'Mahasiswa Teknik ITB',
    quote: 'SMA 1 Lareh Sago Halaban memberikan fondasi akademik yang kuat. Guru-guru yang berkualitas dan fasilitas yang memadai membantu saya meraih prestasi dan diterima di ITB.'
  },
  {
    name: 'Sari Dewi Lestari',
    initials: 'SDL',
    graduation: 'Lulusan 2019',
    currentPosition: 'Dokter di RSUD Padang',
    quote: 'Pendidikan karakter dan disiplin yang diterapkan di sekolah sangat membantu membentuk kepribadian saya. Sekarang saya bangga menjadi dokter yang melayani masyarakat.'
  },
  {
    name: 'Muhammad Rizki',
    initials: 'MR',
    graduation: 'Lulusan 2021',
    currentPosition: 'Software Engineer',
    quote: 'Ekstrakurikuler robotika dan komputer di sekolah menumbuhkan minat saya di bidang teknologi. Sekarang saya bekerja sebagai software engineer di startup teknologi.'
  },
  {
    name: 'Fitri Handayani',
    initials: 'FH',
    graduation: 'Lulusan 2018',
    currentPosition: 'Guru SMP Negeri',
    quote: 'Dedikasi guru-guru di SMA 1 Lareh Sago Halaban menginspirasi saya untuk menjadi seorang pendidik. Sekarang saya bangga melanjutkan estafet mendidik generasi bangsa.'
  },
  {
    name: 'Ahmad Fauzi',
    initials: 'AF',
    graduation: 'Lulusan 2020',
    currentPosition: 'Mahasiswa Kedokteran UNAND',
    quote: 'Program pembelajaran yang komprehensif dan bimbingan intensif dari guru membantu saya lulus dengan nilai terbaik dan diterima di Fakultas Kedokteran UNAND.'
  },
  {
    name: 'Lila Sari',
    initials: 'LS',
    graduation: 'Lulusan 2019',
    currentPosition: 'Entrepreneur',
    quote: 'Kegiatan kewirausahaan dan leadership training di sekolah membentuk jiwa wirausaha saya. Sekarang saya memiliki bisnis online yang berkembang pesat.'
  }
]);

const alumniStats = ref([
  { value: '95%', label: 'Diterima PTN' },
  { value: '50+', label: 'Profesi Dokter' },
  { value: '30+', label: 'Engineer/IT' },
  { value: '25+', label: 'Guru/Dosen' }
]);

const submitTestimonial = () => {
  // Here you would typically send the form data to your backend
  console.log('Submitting testimonial:', testimonialForm.value);
  
  // Show success message (you can replace this with actual form submission)
  alert('Terima kasih! Testimoni Anda telah dikirim dan akan ditinjau oleh admin.');
  
  // Reset form and close modal
  testimonialForm.value = {
    name: '',
    graduation: '',
    currentPosition: '',
    testimonial: '',
    email: ''
  };
  showTestimonialForm.value = false;
};
</script>
