<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenderRequest;
use App\Models\Tender;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;

class TenderController extends Controller
{
    use AuthorizesRequests;
    // public function __construct()
    // {
    //     $this->authorizeResource(Tender::class, 'tender');
    // }

    /**
     * Display a listing of the resource.
     */

    public function index(Request $request)
    {
        $today = now();
        $query = Tender::query();

        if ($request->has('filter')) {
            $filter = $request->filter;

            if ($filter === 'active') {
                $query->whereDate('delivery_end_date', '>=', $today);
            } else if ($filter = 'completed') {
                $query->whereDate('delivery_end_date', '<', $today);
            }
        }

        $tenders = Tender::latest()->paginate(10);

        return view('tenders', compact('tenders'));
    }

    public function buyer_view(Request $request){
        return view('buyers.tenders');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('tenders.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TenderRequest $request)
    {
        $user = auth()->user();

        $tender = Tender::create([
            $request->validated(),
            'user_id' => $user->id
        ]);

        return redirect()->route('tenders.index')->with(
            'success',
            'Tender created successfully',
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Tender $tender)
    {
        return view('tenders.show', compact('tender'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Tender $tender)
    {
        return view('tenders.edit', compact('tender'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TenderRequest $request, Tender $tender)
    {
        $this->authorize('update', $tender);

        $tender->update($request->validated());

        return redirect()->route('tenders.index')->with('success', 'Tender updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tender $tender)
    {
        $this->authorize('delete', $tender);

        $tender->delete();

        return redirect()->route('tenders.index')->with('success', 'Tender deleted successfully.');
    }
}
