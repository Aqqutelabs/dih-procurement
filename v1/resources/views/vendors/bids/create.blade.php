@extends('layouts.master')
@section('bartitle', 'Create a bid')
@section('content')
    <!-- paste your code in between -->
    <div class="vertiqal-dashboard-content">
        <div class="vertiqal-header-section">
            <h1 class="vertiqal-main-title">Submit Your Bid</h1>
            <p class="vertiqal-subtitle">Provide your quotation details, delivery terms, and supporting documents for this
                tender.</p>
        </div>

        <form id="vertiqal-bid-form" action="{{ route('bids.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <h2 class="vertiqal-form-section-title">Enter Your Offer</h2>

            <div class="vertiqal-tender-info-section mb-4">
                <h3 class="h6 font-weight-bold text-muted mb-3">Tender Information</h3>

                <div class="row">
                    <input type="hidden" name="tender_id" value="{{ $tender->id }}">
                    {{-- <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Tender Title</label>
                            <input type="text" class="form-control vertiqal-form-control" value="{{ $bid->tender->title }}" readonly>
                        </div>
                    </div> --}}
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Tender Title</label>
                            <input type="text" class="form-control vertiqal-form-control" value="{{ $tender->title }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Buyer</label>
                            <input type="text" class="form-control vertiqal-form-control" name="buyer_name"
                                placeholder="Buyer name will appear here" value="{{ $tender->buyer->name }}" readonly>
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
                            <input type="text" class="form-control vertiqal-form-control" name="tender_tid" value="{{ $tender->tid }}" readonly>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="vertiqal-form-group">
                            <label class="vertiqal-form-label">Categories</label>
                            <div class="vertiqal-select-wrapper">
                                <select class="form-control vertiqal-form-control vertiqal-form-select" name="category_id">
                                    <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id') == $category->id ? 'selected' : '' }}>
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
                                <select class="form-control vertiqal-form-control vertiqal-form-select" name="delivery_location"
                                value="{{ old('delivery_location') }}">
                                    <option>Select Location</option>
                                    <option value="lagos, nigeria">Lagos, Nigeria</option>
                                    <option value="abuja, nigeria">Abuja, Nigeria</option>
                                    <option value="port harcourt, nigeria">Port Harcourt, Nigeria</option>
                                    <option value="kano, nigeria">Kano, Nigeria</option>
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
                                    placeholder="2000" name="unit_price" value="{{ old('unit_price') }}">
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
                                    <option>Within 1 week</option>
                                    <option>Within 2 weeks</option>
                                    <option>Within 1 month</option>
                                    <option>Custom date</option>
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
                                    placeholder="2000" name="quantity" value="{{ old('quantity') }}">
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
                <div class="vertiqal-upload-area" id="vertiqal-upload-area">
                    <div class="vertiqal-upload-icon">
                        <i class="fas fa-cloud-upload-alt"></i>
                    </div>
                    <div class="vertiqal-upload-title">Upload product images (Max 3)</div>
                    <div class="vertiqal-upload-description">PNG, JPG up to 5MB each</div>
                    <button type="button" class="vertiqal-upload-button">Choose Files</button>
                    <input type="file" id="vertiqal-file-input" name="document[]" multiple accept=".png,.jpg,.jpeg" style="display: none;">

                    <!-- File list container -->
                    <div id="vertiqal-file-list" class="vertiqal-file-list"></div>
                </div>
            </div>

            <!-- Note Section -->
            <div class="vertiqal-form-group">
                <label class="vertiqal-form-label">Note to Buyer</label>
                <textarea class="form-control vertiqal-form-control vertiqal-textarea" name="note"
                    placeholder="Add any additional information or terms for the buyer...">{{ old('note') }}</textarea>
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
                <a href="bids.php" class="btn vertiqal-btn-cancel">Cancel</a>
                <button type="submit" class="btn vertiqal-btn-submit">Submit Bid</button>
            </div>
        </form>
    </div>
@endsection

