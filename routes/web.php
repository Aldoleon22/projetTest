<?php

use App\Http\Controllers\PostController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InscriptionController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
// route users
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('users.create');
Route::post('/users', [UserController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
// fin route users




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
     if (auth()->user()->role === 'admin') {
    return view('dashboardAdmin');
} else {
    return view('dashboard');
}

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('test',[InscriptionController::class, 'test'])->name('test');
});

require __DIR__.'/auth.php';



// route insertion
route::post('insertion',[PostController::class,'InsertVehicule'])->name('insert');
// Afficher le formulaire d'inscription
Route::get('/inscription', [InscriptionController::class, 'showRegistrationForm'])->name('inscription');

// Gérer la soumission du formulaire d'inscription
Route::post('/inscription', [RegisterController::class, 'register'])->name('register');



