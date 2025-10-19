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
    if(auth()->user()->role == 'buyer'){
        return view('buyers.dashboard');
    }else{
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Buyer
    Route::middleware(['role:buyer'])->group(function () {
        Route::get('/buyer/tenders', [TenderController::class, 'buyer_view'])->name('buyer.tenders');
    });

    // Vendor
    Route::middleware(['role:vendor'])->group(function () {
        Route::resource('tenders', TenderController::class);

        Route::get('/contracts', function () {
            return view('contracts');
        });

        Route::resource('products', ProductController::class);
        Route::resource('bids', BidController::class);
    });
    
});

require __DIR__ . '/auth.php';