@section('local_css')
    <style>
        .vertiqal-file-list {
            margin-top: 15px;
            width: 100%;
        }

        .vertiqal-file-item {
            display: flex;
            align-items: center;
            justify-content: space-between;
            padding: 10px;
            margin-bottom: 8px;
            background-color: #f8f9fa;
            border-radius: 6px;
            border: 1px solid #e9ecef;
        }

        .vertiqal-file-info {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .vertiqal-file-icon {
            color: #6c757d;
        }

        .vertiqal-file-name {
            font-size: 14px;
            color: #495057;
        }

        .vertiqal-file-size {
            font-size: 12px;
            color: #6c757d;
        }

        .vertiqal-file-remove {
            background: none;
            border: none;
            color: #dc3545;
            cursor: pointer;
            font-size: 16px;
            padding: 0;
            width: 24px;
            height: 24px;
            display: flex;
            align-items: center;
            justify-content: center;
            border-radius: 4px;
        }

        .vertiqal-file-remove:hover {
            background-color: #f8d7da;
        }

        .vertiqal-upload-area.drag-over {
            background-color: #f0f8ff;
            border-color: #007bff;
        }

        .vertiqal-upload-area.has-files {
            padding-bottom: 10px;
        }
    </style>
@endsection

@section('local_js')

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const uploadArea = document.getElementById('vertiqal-upload-area');
            const fileInput = document.getElementById('vertiqal-file-input');
            const fileList = document.getElementById('vertiqal-file-list');
            const uploadButton = uploadArea.querySelector('.vertiqal-upload-button');

            // Store the files
            let uploadedFiles = [];
            const maxFiles = 3;
            const maxFileSize = 5 * 1024 * 1024; // 5MB in bytes

            // Click on upload area or button to trigger file input
            uploadArea.addEventListener('click', function(e) {
                if (e.target !== fileList && !e.target.closest('.vertiqal-file-item')) {
                    fileInput.click();
                }
            });

            // Handle file selection
            fileInput.addEventListener('change', function(e) {
                handleFiles(e.target.files);
            });

            // Drag and drop functionality
            uploadArea.addEventListener('dragover', function(e) {
                e.preventDefault();
                uploadArea.classList.add('drag-over');
            });

            uploadArea.addEventListener('dragleave', function() {
                uploadArea.classList.remove('drag-over');
            });

            uploadArea.addEventListener('drop', function(e) {
                e.preventDefault();
                uploadArea.classList.remove('drag-over');

                if (e.dataTransfer.files.length) {
                    handleFiles(e.dataTransfer.files);
                }
            });

            // Function to handle selected files
            function handleFiles(files) {
                const newFiles = Array.from(files);

                // Check if adding these files would exceed the maximum
                if (uploadedFiles.length + newFiles.length > maxFiles) {
                    alert(`You can only upload up to ${maxFiles} files.`);
                    return;
                }

                for (const file of newFiles) {
                    // Check file size
                    if (file.size > maxFileSize) {
                        alert(`File "${file.name}" is too large. Maximum file size is 5MB.`);
                        continue;
                    }

                    // Check file type
                    if (!['image/png', 'image/jpeg', 'image/jpg'].includes(file.type)) {
                        alert(
                            `File "${file.name}" is not a supported image format. Please upload PNG or JPG files.`
                            );
                        continue;
                    }

                    // Add to our files array
                    uploadedFiles.push(file);

                    // Create and add file item to the list
                    addFileToList(file);
                }

                // Update the file input with the current files
                updateFileInput();

                // Update UI to show we have files
                if (uploadedFiles.length > 0) {
                    uploadArea.classList.add('has-files');
                }
            }

            // Function to add a file to the list display
            function addFileToList(file) {
                const fileItem = document.createElement('div');
                fileItem.className = 'vertiqal-file-item';

                const fileInfo = document.createElement('div');
                fileInfo.className = 'vertiqal-file-info';

                const fileIcon = document.createElement('div');
                fileIcon.className = 'vertiqal-file-icon';
                fileIcon.innerHTML = '<i class="far fa-file-image"></i>';

                const fileName = document.createElement('div');
                fileName.className = 'vertiqal-file-name';
                fileName.textContent = file.name;

                const fileSize = document.createElement('div');
                fileSize.className = 'vertiqal-file-size';
                fileSize.textContent = formatFileSize(file.size);

                const removeButton = document.createElement('button');
                removeButton.type = 'button';
                removeButton.className = 'vertiqal-file-remove';
                removeButton.innerHTML = '<i class="fas fa-times"></i>';
                removeButton.addEventListener('click', function() {
                    removeFile(file, fileItem);
                });

                fileInfo.appendChild(fileIcon);
                fileInfo.appendChild(fileName);
                fileInfo.appendChild(fileSize);

                fileItem.appendChild(fileInfo);
                fileItem.appendChild(removeButton);

                fileList.appendChild(fileItem);
            }

            // Function to remove a file
            function removeFile(file, fileItem) {
                // Remove from our array
                const index = uploadedFiles.indexOf(file);
                if (index > -1) {
                    uploadedFiles.splice(index, 1);
                }

                // Remove from display
                fileItem.remove();

                // Update the file input
                updateFileInput();

                // Update UI if no files left
                if (uploadedFiles.length === 0) {
                    uploadArea.classList.remove('has-files');
                }
            }

            // Function to update the file input with current files
            function updateFileInput() {
                // Create a new DataTransfer object
                const dataTransfer = new DataTransfer();

                // Add each file to the DataTransfer object
                uploadedFiles.forEach(file => {
                    dataTransfer.items.add(file);
                });

                // Update the file input with the new files
                fileInput.files = dataTransfer.files;
            }

            // Function to format file size
            function formatFileSize(bytes) {
                if (bytes === 0) return '0 Bytes';

                const k = 1024;
                const sizes = ['Bytes', 'KB', 'MB', 'GB'];
                const i = Math.floor(Math.log(bytes) / Math.log(k));

                return parseFloat((bytes / Math.pow(k, i)).toFixed(2)) + ' ' + sizes[i];
            }
        });
    </script>
@endsection
