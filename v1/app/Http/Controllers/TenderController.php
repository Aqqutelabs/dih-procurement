<?php

namespace App\Http\Controllers;

use App\Http\Requests\TenderRequest;
use App\Models\Bid;
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

    // Vendors Tender
    public function index(Request $request)
    {
        $today = now();
        $query = Tender::with('buyer');

        if ($request->filled('search')) {
            $search = $request->input('search');

            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', "%{$search}%")
                    ->orWhere('delivery_location', 'like', "%{$search}%")
                    ->orWhereHas('buyer', function ($buyerQ) use ($search) {
                        $buyerQ->where('name', 'like', "%{$search}%");
                    });
            });
        }

        if ($request->filled('location')) {
            $query->where('delivery_location', $request->location);
        }

        // if ($request->has('filter')) {
        //     $filter = $request->filter;

        //     if ($filter === 'active') {
        //         $query->whereDate('delivery_end_date', '>=', $today);
        //     } else if ($filter = 'completed') {
        //         $query->whereDate('delivery_end_date', '<', $today);
        //     }
        // }

        $tenders = $query->latest()->paginate(10);

        return view('vendors.tenders.index', compact('tenders'));
    }

    // Buyers Tender
    public function buyer_view(Request $request)
    {
        $user = auth()->user();
        $filter = $request->query('filter');

        $query = Tender::withCount('bids')->where('user_id', $user->id);

        if ($filter == 'active') {
            $query->where('closing_date', '>=', now());
        } elseif ($filter == 'completed') {
            $query->where('closing_date', '<=', now());
        } elseif($filter == 'draft') {
            $query->where('is_draft', true);
        }

        $tenders = $query->latest()->paginate(10);

        return view('buyers.tenders', compact('tenders', 'filter'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        return view('tenders.create');
    }

    public function saveDraft(Request $request)
    {
        $user = auth()->user();
        //dd('here');
        $tender = Tender::updateOrCreate(
            [
                'id' => $request->input('draft_id'),
                'user_id' => $user->id,
            ],
            [
                'title' => $request->input('title'),
                'description' => $request->input('description'),
                'quantity' => $request->input('quantity'),
                'grade' => $request->input('grade'),
                'unit' => $request->input('unit'),
                'value' => $request->input('value'),
                'commodity_type' => $request->input('commodity_type'),
                'currency' => $request->input('currency'),
                'quality_standard' => $request->input('quality_standard'),
                'delivery_location' => $request->input('delivery_location'),
                'delivery_start_date' => $request->input('delivery_start_date'),
                'delivery_end_date' => $request->input('delivery_end_date'),
                'publish_date' => $request->input('publish_date'),
                'opening_date' => $request->input('opening_date'),
                'closing_date' => $request->input('closing_date'),
                'bid_deadline' => $request->input('bid_deadline'),
                'timezone' => $request->input('timezone'),
                'document' => $request->input('document'),
                'cross_border_tender' => $request->input('cross_border_tender'),
                'is_draft' => true,
            ]
        );

        return response()->json([
            'success' => true,
            'draft_id' => $tender->id,
            'message' => 'Draft saved successfully'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TenderRequest $request)
    {
        //dd($request->all());
        $user = auth()->user();

        // Handle document uploads
        $documentPaths = [];
        if ($request->hasFile('document')) {
            foreach ($request->file('document') as $file) {
                $path = $file->store('tender_documents', 'public');
                $documentPaths[] = $path;
            }
        }

        $data = $request->validated();

        $data['user_id'] = $user->id;
        $data['is_draft'] = false;
        $data['document'] = $documentPaths;

        //$tender = Tender::create($data);

        $tender = Tender::findOrFail($request->draft_id);
        $tender->update($data);

        return redirect()->route('buyer.tenders')->with(
            'success',
            'Tender created successfully',
        );
    }

    /**
     * Display the specified resource.
     */
    public function show(Tender $tender)
    {
        $tender->load('buyer');
        return view('vendors.tenders.show', compact('tender'));
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
