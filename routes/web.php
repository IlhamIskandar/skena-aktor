<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ClassController;
use Illuminate\Support\Facades\Route;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::middleware(['auth'])
    ->prefix('admin')
    ->name('admin.') // penting supaya route resource memiliki prefix nama admin.*
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


    Route::view('/dashboard', 'admin.dashboard')->name('dashboard');
    Route::view('/participants', 'admin.participants')->name('participants');
    Route::view('/certificates', 'admin.certificates')->name('certificates');
    Route::view('/notifications', 'admin.notifications')->name('notifications');
    Route::view('/chatbot', 'admin.chatbot')->name('chatbot');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

});


Route::/*middleware(['auth'])->*/prefix('member')->group(function () {

Route::get('/', function () {
    return view('member.index');
})->name('member.index');

});
require __DIR__.'/auth.php';
