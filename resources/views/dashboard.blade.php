@extends('layouts.app')

@section('content')
    <h2 class="mb-4">Dashboard</h2>

    <div class="row">
        <div class="col-md-6 mb-4">
            <div class="card text-white bg-primary shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Products</h5>
                    <p class="card-text display-6">{{ $productCount }}</p>
                </div>
            </div>
        </div>

        <div class="col-md-6 mb-4">
            <div class="card text-white bg-success shadow">
                <div class="card-body">
                    <h5 class="card-title">Total Sales</h5>
                    <p class="card-text display-6">{{ $saleCount }}</p>
                </div>
            </div>
        </div>
    </div>
@endsection

