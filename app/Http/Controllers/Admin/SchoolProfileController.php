<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Artisan;

class SchoolProfileController extends Controller
{
    /**
     * Display the school profile.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all profiles sorted by order
        $profiles = SchoolProfile::orderBy('order')->get();

        // Debug info
        $debugInfo = [
            'count' => $profiles->count(),
            'isEmpty' => $profiles->isEmpty(),
        ];

        // Coba tampilan sederhana jika ada masalah dengan template utama
        try {
            // Jika data kosong, tambahkan pesan debug
            if ($profiles->isEmpty()) {
                return view('admin.school-profile.simple-index', [
                    'profiles' => $profiles,
                    'debug_message' => 'Tidak ada data profil sekolah yang ditemukan di database.',
                    'debug_info' => $debugInfo
                ]);
            }

            // Coba render dengan template utama
            return view('admin.school-profile.simple-index', compact('profiles', 'debugInfo'));
        } catch (\Throwable $e) {
            // Jika gagal, gunakan tampilan alternatif
            return view('admin.school-profile.simple-index', [
                'profiles' => $profiles,
                'error_message' => 'Terjadi kesalahan: ' . $e->getMessage(),
                'debug_info' => $debugInfo
            ]);
        }
    }

    /**
     * Show the form for editing a specific profile item.
     *
     * @param  string  $key
     * @return \Illuminate\Http\Response
     */
    public function edit($key)
    {
        $profile = SchoolProfile::where('key', $key)->firstOrFail();

        return view('admin.school-profile.edit', compact('profile'));
    }

    /**
     * Update the specified profile in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  string  $key
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $key)
    {
        $profile = SchoolProfile::where('key', $key)->firstOrFail();

        $rules = [
            'title' => 'required|string|max:255',
        ];

        if ($profile->is_array) {
            $rules['content'] = 'required|array';
            $rules['content.*'] = 'required|string';
        } else {
            $rules['content'] = 'required|string';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = [
            'title' => $request->title,
        ];

        if ($profile->is_array) {
            // Filter empty values from array
            $data['content'] = array_filter($request->content, function ($item) {
                return !empty(trim($item));
            });
            // Reset array keys
            $data['content'] = array_values($data['content']);
        } else {
            $data['content'] = $request->content;
        }

        $profile->update($data);

        return redirect()->route('admin.school-profile.index')
            ->with('success', 'Profil sekolah berhasil diperbarui.');
    }

    /**
     * Reset and recreate all school profile data.
     *
     * @return \Illuminate\Http\Response
     */
    public function reset()
    {
        try {
            // Hapus semua data lama
            SchoolProfile::truncate();

            // Jalankan seeder untuk membuat data baru
            Artisan::call('db:seed', [
                '--class' => 'Database\\Seeders\\SchoolProfileSeeder',
                '--force' => true
            ]);

            return redirect()->route('admin.school-profile.index')
                ->with('success', 'Data profil sekolah berhasil direset dan dibuat ulang.');
        } catch (\Exception $e) {
            return redirect()->route('admin.school-profile.index')
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
