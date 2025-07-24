<template>
  <section class="py-16 bg-white">
    <div class="container mx-auto px-4">
      <div class="grid lg:grid-cols-2 gap-12">
        <!-- Contact Information -->
        <div 
          v-motion="{
            initial: { opacity: 0, x: -50 },
            enter: { opacity: 1, x: 0 }
          }"
        >
          <h3 class="text-2xl font-bold text-gray-800 mb-6">Hubungi Kami</h3>
          <p class="text-gray-600 mb-8">
            Tim kami siap membantu menjawab pertanyaan dan memberikan informasi yang Anda butuhkan tentang SMA Negeri 1 Lareh Sago Halaban.
          </p>

          <!-- Contact Methods -->
          <div class="space-y-6">
            <div class="flex items-start">
              <div class="w-12 h-12 bg-[#0487E2] rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                </svg>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Alamat Sekolah</h4>
                <p class="text-gray-600">
                  Jl. Raya Padang Panjang - Bukittinggi KM. 7<br>
                  Lareh Sago Halaban, Lima Puluh Kota<br>
                  Sumatera Barat 26271
                </p>
              </div>
            </div>

            <div class="flex items-start">
              <div class="w-12 h-12 bg-[#65C2F5] rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                </svg>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Telepon & WhatsApp</h4>
                <div class="space-y-1">
                  <a href="tel:+6275212345678" class="text-[#0487E2] hover:text-[#0463CA] block transition-colors">
                    📞 (0752) 123-4567
                  </a>
                  <a href="https://wa.me/6281234567890" target="_blank" class="text-green-600 hover:text-green-700 block transition-colors">
                    📱 WhatsApp: +62 812-3456-7890
                  </a>
                </div>
              </div>
            </div>

            <div class="flex items-start">
              <div class="w-12 h-12 bg-[#09B1EC] rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                </svg>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Email</h4>
                <div class="space-y-1">
                  <a href="mailto:info@sma1lsh.sch.id" class="text-[#0487E2] hover:text-[#0463CA] block transition-colors">
                    📧 info@sma1lsh.sch.id
                  </a>
                  <a href="mailto:ppdb@sma1lsh.sch.id" class="text-[#0487E2] hover:text-[#0463CA] block transition-colors">
                    📧 ppdb@sma1lsh.sch.id (PPDB)
                  </a>
                </div>
              </div>
            </div>

            <div class="flex items-start">
              <div class="w-12 h-12 bg-green-600 rounded-lg flex items-center justify-center mr-4 flex-shrink-0">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
              </div>
              <div>
                <h4 class="font-semibold text-gray-800 mb-1">Jam Operasional</h4>
                <div class="space-y-1 text-gray-600">
                  <p>Senin - Jumat: 07:00 - 16:00 WIB</p>
                  <p>Sabtu: 07:00 - 12:00 WIB</p>
                  <p>Minggu: Tutup</p>
                </div>
              </div>
            </div>
          </div>

          <!-- Quick Actions -->
          <div class="mt-8 pt-8 border-t border-gray-200">
            <h4 class="font-semibold text-gray-800 mb-4">Aksi Cepat</h4>
            <div class="flex flex-wrap gap-3">
              <a 
                href="https://wa.me/6281234567890?text=Halo%20SMA%201%20Lareh%20Sago%20Halaban%2C%20saya%20ingin%20bertanya"
                target="_blank"
                class="bg-green-600 hover:bg-green-700 text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors flex items-center"
              >
                <svg class="w-4 h-4 mr-2" fill="currentColor" viewBox="0 0 24 24">
                  <path d="M20.885 3.106A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.106"/>
                </svg>
                Chat WhatsApp
              </a>
              
              <a 
                href="/ppdb"
                class="bg-[#0487E2] hover:bg-[#0463CA] text-white px-4 py-2 rounded-lg text-sm font-medium transition-colors"
              >
                <span class="text-white">📝 PPDB Online</span>
              </a>
              
              <a 
                href="tel:+6275212345678"
                class="border border-gray-300 text-gray-700 hover:bg-gray-50 px-4 py-2 rounded-lg text-sm font-medium transition-colors"
              >
                📞 Telepon Langsung
              </a>
            </div>
          </div>
        </div>

        <!-- Contact Form -->
        <div 
          v-motion="{
            initial: { opacity: 0, x: 50 },
            enter: { opacity: 1, x: 0, transition: { delay: 200 } }
          }"
          class="bg-gray-50 rounded-2xl p-8"
        >
          <h3 class="text-2xl font-bold text-gray-800 mb-6">Kirim Pesan</h3>
          
          <form @submit.prevent="submitContactForm" class="space-y-6">
            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                <input 
                  v-model="contactForm.nama"
                  type="text" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent transition-colors"
                  placeholder="Masukkan nama lengkap"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email *</label>
                <input 
                  v-model="contactForm.email"
                  type="email" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent transition-colors"
                  placeholder="email@example.com"
                >
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-4">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor HP *</label>
                <input 
                  v-model="contactForm.no_hp"
                  type="tel" 
                  required
                  pattern="[0-9]{10,13}"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent transition-colors"
                  placeholder="08xxxxxxxxxx"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Subjek *</label>
                <select 
                  v-model="contactForm.subjek"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent transition-colors"
                >
                  <option value="">Pilih subjek</option>
                  <option value="ppdb">Informasi PPDB</option>
                  <option value="akademik">Informasi Akademik</option>
                  <option value="fasilitas">Informasi Fasilitas</option>
                  <option value="ekstrakurikuler">Ekstrakurikuler</option>
                  <option value="beasiswa">Beasiswa</option>
                  <option value="keluhan">Keluhan/Saran</option>
                  <option value="lainnya">Lainnya</option>
                </select>
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Pesan *</label>
              <textarea 
                v-model="contactForm.pesan"
                required
                rows="5"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent resize-none transition-colors"
                placeholder="Tuliskan pesan atau pertanyaan Anda..."
              ></textarea>
            </div>

            <!-- Captcha (simple math) -->
            <div class="bg-white rounded-lg p-4 border">
              <label class="block text-sm font-medium text-gray-700 mb-2">Verifikasi *</label>
              <div class="flex items-center space-x-4">
                <span class="text-lg font-medium">{{ captcha.question }}</span>
                <input 
                  v-model="contactForm.captcha_answer"
                  type="number" 
                  required
                  class="w-20 px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent text-center"
                  placeholder="?"
                >
                <button 
                  type="button"
                  @click="generateCaptcha"
                  class="text-[#0487E2] hover:text-[#0463CA] text-sm"
                >
                  🔄 Ganti
                </button>
              </div>
            </div>

            <!-- Privacy Notice -->
            <div class="flex items-start">
              <input 
                v-model="contactForm.privacy_agreement"
                type="checkbox" 
                required
                class="mt-1 mr-3"
              >
              <label class="text-sm text-gray-600">
                Saya setuju bahwa data yang saya berikan akan digunakan oleh SMA 1 Lareh Sago Halaban untuk keperluan komunikasi dan informasi terkait. *
              </label>
            </div>

            <!-- Submit Button -->
            <button 
              type="submit"
              :disabled="isSubmittingContact"
              class="w-full bg-[#0487E2] hover:bg-[#0463CA] text-white py-3 px-6 rounded-lg font-semibold transition-colors disabled:opacity-50 disabled:cursor-not-allowed"
            >
              <span v-if="!isSubmittingContact" class="text-white">📤 Kirim Pesan</span>
              <span v-else class="text-white">⏳ Mengirim...</span>
            </button>
          </form>
        </div>
      </div>

      <!-- Success/Error Messages -->
      <div 
        v-if="contactMessage.show"
        class="fixed bottom-4 right-4 z-50 max-w-sm w-full"
      >
        <div 
          class="rounded-lg shadow-lg p-4 border-l-4"
          :class="contactMessage.type === 'success' 
            ? 'bg-green-50 border-green-400 text-green-800' 
            : 'bg-red-50 border-red-400 text-red-800'"
        >
          <div class="flex justify-between items-start">
            <div>
              <h4 class="font-semibold mb-1">
                {{ contactMessage.type === 'success' ? '✅ Berhasil!' : '❌ Error!' }}
              </h4>
              <p class="text-sm">{{ contactMessage.text }}</p>
            </div>
            <button 
              @click="contactMessage.show = false"
              class="ml-4 text-current opacity-50 hover:opacity-100"
            >
              ✕
            </button>
          </div>
        </div>
      </div>
    </div>
  </section>
