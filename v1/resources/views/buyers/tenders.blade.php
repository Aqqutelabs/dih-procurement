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
            <button class="btn btn-primary" style="background-color: #0f2d52; border-color: #0f2d52;">
                <i class="fas fa-plus mr-2"></i> Create Tender
            </button>
        </div>



        <!-- Tabs Navigation -->
        <ul class="nav nav-tabs border-bottom mb-4" id="tenderTabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" id="all-tab" data-toggle="tab" href="#all" role="tab"
                    aria-controls="all" aria-selected="true" style="color: #0f2d52; border-bottom: 3px solid #0f2d52;">All
                    Tenders</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="active-tab" data-toggle="tab" href="#active" role="tab" aria-controls="active"
                    aria-selected="false" style="color: #6c757d;">Active</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="review-tab" data-toggle="tab" href="#review" role="tab" aria-controls="review"
                    aria-selected="false" style="color: #6c757d;">Review</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="completed-tab" data-toggle="tab" href="#completed" role="tab"
                    aria-controls="completed" aria-selected="false" style="color: #6c757d;">Completed</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" id="draft-tab" data-toggle="tab" href="#draft" role="tab" aria-controls="draft"
                    aria-selected="false" style="color: #6c757d;">Draft</a>
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
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Date Created
                                </th>
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Bids</th>
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Value</th>
                                <th class="border-0 text-muted font-weight-normal" style="font-size: 0.85rem;">Deadline</th>
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
                                                    data-toggle="modal" data-target="#cncMachineModal{{ $tender->id }}">
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
                                            <a class="dropdown-item" href="#" type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#cncMachineModal">
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
        </style>
    </div>
@endsection
