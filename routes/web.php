<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ConfirmacionController;
use App\Http\Controllers\PedidosController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\Notificaciones;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Laravel\Socialite\Facades\Socialite;

Route::get('/', function () {
    return view('welcome');
});
 
// Route::controller(AuthController::class)->prefix('auth')->group(function () {
//     Route::get('login', 'login')->name('auth.login');
//     Route::post('login', 'loginAction')->name('auth.login.action');
  
//     Route::get('logout', 'logout')->middleware('auth')->name('auth.logout');
// });
// Route::controller(UserController::class)->prefix('userauth')->group(function () {
//     Route::get('register', 'register')->name('register');
//     Route::post('register', 'registerSave')->name('register.save');
  
//     Route::get('login', 'login')->name('userauth.login');
//     Route::post('login', 'loginAction')->name('userauth.login.action');
  
//     Route::get('logout', 'logout')->middleware('auth')->name('logout');
// });

Route::get('auth/redirect', function () {
   
    return Socialite::driver('google')->redirect();
});
 
Route::get('/google_callback', function () {
    $googleUser  = Socialite::driver('google')->user();
  
    $user = User::updateOrCreate([
        'google_id' => $googleUser->id,
    ], [
        'name' => $googleUser->name,
        'password' => $googleUser->id,
        'email' => $googleUser->email,
        'google_token' => $googleUser->token,
        'google_refresh_token' => $googleUser->refreshToken,
    ]);
 
    Auth::login($user);
 
    return redirect('/');
});

Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
  
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
  
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
  
Route::middleware('auth')->group(function () {
    Route::get('/', function () {
        return view('welcome');
    });
     
    Route::get('/confirmacion', [ConfirmacionController::class, 'showConfirmation'])->name('confirmacion');
    Route::post('/confirmacion', [ConfirmacionController::class, 'sendConfirmation'])->name('confirmacion');
});

Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
    Route::controller(UsersController::class)->prefix('users')->group(function () {
        Route::get('', 'index')->name('users');
        Route::get('create', 'create')->name('users.create');
        Route::post('store', 'store')->name('users.store');
        Route::get('show/{id}', 'show')->name('users.show');
        Route::get('edit/{id}', 'edit')->name('users.edit');
        Route::patch('edit/{id}', 'update')->name('users.update');
        Route::delete('destroy/{id}', 'destroy')->name('users.destroy');
    });
    Route::controller(ProductoController::class)->prefix('producto')->group(function () {
        Route::get('', 'index')->name('producto');
        Route::get('create', 'create')->name('producto.create');
        Route::post('store', 'store')->name('producto.store');
        Route::get('show/{id}', 'show')->name('producto.show');
        Route::get('edit/{id}', 'edit')->name('producto.edit');
        Route::patch('edit/{id}', 'update')->name('producto.update');
        Route::delete('destroy/{id}', 'destroy')->name('producto.destroy');
        Route::get('get_products', 'get_products')->name('producto.get_products');
        Route::get('exportar-pedidos/{producto}', 'exportarPedidos')->name('producto.exportarPedidos');
        Route::get('exportar-productos', 'exportarProductos')->name('producto.exportarProductos');
        Route::get('deleted', 'deleted')->name('producto.deleted');
        Route::patch('restore', 'restore')->name('producto.restore');

    });
    Route::controller(PedidosController::class)->prefix('Pedidos')->group(function () {
        Route::get('', 'index')->name('Pedidos');
        Route::get('create', 'create')->name('Pedidos.create');
        Route::post('store', 'store')->name('Pedidos.store');
        Route::get('show/{id}', 'show')->name('Pedidos.show');
        Route::get('edit/{id}', 'edit')->name('Pedidos.edit');
        Route::patch('edit/{id}', 'update')->name('Pedidos.update');
        Route::delete('destroy/{id}', 'destroy')->name('Pedidos.destroy');
        Route::get('exportar-productos/{pedido}', 'exportarProductos')->name('Pedidos.exportarProductos');
        Route::get('exportar-pedidos', 'exportarPedidos')->name('Pedidos.exportarPedidos');
        Route::get('deleted', 'deleted')->name('Pedidos.deleted');
        Route::patch('restore', 'restore')->name('Pedidos.restore');

        
    });
    Route::controller(InventoryController::class)->prefix('inventory')->group(function () {
        Route::get('', 'index')->name('inventory');
        Route::get('get_tipos', 'get_tipos')->name('inventory.get_tipos');
        Route::get('create', 'create')->name('inventory.create');
        Route::post('store', 'store')->name('inventory.store');
        Route::get('show/{id}', 'show')->name('inventory.show');
        Route::get('edit/{id}', 'edit')->name('inventory.edit');
        Route::patch('edit/{id}', 'update')->name('inventory.update');
        Route::delete('destroy/{id}', 'destroy')->name('inventory.destroy');
    });
    Route::get('various', [Notificaciones::class, 'mostrarNotificaciones'])->name('various')->middleware('auth');


 

    Route::get('/profile', [App\Http\Controllers\AuthController::class, 'profile'])->name('profile');
});