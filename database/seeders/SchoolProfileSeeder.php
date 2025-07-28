<?php

namespace Database\Seeders;

use App\Models\SchoolProfile;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SchoolProfileSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Default School Profile Data
        $profiles = [
            [
                'key' => 'visi',
                'title' => 'Visi Sekolah',
                'content' => 'Mewujudkan SMA Negeri 1 Lareh Sago Halaban sebagai sekolah unggul yang menghasilkan lulusan berkarakter, berprestasi, berwawasan lingkungan, dan mampu bersaing di tingkat nasional dan global.',
                'is_array' => false,
                'order' => 1
            ],
            [
                'key' => 'misi',
                'title' => 'Misi Sekolah',
                'content' => [
                    'Menyelenggarakan pendidikan yang mengintegrasikan nilai-nilai karakter, kearifan lokal, dan kebangsaan.',
                    'Mengembangkan pembelajaran inovatif berbasis teknologi informasi dan komunikasi.',
                    'Meningkatkan prestasi akademik dan non-akademik siswa di tingkat kabupaten, provinsi, dan nasional.',
                    'Membangun kerjasama dengan berbagai pihak untuk pengembangan kualitas pendidikan.',
                    'Menciptakan lingkungan sekolah yang bersih, sehat, aman, dan nyaman.',
                    'Mengembangkan sistem manajemen sekolah yang transparan, akuntabel, dan partisipatif.'
                ],
                'is_array' => true,
                'order' => 2
            ],
            [
                'key' => 'tujuan',
                'title' => 'Tujuan Pendidikan',
                'content' => [
                    'Menghasilkan lulusan yang beriman, bertakwa, berakhlak mulia, dan memiliki karakter kuat sebagai generasi penerus bangsa.',
                    'Mencapai prestasi akademik dan non-akademik di tingkat kabupaten, provinsi, dan nasional.',
                    'Membekali siswa dengan keterampilan teknologi informasi dan komunikasi yang mampu bersaing di era global.',
                    'Mempersiapkan siswa untuk melanjutkan pendidikan ke perguruan tinggi berkualitas.',
                    'Menciptakan budaya sekolah yang berorientasi pada peningkatan mutu berkelanjutan.'
                ],
                'is_array' => true,
                'order' => 3
            ],
            [
                'key' => 'sejarah',
                'title' => 'Sejarah Sekolah',
                'content' => 'SMA Negeri 1 Lareh Sago Halaban didirikan pada tahun 1995 di Kabupaten Lima Puluh Kota. Awalnya sekolah ini hanya memiliki 3 kelas dengan jumlah siswa tidak lebih dari 90 orang. Seiring berjalannya waktu, SMA Negeri 1 Lareh Sago Halaban terus berkembang dan meningkatkan kualitas pendidikannya.

Pada tahun 2005, sekolah ini berhasil meraih akreditasi A dan terus mempertahankan prestasi tersebut hingga saat ini. Berbagai prestasi telah ditorehkan baik oleh para siswa maupun guru di berbagai bidang, seperti olimpiade sains, kompetisi olahraga, dan lomba kesenian.

Tahun 2015 menjadi tonggak penting ketika sekolah ini direnovasi secara besar-besaran dengan bantuan pemerintah daerah dan pusat. Fasilitas baru seperti laboratorium komputer, laboratorium IPA yang lengkap, dan perpustakaan digital mulai dibangun untuk mendukung proses pembelajaran yang lebih modern.

Kini, SMA Negeri 1 Lareh Sago Halaban telah menjadi salah satu sekolah unggulan di Kabupaten Lima Puluh Kota dengan prestasi yang terus meningkat dari tahun ke tahun, menghasilkan lulusan berkualitas yang banyak diterima di perguruan tinggi ternama di Indonesia.',
                'is_array' => false,
                'order' => 4
            ],
        ];

        // Insert all profiles
        foreach ($profiles as $profile) {
            SchoolProfile::create($profile);
        }
    }
}
