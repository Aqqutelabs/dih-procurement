@extends('layouts.master')
@section('bartitle', 'Name for titlebar')
@section('title', "Title name of page")
@section('subtitle', 'Sub-title for page')
@section('content')
<!-- paste your code in between -->
 <div class="vertiqal-main-content">
    <div class="vertiqal-dashboard-content">
        <!-- Contract Header -->
        <div class="vertiqal-contract-header d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center">
                <a href="{{ route('contract.index') }}"><i class="fas fa-arrow-left vertiqal-back-arrow"></i></a>
                <h1 class="vertiqal-contract-title">Contract Details - CNT-2025-001</h1>
            </div>
            <span class="vertiqal-status-badge">{{ $contract->status }}</span>
        </div>

        <!-- Main Content -->
        <div class="vertiqal-main-box">
            <div class="row">
                <!-- Left Column -->
                <div class="col-lg-8">
                    <!-- Contract Overview -->
                    <div class="vertiqal-overview-section">
                        <div class="vertiqal-section-header">
                            <h2 class="vertiqal-section-title">Contract Overview</h2>
                            <span class="vertiqal-pending-badge">{{ $contract->status }}</span>
                        </div>

                        <div class="vertiqal-info-grid">
                            <div class="vertiqal-info-item">
                                <span class="vertiqal-info-label">Vendor's Name</span>
                                <span class="vertiqal-info-value">{{ $contract->vendor_name }}</span>
                            </div>
                            <div class="vertiqal-info-item">
                                <span class="vertiqal-info-label">Commodity</span>
                                <span class="vertiqal-info-value vertiqal-commodity-value">Maize</span>
                            </div>
                            <div class="vertiqal-info-item">
                                <span class="vertiqal-info-label">Unit Price</span>
                                <span class="vertiqal-info-value vertiqal-price-value">₦100,000</span>
                            </div>
                            <div class="vertiqal-info-item">
                                <span class="vertiqal-info-label">Total Value</span>
                                <span class="vertiqal-info-value vertiqal-price-value">₦{{ $contract->bid->amount }}</span>
                            </div>
                            <div class="vertiqal-info-item">
                                <span class="vertiqal-info-label">Start Date</span>
                                <span class="vertiqal-info-value">15 Aug 2025</span>
                            </div>
                            <div class="vertiqal-info-item">
                                <span class="vertiqal-info-label">End Date</span>
                                <span class="vertiqal-info-value">20 Aug 2025</span>
                            </div>
                        </div>

                        <div class="vertiqal-terms-box">
                            <div class="vertiqal-terms-title">Terms & Conditions</div>
                            <p class="vertiqal-terms-text">Delivery within 90 days, quality grade A minimum, payment terms NET 30.</p>
                        </div>
                    </div>

                    <!-- Contract Terms & Conditions -->
                    <div class="vertiqal-conditions-section">
                        <h2 class="vertiqal-section-title mb-4">Contract Terms & Conditions</h2>

                        <div class="vertiqal-condition-item">Contracts cannot be edited once signed</div>
                        <div class="vertiqal-condition-item">Invalidation preserves the record but stops execution.</div>
                        <div class="vertiqal-condition-item">Downloadable signed copies are always available.</div>
                        <div class="vertiqal-condition-item">All contracts are encrypted and stored in secure vault.</div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-lg-4">
                    <!-- Contract Parties -->
                    <div class="vertiqal-parties-section">
                        <h2 class="vertiqal-section-title mb-4">Contract Parties</h2>

                        <div class="vertiqal-party-item">
                            <div class="vertiqal-party-role">Buyer</div>
                            <div class="vertiqal-party-name">{{ $contract->buyer_name }}</div>
                        </div>

                        <div class="vertiqal-party-item">
                            <div class="vertiqal-party-role">Vendor</div>
                            <div class="vertiqal-party-name">{{ $contract->vendor_name }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Action Buttons -->
            <div class="vertiqal-actions-section">
                <a href="#" class="vertiqal-btn-outline">
                    <i class="far fa-edit"></i>
                    Sign Contract
                </a>
                <a href="#" class="vertiqal-btn-primary">
                    <i class="fas fa-download"></i>
                    Download Contract (PDF)
                </a>
            </div>
        </div>
    </div>
</div>
<!-- paste your code in between -->
@endsection
