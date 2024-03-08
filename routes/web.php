<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ViController;
use Illuminate\Support\Facades\Route;
use App\Models\Vi;

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

// Route::get('/', function () {

//     return view('dashboard');
// })->middleware('auth')->name('/');

Route::get('/dashboard', function () {

    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

require __DIR__ . '/auth.php';



Route::middleware('auth')
    ->namespace('App\Http\Controllers')
    ->group(function () {
        Route::resources(['profile' => 'ProfileController']);
        Route::put('/profile', [ProfileController::class, 'updatePassword'])->name('profile.updatePassword');
        Route::resources(['users' => 'UserController']);
        Route::resources(['roles' => 'RoleController']);
        Route::resources(['permissions' => 'PermissionController']);
        Route::resources(['vis' => 'ViController']);
        Route::post('/vis', [ViController::class, 'update_vis'])->name('vis.update_vis');
        Route::get('/', [ViController::class, 'index'])->name('/');
    });
