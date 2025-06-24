@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Financial Report</h2>

        <form method="GET" class="row mb-4">
            <div class="col-md-3">
                <label>From</label>
                <input type="date" name="from" class="form-control" value="{{ request('from') }}">
            </div>
            <div class="col-md-3">
                <label>To</label>
                <input type="date" name="to" class="form-control" value="{{ request('to') }}">
            </div>
            <div class="col-md-2 d-flex align-items-end">
                <button class="btn btn-primary">Filter</button>
            </div>
        </form>

        <div class="row mb-3">
            <div class="col-md-3"><strong>Total Sales:</strong> {{ number_format($totalSales, 2) }} TK</div>
            <div class="col-md-3"><strong>Total Discount:</strong> {{ number_format($totalDiscount, 2) }} TK</div>
            <div class="col-md-3"><strong>Total VAT:</strong> {{ number_format($totalVat, 2) }} TK</div>
            <div class="col-md-3"><strong>Total Paid:</strong> {{ number_format($totalPaid, 2) }} TK</div>
        </div>

        <h5>Sales Entries</h5>
        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Date</th>
                <th>Total</th>
                <th>Discount</th>
                <th>VAT</th>
                <th>Paid</th>
                <th>Due</th>
            </tr>
            </thead>
            <tbody>
            @forelse ($sales as $sale)
                <tr>
                    <td>{{ $sale->created_at->format('Y-m-d') }}</td>
                    <td>{{ $sale->total }} TK</td>
                    <td>{{ $sale->discount }} TK</td>
                    <td>{{ $sale->vat }} TK</td>
                    <td>{{ $sale->paid_amount }} TK</td>
                    <td>{{ $sale->due_amount }} TK</td>
                </tr>
            @empty
                <tr><td colspan="6">No sales found for selected date range.</td></tr>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection
