<template>
  <Head title="Tentang Sekolah" />
  
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
          <h1 class="text-4xl md:text-5xl font-bold mb-4">Tentang SMA Negeri 1 Lareh Sago Halaban</h1>
          <p class="text-xl text-white/90 max-w-3xl mx-auto">
            Mengenal lebih dekat sekolah unggul yang telah melahirkan generasi berkualitas dan berakhlak mulia
          </p>
        </div>
      </div>
      <div class="absolute bottom-0 left-0 right-0 h-16 bg-gradient-to-t from-gray-50 to-transparent"></div>
    </section>

    <!-- Quick Stats Section -->
    <section class="relative -mt-8 mb-16">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 50 },
            enter: { opacity: 1, y: 0, transition: { delay: 400 } }
          }"
          class="bg-white rounded-xl shadow-lg p-6"
        >
          <div class="grid grid-cols-2 md:grid-cols-4 divide-x divide-gray-100">
            <div v-for="(stat, index) in quickStats" :key="index" class="text-center p-4">
              <div class="text-3xl md:text-4xl font-bold text-[#0487E2] mb-2">{{ stat.value }}</div>
              <div class="text-sm md:text-base text-gray-600">{{ stat.label }}</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Sejarah Sekolah -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div class="grid md:grid-cols-2 gap-12 items-center">
          <div 
            v-motion="{
              initial: { opacity: 0, x: -50 },
              enter: { opacity: 1, x: 0, transition: { delay: 200 } }
            }"
          >
            <h2 class="text-3xl font-bold text-gray-800 mb-6">Sejarah Sekolah</h2>
            <div class="space-y-4 text-gray-600" v-html="schoolProfile.history || defaultHistory">
            </div>
          </div>
          <div 
            v-motion="{
              initial: { opacity: 0, x: 50 },
              enter: { opacity: 1, x: 0, transition: { delay: 400 } }
            }"
            class="relative"
          >
            <img 
              src="https://images.unsplash.com/photo-1523050854058-8df90110c9f1?ixlib=rb-4.0.3&auto=format&fit=crop&w=1000&q=80" 
              alt="Sejarah Sekolah" 
              class="rounded-lg shadow-lg"
            >
            <div class="absolute -bottom-6 -right-6 bg-[#0487E2] text-white p-4 rounded-lg shadow-lg">
              <div class="text-2xl font-bold">40+</div>
              <div class="text-sm">Tahun Berdiri</div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- Visi & Misi -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Visi & Misi</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Landasan filosofis yang mengarahkan seluruh aktivitas pendidikan di SMA Negeri 1 Lareh Sago Halaban
          </p>
        </div>

        <div class="grid md:grid-cols-2 gap-8">
          <!-- Visi -->
          <div 
            v-motion="{
              initial: { opacity: 0, x: -30 },
              enter: { opacity: 1, x: 0, transition: { delay: 400 } }
            }"
            class="bg-white rounded-xl shadow-lg p-8"
          >
            <div class="flex items-center mb-6">
              <div class="bg-[#0487E2] text-white p-3 rounded-full mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z" />
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z" />
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-800">Visi</h3>
            </div>
            <p class="text-gray-600 leading-relaxed">
              {{ schoolProfile.vision || "Terwujudnya SMA Negeri 1 Lareh Sago Halaban sebagai sekolah unggulan yang menghasilkan lulusan berkualitas, berakhlak mulia, berwawasan global, dan peduli lingkungan." }}
            </p>
          </div>

          <!-- Misi -->
          <div 
            v-motion="{
              initial: { opacity: 0, x: 30 },
              enter: { opacity: 1, x: 0, transition: { delay: 600 } }
            }"
            class="bg-white rounded-xl shadow-lg p-8"
          >
            <div class="flex items-center mb-6">
              <div class="bg-[#65C2F5] text-white p-3 rounded-full mr-4">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                </svg>
              </div>
              <h3 class="text-2xl font-bold text-gray-800">Misi</h3>
            </div>
            <ul class="space-y-3 text-gray-600">
              <li v-for="(item, i) in (schoolProfile.mission || defaultMission)" :key="i" class="flex items-start">
                <span class="text-[#0487E2] mr-2 mt-1">•</span>
                {{ item }}
              </li>
            </ul>
          </div>
        </div>
      </div>
    </section>

    <!-- Tujuan Pendidikan -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Tujuan Pendidikan</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Target capaian yang ingin diwujudkan melalui proses pendidikan di sekolah kami
          </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-4 gap-6">
          <div 
            v-for="(goal, index) in educationGoals" 
            :key="index"
            v-motion="{
              initial: { opacity: 0, y: 30 },
              enter: { opacity: 1, y: 0, transition: { delay: 200 + (index * 100) } }
            }"
            class="bg-gradient-to-br from-[#0487E2]/5 to-[#65C2F5]/5 rounded-xl p-6 border border-[#0487E2]/10 hover:shadow-lg transition-shadow"
          >
            <div class="text-[#0487E2] mb-4" v-html="goal.icon"></div>
            <h3 class="font-bold text-gray-800 mb-3">{{ goal.title }}</h3>
            <p class="text-gray-600 text-sm">{{ goal.description }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Struktur Organisasi -->
    <section class="py-16 bg-gray-50">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Struktur Organisasi</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Struktur kepemimpinan dan organisasi sekolah yang mendukung tercapainya visi dan misi
          </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div 
            v-for="(staff, index) in organizationStructure" 
            :key="index"
            v-motion="{
              initial: { opacity: 0, scale: 0.9 },
              enter: { opacity: 1, scale: 1, transition: { delay: 200 + (index * 100) } }
            }"
            class="bg-white rounded-xl shadow-lg p-6 text-center hover:shadow-xl transition-shadow"
          >
            <div class="w-20 h-20 bg-gradient-to-br from-[#0487E2] to-[#65C2F5] rounded-full mx-auto mb-4 flex items-center justify-center text-white text-2xl font-bold">
              {{ staff.name.charAt(0) }}
            </div>
            <h3 class="font-bold text-gray-800 mb-2">{{ staff.name }}</h3>
            <p class="text-[#0487E2] font-medium mb-2">{{ staff.position }}</p>
            <p class="text-gray-600 text-sm">{{ staff.education }}</p>
          </div>
        </div>
      </div>
    </section>

    <!-- Fasilitas -->
    <section class="py-16 bg-white">
      <div class="container mx-auto px-4">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
          class="text-center mb-12"
        >
          <h2 class="text-3xl font-bold text-gray-800 mb-4">Fasilitas Sekolah</h2>
          <p class="text-gray-600 max-w-2xl mx-auto">
            Berbagai fasilitas modern dan lengkap untuk mendukung proses pembelajaran yang optimal
          </p>
        </div>

        <div class="grid md:grid-cols-2 lg:grid-cols-3 gap-6">
          <div 
            v-for="(facility, index) in facilities" 
            :key="index"
            v-motion="{
              initial: { opacity: 0, y: 30 },
              enter: { opacity: 1, y: 0, transition: { delay: 200 + (index * 100) } }
            }"
            class="bg-gradient-to-br from-gray-50 to-white rounded-xl shadow-lg overflow-hidden hover:shadow-xl transition-shadow"
          >
            <img :src="facility.image" :alt="facility.name" class="w-full h-48 object-cover">
            <div class="p-6">
              <h3 class="font-bold text-gray-800 mb-2">{{ facility.name }}</h3>
              <p class="text-gray-600 text-sm mb-3">{{ facility.description }}</p>
              <div class="flex items-center text-[#0487E2] text-sm">
                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 mr-1" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
                <span>{{ facility.status }}</span>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

    <!-- CTA Section -->
    <section class="py-16 bg-gradient-to-r from-[#0487E2] to-[#65C2F5] text-white">
      <div class="container mx-auto px-4 text-center">
        <div 
          v-motion="{
            initial: { opacity: 0, y: 30 },
            enter: { opacity: 1, y: 0, transition: { delay: 200 } }
          }"
        >
          <h2 class="text-3xl font-bold mb-4">Bergabunglah dengan Keluarga Besar SMA LSH</h2>
          <p class="text-xl text-white/90 mb-8 max-w-2xl mx-auto">
            Wujudkan cita-cita dan raih prestasi terbaik bersama kami
          </p>
          <div class="flex flex-wrap justify-center gap-4">
            <a href="/ppdb" class="bg-white text-[#0487E2] px-8 py-3 rounded-lg font-semibold hover:bg-gray-100 hover:text-[#0487E2] transition-colors">
              <span class="text-[#0487E2]">Daftar Sekarang</span>
            </a>
            <a href="/kontak" class="border-2 border-white text-white px-8 py-3 rounded-lg font-semibold hover:bg-white hover:text-[#0487E2] transition-colors">
              <span class="text-white hover:text-[#0487E2]">Hubungi Kami</span>
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
import SchoolFooter from '@/Components/SchoolFooter.vue';
import SchoolHeader from '@/Components/SchoolHeader.vue';
import { Head } from '@inertiajs/vue3';
import { onMounted, ref } from 'vue';

