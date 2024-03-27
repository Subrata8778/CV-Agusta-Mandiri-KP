<?php

use App\Http\Controllers\AdvertisingCartController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\AdvertisingController;
use App\Http\Controllers\AppointmentAdminController;
use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\CarBrandController;
use App\Http\Controllers\CarCartController;
use App\Http\Controllers\CarCategoryController;
use App\Http\Controllers\CarController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\IndonesiaController;
use App\Http\Controllers\PortofolioController;
use App\Http\Controllers\PropertyCartController;
use App\Http\Controllers\PropertyController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return redirect('/home');
});

// Route Authentication
Route::get('/login', [LoginController::class, 'index'])->name('login')->middleware('guest');
Route::post('/login', [LoginController::class, 'login']);
Route::get('/register', [RegisterController::class, 'index'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::middleware(['auth'])->group(function () {
    // Route for Admin only
    Route::middleware("can:admin")->prefix('admin')->name('admin.')->group(function () {
        Route::get('/home', function () { return view('admin.index'); })->name('home');

        // Products
        Route::resource('/advertising', AdvertisingController::class);
        Route::prefix('car')->name('car.')->group(function () {
            Route::resource('/sell', CarController::class);
            Route::resource('/brand', CarBrandController::class);
            Route::resource('/category', CarCategoryController::class);
        });
        Route::resource('/property', PropertyController::class);
        Route::resource('/portfolio', PortofolioController::class);

        // Appointments
        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::get('/process', [AppointmentAdminController::class, 'indexProcess'])->name('indexProcess');
            Route::get('/finish', [AppointmentAdminController::class, 'indexFinish'])->name('indexFinish');
            Route::get('/cancel', [AppointmentAdminController::class, 'indexCancel'])->name('indexCancel');
            Route::get('/{id}/detail', [AppointmentAdminController::class, 'detail'])->name('detail');
            Route::get('/{id}/edit', [AppointmentAdminController::class, 'edit'])->name('edit');
            Route::post('/update', [AppointmentAdminController::class, 'update'])->name('update');
        });

        // Reports
        Route::prefix('report')->name('report.')->group(function () {
            Route::get('/advertising', function () { return view('admin.report.produk.adv'); })->name('product.advInit');
            Route::post('/advertising', [ReportController::class, 'adv'])->name('product.adv');
            Route::get('/car', function () { return view('admin.report.produk.car'); })->name('product.carInit');
            Route::post('/car', [ReportController::class, 'car'])->name('product.car');
            Route::get('/property', function () { return view('admin.report.produk.prop'); })->name('product.propInit');
            Route::post('/property', [ReportController::class, 'prop'])->name('product.prop');
            Route::get('/user', [ReportController::class, 'user'])->name('user');
        });
    });

    // Route for Customer Only
    Route::name('customer.')->middleware("can:customer")->group(function () {
        // Cart
        // harusnya ada pengecekan apa barang (car dan properti) masih tersedia atau sudah terjual
        Route::prefix('cart')->name('cart.')->group(function () {
            Route::prefix('advertising')->name('advertising.')->group(function () {
                Route::post('/add-to-cart', [AdvertisingCartController::class, 'addToCart'])->name('addToCart');
                Route::get('/{id}', [AdvertisingCartController::class, 'showUserCart'])->name('show')->middleware('checkloggedinuser');
                Route::get('/delete/{user_id}/{item_id}', [AdvertisingCartController::class, 'deleteCartItem'])->name('deleteCartItem');
            });
            Route::prefix('car')->name('car.')->group(function () {
                Route::post('/add-to-cart', [CarCartController::class, 'addToCart'])->name('addToCart');
                Route::get('/{id}', [CarCartController::class, 'showUserCart'])->name('show')->middleware('checkloggedinuser');
                Route::get('/delete/{user_id}/{item_id}', [CarCartController::class, 'deleteCartItem'])->name('deleteCartItem');
            });
            Route::prefix('property')->name('property.')->group(function () {
                Route::post('/add-to-cart', [PropertyCartController::class, 'addToCart'])->name('addToCart');
                Route::get('/{id}', [PropertyCartController::class, 'showUserCart'])->name('show')->middleware('checkloggedinuser');
                Route::get('/delete/{user_id}/{item_id}', [PropertyCartController::class, 'deleteCartItem'])->name('deleteCartItem');
            });
        });

        Route::prefix('appointment')->name('appointment.')->group(function () {
            Route::get('/{date}/get-appointments', [AppointmentController::class, 'getAppointmentsByDate'])->name('listByDate');
            Route::post('/make-appointment', [AppointmentController::class, 'makeAppointment'])->name('makeAppointment');
            Route::get('/{id}', [AppointmentController::class, 'showAllMine'])->name('index')->middleware('checkloggedinuser');
            Route::get('/{id}/cancel', [AppointmentController::class, 'cancel'])->name('cancel');
        });

        Route::resource('/profile', UserController::class);
    });
});

// Route for Guest and All
Route::name('customer.')->group(function () {
    Route::get('/home', [CustomerController::class, 'index'])->name('home');
    Route::get('/about', function () {
        return view('customer.about');
    })->name('about');
    Route::get('/advertising', [CustomerController::class, 'advs'])->name('advertising');
    Route::get('/advertising/detail/{adv}', [CustomerController::class, 'adv_detail'])->name('advertising.detail');
    Route::get('/car', [CustomerController::class, 'cars'])->name('car');
    Route::get('/car/detail/{adv}', [CustomerController::class, 'car_detail'])->name('car.detail');
    Route::get('/property', [CustomerController::class, 'props'])->name('property');
    Route::get('/property/detail/{adv}', [CustomerController::class, 'prop_detail'])->name('property.detail');
    Route::get('/portfolio/{id}', [CustomerController::class, 'porto_detail'])->name('portfolio.detail');
});

// Route for Indonesia.sql
Route::get('/regency/{id}', [IndonesiaController::class, 'regencies'])->name('regency');
Route::get('/district/{id}', [IndonesiaController::class, 'districts'])->name('district');
Route::get('/village/{id}', [IndonesiaController::class, 'villages'])->name('village');
