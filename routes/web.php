<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Livewire\LoginForm;
use App\Livewire\RegisterForm;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\CartController;

/*
|--------------------------------------------------------------------------
| Public Routes
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('home');

// Auth routes
Route::get('/register', RegisterForm::class)->name('register');
Route::get('/login', LoginForm::class)->name('login');

// Registration success page
Route::view('/register/success', 'auth.register-success')->name('register.success');

// Profile page (only for logged-in users)
Route::middleware(['auth'])->get('/profile', function () {
    $user = Auth::user();
    return view('profile', compact('user'));
})->name('profile');

// Logout
Route::post('/logout', function () {
    Auth::logout();
    return redirect()->route('home');
})->name('logout');

/*
|--------------------------------------------------------------------------
| User Dashboard
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', function () {
        $user = Auth::user();

        if ($user->role === 'admin') {
            return redirect()->route('home');
        }

        // Redirect to homepage (for normal users)
        session()->flash('success', 'Login successful! 🎉');
        return redirect()->route('home');
    })->name('dashboard');
});

/*
|--------------------------------------------------------------------------
| Admin Routes
|--------------------------------------------------------------------------
*/
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
});

/*
|--------------------------------------------------------------------------
| Products Page
|--------------------------------------------------------------------------
*/

Route::get('/products', [ProductController::class, 'index'])->name('products');
Route::get('/products/{id}', [ProductController::class, 'show'])->name('product.show');

/*
|--------------------------------------------------------------------------
| Cart Page
|--------------------------------------------------------------------------
*/

Route::get('/cart', [CartController::class, 'index'])->name('cart');
Route::post('/cart/add/{id}', [CartController::class, 'add'])->name('cart.add');
Route::post('/cart/update/{id}', [CartController::class, 'update'])->name('cart.update');
Route::post('/cart/remove/{id}', [CartController::class, 'remove'])->name('cart.remove');

/*
|--------------------------------------------------------------------------
| Other Static Pages
|--------------------------------------------------------------------------
*/

Route::view('/contact', 'contact')->name('contact');
Route::view('/about', 'about')->name('about');

/*
|--------------------------------------------------------------------------
| Test Admin Middleware
|--------------------------------------------------------------------------
*/
Route::get('/test-admin', function () {
    return '✅ Admin middleware working!';
})->middleware('admin');
