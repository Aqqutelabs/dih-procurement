<?php include_once __DIR__ . '/includes/admin/start.php'; ?>
<div class="vertiqal-main-content">
    <div class="vertiqal-dashboard-content">
        <div class="vertiqal-header-section">
            <h1 class="vertiqal-main-title">Submit Your Bid</h1>
            <p class="vertiqal-subtitle">Provide your quotation details, delivery terms, and supporting documents for this tender.</p>
        </div>

        <form id="vertiqal-bid-form">
            <h2 class="vertiqal-form-section-title">Enter Your Offer</h2>
            
            <div class="vertiqal-tender-info-section mb-4">
                <h3 class="h6 font-weight-bold text-muted mb-3">Tender Information</h3>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Tender Title</label>
                            <input type="text" class="form-control vertiqal-form-control" value="7 tons" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Buyer</label>
                            <input type="text" class="form-control vertiqal-form-control" placeholder="Buyer name will appear here">
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Tender ID</label>
                            <input type="text" class="form-control vertiqal-form-control" value="TNDR-2025-004" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Categories</label>
                            <div class="vertiqal-select-wrapper">
                                <select class="form-control vertiqal-form-control vertiqal-form-select">
                                    <option>Select Category</option>
                                    <option>Agriculture</option>
                                    <option>Construction</option>
                                    <option>Manufacturing</option>
                                    <option>Services</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Delivery Location</label>
                            <div class="vertiqal-select-wrapper">
                                <select class="form-control vertiqal-form-control vertiqal-form-select">
                                    <option>Select Location</option>
                                    <option>Lagos, Nigeria</option>
                                    <option>Abuja, Nigeria</option>
                                    <option>Port Harcourt, Nigeria</option>
                                    <option>Kano, Nigeria</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Unit Price</label>
                            <div class="vertiqal-currency-input">
                                <span class="vertiqal-currency-symbol">₦</span>
                                <input type="number" class="form-control vertiqal-form-control vertiqal-currency-field" placeholder="2000" value="2000">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Delivery Date</label>
                            <div class="vertiqal-select-wrapper">
                                <select class="form-control vertiqal-form-control vertiqal-form-select">
                                    <option>Select Date</option>
                                    <option>Within 1 week</option>
                                    <option>Within 2 weeks</option>
                                    <option>Within 1 month</option>
                                    <option>Custom date</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Available quantity you can supply</label>
                            <div class="vertiqal-currency-input">
                                <span class="vertiqal-currency-symbol">₦</span>
                                <input type="number" class="form-control vertiqal-form-control vertiqal-currency-field" placeholder="2000" value="2000">
                            </div>
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
                    <input type="file" id="vertiqal-file-input" multiple accept=".png,.jpg,.jpeg" style="display: none;">
                </div>
            </div>

            <!-- Note Section -->
            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label">Note to Buyer</label>
                <textarea class="form-control vertiqal-form-control vertiqal-textarea" placeholder="Add any additional information or terms for the buyer..."></textarea>
            </div>

            <!-- Checkboxes -->
            <div class="vertiqal-checkbox-container">
                <input type="checkbox" id="vertiqal-confirm-specs" class="vertiqal-checkbox" checked>
                <label for="vertiqal-confirm-specs" class="vertiqal-checkbox-label">I confirm that my offer meets all specifications provided</label>
            </div>

            <div class="vertiqal-checkbox-container">
                <input type="checkbox" id="vertiqal-agree-terms" class="vertiqal-checkbox" checked>
                <label for="vertiqal-agree-terms" class="vertiqal-checkbox-label">I agree to abide by the buyer's procurement terms</label>
            </div>

            <!-- Button Group -->
            <div class="vertiqal-button-group">
                <button type="button" class="btn vertiqal-btn-cancel">Cancel</button>
                <button type="submit" class="btn vertiqal-btn-submit">Submit Bid</button>
            </div>
        </form>
    </div>
</div>
<?php include_once __DIR__ . '/includes/admin/end.php'; ?>