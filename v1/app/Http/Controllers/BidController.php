<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Models\Bid;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Tender;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $search = $request->query('search');
        $status = $request->query('status');
        $categoryId = $request->query('category_id');
        $location = $request->query('location');
        $dateRange = $request->query('date_range');

        $query = Bid::with(['category', 'tender.buyer']);

        // status (tabs + dropdown)
        if (!empty($status) && $status !== 'All Bids') {
            $query->where('status', $status);
        }

        // search — find bids where tender title OR tender's buyer name
        if ($request->filled('search')) {
            $s = $request->search;
            $query->whereHas('tender', function ($tq) use ($s) {
                $tq->where('title', 'like', "%{$s}%")
                    ->orWhereHas('buyer', function ($bq) use ($s) {
                        $bq->where('name', 'like', "%{$s}%");
                    });
            });
        }

        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        if ($request->filled('location')) {
            $query->where('delivery_location', $request->location);
        }

        // date range presets
        if ($request->filled('date_range')) {
            $now = now();
            switch ($request->date_range) {
                case 'last_7_days':
                    $from = $now->copy()->subDays(7);
                    break;
                case 'last_30_days':
                    $from = $now->copy()->subDays(30);
                    break;
                case 'last_3_months':
                    $from = $now->copy()->subMonths(3);
                    break;
                case 'last_6_months':
                    $from = $now->copy()->subMonths(6);
                    break;
                default:
                    $from = null;
            }
            if ($from) {
                $query->whereBetween('created_at', [$from, $now]);
            }
        }

        $bids = $query->latest()->get();
        $categories = Category::all();

        return view('vendors.bids.index', compact('bids', 'categories'))
            ->with('status', $status);
    }


    // public function index(Request $request)
    // {
    //     $search = $request->input('search');

    //     $bids = Bid::with(['category', 'tender.buyer'])
    //         ->when($search, function ($query, $search) {
    //             $query->whereHas('tender', function ($q) use ($search) {
    //                 $q->where('title', 'like', "%{$search}%")
    //                     ->orWhereHas('buyer', function ($bq) use ($search) {
    //                         $bq->where('name', 'like', "%{$search}%");
    //                     });
    //             });
    //         })
    //         ->latest()
    //         ->get();

    //     $categories = Category::all();
    //     $tenders = Tender::all();

    //     return view('vendors.bids.index', compact('bids', 'categories', 'tenders', 'search'));
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        //$tenders = Tender::all();

        $tenderId = $request->query('tender_id');
        $tender = Tender::findOrFail($tenderId);

        return view('vendors.bids.create', compact('categories', 'tender'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BidRequest $request)
    {
        //dd($request->all());
        $user = auth()->user();

        // Handle document uploads
        $documentPaths = [];
        if ($request->hasFile('document')) {
            foreach ($request->file('document') as $file) {
                $path = $file->store('bid_documents', 'public');
                $documentPaths[] = $path;
            }
        }

        $data = $request->validated();

        $data['user_id'] = $user->id;
        $data['document'] = $documentPaths;
        $data['amount'] = $request->quantity * $request->unit_price;
        $data['tender_id'] = $request->tender_id;

        //dd($data);

        $bid = Bid::create($data);

        //dd('here');

        return redirect()->route('bids.index')->with(
            'success',
            'Bid submitted successfully',
        );

        // return redirect()->back()->with('bid_success', [
        //     'title' => 'Congratulations',
        //     'message' => 'Your Bid for "' . $request->tender_title . '" has been successfully submitted.',
        //     'bid_id' => $bid->id,
        //     'tender_title' => $request->tender_title
        // ]);

    }

    public function acceptBid(Request $request, Bid $bid)
    {
        $user = auth()->user();

        $request->validate([
            'bid_id' => 'required|exists:bids,id',
        ]);

        $bid = Bid::with('tender')->findorFail($request->bid_id);

        if ($bid->tender->user_id != $user->id) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $bid->update(['status' => 'Accepted']);

        $contract = Contract::create([
            'bid_id' => $bid->id,
            'vendor_name' => $bid->vendor->name,
            'buyer_name' => $bid->tender->buyer->name,
            'status' => 'Active'
        ]);

        return redirect()->back()->with('success', 'Bid accepted successfully');
    }

    public function rejectBid(Request $request, Bid $bid)
    {
        $user = auth()->user();

        $request->validate([
            'bid_id' => 'required|exists:bids,id',
        ]);

        $bid = Bid::with('tender')->findorFail($request->bid_id);

        if ($bid->tender->user_id != $user->id) {
            return redirect()->back()->with('error', 'Unauthorized');
        }

        $bid->update(['status' => 'Rejected']);

        return redirect()->back()->with('success', 'Bid accepted successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Bid $bid)
    {
        return view('bids.show', compact('bid'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Bid $bid)
    {
        $user = auth()->user();

        // Use policy later
        if ($bid->user_id != $user->id) {
            abort(403, 'Unauthorized');
        }

        $bid->load('tender');
        $categories = Category::all();

        return view('edit_bid', compact('bid', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BidRequest $request, Bid $bid)
    {
        $user = auth()->user();

        // Use policy later
        if ($bid->user_id != $user->id) {
            abort(403, 'Unauthorized');
        }

        $documentPaths = [];
        if ($request->hasFile('document')) {
            foreach ($request->file('document') as $file) {
                $path = $file->store('documents', 'public');
                $documentPaths[] = $path;
            }
        }

        $data = $request->validated();

        $data['document'] = $documentPaths;
        $data['amount'] = $request->quantity * $request->unit_price;

        $bid->update($data);

        return redirect()->route('bids.index')->with('success', 'Bid updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Bid $bid)
    {
        $bid->delete();

        return redirect()->route('bids.index')->with('success', 'Bid deleted successfully.');
    }
}
