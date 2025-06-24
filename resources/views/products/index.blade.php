@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Product List</h2>
            <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>
        </div>

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Name</th>
                <th>Purchase Price</th>
                <th>Sell Price</th>
                <th>Stock</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($products as $product)
                <tr>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->purchase_price, 2) }} TK</td>
                    <td>{{ number_format($product->sell_price, 2) }} TK</td>
                    <td>{{ $product->stock }}</td>
                </tr>
            @empty
                <tr><td colspan="4">No products found.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
