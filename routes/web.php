<?php
use App\Http\Controllers\TaskController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // Si déjà connecté, aller directement aux tâches
    if (auth()->check()) {
        return redirect()->route('tasks.index');
    }
    
    // Sinon, afficher la page d'accueil
    return view('home');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Groupe de routes protégées pour les tâches
Route::middleware(['auth'])->group(function () {
    Route::resource('tasks', TaskController::class);
    // Ici, nous ajouterons nos routes de gestion des tâches
    
});

// Charge toutes les routes d'authentification (login, register, logout...)

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
