<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenderController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


    Route::get('/tenders', function () {
        return view('tenders');
    });

    Route::get('/bids', function () {
        return view('bids');
    });

    Route::get('/add_bid', function () {
        return view('add_bid');
    })->middleware('role:vendor');

    Route::get('/view_tender', function () {
        return view('view_tender');
    });

    Route::get('/contracts', function () {
        return view('contracts');
    });
});



    // Buyer
    Route::middleware(['role:buyer'])->group(function () {
        Route::resource('tenders', TenderController::class);
    });

    // Vendor
    Route::middleware(['role:vendor'])->group(function () {
        Route::resource('tenders', TenderController::class);
    });

    Route::resource('products', ProductController::class);
    Route::resource('bids', BidController::class);

    require __DIR__ . '/auth.php';

