<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Models\Bid;
use App\Models\Category;
use App\Models\Contract;
use App\Models\Tender;
use Illuminate\Http\Request;

class BidController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::all();
        $tenders = Tender::all();
        $bids = Bid::with('category', 'tender')->get();
        return view('bids', compact('bids', 'categories', 'tenders'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $categories = Category::all();
        //$tenders = Tender::all();

        $tenderId = $request->query('tender_id');
        $tender = Tender::findOrFail($tenderId);

        return view('add_bid', compact('categories', 'tender'));
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
                $path = $file->store('documents', 'public');
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

        // return redirect()->route('bids.index')->with(
        //     'success',
        //     'Bid created successfully',
        // );

        return redirect()->back()->with('bid_success', [
            'title' => 'Congratulations',
            'message' => 'Your Bid for "' . $request->tender_title . '" has been successfully submitted.',
            'bid_id' => $bid->id,
            'tender_title' => $request->tender_title
        ]);
    }

    public function acceptBid(Request $request, Bid $bid)
    {
        $user = auth()->user();

        $request->validate([
            'bid_id' => 'required|exists:bids,id',
        ]);

        $bid = Bid::with('tender')->findorFail($request->bid_id);

        if($bid->tender->user_id != $user->id) {
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

        if($bid->tender->user_id != $user->id) {
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
        if($bid->user_id != $user->id) {
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
        if($bid->user_id != $user->id) {
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