// Define props for school profile data
const props = defineProps({
  schoolProfile: {
    type: Object,
    default: () => ({
      vision: null,
      mission: null,
      history: null,
      goals: null
    })
  }
});

// Quick Stats
const quickStats = ref([
  { value: '350+', label: 'Total Siswa' },
  { value: '32', label: 'Tenaga Pengajar' },
  { value: '15', label: 'Rombongan Belajar' },
  { value: 'A', label: 'Akreditasi' }
]);

// Education Goals
// Default education goals if none provided from backend
const defaultEducationGoals = [
  {
    title: 'Akademik Unggul',
    description: 'Meraih prestasi akademik terbaik dengan metode pembelajaran inovatif',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>'
  },
  {
    title: 'Karakter Mulia',
    description: 'Membentuk pribadi yang berakhlak mulia dan berkarakter kuat',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>'
  },
  {
    title: 'Kreativitas',
    description: 'Mengembangkan daya kreativitas dan inovasi siswa',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>'
  },
  {
    title: 'Wawasan Global',
    description: 'Mempersiapkan siswa dengan wawasan dan kompetensi global',
    icon: '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
  }
];

// Dynamic education goals (or fallback to default)
const educationGoals = ref([]);

// Initialize education goals based on props or default
onMounted(() => {
  if (props.schoolProfile && props.schoolProfile.goals && Array.isArray(props.schoolProfile.goals)) {
    // If we have data from backend, map each goal to an object with title and description
    educationGoals.value = props.schoolProfile.goals.map((goal, index) => {
      // Cycle through the icons for each goal
      const icons = [
        '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C20.832 18.477 19.246 18 17.5 18c-1.746 0-3.332.477-4.5 1.253" /></svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.318 6.318a4.5 4.5 0 000 6.364L12 20.364l7.682-7.682a4.5 4.5 0 00-6.364-6.364L12 7.636l-1.318-1.318a4.5 4.5 0 00-6.364 0z" /></svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z" /></svg>',
        '<svg xmlns="http://www.w3.org/2000/svg" class="h-8 w-8" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z" /></svg>'
      ];
      
      // Split the goal by ":" if it contains one to separate title from description
      const parts = goal.split(':');
      if (parts.length > 1) {
        return {
          title: parts[0].trim(),
          description: parts[1].trim(),
          icon: icons[index % icons.length]
        };
      } else {
        return {
          title: `Tujuan ${index + 1}`,
          description: goal,
          icon: icons[index % icons.length]
        };
      }
    });
  } else {
    // Fallback to default goals
    educationGoals.value = defaultEducationGoals;
  }
});

