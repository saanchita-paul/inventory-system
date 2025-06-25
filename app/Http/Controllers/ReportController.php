<?php

namespace App\Http\Controllers;

use App\Models\Sale;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from ?? now()->startOfMonth();
        $to = $request->to ?? now()->endOfMonth();

        $sales = Sale::whereBetween('created_at', [$from, $to])->get();
        $totalSales = $sales->sum('total');
        $totalDiscount = $sales->sum('discount');
        $totalVat = $sales->sum('vat');
        $totalPaid = $sales->sum('paid_amount');
        $totalDue = $sales->sum('due_amount');

        $totalExpense = 0;
        foreach ($sales as $sale) {
            foreach ($sale->items as $item) {
                $totalExpense += $item->quantity * $item->product->purchase_price;
            }
        }

        $profit = $totalSales - $totalDiscount - $totalExpense;

        return view('reports.index', compact(
            'sales', 'totalSales', 'totalDiscount', 'totalVat', 'totalPaid', 'totalDue',
            'totalExpense', 'profit', 'from', 'to'
        ));    }

}
