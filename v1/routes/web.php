<?php

use App\Http\Controllers\BidController;
use App\Http\Controllers\ContractController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TenderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::middleware(['auth', 'role:buyer'])->group(function () {
    Route::get('dashboard', [DashboardController::class, 'index']);
});


// Route::get('/dashboard', function () {
//     $user = auth()->user();
//     if ($user->role === 'buyer') {
//         return view('buyers.dashboard');
//     } else {
//         return view('dashboard');
//     }
// })->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/dashboard', function () {
    $user = auth()->user();

    if ($user->role === 'buyer') {
        return app(DashboardController::class)->index();
    }

    return app(DashboardController::class)->dashboard();
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Buyer
    Route::middleware(['role:buyer'])->group(function () {
        Route::get('/buyer/tenders', [TenderController::class, 'buyer_view'])->name('buyer.tenders');
    });

    Route::middleware(['role:buyer'])->group(function () {
            Route::post('bid/status', [BidController::class, 'acceptBid'])->name('bid.accept');
        });

    // Vendor
    Route::middleware(['role:vendor'])->group(function () {
        Route::resource('tenders', TenderController::class);

        Route::get('/contracts', function () {
            return view('contracts');
        });
        //Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

        Route::resource('products', ProductController::class);
        Route::resource('bids', BidController::class);



        Route::get('contracts', [ContractController::class, 'index'])->name('contract.index');
    });
});

require __DIR__ . '/auth.php';
