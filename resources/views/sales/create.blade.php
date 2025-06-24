@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create Sale</h2>

        <form action="{{ route('sales.store') }}" method="POST">
            @csrf

            <h5>Products</h5>
            @foreach($products as $product)
                <div class="row mb-2 align-items-center">
                    <div class="col-md-4">{{ $product->name }} ({{ $product->stock }} in stock)</div>
                    <div class="col-md-3">Price: {{ $product->sell_price }} TK</div>
                    <div class="col-md-2">
                        <input type="number" name="products[{{ $product->id }}][quantity]" class="form-control" placeholder="Qty">
                        <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">
                    </div>
                </div>
            @endforeach

            <div class="mb-3">
                <label>Discount (TK)</label>
                <input type="number" name="discount" class="form-control" value="0" step="0.01">
            </div>

            <div class="mb-3">
                <label>Paid Amount (TK)</label>
                <input type="number" name="paid_amount" class="form-control" step="0.01" required>
            </div>

            <button class="btn btn-primary">Submit Sale</button>
        </form>
    </div>
@endsection
