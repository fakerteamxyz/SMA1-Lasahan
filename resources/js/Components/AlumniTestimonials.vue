<template>
  <section class="py-16 bg-gradient-to-br from-[#B0D6F5]/20 to-white">
    <div class="container mx-auto px-4">
      <!-- Section Header -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0 }
        }"
        class="text-center mb-12"
      >
        <h2 class="text-sm text-[#0487E2] font-semibold uppercase tracking-wider mb-2">Testimoni Alumni</h2>
        <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Apa Kata Alumni Kami</h3>
        <p class="text-gray-600 max-w-2xl mx-auto">
          Dengarkan cerita sukses dan pengalaman berharga dari para alumni SMA Negeri 1 Lareh Sago Halaban
        </p>
      </div>

      <!-- Testimonials Grid -->
      <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-8 mb-12">
        <div 
          v-for="(testimonial, index) in testimonials" 
          :key="index"
          v-motion="{
            initial: { opacity: 0, y: 50 },
            enter: { opacity: 1, y: 0, transition: { delay: index * 100 } }
          }"
          class="bg-white rounded-xl shadow-lg p-6 hover:shadow-xl transition-shadow duration-300"
        >
          <!-- Quote Icon -->
          <div class="flex justify-center mb-4">
            <div class="w-12 h-12 bg-[#0487E2]/10 rounded-full flex items-center justify-center">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-[#0487E2]" fill="currentColor" viewBox="0 0 24 24">
                <path d="M14.017 21v-7.391c0-5.704 3.731-9.57 8.983-10.609l.995 2.151c-2.432.917-3.995 3.638-3.995 5.849h4v10h-9.983zm-14.017 0v-7.391c0-5.704 3.748-9.57 9-10.609l.996 2.151c-2.433.917-3.996 3.638-3.996 5.849h3.983v10h-9.983z"/>
              </svg>
            </div>
          </div>

          <!-- Testimonial Text -->
          <p class="text-gray-600 mb-6 italic text-center leading-relaxed">
            "{{ testimonial.quote }}"
          </p>

          <!-- Alumni Info -->
          <div class="text-center">
            <div class="w-16 h-16 bg-gradient-to-br from-[#0487E2] to-[#65C2F5] rounded-full mx-auto mb-3 flex items-center justify-center">
              <span class="text-white font-bold text-lg">{{ testimonial.initials }}</span>
            </div>
            <h4 class="font-semibold text-gray-800 mb-1">{{ testimonial.name }}</h4>
            <p class="text-sm text-[#0487E2] mb-1">{{ testimonial.graduation }}</p>
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

      <!-- Alumni Statistics -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0, transition: { delay: 600 } }
        }"
        class="bg-white rounded-xl shadow-lg p-8"
      >
        <h4 class="text-2xl font-bold text-center text-gray-800 mb-8">Prestasi Alumni</h4>
        <div class="grid grid-cols-2 md:grid-cols-4 gap-6">
          <div 
            v-for="(stat, index) in alumniStats" 
            :key="index"
            class="text-center"
          >
            <div class="w-16 h-16 bg-gradient-to-br from-[#0487E2] to-[#65C2F5] rounded-full mx-auto mb-3 flex items-center justify-center">
              <span class="text-white font-bold text-xl">{{ stat.value }}</span>
            </div>
            <p class="text-sm font-medium text-gray-600">{{ stat.label }}</p>
          </div>
        </div>
      </div>

      <!-- CTA Section -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0, transition: { delay: 800 } }
        }"
        class="text-center mt-12"
      >
        <p class="text-gray-600 mb-6">Ingin berbagi cerita sukses Anda sebagai alumni?</p>
        <button 
          @click="showTestimonialForm = true"
          class="bg-[#0487E2] hover:bg-[#0463CA] text-white px-8 py-3 rounded-lg font-semibold transition-colors"
        >
          <span class="text-white">Kirim Testimoni</span>
        </button>
      </div>
    </div>

    <!-- Testimonial Form Modal -->
    <div 
      v-if="showTestimonialForm" 
      class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4"
      @click.self="showTestimonialForm = false"
    >
      <div class="bg-white rounded-xl max-w-md w-full p-6">
        <div class="flex justify-between items-center mb-6">
          <h3 class="text-xl font-bold text-gray-800">Kirim Testimoni</h3>
          <button 
            @click="showTestimonialForm = false"
            class="text-gray-400 hover:text-gray-600"
          >
            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
          </button>
        </div>

        <form @submit.prevent="submitTestimonial" class="space-y-4">
          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
            <input 
              v-model="testimonialForm.name"
              type="text" 
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
              placeholder="Nama lengkap Anda"
            >
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Lulus</label>
            <input 
              v-model="testimonialForm.graduation"
              type="text" 
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
              placeholder="Contoh: Lulusan 2020"
            >
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan/Pendidikan Saat Ini</label>
            <input 
              v-model="testimonialForm.currentPosition"
              type="text" 
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
              placeholder="Contoh: Mahasiswa UI / Engineer di Google"
            >
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Testimoni</label>
            <textarea 
              v-model="testimonialForm.testimonial"
              required
              rows="4"
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent resize-none"
              placeholder="Ceritakan pengalaman dan pesan Anda sebagai alumni..."
            ></textarea>
          </div>

          <div>
            <label class="block text-sm font-medium text-gray-700 mb-2">Email</label>
            <input 
              v-model="testimonialForm.email"
              type="email" 
              required
              class="w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
              placeholder="email@example.com"
            >
          </div>

          <div class="flex gap-3 pt-4">
            <button 
              type="button"
              @click="showTestimonialForm = false"
              class="flex-1 px-4 py-2 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50"
            >
              Batal
            </button>
            <button 
              type="submit"
              class="flex-1 px-4 py-2 bg-[#0487E2] text-white rounded-lg hover:bg-[#0463CA]"
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
