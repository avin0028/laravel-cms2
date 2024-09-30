@extends('layouts.dashboard')

@section('title', 'Dashboard')

@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pb-2 mb-3 border-bottom">
        <h1 class="h2">Dashboard</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
                <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
            </div>
        </div>
    </div>

    <!-- Dashboard Cards -->
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-primary mb-3">
                <div class="card-header">Orders</div>
                <div class="card-body">
                    <h5 class="card-title">150</h5>
                    <p class="card-text">New orders today.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-success mb-3">
                <div class="card-header">Products</div>
                <div class="card-body">
                    <h5 class="card-title">53</h5>
                    <p class="card-text">Products sold today.</p>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white bg-danger mb-3">
                <div class="card-header">Customers</div>
                <div class="card-body">
                    <h5 class="card-title">25</h5>
                    <p class="card-text">New customers today.</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Charts Placeholder -->
    <h2>Recent Orders</h2>
    <canvas id="myChart" width="400" height="200"></canvas>
@endsection
