<?php

use App\Http\Controllers\Admin\AdminAuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\LowonganController as AdminLowonganController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\PasswordController;
use App\Http\Controllers\Auth\RegisteredUserController;
use App\Http\Controllers\LamaranController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\LowonganController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [LandingController::class, 'index'])->name('landing');

Route::get('/dashboard', function () {
    return view('dashboard');
})
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
    Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::post('/profile/update', [ProfileController::class, 'update'])->name('profile.update');
    Route::post('/profile/delete', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::post('/kandidat/update-avatar', [ProfileController::class, 'updateAvatar'])->name('kandidat.update.avatar');
    Route::get('/kandidat/avatar/{id}', [ProfileController::class, 'showAvatar'])->name('kandidat.avatar');
    Route::get('/kandidat/{id}/pendidikan/data', [ProfileController::class, 'dataPendidikan'])->name('kandidat.pendidikan.data');
    Route::get('/kandidat/{id}/pekerjaan/data', [ProfileController::class, 'data'])->name('kandidat.pekerjaan.data');
    Route::post('/kandidat/pendidikan/store', [ProfileController::class, 'storePendidikan'])->name('kandidat.pendidikan.store');
    Route::post('/kandidat/pekerjaan/store', [ProfileController::class, 'storePekerjaan'])->name('kandidat.pekerjaan.store');
    Route::delete('kandidat/pekerjaan/{id}', [ProfileController::class, 'destroyPekerjaan'])->name('pekerjaan.destroy');
    Route::delete('kandidat/pendidikan/{id}', [ProfileController::class, 'destroyPendidikan'])->name('pendidikan.destroy');
    Route::post('/kandidat/update-avatar', [ProfileController::class, 'updateAvatar'])->name('kandidat.update.avatar');
    Route::post('/upload-cv', [ProfileController::class, 'uploadCV'])->name('cv.upload');
    Route::get('/cv/{id}/preview', [ProfileController::class, 'previewCV'])->name('cv.preview');
    Route::delete('/cv/{id}', [ProfileController::class, 'destroyCV'])->name('cv.destroy');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('lamaran', [LamaranController::class, 'index'])->name('lamaran');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('lowongan', [LowonganController::class, 'index'])->name('lowongan');
});

Route::post('/register', [RegisteredUserController::class, 'store'])->middleware(['guest', 'throttle:5,1']); // 5 kali per menit

// LOGIN route
Route::post('/login', [AuthenticatedSessionController::class, 'store'])->middleware(['guest', 'throttle:5,1']);

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/lowongan', [AdminLowonganController::class, 'index'])->name('admin.lowongan');
    Route::get('/admin/lowongan/data', [AdminLowonganController::class, 'dataLowongan'])->name('admin.lowongan.data');
    Route::get('/admin/lowongan/edit/{id}', [AdminLowonganController::class, 'editLowongan'])->name('admin.lowongan.edit');
    Route::post('/admin/lowongan', [AdminLowonganController::class, 'storeLowongan'])->name('admin.lowongan.store');
    Route::put('/admin/lowongan/update/{id}', [AdminLowonganController::class, 'updateLowongan'])->name('admin.lowongan.update');
    Route::delete('admin/lowongan/destroy/{id}', [AdminLowonganController::class, 'destroyLowongan'])->name('admin.lowongan.destroy');
    Route::post('admin/lowongan/restore/{id}', [AdminLowonganController::class, 'restoreLowongan'])->name('admin.lowongan.restore');
    Route::delete('/lowongan/force-delete/{id}', [AdminLowonganController::class, 'forceDelete'])
    ->name('admin.lowongan.forceDelete');
    Route::patch('/admin/lowongan/{id}/toggle', [AdminLowonganController::class, 'toggleStatus'])
    ->name('admin.lowongan.toggle');


});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/departments', [AdminLowonganController::class, 'indexDepartment'])->name('admin.departments');
    Route::post('/admin/departments', [AdminLowonganController::class, 'storeDepartment'])->name('admin.departments');
    Route::put('/admin/departments/{id}', [AdminLowonganController::class, 'updateDepartment'])->name('admin.departments.update');
    Route::get('/admin/departments/data', [AdminLowonganController::class, 'dataDepartment'])->name('admin.departments.data');
    Route::get('/admin/departments/{id}', [AdminLowonganController::class, 'editDepartment'])->name('admin.departments.edit');
    Route::delete('/admin/departments/{id}', [AdminLowonganController::class, 'destroyDepartment'])->name('admin.departments.destroy');
});

Route::middleware(['auth:admin'])->group(function () {
    Route::get('/admin/kategori', [AdminLowonganController::class, 'indexKategori'])->name('admin.kategori');
    Route::post('/admin/kategori', [AdminLowonganController::class, 'storeKategori'])->name('admin.kategori');
    Route::put('/admin/kategori/{id}', [AdminLowonganController::class, 'updateKategori'])->name('admin.kategori.update');
    Route::get('/admin/kategori/data', [AdminLowonganController::class, 'dataKategori'])->name('admin.kategori.data');
    Route::get('/admin/kategori/{id}', [AdminLowonganController::class, 'editKategori'])->name('admin.kategori.edit');
    Route::delete('/admin/kategori/{id}', [AdminLowonganController::class, 'destroyKategori'])->name('admin.kategori.destroy');
});

Route::middleware('auth')->group(function () {
    Route::get('/change-password', [PasswordController::class, 'edit'])->name('password.edit');
    Route::post('/change-password', [PasswordController::class, 'update'])->name('password.update');
});

Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');







require __DIR__ . '/auth.php';
