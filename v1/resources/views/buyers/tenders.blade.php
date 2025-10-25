@extends('layouts.master')
@section('bartitle', 'Tenders')
@section('content')
    <div class="vertiqal-dashboard-content">
        <!-- Header Section -->
        <div class="d-flex justify-content-between align-items-start mb-4">
            <div>
                <h2 class="mb-2" style="color: #0f2d52; font-weight: 600;">Tenders</h2>
                <p class="text-muted mb-0">Manage your procurement tenders and track progress</p>
            </div>
            <button class="btn btn-primary" style="background-color: #0f2d52; border-color: #0f2d52;" data-toggle="modal"
                data-target="#tenderModal">
                <i class="fas fa-plus mr-2"></i> Create Tender
            </button>
        </div>

        {{-- modals section --}}

        <div class="modal fade" id="cncMachineModal" tabindex="-1" role="dialog" aria-labelledby="cncMachineModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="cncMachineModalLabel">Industrial CNC Machine</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div style="position: relative;">
                                    <img src="{{ asset('assets/img/worker.jpg') }}" alt="CNC Machine" class="product-image">
                                    <div class="verified-badge">
                                        <i class="fas fa-check-circle"></i> Verified Vendor
                                    </div>
                                </div>

                                <!-- Vendor Information -->
                                <div class="vendor-box">
                                    <div class="vendor-name">
                                        TechMach Industries
                                        <span class="rating ml-2">
                                            <i class="fas fa-star"></i> 4.7
                                        </span>
                                    </div>
                                    <div class="info-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        Corporate Tech Solutions • Austin, USA
                                    </div>
                                    <p class="mb-2 mt-3">Leading manufacturer of industrial machinery</p>
                                    <div>
                                        <span class="certification-badge">ISO 9001</span>
                                        <span class="certification-badge">CE Certified</span>
                                    </div>
                                </div>

                                <!-- Specifications -->
                                <div class="section-title">Specifications</div>
                                <div>
                                    <div class="spec-row">
                                        <span>Power:</span>
                                        <strong>15kW</strong>
                                    </div>
                                    <div class="spec-row">
                                        <span>Precision:</span>
                                        <strong>±0.01mm</strong>
                                    </div>
                                    <div class="spec-row">
                                        <span>Work Area:</span>
                                        <strong>1000×600×400mm</strong>
                                    </div>
                                </div>
                            </div>

                            <div class="col-md-6">
                                <span class="category-badge">Machinery</span>
                                <p class="text-muted">High-precision CNC machine for manufacturing operations</p>

                                <div class="info-item">
                                    <i class="fas fa-map-marker-alt"></i>
                                    Corporate Tech Solutions • Austin, USA
                                </div>
                                <div class="info-item">
                                    <i class="fas fa-box"></i>
                                    Unit: Each
                                </div>
                                <div class="info-item">
                                    <i class="far fa-clock"></i>
                                    Lead Time: 4-6 weeks
                                </div>

                                <!-- Pricing -->
                                <div class="section-title">Pricing</div>
                                <div class="price-tag">$25,000 - $35,000</div>
                                <p class="text-muted">per Each</p>
                                <p class="text-muted">MOQ: 1 Each</p>

                                <!-- Availability and Reviews -->
                                <div class="row mt-4">
                                    <div class="col-6">
                                        <div class="section-title">Availability</div>
                                        <div class="stock-badge">5 in stock</div>
                                    </div>
                                    <div class="col-6">
                                        <div class="section-title">Customer Reviews</div>
                                        <div>
                                            <span class="rating">
                                                <i class="fas fa-star"></i> 4.7
                                            </span>
                                            <span class="text-muted"> (156 reviews)</span>
                                        </div>
                                    </div>
                                </div>

                                <!-- Action Buttons -->
                                <div class="mt-4">
                                    <button class="btn btn-primary-custom">
                                        Add to Requisition
                                    </button>
                                    <div class="btn-group-custom">
                                        <button class="btn btn-outline-custom">
                                            <i class="far fa-heart"></i> Save to Favourite
                                        </button>
                                        <button class="btn btn-outline-custom">
                                            <i class="far fa-comment-dots"></i> Contact Vendor
                                        </button>
                                    </div>
                                    <button class="btn btn-secondary-custom">
                                        Request Quotation
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="tenderModal" tabindex="-1" role="dialog" aria-labelledby="tenderModalLabel"
            aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
                <div class="modal-content">
                    <form id="tenderForm" action="{{ route('tenders.store') }}" method="POST">
                        @csrf
                        <input type="hidden" id="draft_id" name="draft_id" value="{{ session('draft_id') }}">
                        <div class="modal-header">
                            <div class="w-100">
                                <h4 class="modal-title font-weight-bold" id="tenderModalLabel">Create New Tender</h4>
                                <p class="mb-0 mt-2 text-muted" id="stepTitle">Step 1 of 3</p>
                            </div>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <!-- Step Indicator -->
                            <div class="step-indicator">
                                <div class="step-circle active" id="stepCircle1">1</div>
                                <div class="step-line" id="stepLine1"></div>
                                <div class="step-circle" id="stepCircle2">2</div>
                                <div class="step-line" id="stepLine2"></div>
                                <div class="step-circle" id="stepCircle3">3</div>
                            </div>

                            <!-- Step 1: Basic Information -->
                            <div class="step-content active" id="step1">
                                <div class="form-group">
                                    <label class="form-label">Tender Title</label>
                                    <input type="text" name="title" class="form-control" placeholder="" value="{{ old('title') }}">
                                </div>
                                @error('title')
                                    <div class="invalid-feedback d-block">{{ $message }}</div>
                                @enderror

                                <div class="form-group">
                                    <label class="form-label">Description</label>
                                    <textarea name="description" class="form-control" placeholder="Description......" ></textarea>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Commodity Type</label>
                                            <select class="custom-select" name="commodity_type">
                                                <option selected>Select Commodity</option>
                                                <option value="Agricultural Products">Agricultural Products</option>
                                                <option value="Construction Materials">Construction Materials</option>
                                                <option value="Electronics">Electronics</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Grade</label>
                                            <input name="grade" type="text" class="form-control" placeholder="" value="{{ old('grade') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Quality Standards</label>
                                    <div id="qualityStandards">
                                        <div class="quality-standard-item">
                                            <input name="quality_standard[]" type="text" class="form-control"
                                                placeholder="" value="{{ old('quality_standard[]') }}">
                                            <button type="button" class="btn btn-delete">
                                                <i class="far fa-trash-alt"></i>
                                            </button>
                                        </div>
                                    </div>
                                    <button type="button" class="btn btn-add" id="addQualityStandard">
                                        <i class="fas fa-plus"></i> Create Tender
                                    </button>
                                </div>
                            </div>

                            <!-- Step 2: Details -->
                            <div class="step-content" id="step2">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Quantity</label>
                                            <input name="quantity" type="number" class="form-control" placeholder="0" value="{{ old('quantity') }}">
                                        </div>
                                        @error('quantity')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Unit</label>
                                            <select class="custom-select" name="unit">
                                                <option selected>Select Unit</option>
                                                <option value="Kilograms">Kilograms (kg)</option>
                                                <option value="Tons">Tons</option>
                                                <option value="Pieces">Pieces</option>
                                                <option value="Liters">Liters</option>
                                            </select>
                                        </div>
                                        @error('unit')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Estimated Value</label>
                                            <input name="value" type="number" class="form-control" placeholder="0" value="{{ old('value') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Currency</label>
                                            <select name="currency" class="custom-select">
                                                <option value="NGN" selected>Naira</option>
                                                <option value="USD">USD</option>
                                                <option value="EUR">EUR</option>
                                                <option value="GBP">GBP</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Commodity Type</label>
                                            <select class="custom-select">
                                                <option selected>Select Commodity</option>
                                                <option value="1">Agricultural Products</option>
                                                <option value="2">Construction Materials</option>
                                                <option value="3">Electronics</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Grade</label>
                                            <input type="text" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Delivery Location</label>
                                    <input name="delivery_location" type="text" class="form-control" placeholder="" value="{{ old('delivery_location') }}">
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Delivery Start Date</label>
                                            <input name="delivery_start_date" type="date" class="form-control"
                                                placeholder="MM/DD/YYYY" value="{{ old('delivery_start_date') }}">
                                        </div>
                                        @error('delivery_start_date')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Delivery End Date</label>
                                            <input name="delivery_end_date" type="date" class="form-control"
                                                placeholder="MM/DD/YYYY" value="{{ old('delivery_end_date') }}">
                                        </div>
                                        @error('delivery_end_date')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="custom-control custom-checkbox">
                                    <input type="hidden" name="cross_border_tender" value="0">
                                    <input name="cross_border_tender" type="checkbox" class="custom-control-input"
                                        id="crossBorder" value="1">
                                    <label class="custom-control-label" for="crossBorder">Cross-border tender</label>
                                </div>
                            </div>

                            <!-- Step 3: Timeline & Documents -->
                            <div class="step-content" id="step3">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Publish Date</label>
                                            <input name="publish_date" type="date" class="form-control"
                                                placeholder="MM/DD/YYYY" value="{{ old('publish_date') }}">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Opening Date</label>
                                            <input name="opening_date" type="date" class="form-control"
                                                placeholder="MM/DD/YYYY" value="{{ old('opening_date') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">Closing Date</label>
                                            <input name="closing_date" type="date" class="form-control"
                                                placeholder="MM/DD/YYYY" value="{{ old('closing_date') }}">
                                        </div>
                                        @error('closing_date')
                                            <div class="invalid-feedback d-block">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label">BID Deadline</label>
                                            <input name="bid_deadline" type="date" class="form-control"
                                                placeholder="MM/DD/YYYY" value="{{ old('bid_deadline') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Timezone</label>
                                    <select name="timezone" class="custom-select">
                                        <option value="UTC" selected>UTC</option>
                                        <option value="GMT">GMT</option>
                                        <option value="EST">EST</option>
                                        <option value="PST">PST</option>
                                        <option value="WAT">WAT</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label class="form-label">Upload Documents</label>
                                    <div class="upload-area" onclick="document.getElementById('fileInput').click()">
                                        <div class="upload-icon">
                                            <i class="fas fa-cloud-upload-alt"></i>
                                        </div>
                                        <div class="upload-text">Click to upload or drag and drop</div>
                                        <div class="upload-hint">PNG, JPG up to 5MB each</div>
                                        <input type="file" name="document[]" id="fileInput" multiple
                                            accept=".png,.jpg,.jpeg">
                                        <button type="button" class="btn btn-outline-secondary mt-3">Choose
                                            Files</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-cancel" data-dismiss="modal"
                                id="cancelBtn">Cancel</button>
                            <button type="button" class="btn btn-nav btn-previous" id="prevBtn"
                                style="display: none;">Previous</button>
                            <button type="button" class="btn btn-nav btn-next" id="nextBtn">Next</button>
                            <button type="submit" class="btn btn-nav btn-create" id="createBtn"
                                style="display: none;">Create Tender</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        {{-- modals section --}}

        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs border-bottom mb-4" id="tenderTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" href="{{ route('buyer.tenders') }}" aria-controls="all"
                    aria-selected="true" style="color: #0f2d52; border-bottom: 3px solid #0f2d52;">All
                    Tenders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="active-tab" href="{{ route('buyer.tenders', ['filter' => 'active']) }}"
                    aria-controls="active" aria-selected="false" style="color: #6c757d;">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab"
                    aria-controls="review" aria-selected="false" style="color: #6c757d;">Review</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab" href="{{ route('buyer.tenders', ['filter' => 'completed']) }}"
                    aria-controls="completed" aria-selected="false" style="color: #6c757d;">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="draft-tab" href="{{ route('buyer.tenders', ['filter' => 'draft']) }}"
                    aria-controls="draft" aria-selected="false" style="color: #6c757d;">Draft</a>
            </li>
        </ul>

        <!-- Search and Filter Section -->
        <div class="row mb-4">
            <div class="col-md-8">
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text bg-white border-right-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                    </div>
                    <input type="text" class="form-control border-left-0 pl-0"
                        placeholder="Search by product name, buyers and location..." style="font-size: 0.95rem;">
                </div>
            </div>
            <div class="col-md-4">
                <select class="form-control" style="color: #6c757d;">
                    <option>All Categories</option>
                    <option>Category 1</option>
                    <option>Category 2</option>
                </select>
            </div>
        </div>

        <!-- Tenders Overview Section -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h4 style="color: #0f2d52; font-weight: 600;">Tenders Overview</h4>
            <a href="#" class="text-decoration-none" style="color: #6c757d; font-size: 0.9rem;">
                <i class="fas fa-external-link-alt mr-1"></i> View All
            </a>
        </div>

        <!-- Tab Content -->
        <div class="tab-content" id="tenderTabsContent">
            <div class="tab-pane fade show active" id="all" role="tabpanel" aria-labelledby="all-tab">
                <!-- Tenders Table -->
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead style="background-color: #f8f9fa;">
                            <tr>
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Tender
                                    Details</th>
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Date
                                    Created
                                </th>
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Bids</th>
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Value</th>
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Deadline
                                </th>
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tenders as $tender)
                                <tr>
                                    <td>
                                        <div class="font-weight-bold" style="color: #0f2d52;">{{ $tender->title }}</div>
                                        <small class="text-muted">{{ $tender->tid }}</small>
                                    </td>
                                    <td class="text-muted">{{ $tender->created_at->format('d/m/Y') }}</td>
                                    <td class="text-muted">{{ $tender->bids_count }}</td>
                                    <td class="text-muted">₦{{ $tender->value }}</td>
                                    <td class="text-muted">{{ $tender->closing_date->format('d/m/Y') }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-link text-muted p-0" type="button"
                                                id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="fas fa-ellipsis-h"></i>
                                            </button>
                                            <div class="dropdown-menu dropdown-menu-right"
                                                aria-labelledby="dropdownMenuButton1">
                                                <a class="dropdown-item" href="" class="btn btn-primary btn-lg"
                                                    data-toggle="modal"
                                                    data-target="#cncMachineModal{{ $tender->id }}">
                                                    <i class="far fa-eye mr-2"></i> View
                                                </a>
                                                <a class="dropdown-item" href="#">
                                                    <i class="far fa-edit mr-2"></i> Edit
                                                </a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>

                                {{-- Modal --}}
                                <div class="modal fade" id="cncMachineModal{{ $tender->id }}" tabindex="-1"
                                    role="dialog" aria-labelledby="cncMachineModalLabel{{ $tender->id }}"
                                    aria-hidden="true">
                                    <div class="modal-dialog modal-lg" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="cncMachineModalLabel">{{ $tender->title }}
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal"
                                                    aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div style="position: relative;">
                                                            <img src="{{ asset('assets/img/worker.jpg') }}"
                                                                alt="CNC Machine" class="product-image">
                                                            <div class="verified-badge">
                                                                <i class="fas fa-check-circle"></i> Verified Vendor
                                                            </div>
                                                        </div>

                                                        <!-- Vendor Information -->
                                                        <div class="vendor-box">
                                                            <div class="vendor-name">
                                                                TechMach Industries
                                                                <span class="rating ml-2">
                                                                    <i class="fas fa-star"></i> 4.7
                                                                </span>
                                                            </div>
                                                            <div class="info-item">
                                                                <i class="fas fa-map-marker-alt"></i>
                                                                Corporate Tech Solutions • Austin, USA
                                                            </div>
                                                            <p class="mb-2 mt-3">Leading manufacturer of industrial
                                                                machinery</p>
                                                            <div>
                                                                <span class="certification-badge">ISO 9001</span>
                                                                <span class="certification-badge">CE Certified</span>
                                                            </div>
                                                        </div>

                                                        <!-- Specifications -->
                                                        <div class="section-title">Specifications</div>
                                                        <div>
                                                            <div class="spec-row">
                                                                <span>Power:</span>
                                                                <strong>15kW</strong>
                                                            </div>
                                                            <div class="spec-row">
                                                                <span>Precision:</span>
                                                                <strong>±0.01mm</strong>
                                                            </div>
                                                            <div class="spec-row">
                                                                <span>Work Area:</span>
                                                                <strong>1000×600×400mm</strong>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="col-md-6">
                                                        <span class="category-badge">Machinery</span>
                                                        <p class="text-muted">{{ $tender->description }}</p>

                                                        <div class="info-item">
                                                            <i class="fas fa-map-marker-alt"></i>
                                                            Corporate Tech Solutions • Austin, USA
                                                        </div>
                                                        <div class="info-item">
                                                            <i class="fas fa-box"></i>
                                                            Unit: {{ $tender->unit }}
                                                        </div>
                                                        <div class="info-item">
                                                            <i class="far fa-clock"></i>
                                                            Lead Time: 4-6 weeks
                                                        </div>

                                                        <!-- Pricing -->
                                                        <div class="section-title">Pricing</div>
                                                        <div class="price-tag">₦{{ $tender->value }}</div>
                                                        <p class="text-muted">per Each</p>
                                                        <p class="text-muted">MOQ: 1 Each</p>

                                                        <!-- Availability and Reviews -->
                                                        <div class="row mt-4">
                                                            <div class="col-6">
                                                                <div class="section-title">Availability</div>
                                                                <div class="stock-badge">5 in stock</div>
                                                            </div>
                                                            <div class="col-6">
                                                                <div class="section-title">Customer Reviews</div>
                                                                <div>
                                                                    <span class="rating">
                                                                        <i class="fas fa-star"></i> 4.7
                                                                    </span>
                                                                    <span class="text-muted"> (156 reviews)</span>
                                                                </div>
                                                            </div>
                                                        </div>

                                                        <!-- Action Buttons -->
                                                        <div class="mt-4">
                                                            <button class="btn btn-primary-custom">
                                                                Add to Requisition
                                                            </button>
                                                            <div class="btn-group-custom">
                                                                <button class="btn btn-outline-custom">
                                                                    <i class="far fa-heart"></i> Save to Favourite
                                                                </button>
                                                                <button class="btn btn-outline-custom">
                                                                    <i class="far fa-comment-dots"></i> Contact Vendor
                                                                </button>
                                                            </div>
                                                            <button class="btn btn-secondary-custom">
                                                                Request Quotation
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                            {{-- <tr>
                                <td>
                                    <div class="font-weight-bold" style="color: #0f2d52;">Irrigation Equipment</div>
                                    <small class="text-muted">TND-2024-001</small>
                                </td>
                                <td class="text-muted">9/3/2025</td>
                                <td class="text-muted">12</td>
                                <td class="text-muted">₦450,000</td>
                                <td class="text-muted">9/3/2025</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-muted p-0" type="button"
                                            id="dropdownMenuButton2" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton2">
                                            <a class="dropdown-item" href="#">
                                                <i class="far fa-eye mr-2"></i> View
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="far fa-edit mr-2"></i> Edit
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="font-weight-bold" style="color: #0f2d52;">Irrigation Equipment</div>
                                    <small class="text-muted">TND-2024-001</small>
                                </td>
                                <td class="text-muted">9/3/2025</td>
                                <td class="text-muted">12</td>
                                <td class="text-muted">₦450,000</td>
                                <td class="text-muted">9/3/2025</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-muted p-0" type="button"
                                            id="dropdownMenuButton3" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton3">
                                            <a class="dropdown-item" href="#">
                                                <i class="far fa-eye mr-2"></i> View
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="far fa-edit mr-2"></i> Edit
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="font-weight-bold" style="color: #0f2d52;">Irrigation Equipment</div>
                                    <small class="text-muted">TND-2024-001</small>
                                </td>
                                <td class="text-muted">9/3/2025</td>
                                <td class="text-muted">12</td>
                                <td class="text-muted">₦450,000</td>
                                <td class="text-muted">9/3/2025</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-muted p-0" type="button"
                                            id="dropdownMenuButton4" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton4">
                                            <a class="dropdown-item" href="#">
                                                <i class="far fa-eye mr-2"></i> View
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="far fa-edit mr-2"></i> Edit
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <div class="font-weight-bold" style="color: #0f2d52;">Irrigation Equipment</div>
                                    <small class="text-muted">TND-2024-001</small>
                                </td>
                                <td class="text-muted">9/3/2025</td>
                                <td class="text-muted">12</td>
                                <td class="text-muted">₦450,000</td>
                                <td class="text-muted">9/3/2025</td>
                                <td>
                                    <div class="dropdown">
                                        <button class="btn btn-link text-muted p-0" type="button"
                                            id="dropdownMenuButton5" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton5">
                                            <a class="dropdown-item" href="#" type="button"
                                                class="btn btn-primary btn-lg" data-toggle="modal"
                                                data-target="#cncMachineModal">
                                                <i class="far fa-eye mr-2"></i> View
                                            </a>
                                            <a class="dropdown-item" href="#">
                                                <i class="far fa-edit mr-2"></i> Edit
                                            </a>
                                        </div>
                                    </div>
                                </td>
                            </tr> --}}
                        </tbody>
                    </table>
                </div>
            </div>

            <div class="tab-pane fade" id="active" role="tabpanel" aria-labelledby="active-tab">
                <p class="text-center text-muted py-5">Active tenders . . .</p>
            </div>

            <div class="tab-pane fade" id="review" role="tabpanel" aria-labelledby="review-tab">
                <p class="text-center text-muted py-5">Review tenders . . .</p>
            </div>

            <div class="tab-pane fade" id="completed" role="tabpanel" aria-labelledby="completed-tab">
                <p class="text-center text-muted py-5">Completed tenders . . .</p>
            </div>

            <div class="tab-pane fade" id="draft" role="tabpanel" aria-labelledby="draft-tab">
                <p class="text-center text-muted py-5">Draft tenders . . .</p>
            </div>
        </div>

    </div>
@endsection

@section('local_css')

    <style>
        .nav-tabs .nav-link {
            border: none;
            border-bottom: 3px solid transparent;
            color: #6c757d;
            padding: 0.75rem 1.5rem;
        }

        .nav-tabs .nav-link:hover {
            border-color: transparent;
            color: #0f2d52;
        }

        .nav-tabs .nav-link.active {
            color: #0f2d52;
            border-bottom-color: #0f2d52;
            background-color: transparent;
        }

        .table tbody tr {
            border-bottom: 1px solid #e9ecef;
        }

        .table tbody tr:hover {
            background-color: #f8f9fa;
        }

        .input-group-text {
            border-right: 0;
        }

        .form-control:focus {
            box-shadow: none;
            border-color: #ced4da;
        }

        .product-image {
            width: 100%;
            height: 350px;
            object-fit: cover;
            border-radius: 8px;
            position: relative;
        }

        .verified-badge {
            position: absolute;
            top: 20px;
            right: 20px;
            background: rgba(25, 58, 94, 0.9);
            color: white;
            padding: 8px 16px;
            border-radius: 20px;
            font-size: 14px;
        }

        .vendor-box {
            background: #f8f9fa;
            border-radius: 8px;
            padding: 1.5rem;
            margin-top: 1rem;
        }

        .vendor-name {
            font-size: 1.1rem;
            font-weight: 600;
            margin-bottom: 0.5rem;
        }

        .rating {
            color: #ffc107;
        }

        .certification-badge {
            display: inline-block;
            background: white;
            border: 1px solid #dee2e6;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 12px;
            margin-right: 8px;
            margin-top: 8px;
        }

        .spec-row {
            display: flex;
            justify-content: space-between;
            padding: 12px 0;
            border-bottom: 1px solid #e9ecef;
        }

        .spec-row:last-child {
            border-bottom: none;
        }

        .price-tag {
            font-size: 2rem;
            font-weight: 700;
            color: #212529;
            margin-bottom: 0.5rem;
        }

        .info-item {
            display: flex;
            align-items: center;
            margin-bottom: 0.75rem;
            color: #6c757d;
        }

        .info-item i {
            margin-right: 10px;
            width: 20px;
        }

        .stock-badge {
            color: #004085;
            font-weight: 600;
            font-size: 1.1rem;
        }

        .btn-primary-custom {
            background: #193a5e;
            border: none;
            padding: 12px;
            font-weight: 600;
            border-radius: 6px;
            width: 100%;
            margin-bottom: 10px;
        }

        .btn-primary-custom:hover {
            background: #0f2540;
        }

        .btn-outline-custom {
            border: 1px solid #dee2e6;
            background: white;
            color: #495057;
            padding: 12px;
            border-radius: 6px;
            width: 48%;
            margin-bottom: 10px;
        }

        .btn-secondary-custom {
            background: #7589a3;
            border: none;
            padding: 12px;
            color: white;
            font-weight: 600;
            border-radius: 6px;
            width: 100%;
        }

        .btn-group-custom {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .category-badge {
            background: #e9ecef;
            padding: 4px 12px;
            border-radius: 4px;
            font-size: 14px;
            display: inline-block;
            margin-bottom: 1rem;
        }

        .section-title {
            font-weight: 600;
            font-size: 1.1rem;
            margin-top: 1.5rem;
            margin-bottom: 1rem;
        }




        .btn-trigger {
            background-color: #003366;
            color: white;
            padding: 12px 30px;
            border-radius: 4px;
            border: none;
            font-weight: 500;
        }

        .btn-trigger:hover {
            background-color: #004080;
        }

        .modal-header {
            border-bottom: none;
            padding: 1.5rem 1.5rem 0;
        }

        .modal-body {
            padding: 1.5rem;
        }

        .modal-footer {
            border-top: none;
            padding: 1rem 1.5rem 1.5rem;
        }

        .step-indicator {
            display: flex;
            align-items: center;
            margin-bottom: 2rem;
        }

        .step-circle {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: 600;
            font-size: 1.1rem;
            background-color: #e9ecef;
            color: #6c757d;
            position: relative;
            z-index: 2;
        }

        .step-circle.active {
            background-color: #003366;
            color: white;
        }

        .step-line {
            flex: 1;
            height: 2px;
            background-color: #e9ecef;
            margin: 0 -1px;
        }

        .step-line.active {
            background-color: #003366;
        }

        textarea.form-control {
            min-height: 120px;
        }

        .btn-cancel {
            background-color: #f8f9fa;
            color: #6c757d;
            border: 1px solid #dee2e6;
            padding: 0.75rem 2rem;
            border-radius: 4px;
        }

        .btn-cancel:hover {
            background-color: #e9ecef;
        }

        .btn-nav {
            padding: 0.75rem 2.5rem;
            border-radius: 4px;
            font-weight: 500;
        }

        .btn-previous {
            background-color: #f8f9fa;
            color: #495057;
            border: 1px solid #dee2e6;
        }

        .btn-next,
        .btn-create {
            background-color: #003366;
            color: white;
            border: none;
        }

        .btn-next:hover,
        .btn-create:hover {
            background-color: #004080;
        }

        .quality-standard-item {
            display: flex;
            gap: 0.5rem;
            margin-bottom: 0.75rem;
        }

        .quality-standard-item .form-control {
            flex: 1;
        }

        .btn-delete {
            background-color: #f8f9fa;
            border: 1px solid #dee2e6;
            color: #6c757d;
            padding: 0.75rem 1rem;
            border-radius: 4px;
        }

        .btn-delete:hover {
            background-color: #e9ecef;
        }

        .btn-add {
            color: #003366;
            background: none;
            border: none;
            padding: 0.5rem 0;
            font-weight: 500;
            display: flex;
            align-items: center;
            gap: 0.5rem;
        }

        .btn-add:hover {
            color: #004080;
        }

        .upload-area {
            border: 2px dashed #ced4da;
            border-radius: 8px;
            padding: 3rem 2rem;
            text-align: center;
            background-color: #f8f9fa;
            cursor: pointer;
            transition: all 0.3s;
        }

        .upload-area:hover {
            border-color: #003366;
            background-color: #e9ecef;
        }

        .upload-icon {
            font-size: 2rem;
            color: #6c757d;
            margin-bottom: 1rem;
        }

        .upload-text {
            color: #495057;
            font-weight: 500;
            margin-bottom: 0.5rem;
        }

        .upload-hint {
            color: #6c757d;
            font-size: 0.875rem;
        }

        .step-content {
            display: none;
        }

        .step-content.active {
            display: block;
        }

        input[type="file"] {
            display: none;
        }

        .custom-checkbox .custom-control-label {
            font-weight: 500;
            color: #495057;
        }

        .quality-standard-item input {
            height: 50px
        }
    </style>
@endsection

@section('local_js')
    <script>
        let currentStep = 1;
        const totalSteps = 3;

        function updateStepIndicator() {
            for (let i = 1; i <= totalSteps; i++) {
                const circle = document.getElementById(`stepCircle${i}`);
                if (i <= currentStep) {
                    circle.classList.add('active');
                } else {
                    circle.classList.remove('active');
                }
            }

            for (let i = 1; i < totalSteps; i++) {
                const line = document.getElementById(`stepLine${i}`);
                if (i < currentStep) {
                    line.classList.add('active');
                } else {
                    line.classList.remove('active');
                }
            }

            // Update step title
            document.getElementById('stepTitle').textContent = `Step ${currentStep} of ${totalSteps}`;

            // Update step content visibility
            for (let i = 1; i <= totalSteps; i++) {
                const content = document.getElementById(`step${i}`);
                if (i === currentStep) {
                    content.classList.add('active');
                } else {
                    content.classList.remove('active');
                }
            }

            // Update buttons
            document.getElementById('prevBtn').style.display = currentStep === 1 ? 'none' : 'inline-block';
            document.getElementById('nextBtn').style.display = currentStep === totalSteps ? 'none' : 'inline-block';
            document.getElementById('createBtn').style.display = currentStep === totalSteps ? 'inline-block' : 'none';
        }

        document.getElementById('nextBtn').addEventListener('click', function() {
            if (currentStep < totalSteps) {
                currentStep++;
                updateStepIndicator();
            }
        });

        document.getElementById('prevBtn').addEventListener('click', function() {
            if (currentStep > 1) {
                currentStep--;
                updateStepIndicator();
            }
        });

        // document.getElementById('createBtn').addEventListener('click', function() {
        //     alert('Tender created successfully!');
        //     $('#tenderModal').modal('hide');
        // });

        // Reset modal when closed
        $('#tenderModal').on('hidden.bs.modal', function() {
            currentStep = 1;
            updateStepIndicator();
        });

        // Add quality standard functionality
        document.getElementById('addQualityStandard').addEventListener('click', function() {
            const container = document.getElementById('qualityStandards');
            const newItem = document.createElement('div');
            newItem.className = 'quality-standard-item';
            newItem.innerHTML = `
                <input type="text" class="form-control" placeholder="">
                <button type="button" class="btn btn-delete" onclick="this.parentElement.remove()">
                    <i class="far fa-trash-alt"></i>
                </button>
            `;
            container.appendChild(newItem);
        });

        // Delete quality standard
        document.querySelectorAll('.btn-delete').forEach(btn => {
            btn.addEventListener('click', function() {
                this.parentElement.remove();
            });
        });

        // File upload handler
        document.getElementById('fileInput').addEventListener('change', function(e) {
            const files = e.target.files;
            if (files.length > 0) {
                alert(`${files.length} file(s) selected`);
            }
        });

        // Draft
        //console.log("Draft auto-save script loaded");

        let currentDraftId = document.getElementById('draft_id').value || null;
        let autoSaveTimer;


        document.querySelectorAll('#tenderModal input, #tenderModal textarea, #tenderModal select')
            .forEach(field => {
                field.addEventListener('input', function() {
                    //console.log('Input changed in:', field.name);
                    clearTimeout(autoSaveTimer);
                    autoSaveTimer = setTimeout(saveDraft, 2000);
                });
            });

        function saveDraft() {
            const formData = new FormData(document.getElementById('tenderForm'));

            if (currentDraftId) {
                formData.set('draft_id', currentDraftId);
            }

            fetch('{{ route('tenders.draft') }}', {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}'
                    },
                    body: formData
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        // Update both the hidden field and our tracking variable
                        currentDraftId = data.draft_id;
                        document.getElementById('draft_id').value = data.draft_id;
                        console.log('Draft saved at ' + new Date().toLocaleTimeString());
                    }
                })
                .catch(error => {
                    console.error('Draft save failed:', error);
                });
        }
    </script>
@endsection
