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
        <h2 class="text-sm text-[#0487E2] font-semibold uppercase tracking-wider mb-2">PPDB Online</h2>
        <h3 class="text-3xl md:text-4xl font-bold text-gray-800 mb-4">Formulir Pendaftaran Peserta Didik Baru</h3>
        <p class="text-gray-600 max-w-3xl mx-auto">
          Bergabunglah dengan SMA Negeri 1 Lareh Sago Halaban tahun ajaran 2025/2026. Isi formulir di bawah ini dengan lengkap dan benar.
        </p>
      </div>

      <!-- PPDB Info Cards -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 30 },
          enter: { opacity: 1, y: 0, transition: { delay: 200 } }
        }"
        class="grid md:grid-cols-3 gap-6 mb-12"
      >
        <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-[#0487E2]">
          <div class="flex items-center mb-4">
            <div class="w-12 h-12 bg-[#0487E2] rounded-lg flex items-center justify-center mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3a2 2 0 012-2h4a2 2 0 012 2v4m-6 9l2 2 4-4M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
              </svg>
            </div>
            <h4 class="text-lg font-bold text-gray-800">Persyaratan</h4>
          </div>
          <ul class="text-sm text-gray-600 space-y-2">
            <li>• Lulusan SMP/MTs sederajat</li>
            <li>• Fotokopi SKHUN yang dilegalisir</li>
            <li>• Fotokopi KTP orang tua</li>
            <li>• Pas foto 3x4 sebanyak 4 lembar</li>
            <li>• Fotokopi KK (Kartu Keluarga)</li>
          </ul>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-[#65C2F5]">
          <div class="flex items-center mb-4">
            <div class="w-12 h-12 bg-[#65C2F5] rounded-lg flex items-center justify-center mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h4 class="text-lg font-bold text-gray-800">Jadwal Penting</h4>
          </div>
          <ul class="text-sm text-gray-600 space-y-2">
            <li>• <strong>Pendaftaran:</strong> 1-30 Juni 2025</li>
            <li>• <strong>Verifikasi:</strong> 1-31 Juli 2025</li>
            <li>• <strong>Pengumuman:</strong> 5 Agustus 2025</li>
            <li>• <strong>Daftar Ulang:</strong> 6-10 Agustus 2025</li>
            <li>• <strong>MOS:</strong> 12-14 Agustus 2025</li>
          </ul>
        </div>

        <div class="bg-white rounded-lg shadow-lg p-6 border-t-4 border-[#09B1EC]">
          <div class="flex items-center mb-4">
            <div class="w-12 h-12 bg-[#09B1EC] rounded-lg flex items-center justify-center mr-4">
              <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-white" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
              </svg>
            </div>
            <h4 class="text-lg font-bold text-gray-800">Informasi</h4>
          </div>
          <ul class="text-sm text-gray-600 space-y-2">
            <li>• <strong>Kuota:</strong> 120 siswa (4 kelas)</li>
            <li>• <strong>Jalur Zonasi:</strong> 50%</li>
            <li>• <strong>Jalur Afirmasi:</strong> 20%</li>
            <li>• <strong>Jalur Mutasi:</strong> 10%</li>
            <li>• <strong>Jalur Prestasi:</strong> 20%</li>
          </ul>
        </div>
      </div>

      <!-- Registration Form -->
      <div 
        v-motion="{
          initial: { opacity: 0, y: 50 },
          enter: { opacity: 1, y: 0, transition: { delay: 400 } }
        }"
        class="bg-white rounded-2xl shadow-xl overflow-hidden"
      >
        <!-- Form Header -->
        <div class="bg-gradient-to-r from-[#0487E2] to-[#65C2F5] p-6 text-white">
          <h4 class="text-2xl font-bold mb-2">Formulir Pendaftaran</h4>
          <p class="text-white/90">Tahap {{ currentStep }} dari {{ totalSteps }}: {{ stepTitles[currentStep - 1] }}</p>
          
          <!-- Progress Bar -->
          <div class="w-full bg-white/20 rounded-full h-2 mt-4">
            <div 
              class="bg-white h-2 rounded-full transition-all duration-500"
              :style="{ width: (currentStep / totalSteps) * 100 + '%' }"
            ></div>
          </div>
        </div>

        <!-- Form Content -->
        <form @submit.prevent="handleSubmit" class="p-8">
          <!-- Step 1: Data Pribadi -->
          <div v-if="currentStep === 1" class="space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Lengkap *</label>
                <input 
                  v-model="formData.nama_lengkap"
                  type="text" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="Masukkan nama lengkap sesuai ijazah"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">NISN *</label>
                <input 
                  v-model="formData.nisn"
                  type="text" 
                  required
                  pattern="[0-9]{10}"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="10 digit NISN"
                >
              </div>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tempat Lahir *</label>
                <input 
                  v-model="formData.tempat_lahir"
                  type="text" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="Kota kelahiran"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tanggal Lahir *</label>
                <input 
                  v-model="formData.tanggal_lahir"
                  type="date" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Jenis Kelamin *</label>
                <select 
                  v-model="formData.jenis_kelamin"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                >
                  <option value="">Pilih jenis kelamin</option>
                  <option value="L">Laki-laki</option>
                  <option value="P">Perempuan</option>
                </select>
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Agama *</label>
                <select 
                  v-model="formData.agama"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                >
                  <option value="">Pilih agama</option>
                  <option value="Islam">Islam</option>
                  <option value="Kristen">Kristen</option>
                  <option value="Katolik">Katolik</option>
                  <option value="Hindu">Hindu</option>
                  <option value="Buddha">Buddha</option>
                  <option value="Konghucu">Konghucu</option>
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Anak ke- *</label>
                <input 
                  v-model="formData.anak_ke"
                  type="number" 
                  required
                  min="1"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="Urutan anak dalam keluarga"
                >
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Lengkap *</label>
              <textarea 
                v-model="formData.alamat"
                required
                rows="3"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent resize-none"
                placeholder="Alamat lengkap sesuai KK"
              ></textarea>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nomor HP Siswa *</label>
                <input 
                  v-model="formData.no_hp_siswa"
                  type="tel" 
                  required
                  pattern="[0-9]{10,13}"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="08xxxxxxxxxx"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Siswa *</label>
                <input 
                  v-model="formData.email_siswa"
                  type="email" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="email@example.com"
                >
              </div>
            </div>
          </div>

          <!-- Step 2: Data Sekolah Asal -->
          <div v-if="currentStep === 2" class="space-y-6">
            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Asal Sekolah *</label>
                <input 
                  v-model="formData.asal_sekolah"
                  type="text" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="Nama SMP/MTs asal"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">NPSN Sekolah Asal *</label>
                <input 
                  v-model="formData.npsn_asal"
                  type="text" 
                  required
                  pattern="[0-9]{8}"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="8 digit NPSN"
                >
              </div>
            </div>

            <div>
              <label class="block text-sm font-medium text-gray-700 mb-2">Alamat Sekolah Asal *</label>
              <textarea 
                v-model="formData.alamat_sekolah_asal"
                required
                rows="3"
                class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent resize-none"
                placeholder="Alamat lengkap sekolah asal"
              ></textarea>
            </div>

            <div class="grid md:grid-cols-3 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Tahun Lulus *</label>
                <input 
                  v-model="formData.tahun_lulus"
                  type="number" 
                  required
                  min="2020"
                  max="2025"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="2025"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nilai UN/UAS *</label>
                <input 
                  v-model="formData.nilai_un"
                  type="number" 
                  required
                  min="0"
                  max="100"
                  step="0.01"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="85.50"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">No. Ijazah *</label>
                <input 
                  v-model="formData.no_ijazah"
                  type="text" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="Nomor ijazah"
                >
              </div>
            </div>
          </div>

          <!-- Step 3: Data Orang Tua -->
          <div v-if="currentStep === 3" class="space-y-6">
            <h5 class="text-lg font-semibold text-gray-800 border-b pb-2">Data Ayah</h5>
            
            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ayah *</label>
                <input 
                  v-model="formData.nama_ayah"
                  type="text" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="Nama lengkap ayah"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Ayah *</label>
                <input 
                  v-model="formData.pekerjaan_ayah"
                  type="text" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="Pekerjaan ayah"
                >
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pendidikan Ayah *</label>
                <select 
                  v-model="formData.pendidikan_ayah"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                >
                  <option value="">Pilih pendidikan</option>
                  <option value="SD">SD</option>
                  <option value="SMP">SMP</option>
                  <option value="SMA">SMA</option>
                  <option value="D3">D3</option>
                  <option value="S1">S1</option>
                  <option value="S2">S2</option>
                  <option value="S3">S3</option>
                </select>
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Penghasilan Ayah *</label>
                <select 
                  v-model="formData.penghasilan_ayah"
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                >
                  <option value="">Pilih range penghasilan</option>
                  <option value="< 1 juta">< Rp 1.000.000</option>
                  <option value="1-3 juta">Rp 1.000.000 - 3.000.000</option>
                  <option value="3-5 juta">Rp 3.000.000 - 5.000.000</option>
                  <option value="5-10 juta">Rp 5.000.000 - 10.000.000</option>
                  <option value="> 10 juta">> Rp 10.000.000</option>
                </select>
              </div>
            </div>

            <h5 class="text-lg font-semibold text-gray-800 border-b pb-2 mt-8">Data Ibu</h5>
            
            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Nama Ibu *</label>
                <input 
                  v-model="formData.nama_ibu"
                  type="text" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="Nama lengkap ibu"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Pekerjaan Ibu *</label>
                <input 
                  v-model="formData.pekerjaan_ibu"
                  type="text" 
                  required
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="Pekerjaan ibu"
                >
              </div>
            </div>

            <div class="grid md:grid-cols-2 gap-6">
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">No. HP Orang Tua *</label>
                <input 
                  v-model="formData.no_hp_ortu"
                  type="tel" 
                  required
                  pattern="[0-9]{10,13}"
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="08xxxxxxxxxx"
                >
              </div>
              
              <div>
                <label class="block text-sm font-medium text-gray-700 mb-2">Email Orang Tua</label>
                <input 
                  v-model="formData.email_ortu"
                  type="email" 
                  class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-[#0487E2] focus:border-transparent"
                  placeholder="email@example.com (opsional)"
                >
              </div>
            </div>
          </div>

          <!-- Step 4: Jalur Pendaftaran & Upload -->
          <div v-if="currentStep === 4" class="space-y-6">
            <div>
              <label class="block text-sm font-medium text-gray-700 mb-4">Jalur Pendaftaran *</label>
              <div class="grid md:grid-cols-2 gap-4">
                <label 
                  v-for="jalur in jalurPendaftaran" 
                  :key="jalur.value"
                  class="flex items-center p-4 border-2 rounded-lg cursor-pointer transition-colors"
                  :class="formData.jalur_pendaftaran === jalur.value 
                    ? 'border-[#0487E2] bg-[#0487E2]/10' 
                    : 'border-gray-200 hover:border-[#0487E2]/50'"
                >
                  <input 
                    v-model="formData.jalur_pendaftaran"
                    type="radio" 
                    :value="jalur.value"
                    class="sr-only"
                  >
                  <div class="flex-1">
                    <div class="font-semibold text-gray-800">{{ jalur.label }}</div>
                    <div class="text-sm text-gray-600">{{ jalur.description }}</div>
                    <div class="text-xs text-[#0487E2] font-medium mt-1">Kuota: {{ jalur.quota }}</div>
                  </div>
                  <div 
                    class="w-4 h-4 rounded-full border-2 ml-4"
                    :class="formData.jalur_pendaftaran === jalur.value 
                      ? 'border-[#0487E2] bg-[#0487E2]' 
                      : 'border-gray-300'"
                  >
                    <div 
                      v-if="formData.jalur_pendaftaran === jalur.value"
                      class="w-full h-full rounded-full bg-white scale-50"
                    ></div>
                  </div>
                </label>
              </div>
            </div>

            <div class="border-t pt-6">
              <h5 class="text-lg font-semibold text-gray-800 mb-4">Upload Dokumen</h5>
              
              <div class="space-y-4">
                <div 
                  v-for="dokumen in requiredDocuments" 
                  :key="dokumen.key"
                  class="border border-gray-200 rounded-lg p-4"
                >
                  <label class="block text-sm font-medium text-gray-700 mb-2">
                    {{ dokumen.label }} 
                    <span class="text-red-500">*</span>
                  </label>
                  <div class="flex items-center space-x-4">
                    <input 
                      :ref="dokumen.key"
                      type="file" 
                      :accept="dokumen.accept"
                      required
                      class="flex-1 text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-lg file:border-0 file:bg-[#0487E2] file:text-white hover:file:bg-[#0463CA]"
                      @change="handleFileUpload($event, dokumen.key)"
                    >
                    <span class="text-xs text-gray-500">{{ dokumen.format }}</span>
                  </div>
                  <p class="text-xs text-gray-500 mt-1">{{ dokumen.note }}</p>
                </div>
              </div>
            </div>

            <div class="bg-yellow-50 border border-yellow-200 rounded-lg p-4">
              <div class="flex">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-5 w-5 text-yellow-400 mr-3 mt-0.5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.964-.833-2.732 0L3.732 16c-.77.833.192 2.5 1.732 2.5z" />
                </svg>
                <div>
                  <h6 class="font-medium text-yellow-800">Catatan Penting:</h6>
                  <ul class="text-sm text-yellow-700 mt-1 space-y-1">
                    <li>• Pastikan semua dokumen dalam format yang benar dan jelas terbaca</li>
                    <li>• Ukuran maksimal setiap file adalah 2MB</li>
                    <li>• Dokumen yang sudah diupload tidak dapat diubah setelah submit</li>
                  </ul>
                </div>
              </div>
            </div>
          </div>

          <!-- Navigation Buttons -->
          <div class="flex justify-between mt-8 pt-6 border-t border-gray-200">
            <button 
              type="button"
              @click="prevStep"
              v-if="currentStep > 1"
              class="px-6 py-3 border border-gray-300 text-gray-700 rounded-lg hover:bg-gray-50 font-medium transition-colors"
            >
              ← Sebelumnya
            </button>
            
            <div class="flex-1"></div>
            
            <button 
              v-if="currentStep < totalSteps"
              type="button"
              @click="nextStep"
              class="px-8 py-3 bg-[#0487E2] text-white rounded-lg hover:bg-[#0463CA] font-medium transition-colors"
            >
              <span class="text-white">Selanjutnya →</span>
            </button>
            
            <button 
              v-else
              type="submit"
              :disabled="isSubmitting"
              class="px-8 py-3 bg-green-600 text-white rounded-lg hover:bg-green-700 font-medium transition-colors disabled:opacity-50"
            >
              <span v-if="!isSubmitting" class="text-white">📝 Submit Pendaftaran</span>
              <span v-else class="text-white">⏳ Mengirim...</span>
            </button>
          </div>
        </form>
      </div>

      <!-- Success Modal -->
      <div 
        v-if="showSuccessModal" 
        class="fixed inset-0 bg-black/50 flex items-center justify-center z-50 p-4"
      >
        <div class="bg-white rounded-xl max-w-md w-full p-8 text-center">
          <div class="w-16 h-16 bg-green-100 rounded-full mx-auto mb-4 flex items-center justify-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8 text-green-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
              <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
            </svg>
          </div>
          
          <h3 class="text-xl font-bold text-gray-800 mb-2">Pendaftaran Berhasil!</h3>
          <p class="text-gray-600 mb-4">Terima kasih telah mendaftar di SMA 1 Lareh Sago Halaban.</p>
          
          <div class="bg-gray-50 rounded-lg p-4 mb-6">
            <p class="text-sm text-gray-600 mb-2">Nomor Pendaftaran Anda:</p>
            <p class="text-2xl font-bold text-[#0487E2]">{{ registrationNumber }}</p>
          </div>
          
          <p class="text-sm text-gray-600 mb-6">
            Simpan nomor pendaftaran ini untuk keperluan verifikasi dan tracking status pendaftaran.
          </p>
          
          <div class="flex flex-col gap-3">
            <button 
              @click="downloadReceipt"
              class="bg-[#0487E2] text-white px-6 py-3 rounded-lg font-medium hover:bg-[#0463CA] transition-colors"
            >
              <span class="text-white">📄 Download Bukti Pendaftaran</span>
            </button>
            <button 
              @click="resetForm"
              class="text-gray-600 hover:text-gray-800 transition-colors"
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
import { reactive, ref } from 'vue';

const currentStep = ref(1);
const totalSteps = 4;
const isSubmitting = ref(false);
const showSuccessModal = ref(false);
const registrationNumber = ref('');

const stepTitles = [
  'Data Pribadi Siswa',
  'Data Sekolah Asal', 
  'Data Orang Tua',
  'Jalur Pendaftaran & Upload Dokumen'
];

const formData = reactive({
  // Step 1: Data Pribadi
  nama_lengkap: '',
  nisn: '',
  tempat_lahir: '',
  tanggal_lahir: '',
  jenis_kelamin: '',
  agama: '',
  anak_ke: '',
  alamat: '',
  no_hp_siswa: '',
  email_siswa: '',
  
  // Step 2: Data Sekolah Asal
  asal_sekolah: '',
  npsn_asal: '',
  alamat_sekolah_asal: '',
  tahun_lulus: '',
  nilai_un: '',
  no_ijazah: '',
  
  // Step 3: Data Orang Tua
  nama_ayah: '',
  pekerjaan_ayah: '',
  pendidikan_ayah: '',
  penghasilan_ayah: '',
  nama_ibu: '',
  pekerjaan_ibu: '',
  no_hp_ortu: '',
  email_ortu: '',
  
  // Step 4: Jalur dan Upload
  jalur_pendaftaran: '',
  uploaded_files: {}
});

const jalurPendaftaran = ref([
  {
    value: 'zonasi',
    label: 'Jalur Zonasi',
    description: 'Berdasarkan jarak tempat tinggal ke sekolah',
    quota: '60 siswa (50%)'
  },
  {
    value: 'afirmasi',
    label: 'Jalur Afirmasi',
    description: 'Untuk keluarga tidak mampu dengan KIP/PKH',
    quota: '24 siswa (20%)'
  },
  {
    value: 'mutasi',
    label: 'Jalur Mutasi',
    description: 'Untuk anak guru/tenaga kependidikan',
    quota: '12 siswa (10%)'
  },
  {
    value: 'prestasi',
    label: 'Jalur Prestasi',
    description: 'Berdasarkan prestasi akademik/non-akademik',
    quota: '24 siswa (20%)'
  }
]);

const requiredDocuments = ref([
  {
    key: 'ijazah',
    label: 'Fotokopi Ijazah/SKHUN',
    accept: '.pdf,.jpg,.jpeg,.png',
    format: 'PDF, JPG, PNG (max 2MB)',
    note: 'Ijazah atau SKHUN yang sudah dilegalisir'
  },
  {
    key: 'kk',
    label: 'Fotokopi Kartu Keluarga',
    accept: '.pdf,.jpg,.jpeg,.png',
    format: 'PDF, JPG, PNG (max 2MB)',
    note: 'KK yang masih berlaku'
  },
  {
    key: 'akta_lahir',
    label: 'Fotokopi Akta Kelahiran',
    accept: '.pdf,.jpg,.jpeg,.png',
    format: 'PDF, JPG, PNG (max 2MB)',
    note: 'Akta kelahiran siswa'
  },
  {
    key: 'ktp_ortu',
    label: 'Fotokopi KTP Orang Tua',
    accept: '.pdf,.jpg,.jpeg,.png',
    format: 'PDF, JPG, PNG (max 2MB)',
    note: 'KTP ayah dan ibu yang masih berlaku'
  },
  {
    key: 'pas_foto',
    label: 'Pas Foto 3x4',
    accept: '.jpg,.jpeg,.png',
    format: 'JPG, PNG (max 2MB)',
    note: 'Foto berwarna dengan latar belakang merah'
  },
  {
    key: 'kartu_prestasi',
    label: 'Sertifikat Prestasi (jika ada)',
    accept: '.pdf,.jpg,.jpeg,.png',
    format: 'PDF, JPG, PNG (max 2MB)',
    note: 'Opsional: untuk jalur prestasi'
  }
]);

const nextStep = () => {
  if (validateCurrentStep()) {
    if (currentStep.value < totalSteps) {
      currentStep.value++;
    }
  }
};

const prevStep = () => {
  if (currentStep.value > 1) {
    currentStep.value--;
  }
};

const validateCurrentStep = () => {
  // Add validation logic here
  return true;
};

const handleFileUpload = (event, key) => {
  const file = event.target.files[0];
  if (file) {
    // Check file size (2MB limit)
    if (file.size > 2 * 1024 * 1024) {
      alert('Ukuran file terlalu besar. Maksimal 2MB.');
      event.target.value = '';
      return;
    }
    
    formData.uploaded_files[key] = file;
  }
};

const handleSubmit = async () => {
  if (!validateCurrentStep()) {
    return;
  }
  
  isSubmitting.value = true;
  
  try {
    // Simulate API call
    await new Promise(resolve => setTimeout(resolve, 2000));
    
    // Generate registration number
    registrationNumber.value = 'PPDB' + Date.now().toString().slice(-8);
    
    showSuccessModal.value = true;
  } catch (error) {
    alert('Terjadi kesalahan. Silakan coba lagi.');
  } finally {
    isSubmitting.value = false;
  }
};

const downloadReceipt = () => {
  // In a real app, this would generate and download a PDF receipt
  alert('Fitur download bukti pendaftaran akan segera tersedia.');
};

const resetForm = () => {
  showSuccessModal.value = false;
  currentStep.value = 1;
  Object.keys(formData).forEach(key => {
    if (key === 'uploaded_files') {
      formData[key] = {};
    } else {
      formData[key] = '';
    }
  });
};
</script>

<style scoped>
.line-clamp-2 {
  display: -webkit-box;
  -webkit-line-clamp: 2;
  -webkit-box-orient: vertical;
  overflow: hidden;
}
</style>
