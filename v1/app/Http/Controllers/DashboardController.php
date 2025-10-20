<?php

namespace App\Http\Controllers;

use App\Models\Bid;
use App\Models\Tender;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    // Vendors Dashboard
    public function dashboard()
    {
        $user = auth()->user();
        $today = now();

        $tenders = Tender::with('buyer')
            ->whereDate('delivery_end_date', '>=', $today)
            ->latest()->paginate(10);

        $openTendersCount = Tender::whereDate('delivery_end_date', '>=', $today)->count();
        $submittedBidsCount = Bid::where('user_id', $user->id)->count();

        return view('dashboard', compact('tenders', 'openTendersCount', 'submittedBidsCount'));
    }
}
