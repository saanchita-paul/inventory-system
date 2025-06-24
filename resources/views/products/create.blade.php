@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Product</h2>

        <form action="{{ route('products.store') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label>Name</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Purchase Price</label>
                <input type="number" name="purchase_price" class="form-control" required step="0.01">
            </div>

            <div class="mb-3">
                <label>Sell Price</label>
                <input type="number" name="sell_price" class="form-control" required step="0.01">
            </div>

            <div class="mb-3">
                <label>Opening Stock</label>
                <input type="number" name="stock" class="form-control" required>
            </div>

            <button class="btn btn-success">Add Product</button>
        </form>
    </div>
@endsection