// Default text for mission if none provided
const defaultMission = [
  'Menyelenggarakan pendidikan yang berkualitas dan inovatif',
  'Membentuk karakter siswa yang berakhlak mulia dan bermoral tinggi',
  'Mengembangkan potensi siswa secara optimal dan berkelanjutan',
  'Menciptakan lingkungan sekolah yang kondusif dan ramah lingkungan'
];

// Default history if none provided
const defaultHistory = `
  <p>
    SMA Negeri 1 Lareh Sago Halaban didirikan pada tahun 1985 dengan visi menjadi sekolah unggulan 
    di Kabupaten Limapuluh Kota. Berawal dari sebuah sekolah kecil dengan 3 kelas dan 45 siswa, 
    kini telah berkembang menjadi salah satu sekolah terbaik di Sumatera Barat.
  </p>
  <p>
    Dengan dukungan pemerintah daerah dan partisipasi masyarakat yang tinggi, sekolah ini terus 
    mengalami perkembangan pesat baik dari segi infrastruktur, kualitas pendidikan, maupun prestasi 
    akademik dan non-akademik.
  </p>
  <p>
    Pada tahun 2010, sekolah meraih akreditasi A dan terus mempertahankan standar kualitas tinggi 
    hingga saat ini. Berbagai prestasi di tingkat kabupaten, provinsi, hingga nasional telah 
    diraih oleh siswa-siswi kami.
  </p>
`;

