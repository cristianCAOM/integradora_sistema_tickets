<?php

use App\Http\Controllers\Profile\AvatarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\TechnicianController;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    if (auth()->user()->role == 'admin') {
        return view('admin.dashboard');
    } elseif (auth()->user()->role == 'technician') {
        return view('technician.dashboard');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::patch('/profile/avatar', [AvatarController::class, 'update'])->name('profile.avatar');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/auth/github', function () {
    return Socialite::driver('github')->redirect();
})->name('login.github');

Route::get('/auth/github/callback', function () {
    $githubUser = Socialite::driver('github')->user();

    // Buscar o crear el usuario en tu base de datos
    $user = User::updateOrCreate(
        ['email' => $githubUser->email],
        [
            'name' => $githubUser->name,
            'email' => $githubUser->email,
            'github_id' => $githubUser->id,
            'avatar' => $githubUser->avatar,
        ]
    );

    Auth::login($user);

    return redirect('/dashboard');
});

// Rutas para administrar usuarios y técnicos
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class)->except(['show']);
    Route::resource('categories', CategoryController::class); // Agrega las rutas para categorías
    Route::get('/tickets/pdf', [TicketController::class, 'generatePDF'])->name('tickets.pdf'); // Ruta para generar PDF

});

Route::middleware(['auth:technician'])->prefix('technician')->name('technician.')->group(function () {
    Route::get('/dashboard', [TechnicianController::class, 'dashboard'])->name('dashboard');
    Route::get('/tickets', [TechnicianController::class, 'tickets'])->name('tickets.index');
});

Route::middleware('auth')->group(function () {
    Route::resource('ticket', TicketController::class);
    Route::post('responses/{ticket}', [ResponseController::class, 'store'])->name('responses.store');
    Route::delete('responses/{response}', [ResponseController::class, 'destroy'])->name('responses.destroy');
});

Route::get('/tickets/pdf', [TicketController::class, 'generatePDF'])->name('tickets.pdf');
Route::get('/tickets/pdf/preview', [TicketController::class, 'previewPDF'])->name('tickets.pdf.preview');

// Rutas para autenticación con Google
Route::get('auth/google', [LoginController::class, 'redirectToGoogle'])->name('auth.google');
Route::get('auth/google/callback', [LoginController::class, 'handleGoogleCallback']);

// Ruta para logout
Route::post('logout', [LoginController::class, 'logout'])->name('logout');
