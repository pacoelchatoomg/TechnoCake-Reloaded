<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductoController;
 
Route::get('/', function () {
    return view('welcome');
});
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
 
    Route::controller(ProductoController::class)->prefix('producto')->group(function () {
        Route::get('', 'index')->name('producto');
        Route::get('create', 'create')->name('producto.create');
        Route::post('store', 'store')->name('producto.store');
        Route::get('show/{id}', 'show')->name('producto.show');
        Route::get('edit/{id}', 'edit')->name('producto.edit');
        Route::patch('edit/{id}', 'update')->name('producto.update');
        Route::delete('destroy/{id}', 'destroy')->name('producto.destroy');
    });
 
    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});