@extends('layouts.master')
@section('bartitle', 'Bid Management')
@section('title', 'Bid Management')
@section('subtitle', 'Monitor your bid submissions and track their progress')
@section('content')
    <!-- paste your code in between -->
    <div class="vertiqal-dashboard-content">
        <div class="vertiqal-bid-header">
            <div>
                <h1 class="vertiqal-bid-title">Bid Management</h1>
                <p class="vertiqal-bid-subtitle">Monitor your bid submissions and track their progress</p>
            </div>
            <a href="{{ route('bids.create') }}" class="btn btn-primary vertiqal-add-btn">
                <i class="fas fa-plus mr-2"></i>Add New Bids
            </a>
        </div>
        {{-- <a href="{{ url('bids/create') }}" class="btn btn-primary vertiqal-add-btn">
            <i class="fas fa-plus mr-2"></i>Add New Bids
        </a> --}}
    </div>

    {{-- <ul class="nav nav-tabs vertiqal-nav-tabs" role="tablist">
            <li class="nav-item">
                <a class="nav-link active" href="#all-bids" data-toggle="tab">All Bids</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#submitted" data-toggle="tab">Submitted</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#under-review" data-toggle="tab">Under Review</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#accepted" data-toggle="tab">Accepted</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#rejected" data-toggle="tab">Rejected</a>
            </li>
        </ul> --}}

    <ul class="nav nav-tabs vertiqal-nav-tabs" role="tablist">
    @php
        $statuses = ['All Bids', 'Submitted', 'Under Review', 'Accepted', 'Rejected'];
    @endphp

    @foreach ($statuses as $s)
        <li class="nav-item">
            <a class="nav-link {{ ($status ?? 'All Bids') === $s ? 'active' : '' }}"
               href="{{ route('bids.index', array_merge(request()->except('page'), ['status' => $s])) }}">
                {{ $s }}
            </a>
        </li>
    @endforeach
</ul>

<form id="filterForm" action="{{ route('bids.index') }}" method="GET">
    <div class="vertiqal-filters-row">
        <div class="row g-2 align-items-center">
            {{-- SEARCH --}}
            <div class="col-md-3">
                <div class="vertiqal-search-wrapper position-relative">
                    <i class="fas fa-search vertiqal-search-icon"></i>
                    <input type="text"
                           name="search"
                           class="form-control vertiqal-search-input"
                           placeholder="Search tender title or buyer name..."
                           value="{{ request('search') }}">
                </div>
            </div>

            {{-- STATUS (DROPDOWN) --}}
            <div class="col-md-2">
                <select class="form-control" name="status" onchange="document.getElementById('filterForm').submit()">
                    <option value="">Status</option>
                    <option value="Under Review" {{ request('status') === 'Under Review' ? 'selected' : '' }}>Under Review</option>
                    <option value="Accepted" {{ request('status') === 'Accepted' ? 'selected' : '' }}>Accepted</option>
                    <option value="Rejected" {{ request('status') === 'Rejected' ? 'selected' : '' }}>Rejected</option>
                    <option value="Submitted" {{ request('status') === 'Submitted' ? 'selected' : '' }}>Submitted</option>
                </select>
            </div>

            {{-- CATEGORY --}}
            <div class="col-md-2">
                <select class="form-control" name="category_id" onchange="document.getElementById('filterForm').submit()">
                    <option value="">Category</option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" {{ request('category_id') == $category->id ? 'selected' : '' }}>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- LOCATION --}}
            <div class="col-md-2">
                <select class="form-control" name="location" onchange="document.getElementById('filterForm').submit()">
                    <option value="">Location</option>
                    <option value="Kano" {{ request('location') == 'Kano' ? 'selected' : '' }}>Kano</option>
                    <option value="Lagos" {{ request('location') == 'Lagos' ? 'selected' : '' }}>Lagos</option>
                    <option value="Abuja" {{ request('location') == 'Abuja' ? 'selected' : '' }}>Abuja</option>
                    <option value="Kaduna" {{ request('location') == 'Kaduna' ? 'selected' : '' }}>Kaduna</option>
                </select>
            </div>

            {{-- DATE RANGE --}}
            <div class="col-md-3">
                <select class="form-control" name="date_range" onchange="document.getElementById('filterForm').submit()">
                    <option value="">All Dates</option>
                    <option value="last_7_days" {{ request('date_range') == 'last_7_days' ? 'selected' : '' }}>Last 7 days</option>
                    <option value="last_30_days" {{ request('date_range') == 'last_30_days' ? 'selected' : '' }}>Last 30 days</option>
                    <option value="last_3_months" {{ request('date_range') == 'last_3_months' ? 'selected' : '' }}>Last 3 months</option>
                    <option value="last_6_months" {{ request('date_range') == 'last_6_months' ? 'selected' : '' }}>Last 6 months</option>
                </select>
            </div>
        </div>
    </div>
