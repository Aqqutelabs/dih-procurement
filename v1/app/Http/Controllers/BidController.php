<?php

namespace App\Http\Controllers;

use App\Http\Requests\BidRequest;
use App\Models\Bid;
use App\Models\Category;
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
    public function create()
    {
        return view('bids.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BidRequest $request)
    {
        $user = auth()->user();

        // Handle document uploads
        $documentPaths = [];
        if ($request->hasFile('document')) {
            foreach ($request->file('document') as $file) {
                $path = $file->store('documents', 'public');
                $documentPaths[] = $path;
            }
        }

        $bid = Bid::create([
            ...$request->validated(),
            'user_id' => $user->id,
            'document' => $documentPaths
        ]);

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
        return view('bids.edit', compact('bid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Bid $bid)
    {
        $bid->update($request->validated());

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
