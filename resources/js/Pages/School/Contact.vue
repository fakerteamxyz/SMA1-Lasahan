<template>
  <Head title="Hubungi Kami" />
  
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
          <h1 class="text-4xl md:text-5xl font-bold mb-4">Hubungi Kami</h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto">
            Kami siap membantu menjawab pertanyaan Anda tentang SMA Negeri 1 Lareh Sago Halaban
          </p>
        </div>
      </div>
      <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </section>

    <!-- Quick Contact Cards -->
    <section class="relative -mt-8 mb-16">
      <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-3 gap-6">
          <div 
            v-for="(contact, index) in quickContacts" 
            :key="index"
            v-motion="{
              initial: { opacity: 0, y: 50 },
              enter: { opacity: 1, y: 0, transition: { delay: 400 + (index * 100) } }
            }"
            class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow"
          >
            <div class="w-16 h-16 bg-gradient-to-r from-[#0487E2] to-[#65C2F5] rounded-full flex items-center justify-center mx-auto mb-4">
              <span v-html="contact.icon" class="w-8 h-8 text-white"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ contact.title }}</h3>
            <p class="text-gray-600 mb-4">{{ contact.description }}</p>
            <a 
              :href="contact.link" 
              class="bg-[#0487E2] text-white px-6 py-2 rounded-lg hover:bg-[#0463CA] transition-colors inline-block"
              :target="contact.external ? '_blank' : '_self'"
            >
              <span class="text-white">{{ contact.action }}</span>
            </a>
          </div>
        </div>
      </div>
    </section>

    <!-- Main Contact Section -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="grid lg:grid-cols-2 gap-12">
          <!-- Contact Information -->
          <div 
            v-motion="{
              initial: { opacity: 0, x: -30 },
              enter: { opacity: 1, x: 0, transition: { delay: 300 } }
            }"
          >
            <div class="bg-gradient-to-br from-[#0487E2] to-[#65C2F5] text-white rounded-xl p-8">
              <h2 class="text-3xl font-bold mb-6">Informasi Kontak</h2>
              
              <!-- Address -->
              <div class="mb-8">
                <h3 class="text-xl font-semibold mb-4 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                  </svg>
                  Alamat Lengkap
                </h3>
                <div class="text-white/90 leading-relaxed">
                  <p class="font-medium">SMA Negeri 1 Lareh Sago Halaban</p>
                  <p>Jl. Lintas Padang - Bukittinggi Km. 25</p>
                  <p>Lareh Sago Halaban, Kabupaten Solok</p>
                  <p>Sumatera Barat 27365</p>
                  <p>Indonesia</p>
                </div>
              </div>

              <!-- Phone & Email -->
              <div class="mb-8">
                <h3 class="text-xl font-semibold mb-4 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                  </svg>
                  Telepon & Email
                </h3>
                <div class="space-y-3">
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                    </svg>
                    <div>
                      <a href="tel:+6207521234567" class="text-white hover:text-white/80 transition-colors">
                        (0752) 123-4567
                      </a>
                      <p class="text-xs text-white/70">Telepon Kantor</p>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M6 6h12v12H6V6z" />
                    </svg>
                    <div>
                      <a href="tel:+6207521234568" class="text-white hover:text-white/80 transition-colors">
                        (0752) 123-4568
                      </a>
                      <p class="text-xs text-white/70">Fax</p>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div>
                      <a href="mailto:info@smalsh.sch.id" class="text-white hover:text-white/80 transition-colors">
                        info@smalsh.sch.id
                      </a>
                      <p class="text-xs text-white/70">Email Resmi</p>
                    </div>
                  </div>
                  <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 mr-3 text-white/70" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                      <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                    </svg>
                    <div>
                      <a href="mailto:admin@smalsh.sch.id" class="text-white hover:text-white/80 transition-colors">
                        admin@smalsh.sch.id
                      </a>
                      <p class="text-xs text-white/70">Email Admin</p>
                    </div>
                  </div>
                </div>
              </div>

              <!-- Office Hours -->
              <div class="mb-8">
                <h3 class="text-xl font-semibold mb-4 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                  </svg>
                  Jam Operasional
                </h3>
                <div class="space-y-2 text-white/90">
                  <div class="flex justify-between">
                    <span>Senin - Jumat:</span>
                    <span>07:00 - 16:00 WIB</span>
                  </div>
                  <div class="flex justify-between">
                    <span>Sabtu:</span>
                    <span>07:00 - 14:00 WIB</span>
                  </div>
                  <div class="flex justify-between">
                    <span>Minggu & Libur:</span>
                    <span>Tutup</span>
                  </div>
                </div>
              </div>

              <!-- Social Media -->
              <div>
                <h3 class="text-xl font-semibold mb-4 flex items-center">
                  <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 4V2a1 1 0 011-1h8a1 1 0 011 1v2h4a1 1 0 011 1v2a1 1 0 01-1 1h-1v10a2 2 0 01-2 2H6a2 2 0 01-2-2V8H3a1 1 0 01-1-1V5a1 1 0 011-1h4z" />
                  </svg>
                  Media Sosial
                </h3>
                <div class="flex flex-wrap gap-4">
                  <a 
                    v-for="(social, index) in socialMedia" 
                    :key="index"
                    :href="social.url" 
                    target="_blank"
                    class="bg-white/20 hover:bg-white/30 p-3 rounded-lg transition-colors group flex items-center"
                  >
                    <span v-html="social.icon" class="w-6 h-6 text-white group-hover:scale-110 transition-transform"></span>
                    <span class="ml-2 text-sm font-medium hidden sm:block">{{ social.name }}</span>
                  </a>
                </div>
              </div>
            </div>
          </div>

          <!-- Contact Form -->
          <div 
            v-motion="{
              initial: { opacity: 0, x: 30 },
              enter: { opacity: 1, x: 0, transition: { delay: 500 } }
            }"
          >
            <div class="bg-white rounded-xl shadow-lg p-8">
              <h2 class="text-3xl font-bold text-gray-800 mb-6">Kirim Pesan</h2>
              <form @submit.prevent="submitForm" class="space-y-6">
                <div class="grid md:grid-cols-2 gap-6">
                  <div>
                    <label for="name" class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap</label>
                    <input 
                      type="text" 
                      id="name" 
                      v-model="form.name"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent transition-colors"
                      placeholder="Masukkan nama lengkap"
                      required
                    >
                  </div>
                  <div>
                    <label for="email" class="block text-sm font-medium text-gray-700 mb-2">Email</label>
                    <input 
                      type="email" 
                      id="email" 
                      v-model="form.email"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent transition-colors"
                      placeholder="nama@email.com"
                      required
                    >
                  </div>
                </div>
                
                <div class="grid md:grid-cols-2 gap-6">
                  <div>
                    <label for="phone" class="block text-sm font-medium text-gray-700 mb-2">Nomor Telepon</label>
                    <input 
                      type="tel" 
                      id="phone" 
                      v-model="form.phone"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent transition-colors"
                      placeholder="08xxxxxxxxxx"
                    >
                  </div>
                  <div>
                    <label for="subject" class="block text-sm font-medium text-gray-700 mb-2">Subjek</label>
                    <select 
                      id="subject" 
                      v-model="form.subject"
                      class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent transition-colors"
                      required
                    >
                      <option value="">Pilih subjek</option>
                      <option value="ppdb">Pendaftaran Siswa Baru</option>
                      <option value="akademik">Informasi Akademik</option>
                      <option value="ekskul">Ekstrakurikuler</option>
                      <option value="fasilitas">Fasilitas Sekolah</option>
                      <option value="lainnya">Lainnya</option>
                    </select>
                  </div>
                </div>

                <div>
                  <label for="message" class="block text-sm font-medium text-gray-700 mb-2">Pesan</label>
                  <textarea 
                    id="message" 
                    v-model="form.message"
                    rows="6"
                    class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent transition-colors"
                    placeholder="Tulis pesan Anda di sini..."
                    required
                  ></textarea>
                </div>

                <button 
                  type="submit"
                  :disabled="submitting"
                  class="w-full bg-[#0487E2] text-white py-3 px-6 rounded-lg hover:bg-[#0463CA] transition-colors font-semibold disabled:opacity-50 disabled:cursor-not-allowed flex items-center justify-center"
                >
                  <span v-if="!submitting" class="text-white">Kirim Pesan</span>
                  <span v-else class="text-white">Mengirim...</span>
                  <svg v-if="!submitting" xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 ml-2 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                  </svg>
                  <svg v-else class="animate-spin h-5 w-5 ml-2 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                  </svg>
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Google Maps Section -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Lokasi Kami</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Temukan SMA Negeri 1 Lareh Sago Halaban dengan mudah menggunakan peta di bawah ini
          </p>
        </div>

        <div 
          v-motion="{
            initial: { opacity: 0, scale: 0.95 },
            enter: { opacity: 1, scale: 1, transition: { delay: 400 } }
          }"
          class="bg-white rounded-xl shadow-lg overflow-hidden"
        >
          <!-- Map Container -->
          <div class="relative h-96 md:h-[500px]">
            <iframe 
              src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d15959.234567890123!2d100.6234567!3d-0.8765432!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2fd4b9876543210a%3A0x123456789abcdef0!2sSMA%20Negeri%201%20Lareh%20Sago%20Halaban!5e0!3m2!1sid!2sid!4v1627123456789!5m2!1sid!2sid"
              width="100%" 
              height="100%" 
              style="border:0;" 
              allowfullscreen="" 
              loading="lazy" 
              referrerpolicy="no-referrer-when-downgrade"
              class="w-full h-full"
            ></iframe>
            
            <!-- Map Overlay with Info -->
            <div class="absolute top-4 left-4 bg-white/95 backdrop-blur-sm rounded-lg p-4 shadow-lg max-w-sm">
              <h3 class="font-bold text-gray-800 mb-2">SMA Negeri 1 Lareh Sago Halaban</h3>
              <p class="text-sm text-gray-600 mb-3">
                Jl. Lintas Padang - Bukittinggi Km. 25<br>
                Lareh Sago Halaban, Kabupaten Solok<br>
                Sumatera Barat 27365
              </p>
              <div class="flex gap-2">
                <a 
                  href="https://goo.gl/maps/abc123" 
                  target="_blank" 
                  class="bg-[#0487E2] text-white px-3 py-1 rounded text-sm hover:bg-[#0463CA] transition-colors"
                >
                  <span class="text-white">Buka di Maps</span>
                </a>
                <a 
                  href="https://goo.gl/maps/directions/abc123" 
                  target="_blank" 
                  class="border border-[#0487E2] text-[#0487E2] px-3 py-1 rounded text-sm hover:bg-[#0487E2] hover:text-white transition-colors"
                >
                  Petunjuk Arah
                </a>
              </div>
            </div>
          </div>
        </div>

        <!-- Transportation Info -->
        <div class="mt-12 grid md:grid-cols-3 gap-6">
          <div 
            v-for="(transport, index) in transportInfo" 
            :key="index"
            v-motion="{
              initial: { opacity: 0, y: 20 },
              enter: { opacity: 1, y: 0, transition: { delay: 600 + (index * 100) } }
            }"
            class="bg-white rounded-xl shadow-lg p-6 text-center"
          >
            <div class="w-16 h-16 bg-gradient-to-r from-[#0487E2] to-[#65C2F5] rounded-full flex items-center justify-center mx-auto mb-4">
              <span v-html="transport.icon" class="w-8 h-8 text-white"></span>
            </div>
            <h3 class="text-lg font-bold text-gray-800 mb-2">{{ transport.title }}</h3>
            <p class="text-gray-600 text-sm">{{ transport.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Success/Error Messages -->
    <div v-if="showMessage" class="fixed bottom-4 right-4 z-50">
      <div 
        v-motion="{
          initial: { opacity: 0, x: 100 },
          enter: { opacity: 1, x: 0 },
          leave: { opacity: 0, x: 100 }
        }"
        class="p-4 rounded-lg shadow-lg flex items-center"
        :class="messageType === 'success' ? 'bg-green-500 text-white' : 'bg-red-500 text-white'"
      >
        <svg v-if="messageType === 'success'" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
        </svg>
        <svg v-else xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 mr-3" fill="none" viewBox="0 0 24 24" stroke="currentColor">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
        </svg>
        {{ message }}
      </div>
    </div>

    <!-- Enhanced Contact Form Section -->
    <ContactForm />

    <!-- Footer Component -->
    <SchoolFooter />
  </div>
</template>

<script setup>
import ContactForm from '@/Components/ContactForm.vue';
import SchoolFooter from '@/Components/SchoolFooter.vue';
import SchoolHeader from '@/Components/SchoolHeader.vue';
import { Head } from '@inertiajs/vue3';
import { ref } from 'vue';

// Form data
const form = ref({
  name: '',
  email: '',
  phone: '',
  subject: '',
  message: ''
});

const submitting = ref(false);
const showMessage = ref(false);
const message = ref('');
const messageType = ref('success');

// Quick contact cards
const quickContacts = ref([
  {
    title: 'Telepon Langsung',
    description: 'Hubungi kami langsung untuk informasi lebih cepat',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" /></svg>',
    action: 'Telepon Sekarang',
    link: 'tel:+6207521234567',
    external: false
  },
  {
    title: 'Email Resmi',
    description: 'Kirim email untuk pertanyaan detail',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" /></svg>',
    action: 'Kirim Email',
    link: 'mailto:info@smalsh.sch.id',
    external: false
  },
  {
    title: 'WhatsApp',
    description: 'Chat langsung melalui WhatsApp',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24"><path d="M17.472 14.382c-.297-.149-1.758-.867-2.03-.967-.273-.099-.471-.148-.67.15-.197.297-.767.966-.94 1.164-.173.199-.347.223-.644.075-.297-.15-1.255-.463-2.39-1.475-.883-.788-1.48-1.761-1.653-2.059-.173-.297-.018-.458.13-.606.134-.133.298-.347.446-.52.149-.174.198-.298.298-.497.099-.198.05-.371-.025-.52-.075-.149-.669-1.612-.916-2.207-.242-.579-.487-.5-.669-.51-.173-.008-.371-.01-.57-.01-.198 0-.52.074-.792.372-.272.297-1.04 1.016-1.04 2.479 0 1.462 1.065 2.875 1.213 3.074.149.198 2.096 3.2 5.077 4.487.709.306 1.262.489 1.694.625.712.227 1.36.195 1.871.118.571-.085 1.758-.719 2.006-1.413.248-.694.248-1.289.173-1.413-.074-.124-.272-.198-.57-.347m-5.421 7.403h-.004a9.87 9.87 0 01-5.031-1.378l-.361-.214-3.741.982.998-3.648-.235-.374a9.86 9.86 0 01-1.51-5.26c.001-5.45 4.436-9.884 9.888-9.884 2.64 0 5.122 1.03 6.988 2.898a9.825 9.825 0 012.893 6.994c-.003 5.45-4.437 9.884-9.885 9.884m8.413-18.297A11.815 11.815 0 0012.05 0C5.495 0 .16 5.335.157 11.892c0 2.096.547 4.142 1.588 5.945L.057 24l6.305-1.654a11.882 11.882 0 005.683 1.448h.005c6.554 0 11.89-5.335 11.893-11.893A11.821 11.821 0 0020.885 3.488"/></svg>',
    action: 'Chat WhatsApp',
    link: 'https://wa.me/6282123456789',
    external: true
  }
]);

// Social media links
const socialMedia = ref([
  {
    name: 'Instagram',
    url: 'https://instagram.com/smalsh.official',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M12 2.163c3.204 0 3.584.012 4.85.07 3.252.148 4.771 1.691 4.919 4.919.058 1.265.069 1.645.069 4.849 0 3.205-.012 3.584-.069 4.849-.149 3.225-1.664 4.771-4.919 4.919-1.266.058-1.644.07-4.85.07-3.204 0-3.584-.012-4.849-.07-3.26-.149-4.771-1.699-4.919-4.92-.058-1.265-.07-1.644-.07-4.849 0-3.204.013-3.583.07-4.849.149-3.227 1.664-4.771 4.919-4.919 1.266-.057 1.645-.069 4.849-.069zm0-2.163c-3.259 0-3.667.014-4.947.072-4.358.2-6.78 2.618-6.98 6.98-.059 1.281-.073 1.689-.073 4.948 0 3.259.014 3.668.072 4.948.2 4.358 2.618 6.78 6.98 6.98 1.281.058 1.689.072 4.948.072 3.259 0 3.668-.014 4.948-.072 4.354-.2 6.782-2.618 6.979-6.98.059-1.28.073-1.689.073-4.948 0-3.259-.014-3.667-.072-4.947-.196-4.354-2.617-6.78-6.979-6.98-1.281-.059-1.69-.073-4.949-.073zm0 5.838c-3.403 0-6.162 2.759-6.162 6.162s2.759 6.163 6.162 6.163 6.162-2.759 6.162-6.163c0-3.403-2.759-6.162-6.162-6.162zm0 10.162c-2.209 0-4-1.79-4-4 0-2.209 1.791-4 4-4s4 1.791 4 4c0 2.21-1.791 4-4 4zm6.406-11.845c-.796 0-1.441.645-1.441 1.44s.645 1.44 1.441 1.44c.795 0 1.439-.645 1.439-1.44s-.644-1.44-1.439-1.44z"/></svg>'
  },
  {
    name: 'Facebook',
    url: 'https://facebook.com/smalsh.official',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M24 12.073c0-6.627-5.373-12-12-12s-12 5.373-12 12c0 5.99 4.388 10.954 10.125 11.854v-8.385H7.078v-3.47h3.047V9.43c0-3.007 1.792-4.669 4.533-4.669 1.312 0 2.686.235 2.686.235v2.953H15.83c-1.491 0-1.956.925-1.956 1.874v2.25h3.328l-.532 3.47h-2.796v8.385C19.612 23.027 24 18.062 24 12.073z"/></svg>'
  },
  {
    name: 'YouTube',
    url: 'https://youtube.com/@smalsh.official',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M23.498 6.186a3.016 3.016 0 0 0-2.122-2.136C19.505 3.545 12 3.545 12 3.545s-7.505 0-9.377.505A3.017 3.017 0 0 0 .502 6.186C0 8.07 0 12 0 12s0 3.93.502 5.814a3.016 3.016 0 0 0 2.122 2.136c1.871.505 9.376.505 9.376.505s7.505 0 9.377-.505a3.015 3.015 0 0 0 2.122-2.136C24 15.93 24 12 24 12s0-3.93-.502-5.814zM9.545 15.568V8.432L15.818 12l-6.273 3.568z"/></svg>'
  },
  {
    name: 'TikTok',
    url: 'https://tiktok.com/@smalsh.official',
    icon: '<svg fill="currentColor" viewBox="0 0 24 24"><path d="M12.525.02c1.31-.02 2.61-.01 3.91-.02.08 1.53.63 3.09 1.75 4.17 1.12 1.11 2.7 1.62 4.24 1.79v4.03c-1.44-.05-2.89-.35-4.2-.97-.57-.26-1.1-.59-1.62-.93-.01 2.92.01 5.84-.02 8.75-.08 1.4-.54 2.79-1.35 3.94-1.31 1.92-3.58 3.17-5.91 3.21-1.43.08-2.86-.31-4.08-1.03-2.02-1.19-3.44-3.37-3.65-5.71-.02-.5-.03-1-.01-1.49.18-1.9 1.12-3.72 2.58-4.96 1.66-1.44 3.98-2.13 6.15-1.72.02 1.48-.04 2.96-.04 4.44-.99-.32-2.15-.23-3.02.37-.63.41-1.11 1.04-1.36 1.75-.21.51-.15 1.07-.14 1.61.24 1.64 1.82 3.02 3.5 2.87 1.12-.01 2.19-.66 2.77-1.61.19-.33.4-.67.41-1.06.1-1.79.06-3.57.07-5.36.01-4.03-.01-8.05.02-12.07z"/></svg>'
  }
]);

// Transportation info
const transportInfo = ref([
  {
    title: 'Transportasi Umum',
    description: 'Dapat diakses dengan bus umum jurusan Padang-Bukittinggi, turun di halte Lareh Sago Halaban',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7h12m0 0l-4-4m4 4l-4 4m0 6H4m0 0l4 4m-4-4l4-4" /></svg>'
  },
  {
    title: 'Kendaraan Pribadi',
    description: 'Parkir luas tersedia untuk mobil dan motor. Akses mudah dari jalan utama Padang-Bukittinggi',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 17a2 2 0 11-4 0 2 2 0 014 0zM19 17a2 2 0 11-4 0 2 2 0 014 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 6h3l4 4v5H5V9l4-4h3M7 17h10" /></svg>'
  },
  {
    title: 'Ojek Online',
    description: 'Tersedia layanan ojek online Gojek dan Grab untuk kemudahan akses ke sekolah',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" /><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" /></svg>'
  }
]);

// Form submission
const submitForm = async () => {
  submitting.value = true;
  
  try {
    // Simulate API call
    await new Promise(resolve => setTimeout(resolve, 2000));
    
    // Reset form
    form.value = {
      name: '',
      email: '',
      phone: '',
      subject: '',
      message: ''
    };
    
    // Show success message
    showMessage.value = true;
    messageType.value = 'success';
    message.value = 'Pesan berhasil dikirim! Kami akan segera menghubungi Anda.';
    
    // Hide message after 5 seconds
    setTimeout(() => {
      showMessage.value = false;
    }, 5000);
    
  } catch (error) {
    // Show error message
    showMessage.value = true;
    messageType.value = 'error';
    message.value = 'Gagal mengirim pesan. Silakan coba lagi.';
    
    setTimeout(() => {
      showMessage.value = false;
    }, 5000);
  } finally {
    submitting.value = false;
  }
};
</script>

<style scoped>
/* Custom styles for form elements */
input:focus, select:focus, textarea:focus {
  outline: none;
}

/* Animation for message */
@keyframes slideIn {
  from {
    transform: translateX(100%);
    opacity: 0;
  }
  to {
    transform: translateX(0);
    opacity: 1;
  }
}

.animate-slide-in {
  animation: slideIn 0.3s ease-out;
}
</style>
