@extends('layouts.master')
@section('bartitle', 'Dashboard')
@section('title', 'Welcome back John')
@section('subtitle', 'Real-time overview of your procurement activities')
@section('content')
    <!-- Dashboard Content -->
    <div class="vertiqal-dashboard-content">
        <!-- Stats Cards -->
        <div class="vertiqal-stats-grid">
            <div class="vertiqal-stat-card">
                <div class="vertiqal-stat-header">
                    <h3 class="vertiqal-stat-title">Active Tenders</h3>
                    <i class="fas fa-file-alt vertiqal-stat-icon"></i>
                </div>
                <h2 class="vertiqal-stat-value">{{ $activeTendersCount }}</h2>
                <p class="vertiqal-stat-description">$2.4M total value</p>
            </div>

            <div class="vertiqal-stat-card">
                <div class="vertiqal-stat-header">
                    <h3 class="vertiqal-stat-title">Pending Approvals</h3>
                    <i class="fas fa-clock vertiqal-stat-icon"></i>
                </div>
                <h2 class="vertiqal-stat-value">{{ $pendingBidsCount }}</h2>
                <p class="vertiqal-stat-description">Awaiting your decision</p>
            </div>

            <div class="vertiqal-stat-card">
                <div class="vertiqal-stat-header">
                    <h3 class="vertiqal-stat-title">Active Contracts</h3>
                    <i class="fas fa-check-circle vertiqal-stat-icon"></i>
                </div>
                <h2 class="vertiqal-stat-value">34</h2>
                <p class="vertiqal-stat-description">Purchase orders in progress</p>
            </div>

            <div class="vertiqal-stat-card">
                <div class="vertiqal-stat-header">
                    <h3 class="vertiqal-stat-title">Spend</h3>
                    <i class="fas fa-dollar-sign vertiqal-stat-icon"></i>
                </div>
                <h2 class="vertiqal-stat-value">$847K</h2>
                <p class="vertiqal-stat-description">+12% from last August</p>
            </div>
        </div>

        <!-- Procurement Activity Overview Section -->
        <div class="vertiqal-activity-section">
            <div class="vertiqal-activity-header">
                <div>
                    <h2 class="vertiqal-activity-title">Procurement Activity Overview</h2>
                    <p class="vertiqal-activity-subtitle">Recent tender activity and current status</p>
                </div>
            </div>



            <div class="vertiqal-activity-list">
                @foreach ($tenders as $tender)
                    @php
                        $daysLeft = now()->diffInDays($tender->closing_date, false);
                    @endphp
                    <div class="vertiqal-activity-item">
                        <div class="vertiqal-activity-indicator green"></div>
                        <div class="vertiqal-activity-content">
                            <h3 class="vertiqal-activity-name">{{ $tender->title }}</h3>
                            <p class="vertiqal-activity-meta">Closes in {{ (int) $daysLeft }} {{ \Illuminate\Support\Str::plural('day', $daysLeft) }} • {{ $tender->closing_date }}</p>
                        </div>
                        <span class="vertiqal-activity-status open">Open</span>
                    </div>
                @endforeach

                {{-- <div class="vertiqal-activity-item">
                <div class="vertiqal-activity-indicator orange"></div>
                <div class="vertiqal-activity-content">
                    <h3 class="vertiqal-activity-name">IT Equipment Procurement</h3>
                    <p class="vertiqal-activity-meta">Closes in 5 days • 2025-01-15</p>
                </div>
                <span class="vertiqal-activity-status open">Open</span>
            </div>

            <div class="vertiqal-activity-item">
                <div class="vertiqal-activity-indicator purple"></div>
                <div class="vertiqal-activity-content">
                    <h3 class="vertiqal-activity-name">Construction Materials</h3>
                    <p class="vertiqal-activity-meta">Closes in 5 days • 2025-01-15</p>
                </div>
                <span class="vertiqal-activity-status open">Open</span>
            </div> --}}
            </div>
        </div>
    </div>
@endsection


@section('local_css')
    <style>
        /* Procurement Activity Overview Section */
        .vertiqal-activity-section {
            background: white;
            border-radius: 12px;
            padding: 24px;
            box-shadow: 0 1px 3px rgba(0, 0, 0, 0.08);
        }

        .vertiqal-activity-header {
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
            margin-bottom: 24px;
            padding-bottom: 20px;
            border-bottom: 1px solid #e2e8f0;
        }

        .vertiqal-activity-title {
            font-size: 20px;
            font-weight: 600;
            color: #0f172a;
            margin: 0 0 4px 0;
        }

        .vertiqal-activity-subtitle {
            font-size: 14px;
            color: #64748b;
            margin: 0;
        }

        /* Activity List */
        .vertiqal-activity-list {
            display: flex;
            flex-direction: column;
            gap: 0;
        }

        .vertiqal-activity-item {
            display: flex;
            align-items: center;
            gap: 16px;
            padding: 20px 0;
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s;
        }

        .vertiqal-activity-item:last-child {
            border-bottom: none;
        }

        .vertiqal-activity-item:hover {
            background-color: #f8fafc;
            margin: 0 -12px;
            padding-left: 12px;
            padding-right: 12px;
            border-radius: 8px;
        }

        .vertiqal-activity-indicator {
            width: 12px;
            height: 12px;
            border-radius: 50%;
            flex-shrink: 0;
        }

        .vertiqal-activity-indicator.green {
            background-color: #22c55e;
        }

        .vertiqal-activity-indicator.orange {
            background-color: #f97316;
        }

        .vertiqal-activity-indicator.purple {
            background-color: #a855f7;
        }

        .vertiqal-activity-content {
            flex: 1;
        }

        .vertiqal-activity-name {
            font-size: 15px;
            font-weight: 500;
            color: #0f172a;
            margin: 0 0 4px 0;
        }

        .vertiqal-activity-meta {
            font-size: 13px;
            color: #64748b;
            margin: 0;
        }

        .vertiqal-activity-status {
            padding: 6px 16px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            flex-shrink: 0;
        }

        .vertiqal-activity-status.open {
            background-color: #dbeafe;
            color: #1e40af;
        }

        /* Responsive Design */
        @media (max-width: 640px) {

            .vertiqal-activity-section {
                padding: 20px 16px;
            }

            .vertiqal-activity-item {
                flex-wrap: wrap;
            }

            .vertiqal-activity-status {
                margin-left: 28px;
            }
        }
    </style>
@endsection