</template>

<script setup>
import { onMounted, reactive, ref } from 'vue';

const isSubmittingContact = ref(false);

const contactForm = reactive({
  nama: '',
  email: '',
  no_hp: '',
  subjek: '',
  pesan: '',
  captcha_answer: '',
  privacy_agreement: false
});

const contactMessage = reactive({
  show: false,
  type: 'success', // 'success' or 'error'
  text: ''
});

const captcha = reactive({
  question: '',
  answer: 0
});

const generateCaptcha = () => {
  const num1 = Math.floor(Math.random() * 10) + 1;
  const num2 = Math.floor(Math.random() * 10) + 1;
  captcha.question = `${num1} + ${num2} = `;
  captcha.answer = num1 + num2;
};

const submitContactForm = async () => {
  // Validate captcha
  if (parseInt(contactForm.captcha_answer) !== captcha.answer) {
    showMessage('error', 'Jawaban verifikasi salah. Silakan coba lagi.');
    generateCaptcha();
    contactForm.captcha_answer = '';
    return;
  }

  isSubmittingContact.value = true;

  try {
    // Simulate API call
    await new Promise(resolve => setTimeout(resolve, 1500));
    
    // Here you would typically send the form data to your backend
    console.log('Contact form submitted:', contactForm);
    
    showMessage('success', 'Pesan Anda telah terkirim! Tim kami akan segera menghubungi Anda.');
    
    // Reset form
    Object.keys(contactForm).forEach(key => {
      if (key === 'privacy_agreement') {
        contactForm[key] = false;
      } else {
        contactForm[key] = '';
      }
    });
    
    generateCaptcha();
    
  } catch (error) {
    showMessage('error', 'Terjadi kesalahan saat mengirim pesan. Silakan coba lagi.');
  } finally {
    isSubmittingContact.value = false;
  }
};

const showMessage = (type, text) => {
  contactMessage.type = type;
  contactMessage.text = text;
  contactMessage.show = true;
  
  // Auto hide after 5 seconds
  setTimeout(() => {
    contactMessage.show = false;
  }, 5000);
};

onMounted(() => {
  generateCaptcha();
});
</script>
