<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Announcement;
use Carbon\Carbon;

class AnnouncementSeeder extends Seeder
{
    /**
     * Run the database seeder.
     */
    public function run(): void
    {
        $announcements = [
            [
                'title' => 'Pengumuman Ujian Akhir Semester Ganjil 2024/2025',
                'content' => 'Dengan hormat, kami sampaikan bahwa Ujian Akhir Semester Ganjil Tahun Pelajaran 2024/2025 akan dilaksanakan pada tanggal 26-30 Juli 2025. Siswa diharapkan mempersiapkan diri dengan baik dan membawa alat tulis lengkap serta kartu ujian.',
                'category' => 'ujian',
                'priority' => 'high',
                'announcement_date' => Carbon::now()->subDays(5),
                'valid_until' => Carbon::now()->addDays(10),
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Libur Idul Adha 1446 H',
                'content' => 'Sehubungan dengan Hari Raya Idul Adha 1446 H, maka kegiatan belajar mengajar diliburkan pada tanggal 17-19 Juni 2025. Kegiatan belajar mengajar akan dimulai kembali pada hari Senin, 23 Juni 2025.',
                'category' => 'libur',
                'priority' => 'normal',
                'announcement_date' => Carbon::now()->subDays(3),
                'valid_until' => Carbon::create(2025, 6, 23),
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Pendaftaran Peserta Didik Baru (PPDB) Tahun Ajaran 2025/2026',
                'content' => 'Pendaftaran Peserta Didik Baru (PPDB) untuk Tahun Ajaran 2025/2026 telah dibuka. Pendaftaran dapat dilakukan secara online melalui website resmi sekolah. Kuota yang tersedia sebanyak 120 siswa dengan tiga jalur pendaftaran: Zonasi (60%), Afirmasi (20%), dan Prestasi (20%).',
                'category' => 'ppdb',
                'priority' => 'urgent',
                'announcement_date' => Carbon::now()->subDays(1),
                'valid_until' => Carbon::create(2025, 7, 31),
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Kegiatan Masa Orientasi Siswa (MOS) 2025',
                'content' => 'Kegiatan Masa Orientasi Siswa (MOS) untuk siswa baru Tahun Ajaran 2025/2026 akan dilaksanakan pada tanggal 15-17 Juli 2025. Kegiatan ini bertujuan untuk memperkenalkan lingkungan sekolah, peraturan, dan kegiatan ekstrakurikuler kepada siswa baru.',
                'category' => 'kegiatan',
                'priority' => 'high',
                'announcement_date' => Carbon::now(),
                'valid_until' => Carbon::create(2025, 7, 17),
                'is_published' => true,
                'is_featured' => true,
            ],
            [
                'title' => 'Pembagian Rapor Semester Ganjil 2024/2025',
                'content' => 'Pembagian rapor semester ganjil akan dilaksanakan pada hari Rabu, 30 Juli 2025, pukul 08.00-11.00 WIB. Orang tua/wali siswa diharapkan hadir untuk mengambil rapor di ruang kelas masing-masing. Bagi yang berhalangan hadir dapat mewakilkan kepada keluarga dengan membawa surat kuasa.',
                'category' => 'kegiatan',
                'priority' => 'high',
                'announcement_date' => Carbon::now()->addDays(2),
                'valid_until' => Carbon::create(2025, 7, 30),
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Workshop Pembelajaran Digital untuk Guru',
                'content' => 'Dalam rangka meningkatkan kualitas pembelajaran, akan diadakan workshop pembelajaran digital untuk seluruh guru pada tanggal 5 Agustus 2025. Workshop ini akan membahas penggunaan teknologi dalam pembelajaran dan platform e-learning.',
                'category' => 'kegiatan',
                'priority' => 'normal',
                'announcement_date' => Carbon::now()->addDays(5),
                'valid_until' => Carbon::create(2025, 8, 5),
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Penerimaan Beasiswa Prestasi Akademik',
                'content' => 'Sekolah membuka kesempatan bagi siswa berprestasi untuk mendapatkan beasiswa prestasi akademik. Syarat dan ketentuan dapat dilihat di website sekolah atau menghubungi bagian kesiswaan. Pendaftaran dibuka hingga 15 Agustus 2025.',
                'category' => 'umum',
                'priority' => 'normal',
                'announcement_date' => Carbon::now()->addDays(1),
                'valid_until' => Carbon::create(2025, 8, 15),
                'is_published' => true,
                'is_featured' => false,
            ],
            [
                'title' => 'Pelaksanaan Upacara Peringatan HUT RI ke-80',
                'content' => 'Dalam rangka memperingati HUT RI ke-80, akan dilaksanakan upacara bendera pada hari Sabtu, 17 Agustus 2025, pukul 07.00 WIB di lapangan sekolah. Seluruh siswa, guru, dan karyawan wajib mengikuti upacara dengan mengenakan seragam putih-merah.',
                'category' => 'kegiatan',
                'priority' => 'high',
                'announcement_date' => Carbon::now()->addDays(10),
                'valid_until' => Carbon::create(2025, 8, 17),
                'is_published' => true,
                'is_featured' => false,
            ],
        ];

        foreach ($announcements as $announcement) {
            Announcement::create($announcement);
        }
    }
}