</form>

    <div class="vertiqal-table-wrapper">
        <table class="table vertiqal-table">
            <thead>
                <tr>
                    <th>Tender Title</th>
                    <th>Buyer</th>
                    <th>Category</th>
                    <th>Bid Amount</th>
                    <th>Location</th>
                    <th>Status</th>
                    <th>Submitted On</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bids as $bid)
                    <tr>
                        <td class="vertiqal-tender-title">{{ $bid->tender->title }}</td>
                        <td class="vertiqal-buyer-name">{{ $bid->buyer_name }}</td>
                        <td><span class="vertiqal-category-badge">{{ $bid->category->name }}</span></td>
                        <td class="vertiqal-amount">{{ $bid->amount }}</td>
                        <td class="vertiqal-location">{{ $bid->delivery_location }}</td>
                        <td><span class="badge vertiqal-status-badge vertiqal-status-review">{{ $bid->status }}</span>
                        </td>
                        <td class="vertiqal-date">{{ $bid->created_at->format('d M Y') }}</td>
                        <td>
                            <div class="dropdown">
                                <button class="btn vertiqal-actions-dropdown" type="button" data-toggle="dropdown">
                                    <i class="fas fa-ellipsis-h"></i>
                                </button>
                                <div class="dropdown-menu vertiqal-actions-menu">
                                    <a class="dropdown-item vertiqal-edit-action"
                                        href="{{ route('bids.edit', $bid->id) }}">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a class="dropdown-item vertiqal-message-action" href="#">
                                        <i class="fas fa-envelope"></i> Message
                                    </a>
                                    <a class="dropdown-item vertiqal-upload-action" href="#">
                                        <i class="fas fa-upload"></i> Upload Docs
                                    </a>
                                    <form action="{{ route('bids.destroy', $bid->id) }}" method="POST"
                                        style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="dropdown-item vertiqal-delete-action">
                                            <i class="fas fa-trash"></i> Delete
                                        </button>
                                    </form>

                                    {{-- <a class="dropdown-item vertiqal-delete-action" href="#">
                                            <i class="fas fa-trash"></i> Delete
                                        </a> --}}
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforeach

                {{-- <tr>
                    <td class="vertiqal-tender-title">Supply of Dry Maize</td>
                    <td class="vertiqal-buyer-name">Agro Foods Ltd</td>
                    <td><span class="vertiqal-category-badge">Grains</span></td>
                    <td class="vertiqal-amount">₦3,500,000</td>
                    <td class="vertiqal-location">Kano</td>
                    <td><span class="badge vertiqal-status-badge vertiqal-status-review">Under Review</span></td>
                    <td class="vertiqal-date">15 Jul 2025</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn vertiqal-actions-dropdown" type="button" data-toggle="dropdown">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu vertiqal-actions-menu">
                                <a class="dropdown-item vertiqal-edit-action" href="#">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item vertiqal-message-action" href="#">
                                    <i class="fas fa-envelope"></i> Message
                                </a>
                                <a class="dropdown-item vertiqal-upload-action" href="#">
                                    <i class="fas fa-upload"></i> Upload Docs
                                </a>
                                <a class="dropdown-item vertiqal-delete-action" href="#">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="vertiqal-tender-title">Supply of Dry Maize</td>
                    <td class="vertiqal-buyer-name">Agro Foods Ltd</td>
                    <td><span class="vertiqal-category-badge">Grains</span></td>
                    <td class="vertiqal-amount">₦3,500,000</td>
                    <td class="vertiqal-location">Kano</td>
                    <td><span class="badge vertiqal-status-badge vertiqal-status-review">Under Review</span></td>
                    <td class="vertiqal-date">15 Jul 2025</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn vertiqal-actions-dropdown" type="button" data-toggle="dropdown">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu vertiqal-actions-menu">
                                <a class="dropdown-item vertiqal-edit-action" href="#">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item vertiqal-message-action" href="#">
                                    <i class="fas fa-envelope"></i> Message
                                </a>
                                <a class="dropdown-item vertiqal-upload-action" href="#">
                                    <i class="fas fa-upload"></i> Upload Docs
                                </a>
                                <a class="dropdown-item vertiqal-delete-action" href="#">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td class="vertiqal-tender-title">Supply of Dry Maize</td>
                    <td class="vertiqal-buyer-name">Agro Foods Ltd</td>
                    <td><span class="vertiqal-category-badge">Grains</span></td>
                    <td class="vertiqal-amount">₦3,500,000</td>
                    <td class="vertiqal-location">Kano</td>
                    <td><span class="badge vertiqal-status-badge vertiqal-status-review">Under Review</span></td>
                    <td class="vertiqal-date">15 Jul 2025</td>
                    <td>
                        <div class="dropdown">
                            <button class="btn vertiqal-actions-dropdown" type="button" data-toggle="dropdown">
                                <i class="fas fa-ellipsis-h"></i>
                            </button>
                            <div class="dropdown-menu vertiqal-actions-menu">
                                <a class="dropdown-item vertiqal-edit-action" href="#">
                                    <i class="fas fa-edit"></i> Edit
                                </a>
                                <a class="dropdown-item vertiqal-message-action" href="#">
                                    <i class="fas fa-envelope"></i> Message
                                </a>
                                <a class="dropdown-item vertiqal-message-action" href="#">
                                    <i class="fas fa-envelope"></i> Message
                                </a>
                                <a class="dropdown-item vertiqal-upload-action" href="#">
                                    <i class="fas fa-upload"></i> Upload Docs
                                </a>
                                <a class="dropdown-item vertiqal-delete-action" href="#">
                                    <i class="fas fa-trash"></i> Delete
                                </a>
                            </div>
                        </div>
                    </td>
                </tr> --}}
            </tbody>
        </table>
    </div>
    </div>
    <!-- paste your code in between -->
@endsection
