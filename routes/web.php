<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\SchoolProfileController;
use App\Http\Controllers\Admin\SchoolProfileController as AdminSchoolProfileController;
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
    // Get all school profile data
    $vision = \App\Models\SchoolProfile::where('key', 'visi')->first();
    $mission = \App\Models\SchoolProfile::where('key', 'misi')->first();
    $history = \App\Models\SchoolProfile::where('key', 'sejarah')->first();
    $goals = \App\Models\SchoolProfile::where('key', 'tujuan')->first();

    return Inertia::render('School/About', [
        'schoolProfile' => [
            'vision' => $vision ? $vision->content : null,
            'mission' => $mission ? $mission->content : null,
            'history' => $history ? $history->content : null,
            'goals' => $goals ? $goals->content : null,
        ]
    ]);
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

// Admin Login Route
Route::get('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'loginForm'])->name('admin.login');
Route::post('/admin/login', [App\Http\Controllers\Admin\AuthController::class, 'login'])->name('admin.login.post');

// School Profile Routes

Route::get('/motion-example', function () {
    return Inertia::render('MotionExample', [
        'title' => 'VueUse Motion Example'
    ]);
})->name('motion.example');

// School Profile Routes
Route::get('/profil/visi-misi', [SchoolProfileController::class, 'visionMission'])->name('profile.vision-mission');
Route::get('/profil/sejarah', [SchoolProfileController::class, 'history'])->name('profile.history');
Route::get('/profil/tujuan-pendidikan', [SchoolProfileController::class, 'educationalGoals'])->name('profile.goals');
Route::get('/profil/{key}', [SchoolProfileController::class, 'show'])->name('profile.show');

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Admin Routes
Route::prefix('admin')->name('admin.')->middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        return view('admin.dashboard');
    })->name('dashboard');

    // School Profile Management
    Route::get('/school-profile', [AdminSchoolProfileController::class, 'index'])->name('school-profile.index');
    Route::get('/school-profile/{key}/edit', [AdminSchoolProfileController::class, 'edit'])->name('school-profile.edit');
    Route::put('/school-profile/{key}', [AdminSchoolProfileController::class, 'update'])->name('school-profile.update');
    Route::post('/school-profile/reset', [AdminSchoolProfileController::class, 'reset'])->name('school-profile.reset');
});

require __DIR__ . '/auth.php';
