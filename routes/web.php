<?php

use App\Http\Controllers\ContactController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('home.welcome');
});
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

Route::middleware(['auth'])->prefix('admin')->group(function () {
    // Route::get('/dashboard', function () {
    //     return view('dashboard');
    // })->name('admin.dashboard');
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/participants', fn() => view('admin.participants'))->name('admin.participants');
    Route::get('/classes', fn() => view('admin.classes'))->name('admin.classes');
    Route::get('/certificates', fn() => view('admin.certificates'))->name('admin.certificates');
    Route::get('/notifications', fn() => view('admin.notifications'))->name('admin.notifications');
    Route::get('/chatbot', fn() => view('admin.chatbot'))->name('admin.chatbot');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', fn() => view('admin.dashboard'))->name('admin.dashboard');
    Route::get('/participants', fn() => view('admin.participants'))->name('admin.participants');
    Route::get('/classes', fn() => view('admin.classes'))->name('admin.classes');
    Route::get('/certificates', fn() => view('admin.certificates'))->name('admin.certificates');
    Route::get('/notifications', fn() => view('admin.notifications'))->name('admin.notifications');
    Route::get('/chatbot', fn() => view('admin.chatbot'))->name('admin.chatbot');

});


require __DIR__.'/auth.php';
