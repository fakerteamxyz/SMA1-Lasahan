<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('School/Home');
})->name('home');

Route::get('/tentang', function () {
    return Inertia::render('School/About');
})->name('about');

Route::get('/akademik', function () {
    return Inertia::render('School/Academic');
})->name('academic');

Route::get('/pengumuman', function () {
    return Inertia::render('School/Announcements', [
        'announcements' => \App\Models\Announcement::published()->active()->orderBy('announcement_date', 'desc')->get()
    ]);
})->name('announcements');

Route::get('/ekskul', function () {
    return Inertia::render('School/Extracurricular');
})->name('extracurricular');

Route::get('/galeri', function () {
    return Inertia::render('School/Gallery');
})->name('gallery');

Route::get('/kontak', function () {
    return Inertia::render('School/Contact');
})->name('contact');

Route::get('/ppdb', function () {
    return Inertia::render('School/PPDB');
})->name('ppdb');

Route::get('/motion-example', function () {
    return Inertia::render('MotionExample', [
        'title' => 'VueUse Motion Example'
    ]);
})->name('motion.example');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
