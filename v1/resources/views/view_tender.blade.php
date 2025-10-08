@extends('layouts.master')
@section('bartitle', 'View Tender')
@section('content')
<div class="vertiqal-dashboard-content">
    <!-- Header Section -->
    <div class="vertiqal-header">
        <div class="w-100">
            <a href="{{ url('tenders') }}" class="vertiqal-back-btn">
                <i class="fas fa-arrow-left mr-3"></i> Back to Tenders
            </a>
        </div>
    </div>

    <!-- Title Section -->
    <div class="w-100 d-flex justify-content-between">
        <div class="py-3">
            <h1 class="vertiqal-title">Farm Equipment: Tractors and Implements</h1>
            <div class="vertiqal-meta">
                <span><i class="fas fa-building"></i> Northen Agro Cooperative</span>
                <span><i class="fas fa-map-marker-alt"></i> Kaduna</span>
                <span><i class="fas fa-cube"></i> 5 units</span>
                <span><i class="fas fa-calendar"></i> 30 June 2025</span>
            </div>
        </div>
        <div class="">
            <button class="vertiqal-open-badge mt-5">Open</button>
        </div>
    </div>

    <!-- Main Content -->
    <div class="row">
        <div class="col-lg-7">
            <!-- Description Card -->
            <div class="vertiqal-card">
                <h3 class="vertiqal-card-title">Description</h3>
                <p class="vertiqal-description">
                    We need modern tractors with implements for our cooperative farming operations. Equipment should
                    be new or like-new condition.
                </p>
            </div>

            <!-- Product Specifications Card -->
            <div class="vertiqal-card">
                <h3 class="vertiqal-card-title">Product Specifications</h3>
                <div class="vertiqal-specs-item">
                    <i class="fas fa-check-circle vertiqal-check-icon"></i>
                    60-75 HP tractors
                </div>
                <div class="vertiqal-specs-item">
                    <i class="fas fa-check-circle vertiqal-check-icon"></i>
                    4WD capability required
                </div>
                <div class="vertiqal-specs-item">
                    <i class="fas fa-check-circle vertiqal-check-icon"></i>
                    Include plough, harrow, and cultivator
                </div>
                <div class="vertiqal-specs-item">
                    <i class="fas fa-check-circle vertiqal-check-icon"></i>
                    Diesel engine, fuel efficient
                </div>
                <div class="vertiqal-specs-item">
                    <i class="fas fa-check-circle vertiqal-check-icon"></i>
                    Comfortable operator cabin
                </div>
                <div class="vertiqal-specs-item">
                    <i class="fas fa-check-circle vertiqal-check-icon"></i>
                    2-year warranty minimum
                </div>
            </div>

            <!-- Additional Conditions Card -->
            <div class="vertiqal-card">
                <h3 class="vertiqal-card-title">Additional Conditions</h3>
                <div class="vertiqal-condition-item">
                    <i class="fas fa-info-circle vertiqal-info-icon-blue"></i>
                    Training for operators included
                </div>
                <div class="vertiqal-condition-item">
                    <i class="fas fa-info-circle vertiqal-info-icon-blue"></i>
                    Maintenance manual in English
                </div>
                <div class="vertiqal-condition-item">
                    <i class="fas fa-info-circle vertiqal-info-icon-blue"></i>
                    Spare parts availability guaranteed
                </div>
                <div class="vertiqal-condition-item">
                    <i class="fas fa-info-circle vertiqal-info-icon-blue"></i>
                    Spare parts availability guaranteed
                </div>
            </div>

        </div>

        <div class="col-lg-5">
            <div class="vertiqal-card">
                <h3 class="vertiqal-card-title">Tender Information</h3>

                <div class="vertiqal-info-item">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-user vertiqal-info-icon"></i>
                        <div>
                            <div class="vertiqal-info-label">Created By</div>
                            <div class="vertiqal-info-value">Farm Equipment</div>
                        </div>
                    </div>
                </div>

                <div class="vertiqal-info-item">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-cube vertiqal-info-icon"></i>
                        <div>
                            <div class="vertiqal-info-label">Quantity Required</div>
                            <div class="vertiqal-info-value">3 units</div>
                        </div>
                    </div>
                </div>

                <div class="vertiqal-info-item">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-calendar vertiqal-info-icon"></i>
                        <div>
                            <div class="vertiqal-info-label">Opening Date</div>
                            <div class="vertiqal-info-value">January 10, 2025</div>
                        </div>
                    </div>
                </div>

                <div class="vertiqal-info-item">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-calendar vertiqal-info-icon"></i>
                        <div>
                            <div class="vertiqal-info-label">Closing Date</div>
                            <div class="vertiqal-info-value">February 10, 2025</div>
                        </div>
                    </div>
                </div>

                <div class="vertiqal-info-item">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-map-marker-alt vertiqal-info-icon"></i>
                        <div>
                            <div class="vertiqal-info-label">Delivery Location</div>
                            <div class="vertiqal-info-value">FCT, Abuja</div>
                        </div>
                    </div>
                </div>

                <div class="vertiqal-info-item">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-clock vertiqal-info-icon"></i>
                        <div>
                            <div class="vertiqal-info-label">Delivery Timeline</div>
                            <div class="vertiqal-info-value">30 days after contract signing</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="vertiqal-card">
        <h3 class="vertiqal-card-title">Attachments</h3>
        <div class="vertiqal-attachment">
            <div class="vertiqal-attachment-info">
                <i class="fas fa-file-pdf vertiqal-attachment-icon"></i>
                <div>
                    <div class="vertiqal-attachment-name">Equipment_Specs.pdf</div>
                    <div class="vertiqal-attachment-size">245 KB</div>
                </div>
            </div>
            <a href="#" class="vertiqal-download-btn">
                <i class="fas fa-download"></i> Download
            </a>
        </div>
        <div class="vertiqal-attachment">
            <div class="vertiqal-attachment-info">
                <i class="fas fa-file-pdf vertiqal-attachment-icon"></i>
                <div>
                    <div class="vertiqal-attachment-name">Warranty_Terms.pdf</div>
                    <div class="vertiqal-attachment-size">245 KB</div>
                </div>
            </div>
            <a href="#" class="vertiqal-download-btn">
                <i class="fas fa-download"></i> Download
            </a>
        </div>
    </div>

    <div class="vertiqal-card">
        <h3 class="vertiqal-card-title">Ask a Question</h3>
        <textarea class="vertiqal-question-input" placeholder="e.g., Can we deliver in 2 batches? What are the Payment terms?"></textarea>
        <button class="vertiqal-send-btn">
            <i class="fas fa-paper-plane"></i> Send Question
        </button>
    </div>


    <!-- Submit Section -->
    <div class="vertiqal-submit-section">
        <h3 class="vertiqal-submit-title">Ready to submit your bid?</h3>
        <p class="vertiqal-submit-subtitle">Review all requirements carefully before submitting your proposal.</p>
        <button class="vertiqal-submit-btn">Submit Bid</button>
    </div>
</div>
@endsection
