<?php

use App\Http\Controllers\Admin\ParticipantsController;
use App\Http\Controllers\CertificatesController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\RoleMiddleware;

Route::get('/', function () {
    return view('home.home');
})->name('home.index');
// Route::get('/user', [UserController::class, 'index']);
// Route::get('/kontak', [ContactController::class, 'index']);


Route::get('/kontak', function () {
    return view('home.kontak');
})->name('kontak.index');

Route::get('/daftar', function () {
    return view('home.daftar');
})->name('daftar.index');

Route::get('/benefit', function () {
    return view('home.benefit');
})->name('benefit.index');

Route::get('/program', function () {
    return view('home.program');
})->name('program.index');

Route::get('/tentang', function () {
    return view('home.tentang');
})->name('tentang.index');

Route::get('/chatbot', function () {
    return view('home.chatbot');
})->name('chatbot.index');

Route::middleware(['auth', 'role:admin'])
    ->prefix('admin')
    ->name('admin.')
    ->group(function () {

    Route::resource('classes', ClassController::class);
    // Enroll peserta
    Route::post('classes/{id}/enroll',
        [ClassController::class, 'enrollStore'])
        ->name('classes.enroll.store');
    // Remove peserta
    Route::delete('classes/{id}/enroll',
        [ClassController::class, 'enrollRemove'])
        ->name('classes.enroll.remove');

    Route::resource('participants', ParticipantsController::class);
     Route::resource('certificates', CertificatesController::class);


    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/certificates', 'admin.certificates')->name('certificates');
    Route::view('/notifications', 'admin.notifications')->name('notifications');
    Route::view('/chatbot', 'admin.chatbot')->name('chatbot');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::middleware(['auth', 'role:user,member'])
    ->prefix('member')
    ->name('member.')
    ->group(function () {

    Route::get('/', function () {
        return view('member.index');
    })->name('index');

});
require __DIR__.'/auth.php';
