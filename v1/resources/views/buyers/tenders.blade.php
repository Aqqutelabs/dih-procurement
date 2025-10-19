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
                                            id="dropdownMenuButton1" data-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="fas fa-ellipsis-h"></i>
                                        </button>
                                        <div class="dropdown-menu dropdown-menu-right"
                                            aria-labelledby="dropdownMenuButton1">
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
        </style>
    </div>
@endsection
