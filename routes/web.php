

<?php


use Illuminate\Support\Facades\Route;

// Route profile detail untuk pembeli dan penjual
Route::get('/profile', function () {
    return view('profile');
})->name('profile');

// Route untuk update metode pembayaran
Route::post('/profile/payment', function (\Illuminate\Http\Request $request) {
    $user = auth()->user();
    $user->payment_method = $request->payment_method;
    $user->save();
    return redirect()->route('profile')->with('success', 'Metode pembayaran berhasil diubah!');
})->name('profile.payment');

// Route untuk update metode pembayaran, tetap di profile
Route::post('/profile', function (\Illuminate\Http\Request $request) {
    $user = auth()->user();
    $user->payment_method = $request->payment_method;
    $user->save();
    return redirect()->route('profile')->with('success', 'Metode pembayaran berhasil diubah!');
})->name('profile');

// Dashboard route untuk admin dan user
Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/', function () {
    return view('dashboard');
});

Route::get('/products', function () {
    return view('home');
});

// Route untuk menambah produk ke keranjang
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

Route::post('/cart/add/{id}', function ($id) {
    $user = Auth::user();
    if (!$user) return redirect('/login');
    DB::table('carts')->insert([
        'user_id' => $user->id,
        'product_id' => $id,
        'created_at' => now(),
        'updated_at' => now(),
    ]);
    return redirect('/cart');
});

// Route untuk menampilkan produk di keranjang
Route::get('/cart', function () {
    $user = Auth::user();
    if (!$user) return redirect('/login');
    $products = DB::table('carts')
        ->join('products', 'carts.product_id', '=', 'products.id')
        ->where('carts.user_id', $user->id)
        ->select('products.*')
        ->get();
    return view('cart', compact('products'));
})->name('cart');


use App\Http\Controllers\AuthController;

Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Route untuk proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit');

Route::post('/logout', function (\Illuminate\Http\Request $request) {
    \Illuminate\Support\Facades\Auth::logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();
    return redirect('/');
})->name('logout');
