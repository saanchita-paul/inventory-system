@extends('layouts.app')
@section('content')
    <div class="container">
        <h2>Create Sale</h2>
        <form action="{{ route('sales.store') }}" method="POST" id="saleForm">
            @csrf
            <h5>Products</h5>
            @foreach($products as $product)
                <div class="row mb-2 align-items-center">
                    <div class="col-md-4">
                        {{ $product->name }} (
                        <span
                            class="stock-remaining"
                            data-id="{{ $product->id }}"
                            data-original="{{ $product->stock }}"
                        >
                            {{ $product->stock }}
                        </span> in stock)
                    </div>
                    <div class="col-md-3">
                        Price: <span class="price" data-id="{{ $product->id }}">{{ $product->sell_price }}</span> TK
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="products[{{ $product->id }}][quantity]"
                               class="form-control quantity-input"
                               data-id="{{ $product->id }}"
                               min="0" max="{{ $product->stock }}" value="0" placeholder="Qty">

                        <input type="hidden" name="products[{{ $product->id }}][id]" value="{{ $product->id }}">

                    </div>

                </div>
            @endforeach
            <div class="mb-3">
                <label>Discount (TK)</label>
                <input type="number" name="discount" id="discount" class="form-control" value="0" step="0.01">
            </div>
            <div class="mb-3">
                <label>Paid Amount (TK)</label>
                <input type="number" name="paid_amount" id="paid_amount" class="form-control" step="0.01" required>
            </div>
            <!-- Live Totals -->
            <div class="mb-3">
                <p><strong>Subtotal:</strong> <span id="subtotal">0</span> TK</p>
                <p><strong>VAT (5%):</strong> <span id="vat">0</span> TK</p>
                <p><strong>Total:</strong> <span id="total">0</span> TK</p>
                <p><strong>Due:</strong> <span id="due">0</span> TK</p>
            </div>
            <button class="btn btn-primary">Submit Sale</button>
        </form>
        <script>
            function calculateTotals() {
                let subtotal = 0;
                document.querySelectorAll('.quantity-input').forEach(input => {
                    const id = input.dataset.id;
                    const quantity = parseFloat(input.value) || 0;
                    const price = parseFloat(document.querySelector(`.price[data-id="${id}"]`).textContent) || 0;
                    subtotal += quantity * price;
                    const stockSpan = document.querySelector(`.stock-remaining[data-id="${id}"]`);
                    const originalStock = parseInt(stockSpan.dataset.original);
                    const validQuantity = Math.min(quantity, originalStock);

                    if (quantity > originalStock) {
                        input.value = originalStock;
                    }
                    const updatedStock = Math.max(originalStock - validQuantity, 0);
                    stockSpan.textContent = updatedStock.toString();
                });
                const discount = parseFloat(document.getElementById('discount').value) || 0;
                const afterDiscount = subtotal - discount;
                const vat = afterDiscount * 0.05;
                const total = afterDiscount + vat;
                const paid = parseFloat(document.getElementById('paid_amount').value) || 0;
                const due = total - paid;
                document.getElementById('subtotal').textContent = subtotal.toFixed(2);
                document.getElementById('vat').textContent = vat.toFixed(2);
                document.getElementById('total').textContent = total.toFixed(2);
                document.getElementById('due').textContent = due.toFixed(2);
            }
            document.addEventListener('DOMContentLoaded', function () {
                document.querySelectorAll('.quantity-input, #discount, #paid_amount').forEach(el => {
                    el.addEventListener('input', calculateTotals);
                });
                calculateTotals();
            });
        </script>
    </div>
@endsection
