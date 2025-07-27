<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SuperAdminController;
use Illuminate\Support\Facades\Auth;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $user = Auth::user();
    if ($user->role === 'super_admin') {
        return redirect()->route('superadmin.dashboard');
    } elseif ($user->role === 'admin_empresa') {
        return redirect()->route('adminempresa.dashboard'); 
    } elseif ($user->role === 'mecanico') {
        return redirect()->route('mecanico.dashboard');
    } elseif ($user->role === 'operador') {
        return redirect()->route('operador.dashboard');
    }

    // Default fallback
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// Admin Empresa
Route::middleware(['auth', 'role:super_admin'])->prefix('superadmin')->name('superadmin.')->group(function () {
    Route::get('/dashboard', [SuperAdminController::class, 'index'])->name('dashboard');
    Route::get('/usuarios/crear', [SuperAdminController::class, 'createUser'])->name('usuarios.crear');
    Route::post('/usuarios/guardar', [SuperAdminController::class, 'storeUser'])->name('usuarios.guardar');
});
Route::middleware(['auth', 'role:super_admin'])->get('/dashboard-super', function () {
    return view('superadmin.dashboard');
})->name('superadmin.dashboard');
//  Admin Empresa
 Route::middleware(['auth', 'verified', 'role:admin_empresa'])->group(function () {
     Route::get('/adminempresa/dashboard', function () {
         return view('adminempresa.dashboard');
     })->name('adminempresa.dashboard');
 });

// Mecánico
Route::middleware(['auth', 'verified', 'role:mecanico'])->group(function () {
    Route::get('/mecanico/dashboard', function () {
        return view('mecanico.dashboard');
    })->name('mecanico.dashboard');
});

// Operador
Route::middleware(['auth', 'verified', 'role:operador'])->group(function () {
    Route::get('/operador/dashboard', function () {
        return view('operador.dashboard');
    })->name('operador.dashboard');
});

require __DIR__ . '/auth.php';