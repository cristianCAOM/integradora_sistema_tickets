<?php

use App\Http\Controllers\Profile\AvatarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TicketController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Laravel\Socialite\Facades\Socialite;
use App\Http\Controllers\Admin\UserController;

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
    return view('dashboard');
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

// Rutas para administrar usuarios
Route::middleware(['auth', 'admin'])->prefix('admin')->name('admin.')->group(function () {
    Route::resource('users', UserController::class)->only(['index', 'edit', 'update', 'destroy']);
});

Route::middleware('auth')->group(function () {
    Route::resource('ticket', TicketController::class);
});
