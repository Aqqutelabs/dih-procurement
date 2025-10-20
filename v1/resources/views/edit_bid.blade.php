@extends('layouts.master')
@section('bartitle', 'Add your bid')
@section('title', 'Title name of page')
@section('subtitle', 'Sub-title for page')
@section('content')
    <!-- paste your code in between -->
    <div class="vertiqal-dashboard-content">
        <div class="vertiqal-header-section">
            <h1 class="vertiqal-main-title">Edit Your Bid</h1>
            <p class="vertiqal-subtitle">Provide your quotation details, delivery terms, and supporting documents for this
                tender.</p>
        </div>

        <form id="vertiqal-bid-form" action="{{ route('bids.update', $bid->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <h2 class="vertiqal-form-section-title">Enter Your Offer</h2>

            <div class="vertiqal-tender-info-section mb-4">
                <h3 class="h6 font-weight-bold text-muted mb-3">Tender Information</h3>

                <div class="row">
                    <input type="hidden" name="tender_id" value="{{ old('tender_id', $bid->tender->id) }}">
                    {{-- <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Tender Title</label>
                            <input type="text" class="form-control vertiqal-form-control" value="{{ $bid->tender->title }}" readonly>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Tender Title</label>
                            <input type="text" class="form-control vertiqal-form-control" value="{{ old('tender_title', $bid->tender->title) }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Buyer</label>
                            <input type="text" class="form-control vertiqal-form-control" name="buyer_name"
                                placeholder="Buyer name will appear here" value="{{ old('buyer_name', $bid->tender->buyer->name) }}">
                                @error('buyer_name')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Tender ID</label>
                            <input type="text" class="form-control vertiqal-form-control" name="tender_tid" value="{{ old('tender_tid', $bid->tender->tid) }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Categories</label>
                            <div class="vertiqal-select-wrapper">
                                <select class="form-control vertiqal-form-control vertiqal-form-select" name="category_id">
                                    <option value="">Select Category</option>
                                @foreach ($categories ?? [] as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $bid->category_id ?? '') ===  $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                                </select>
                                @error('category_id')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Delivery Location</label>
                            <div class="vertiqal-select-wrapper">
                                <select class="form-control vertiqal-form-control vertiqal-form-select" name="delivery_location">
                                    <option>Select Location</option>
                                    <option value="lagos, nigeria" {{ old('delivery_location', $bid->delivery_location ?? '') == 'lagos, nigeria' ? 'selected' : '' }}>Lagos, Nigeria</option>
                                    <option value="abuja, nigeria" {{ old('delivery_location', $bid->delivery_location ?? '') == 'abuja, nigeria' ? 'selected' : '' }}>Abuja, Nigeria</option>
                                    <option value="port harcourt, nigeria" {{ old('delivery_location', $bid->delivery_location ?? '') == 'port harcourt, nigeria' ? 'selected' : '' }}>Port Harcourt, Nigeria</option>
                                    <option value="kano, nigeria" {{ old('delivery_location', $bid->delivery_location ?? '') == 'kano, nigeria' ? 'selected' : '' }}>Kano, Nigeria</option>
                                </select>
                                @error('delivery_location')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Unit Price</label>
                            <div class="vertiqal-currency-input">
                                <span class="vertiqal-currency-symbol">₦</span>
                                <input type="number" class="form-control vertiqal-form-control vertiqal-currency-field"
                                    placeholder="2000" name="unit_price" value="{{ old('unit_price', $bid->unit_price) }}">
                            </div>
                            @error('unit_price')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Delivery Date</label>
                            <div class="vertiqal-select-wrapper">
                                <select class="form-control vertiqal-form-control vertiqal-form-select" name="delivery_date">
                                    <option>Select Date</option>
                                    <option value="Within 1 week" {{ old('delivery_date', $bid->delivery_date ?? '') == 'Within 1 week' ? 'selected' : '' }}>Within 1 week</option>
                                    <option value="Within 2 weeks" {{ old('delivery_date', $bid->delivery_date ?? '') == 'Within 2 weeks' ? 'selected' : '' }}>Within 2 weeks</option>
                                    <option value="Within 1 month" {{ old('delivery_date', $bid->delivery_date ?? '') == 'Within 1 month' ? 'selected' : '' }}>Within 1 month</option>
                                    <option value="">Custom date</option>
                                </select>
                                @error('delivery_date')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Available quantity you can supply</label>
                            <div class="vertiqal-currency-input">
                                <span class="vertiqal-currency-symbol">₦</span>
                                <input type="number" class="form-control vertiqal-form-control vertiqal-currency-field"
                                    placeholder="2000" name="quantity" value="{{ old('quantity', $bid->quantity) }}">
                            </div>
                            @error('quantity')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upload Section -->
            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label">Upload supporting documents, business certificate, product photo</label>
                <div class="vertiqal-upload-area" onclick="document.getElementById('vertiqal-file-input').click()">
                    <div class="vertiqal-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="vertiqal-upload-title">Upload product images (Max 3)</div>
                    <div class="vertiqal-upload-description">PNG, JPG up to 5MB each</div>
                    <button type="button" class="vertiqal-upload-button">Choose Files</button>
                    <input type="file" id="vertiqal-file-input" name="document[]" multiple accept=".png,.jpg,.jpeg" style="display: none;">
                </div>
            </div>

            <!-- Note Section -->
            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label">Note to Buyer</label>
                <textarea class="form-control vertiqal-form-control vertiqal-textarea" name="note"
                    placeholder="Add any additional information or terms for the buyer...">{{ old('note', $bid->note) }}</textarea>
            </div>

            <!-- Checkboxes -->
            <div class="vertiqal-checkbox-container">
                <input type="checkbox" id="vertiqal-confirm-specs" class="vertiqal-checkbox" checked>
                <label for="vertiqal-confirm-specs" class="vertiqal-checkbox-label">I confirm that my offer meets all
                    specifications provided</label>
            </div>

            <div class="vertiqal-checkbox-container">
                <input type="checkbox" id="vertiqal-agree-terms" class="vertiqal-checkbox" checked>
                <label for="vertiqal-agree-terms" class="vertiqal-checkbox-label">I agree to abide by the buyer's
                    procurement terms</label>
            </div>

            <!-- Button Group -->
            <div class="vertiqal-button-group">
                <a href="bids.php" class="btn vertiqal-btn-cancel" type="button">Cancel</a>
                <button type="submit" class="btn vertiqal-btn-submit">Submit Bid</button>
            </div>
        </form>
    </div>
    <!-- paste your code in between -->
@endsection
