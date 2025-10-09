@extends('layouts.master')
@section('bartitle', 'Tenders')
@section('title', 'Tenders')
@section('subtitle', 'Manage your procurement tenders and track progress')
@section('content')
    <div class="vertiqal-dashboard-content">
        <!-- Header Tabs -->
        <div class="vertiqal-header-tabs">
            <div class="container">
                <div class="row">
                    <div class="col-12">
                        <nav class="d-flex flex-wrap">
                            <a href="#" class="vertiqal-tab active">All Tenders</a>
                            <a href="#" class="vertiqal-tab">Open</a>
                            <a href="#" class="vertiqal-tab">Closed</a>
                            <a href="#" class="vertiqal-tab">My Bids</a>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

        <div class="container">
            <!-- Search Bar -->
            <div class="row">
                <div class="col-12">
                    <div class="vertiqal-search-bar">
                        <div class="form-group mb-0">
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text bg-white border-right-0">
                                        <i class="fas fa-search text-muted"></i>
                                    </span>
                                </div>
                                <input type="text" class="form-control border-left-0"
                                    placeholder="Search by product name, buyers and location..." style="border-left: none;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="row">
                <div class="col-12">
                    <div class="vertiqal-filters">
                        <div class="row">
                            <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                                <label class="font-weight-bold mb-2 text-muted">Category</label>
                                <select class="form-control vertiqal-select">
                                    <option>All Commodity</option>
                                    <option>Equipment</option>
                                    <option>Services</option>
                                    <option>Materials</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                                <label class="font-weight-bold mb-2 text-muted">Location</label>
                                <select class="form-control vertiqal-select">
                                    <option>All Market</option>
                                    <option>Kaduna</option>
                                    <option>Lagos</option>
                                    <option>Abuja</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6 mb-3 mb-md-0">
                                <label class="font-weight-bold mb-2 text-muted">Status</label>
                                <select class="form-control vertiqal-select">
                                    <option>Name</option>
                                    <option>Open</option>
                                    <option>Closed</option>
                                    <option>Pending</option>
                                </select>
                            </div>
                            <div class="col-md-3 col-sm-6">
                                <label class="font-weight-bold mb-2 text-muted">Sort by</label>
                                <select class="form-control vertiqal-select">
                                    <option>Name</option>
                                    <option>Date</option>
                                    <option>Status</option>
                                    <option>Location</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Tender Cards -->
            <div class="row">
                <div class="col-12">
                    @foreach ($tenders as $tender)
                        <div class="vertiqal-card">
                            <div class="vertiqal-card-body">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <div class="vertiqal-avatar">
                                            <i class="fas fa-tractor"></i>
                                        </div>
                                    </div>

                                    <div class="col">
                                        <h3 class="vertiqal-title">{{ $tender->title }}</h3>
                                        <p class="vertiqal-description">{{ $tender->description }}.</p>
                                        <div class="vertiqal-meta">
                                            <div class="vertiqal-meta-item">
                                                <i class="fas fa-building"></i>
                                                <span>Northern Agro Cooperative</span>
                                            </div>
                                            <div class="vertiqal-meta-item">
                                                <i class="fas fa-map-marker-alt"></i>
                                                <span>Kaduna</span>
                                            </div>
                                            <div class="vertiqal-meta-item">
                                                <i class="fas fa-boxes"></i>
                                                <span>{{ $tender->unit }}</span>
                                            </div>
                                            <div class="vertiqal-meta-item">
                                                <i class="fas fa-calendar-alt"></i>
                                                <span>{{ $tender->bip_deadline }}</span>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="vertiqal-tag">Equipment</div>
                                        </div>
                                    </div>

                                    <div class="col-auto">
                                        <a href="view_tender.php" class="vertiqal-btn-open">Open</a>
                                        <div class="d-flex">
                                            <button class="vertiqal-btn-details mt-5">View Details</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    <!-- Card 2 -->
                    {{-- <div class="vertiqal-card">
                    <div class="vertiqal-card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="vertiqal-avatar">
                                    <i class="fas fa-tractor"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h3 class="vertiqal-title">Farm Equipment Lease</h3>
                                <p class="vertiqal-description">Tractors and harvesting equipment for seasonal lease.</p>
                                <div class="vertiqal-meta">
                                    <div class="vertiqal-meta-item">
                                        <i class="fas fa-building"></i>
                                        <span>Northern Agro Cooperative</span>
                                    </div>
                                    <div class="vertiqal-meta-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Kaduna</span>
                                    </div>
                                    <div class="vertiqal-meta-item">
                                        <i class="fas fa-boxes"></i>
                                        <span>5 units</span>
                                    </div>
                                    <div class="vertiqal-meta-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>30 June 2025</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="vertiqal-tag">Equipment</div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="vertiqal-btn-open">Open</button>
                                <div class="d-flex">
                                    <button class="vertiqal-btn-details mt-5">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}

                    <!-- Card 3 -->
                    {{-- <div class="vertiqal-card">
                    <div class="vertiqal-card-body">
                        <div class="row align-items-center">
                            <div class="col-auto">
                                <div class="vertiqal-avatar">
                                    <i class="fas fa-tractor"></i>
                                </div>
                            </div>
                            <div class="col">
                                <h3 class="vertiqal-title">Farm Equipment Lease</h3>
                                <p class="vertiqal-description">Tractors and harvesting equipment for seasonal lease.</p>
                                <div class="vertiqal-meta">
                                    <div class="vertiqal-meta-item">
                                        <i class="fas fa-building"></i>
                                        <span>Northern Agro Cooperative</span>
                                    </div>
                                    <div class="vertiqal-meta-item">
                                        <i class="fas fa-map-marker-alt"></i>
                                        <span>Kaduna</span>
                                    </div>
                                    <div class="vertiqal-meta-item">
                                        <i class="fas fa-boxes"></i>
                                        <span>5 units</span>
                                    </div>
                                    <div class="vertiqal-meta-item">
                                        <i class="fas fa-calendar-alt"></i>
                                        <span>30 June 2025</span>
                                    </div>
                                </div>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="vertiqal-tag">Equipment</div>
                                </div>
                            </div>
                            <div class="col-auto">
                                <button class="vertiqal-btn-open">Open</button>
                                <div class="d-flex">
                                    <button class="vertiqal-btn-details mt-5">View Details</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> --}}
                </div>
            </div>
        </div>
    </div>
@endsection