// Organization Structure
const organizationStructure = ref([
  {
    name: 'Drs. Ahmad Fauzi, M.Pd',
    position: 'Kepala Sekolah',
    education: 'S2 Manajemen Pendidikan'
  },
  {
    name: 'Dra. Siti Aminah, M.Pd',
    position: 'Wakil Kepala Sekolah Kurikulum',
    education: 'S2 Teknologi Pendidikan'
  },
  {
    name: 'Drs. Bambang Susilo',
    position: 'Wakil Kepala Sekolah Kesiswaan',
    education: 'S1 Pendidikan Olahraga'
  },
  {
    name: 'Hj. Nurlela, S.Pd, M.M',
    position: 'Wakil Kepala Sekolah Sarana Prasarana',
    education: 'S2 Manajemen'
  },
  {
    name: 'Drs. Irwan Syahputra',
    position: 'Wakil Kepala Sekolah Humas',
    education: 'S1 Pendidikan Bahasa Indonesia'
  },
  {
    name: 'Yuni Astuti, S.Pd',
    position: 'Kepala Tata Usaha',
    education: 'S1 Administrasi Pendidikan'
  }
]);

// Facilities
const facilities = ref([
  {
    name: 'Laboratorium Komputer',
    description: 'Lab komputer modern dengan 40 unit PC dan akses internet berkecepatan tinggi',
    image: 'https://images.unsplash.com/photo-1560472354-b33ff0c44a43?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    status: 'Beroperasi'
  },
  {
    name: 'Laboratorium IPA',
    description: 'Laboratorium fisika, kimia, dan biologi dengan peralatan lengkap dan modern',
    image: 'https://images.unsplash.com/photo-1582719471384-894fbb16e074?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    status: 'Beroperasi'
  },
  {
    name: 'Perpustakaan',
    description: 'Perpustakaan dengan koleksi 5000+ buku dan ruang baca yang nyaman',
    image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    status: 'Beroperasi'
  },
  {
    name: 'Aula Serbaguna',
    description: 'Aula dengan kapasitas 500 orang untuk berbagai kegiatan sekolah',
    image: 'https://images.unsplash.com/photo-1475721027785-f74eccf877e2?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    status: 'Beroperasi'
  },
  {
    name: 'Lapangan Olahraga',
    description: 'Lapangan basket, voli, dan futsal untuk aktivitas olahraga siswa',
    image: 'https://images.unsplash.com/photo-1571019613454-1cb2f99b2d8b?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    status: 'Beroperasi'
  },
  {
    name: 'Kantin Sekolah',
    description: 'Kantin bersih dan sehat dengan berbagai menu makanan bergizi',
    image: 'https://images.unsplash.com/photo-1555396273-367ea4eb4db5?ixlib=rb-4.0.3&auto=format&fit=crop&w=600&q=80',
    status: 'Beroperasi'
  }
]);
</script>

<style scoped>
/* Custom styles if needed */
</style>
