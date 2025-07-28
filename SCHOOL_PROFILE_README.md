# Fitur Profil Sekolah

## Deskripsi

Fitur ini memungkinkan administrator untuk mengelola informasi statis tentang profil sekolah, seperti Visi, Misi, Sejarah, dan Tujuan Pendidikan. Meskipun informasi ini bersifat statis, konten dapat diubah melalui panel admin.

## Implementasi

Fitur "Profil Sekolah" ini mencakup:

1. Struktur Database:

    - Model SchoolProfile
    - Migration for school_profiles table
    - Seeder with default content for Vision, Mission, History, and Educational Goals

2. Admin Panel:

    - SchoolProfileController for managing profiles
    - Admin views for listing and editing school profiles
    - Integration with existing SB Admin 2 template

3. Frontend:
    - Frontend controller to display school profiles
    - Blade views for Vision & Mission, History, and Educational Goals
    - Routes for accessing profile pages

### How to Set Up and Test

1. Run the migration to create the school_profiles table:

```
php artisan migrate
```

2. Run the seeder to populate initial profile data:

```
php artisan db:seed --class=SchoolProfileSeeder
```

3. Test the admin panel:

    - Login to the admin panel
    - Navigate to the "Profil Sekolah" menu in the sidebar
    - View and edit the school profiles

4. Test the frontend:
    - Visit `/profil/visi-misi` to see the Vision and Mission
    - Visit `/profil/sejarah` to see the School History
    - Visit `/profil/tujuan-pendidikan` to see Educational Goals

## Tipe Data yang Didukung

1. **Teks (is_array = false)**
    - Digunakan untuk konten panjang seperti Visi atau Sejarah Sekolah
    - Mendukung format HTML melalui CKEditor
2. **Array (is_array = true)**
    - Digunakan untuk daftar item seperti Misi atau Tujuan Pendidikan
    - Setiap item dapat berisi HTML
    - Item dapat ditambah atau dihapus secara dinamis

## Struktur Data

-   Setiap profil sekolah memiliki kunci unik (misalnya 'vision', 'mission', 'history', 'educational_goals')
-   Konten dapat berupa teks biasa atau array item (dikontrol oleh flag is_array)
-   Field order menentukan urutan tampilan di panel admin
