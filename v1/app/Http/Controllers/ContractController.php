<?php

namespace App\Http\Controllers;

use App\Models\Contract;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        $query = Contract::with([
            'bid.tender.buyer',
            'bid.vendor'
        ]);

        // If buyer: show contracts for tenders they created
        if ($user->role === 'buyer') {
            $query->whereHas('bid.tender', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }

        // If vendor: show contracts for bids they placed
        elseif ($user->role === 'vendor') {
            $query->whereHas('bid', function ($q) use ($user) {
                $q->where('user_id', $user->id);
            });
        }

        $contractCount = Contract::all()->count();
        $totalContractValue = Contract::with('bid')->get()
                            ->sum(function ($contract) {
                                return $contract->bid->amount;
                            });
        $pendingActions = Contract::where('status', 'pending')->count();

        $contracts = $query->latest()->paginate(5);

        return view('contracts', compact('contracts', 'contractCount', 'totalContractValue', 'pendingActions'));
    }

    public function show(Contract $contract)
    {
        $contract->load('bid');
        return view('vendors.view_purchase', compact('contracts'));
    }
}
